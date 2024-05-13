<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Wheel;
use App\Models\WheelType;
use App\Models\NutBolt;
use App\Models\BoltPattern;
use App\Models\Manufacturer;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Livewire\Attributes\Validate;
use PSpell\Config;

class ManufacturerController extends Controller
{
    public function show_manufacturers(): View
    {
        return view('manufacturers/manufacturers', ['manufacturers' => Manufacturer::orderBy('manufacturer_name')->paginate(10)]);
    }

    public function manufacturer_with_id($manufacturer): View
    {
        // dd(
        //     $manufacturer,
        //     Wheel::join('manufacturers', 'manufacturers.id', '=', 'wheels.manufacturer_id')->where('manufacturers.id', $manufacturer)->paginate(10)
        // );
        return view('wheels/datas', [
            'wheels' => Wheel::where('manufacturer_id', $manufacturer)->paginate(10)
        ]);
    }

    public function car_with_id(Request $request, string $id): View
    {
        $manufacturer = null;
        $model = null;
        $collection = collect();
        $car = Car::find($id);
        // dd($car);
        // if ((Auth::user() and Auth::user()->is_admin) or (Auth::user()->id and $id)) {
        //     $user = User::find($id);

        foreach ($car->wheels as $wheel_car) {

            $manufacturer = Manufacturer::where('id', $wheel_car['manufacturer_id'])->select('manufacturer_name')->first();
            $model = Wheel::where('model', $wheel_car['model'])->select('model')->first();
            $collection->push($manufacturer, $model);
        }
        // }
        // $value = $request->session()->get('key');
        // session()->put('fasz', 10);
        // $user = $this->users->find($id);
        // $data = $request->session()->get('fasz');
        return view(
            'car',
            [
                // 'cars' => Car::all()->whereNotNull('created_at')->toQuery()->paginate(3),
                'car' => Car::find($id),
                'manufacturer' => Manufacturer::all(),
                'wheels' => Wheel::all()->toQuery()->paginate(3),
                'collection' => $collection,

                // 'wheels' => Wheel::orderBy('created_at')->paginate(10),
                // 'data' => $data,
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


    public function manufacturer_create_post(Request $request)
    {
        $only_wheel_maker = false;
        if ($request->only_wheel_maker == 'on') {
            $only_wheel_maker = 1;
        } else {
            $only_wheel_maker = 0;
        }
        Manufacturer::create([
            'manufacturer_name' => $request->manufacturer_name,
            'only_wheel_maker' => $only_wheel_maker

        ]);
        return redirect()->action([ManufacturerController::class, 'show_manufacturers']);
    }
    public function show_cars()
    {
        return view('cars', [
            'cars' => Car::all()->whereNotNull('created_at')->toQuery()->paginate(3),
            'manufacturers' => Manufacturer::all()->sortBy('manufacturer_name')->where('only_wheel_maker', '=', 0),
            'boltPatterns' => BoltPattern::all(),
            'nutBolts' => NutBolt::all()
        ]);
    }
    public function car_create_post(Request $request)
    {
        dd($request);
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
            'updated_at' => now()

        ]);
        return redirect()->action([ManufacturerController::class, 'show_cars']);
    }

    public function car_update_post(Request $request)
    {
        $car_data = $request->all();
        // $car_data["accepted"] = $car_data["accepted"] == null ? false : true;

        // dd($request);
        session()->put('car_data', $car_data);
        $request->validateWithBag('kuki',  [
            'car_year' => 'before_or_equal:' . now()->format('Y'),
        ]);
        // dd($request->accepted == null ? false : true);
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
            'accepted' => $request->accepted == null ? false : true,
            // 'updated_at' => now()


        ]);

        return redirect()->action([ManufacturerController::class, 'show_cars']);
    }

    public function car_delete_post(Request $request)
    {

        $car = Car::find($request->car_id);
        $this->authorize('delete', $car);
        $car->delete();
        return redirect()->back();
    }
    public function dashboard()
    {
        // $response = Http::withHeaders([
        //     'X-Api-Key' => config('services.api_ninja.key'),
        // ])->get('https://api.api-ninjas.com/v1/geocoding?city=
        // London
        // &country=
        // England
        // ');

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

    // public function datas(Request $request): View
    // {

    //     $previousUrl = $request->headers->get('referer');
    //     $URL_explode = explode('/', $previousUrl);
    //     $previousUrl = end($URL_explode);

    //     switch ($previousUrl) {
    //         case 'wheel_types':
    //             return view('wheels/datas', [
    //                 // 'wheel_types' => WheelType::all()->sortBy('wheel_type')
    //                 // 'wheels' => Wheel::paginate(10)
    //             ]);
    //             break;
    //         case 'bolt_patterns':
    //             dd($request);
    //             break;
    //         case 'nut_bolts':
    //             dd("megy 3");
    //             break;
    //         case 'manufacturers':
    //             dd("megy 4");
    //             break;
    //         default:
    //             abort(404);
    //     }
    //     return view('wheels/datas', [
    //         // 'wheel_types' => WheelType::all()->sortBy('wheel_type')
    //         'wheels' => Wheel::paginate(10)
    //     ]);
    // }

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
        $variablesess = $request->session()->get('prev_url');
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
        return redirect()->action([WheelController::class, 'wheel_types']);
    }

    public function bolt_patterns(Request $request): View
    {
        $previousUrl = $request->headers->get('referer');
        $URL_explode = explode('/', $previousUrl);
        $previousUrl = end($URL_explode);

        session()->put('prev_page', $previousUrl);

        return view('wheels/bolt_patterns', [
            'bolt_patterns' => BoltPattern::all()->toQuery()->paginate(10),
            'prev_page' => $previousUrl,
        ]);
    }


    public function bolt_patterns_with_id($bolt_pattern, Request $request): View
    {
        $prev_page = $request->session()->get('prev_page');
        if ($prev_page == "wheels") {
            return view('wheels/datas', [
                'wheels' => Wheel::where('bolt_pattern_id', $bolt_pattern)->paginate(10)
            ]);
        } elseif ($prev_page == "cars") {
            return view('wheels/datasC', [
                'cars' => Car::where('bolt_pattern_id', $bolt_pattern)->paginate(10)
            ]);
        } else {
            return view('wheels/datas', [
                'wheels' => Wheel::where('bolt_pattern_id', $bolt_pattern)->paginate(10)
            ]);
        }
    }


    public function bolt_pattern_create_post(Request $request)
    {
        BoltPattern::create([
            'bolt_pattern' => $request->type,
            'updated_at' => now()
        ]);
        return redirect()->action([WheelController::class, 'bolt_patterns']);
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
        return redirect()->action([WheelController::class, 'nut_bolts']);
    }
}
