<?php

namespace App\Http\Controllers;

use PSpell\Config;
use App\Models\Car;
use App\Models\User;
use App\Models\Wheel;
use App\Models\NutBolt;
use App\Models\WheelType;
use Illuminate\View\View;
use App\Models\BoltPattern;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Contracts\Session\Session;

class ManufacturerController extends Controller
{
    public function show_manufacturers($type): View
    {

        if ($type == "cars") {
            return view(
                'manufacturers/manufacturers',
                [
                    'manufacturers' => Manufacturer::orderBy('manufacturer_name')->where('only_wheel_maker', 0)->paginate(10),
                    'type' => $type,
                ],

            );
        } elseif ($type == "wheels") {
            return view('manufacturers/manufacturers', ['manufacturers' => Manufacturer::orderBy('manufacturer_name')->paginate(10), 'type' => $type,]);
        }
    }

    public function manufacturer_with_id($type, $manufacturer): View
    {
        if ($type == "wheels") {
            return view('wheels/datas', [
                'wheels' => Wheel::where('manufacturer_id', $manufacturer)->paginate(10)
            ]);
        } elseif ($type == "cars") {
            return view('wheels/datasC', [
                'cars' => Car::where('manufacturer_id', $manufacturer)->paginate(10)
            ]);
        }
    }

    public function car_with_id(Request $request, string $id): View
    {
        $manufacturer = null;
        $model = null;
        $collection = collect();
        $car = Car::find($id);


        foreach ($car->wheels as $wheel_car) {

            $manufacturer = Manufacturer::where('id', $wheel_car['manufacturer_id'])->select('manufacturer_name')->first();
            $model = Wheel::where('model', $wheel_car['model'])->select('model')->first();
            $collection->push($manufacturer, $model);
        }

        return view(
            'car',
            [
                'car' => Car::find($id),
                'manufacturer' => Manufacturer::all(),
                'wheels' => Wheel::all()->toQuery()->paginate(3),
                'collection' => $collection,
            ]
        );
    }

    public function car_wheel_post(Request $request)
    {
        // dd($request);
        if ($request->has("wheel_id_wheelpage")) {
            $wheel = Wheel::find($request->wheel_id_wheelpage);
            $wheel->cars()->attach($request->car_id);
        } else {
            // car_id_carpage
            $car = Car::find($request->car_id_carpage);
            $car->wheels()->attach($request->wheel_id);
        }
        return redirect()->back();
    }
    public function car_wheel_update_post(Request $request)
    {
        if ($request->accept) {
            if ($request->has("car_id")) {
                $car = Car::find($request->car_id);
                $wheel = Wheel::find($request->wheel_id);
                // dd($wheel, $car);
                $car->wheels()->updateExistingPivot($wheel, ['accepted' => 1]);
            }
        } elseif (!$request->accept) {
            if ($request->has("car_id")) {
                $car = Car::find($request->car_id);
                $wheel = Wheel::find($request->wheel_id);
                $car->wheels()->detach($wheel);
            }
        }
        return redirect()->back();
    }

    public function manufacturer_update_post(Request $request)
    {
        // dd($request->accept);
        if ($request->accept == 0) {
            $manufacturer = Manufacturer::find($request->man_id);
            $this->authorize('delete', $manufacturer);
            $wheels = Wheel::where('manufacturer_id', $request->man_id)->get();
            $cars = Car::where('manufacturer_id', $request->man_id)->get();
            // dd($cars);
            foreach ($cars as $car) {
                $car->delete();
            }
            foreach ($wheels as $wheel) {
                $wheel->users()->detach();
                $wheel->cars()->detach();
                $wheel->delete();
            }
            $manufacturer->delete();
        } else {

            Manufacturer::find($request->man_id)->update([
                'accepted' => 1,
            ]);
        }
        return redirect()->back();
    }

