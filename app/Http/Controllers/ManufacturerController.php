<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Wheel;
use App\Models\NutBolt;
use App\Models\BoltPattern;
use App\Models\Manufacturer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ManufacturerController extends Controller
{
    public function show_manufacturers(): View
    {
        return view('manufacturers/manufacturers', ['manufacturers' => Manufacturer::orderBy('manufacturer_name')->paginate(10)]);
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
        $car = Car::find($request->car_id);
        $car->wheels()->attach($request->wheel_car);
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
}