    public function manufacturer_create_post(Request $request)
    {

        $only_wheel_maker = false;
        if ($request->only_wheel_maker == 'on') {
            $only_wheel_maker = 1;
        } else {
            $only_wheel_maker = 0;
        }
        $accepted = Auth::user()->is_admin ? 1 : 0;
        // dd($accepted);
        Manufacturer::create([
            'manufacturer_name' => $request->manufacturer_name,
            'only_wheel_maker' => $only_wheel_maker,
            'accepted' => $accepted,
        ]);
        return redirect()->back();
    }
    public function show_cars()
    {
        // $ads = Ad::join('wheels', 'ads.wheel_id', '=', 'wheels.id')->join('bolt_patterns', 'wheels.bolt_pattern_id', '=', 'bolt_patterns.id')->select('*', 'ads.id AS ad_id', 'wheels.id AS wheel_id', 'bolt_patterns.id AS bolt_pattern_id', 'ads.price AS ad_price', 'wheels.price AS wheel_price', 'bolt_patterns.accepted AS bolt_pattern_accepted', 'ads.accepted AS ad_accepted', 'wheels.accepted AS wheel_accepted')->orderBy('ads.updated_at');
        // if (request()->has('search')) {
        //     $ads = $ads->where('title', 'like', '%' . request()->get('search', '') . "%")->orWhere('description', 'like', '%' . request()->get('search', '') . "%")->orWhere('place', 'like', '%' . request()->get('search', '') . "%");
        // }
        // if (request()->has('manufacturer_input')) {
        //     $ads = $ads->where('wheels.manufacturer_id', request()->get('manufacturer_input', ''));
        // }
        // // dd(request()->get('bolt_pattern_input'));
        // if (request()->has('bolt_pattern_input')) {
        //     $ads = $ads->where('wheels.bolt_pattern_id', request()->get('bolt_pattern_input', ''));
        // }
        $isAdmin = Auth::user() && Auth()->user()->is_admin;
        // dd($isAdmin);
        if ($isAdmin == 1) {
            $cars = Car::join('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')->select('*', 'cars.accepted AS CA', 'cars.id AS car_id')->whereNotNull('cars.created_at')->orderBy('cars.accepted', 'desc')->orderBy('manufacturers.manufacturer_name');
        } else {
            $cars = Car::join('manufacturers', 'cars.manufacturer_id', '=', 'manufacturers.id')->where('cars.accepted', '=', 1)->select('*', 'cars.accepted AS CA', 'cars.id AS car_id')->whereNotNull('cars.created_at')->orderBy('cars.accepted', 'desc')->orderBy('manufacturers.manufacturer_name');
        }
        if (request()->has('search')) {
            $cars = $cars->where('car_model', 'like', '%' . request()->get('search', '') . "%");
        }
        if (request()->has('manufacturer_input')) {
            $cars = $cars->where('cars.manufacturer_id', request()->get('manufacturer_input', ''));
        }
        if (request()->has('bolt_pattern_input')) {
            $cars = $cars->where('cars.bolt_pattern_id', request()->get('bolt_pattern_input', ''));
        }

        return view('cars', [
            'cars' => $cars->paginate(10),
            'manufacturers' => Manufacturer::all()->sortBy('manufacturer_name')->where('only_wheel_maker', '=', 0),
            'bolt_patterns' => BoltPattern::all(),
            'nutBolts' => NutBolt::all()
        ]);
    }
    public function car_create_post(Request $request)
    {
        $car_data = $request->all();
        session()->put('car_data', $car_data);
        $request->validateWithBag('create_bag',  [
            'manufacturer_id' => ['required'],
            'car_model' => ['required', 'max:255'],
            'engine_size' => ['required', 'numeric', 'between:100,15000'],
            'car_year' => ['required', 'numeric', 'between:1900,' . (date('Y'))],
            'center_bore' => ['required', 'numeric', 'between:20,200'],
            'nut_bolt_id' => ['required'],
            'mtsurface_fender_distance' => ['required', 'numeric', 'between:0,700'],
            'bolt_pattern_id' => ['required'],
            'accepted' => ['required'],
        ]);
        session()->forget('car_data');
        // dd($request);
        Car::create([
            'manufacturer_id' => $request->manufacturer_id,
            'car_model' => $request->car_model,
            'engine_size' => $request->engine_size,
            'car_year' => $request->car_year,
            'center_bore' => $request->center_bore,
            'nut_bolt_id' => $request->nut_bolt_id,
            'mtsurface_fender_distance' => $request->mtsurface_fender_distance,
            'bolt_pattern_id' => $request->bolt_pattern_id,
            'accepted' => $request->accepted,
            'updated_at' => now(),
        ]);
        return redirect()->action([ManufacturerController::class, 'show_cars']);
    }

    public function car_update_post(Request $request)
    {
        $car_data = $request->all();
        session()->put('car_data', $car_data);
        $request->validateWithBag('update_bag',  [
            'manufacturer_id' => ['required'],
            'car_model' => ['required', 'max:255'],
            'engine_size' => ['required', 'numeric', 'between:100,15000'],
            'car_year' => ['required', 'numeric', 'between:1900,' . (date('Y'))],
            'center_bore' => ['required', 'numeric', 'between:20,200'],
            'nut_bolt_id' => ['required'],
            'mtsurface_fender_distance' => ['required', 'numeric', 'between:0,200'],
            'bolt_pattern_id' => ['required'],
            'accepted' => ['required'],
        ]);

        session()->forget('car_data');

        Car::find($request->car_id)->update([
            'manufacturer_id' => $request->manufacturer_id,
            'car_model' => $request->car_model,
            'engine_size' => $request->engine_size,
            'car_year' => $request->car_year,
            'center_bore' => $request->center_bore,
            'nut_bolt_id' => $request->nut_bolt_id,
            'mtsurface_fender_distance' => $request->mtsurface_fender_distance,
            'bolt_pattern_id' => $request->bolt_pattern_id,
            'accepted' => $request->accepted
        ]);
        return redirect()->action([ManufacturerController::class, 'show_cars']);
    }

    public function car_delete_post(Request $request)
    {
        $car = Car::find($request->car_id);
        $this->authorize('delete', $car);
        $car->wheels()->where('car_id', $request->$car)->detach();
        $car->users()->where('car_id', $request->$car)->detach();
        $car->delete();
        return redirect()->back();
    }
    public function dashboard()
    {
        return view('dashboard', [
            'manufacturers' => Manufacturer::where('only_wheel_maker', 0)->orderBy('manufacturer_name')->get(),
            'cars' => Car::all(),
        ]);
    }
    public function calculator()
    {
        return view('calculator', [
            'cars' => Car::all()->whereNotNull('created_at')->toQuery()->paginate(3),
            'manufacturers' => Manufacturer::all()->sortBy('manufacturer_name')->where('only_wheel_maker', '=', 0),
            'boltPatterns' => BoltPattern::all(),
            'nutBolts' => NutBolt::all()
        ]);
    }
    //wheel_types

    public function wheel_types(Request $request): View
    {
        $previousUrl = $request->headers->get('referer');
        $URL_explode = explode('/', $previousUrl);
        $previousUrl = end($URL_explode);
        // dd($previousUrl);
        session()->put('prev_url', $previousUrl);
        return view('wheels/wheel_types', [
            // 'wheel_types' => WheelType::all()->sortBy('wheel_type')
            'wheel_types' => WheelType::orderBy('wheel_type')->paginate(10),
        ]);
    }

    public function wheel_types_with_id($wheel_types, Request $request): View
    {
        // dd($request);

        return view('wheels/datas', [
            'wheels' => Wheel::where('wheel_type_id', $wheel_types)->paginate(10)
        ]);
    }

    public function wheel_type_create_post(Request $request)
    {
        WheelType::create([
            'wheel_type' => $request->type,
            'updated_at' => now()
        ]);
        return redirect()->back();
    }

    public function bolt_patterns($type): View
    {
        // $previousUrl = $request->headers->get('referer');
        // $URL_explode = explode('/', $previousUrl);
        // $previousUrl = end($URL_explode);

        // session()->put('prev_page', $previousUrl);

        return view('wheels/bolt_patterns', [
            'bolt_patterns' => BoltPattern::all()->toQuery()->paginate(10),
            'type' => $type,
        ]);
    }


    public function bolt_patterns_with_id($type, $bolt_pattern): View
    {
        if ($type == "wheels") {
            return view('wheels/datas', [
                'wheels' => Wheel::where('bolt_pattern_id', $bolt_pattern)->paginate(10)
            ]);
        } elseif ($type == "cars") {
            return view('wheels/datasC', [
                'cars' => Car::where('bolt_pattern_id', $bolt_pattern)->paginate(10)
            ]);
        }
    }



    public function bolt_pattern_create_post(Request $request)
    {
        BoltPattern::create([
            'bolt_pattern' => $request->type,
            'updated_at' => now()
        ]);
        return redirect()->back();
    }

    public function nut_bolts(): View
    {
        return view('wheels/nut_bolts', [
            'nut_bolts' => NutBolt::orderBy('type')->paginate(10)
        ]);
    }

    public function nut_bolts_with_id($nut_bolts): View
    {
        return view('wheels/datas', [
            'wheels' => Wheel::where('nut_bolt_id', $nut_bolts)->paginate(10)
        ]);
    }

    public function nut_bolts_create_post(Request $request)
    {
        NutBolt::create([
            'type' => $request->type,
            'updated_at' => now()
        ]);
        return redirect()->back();
    }
}
