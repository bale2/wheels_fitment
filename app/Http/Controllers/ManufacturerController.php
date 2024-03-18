<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Manufacturer;
use App\Models\Wheel;

class ManufacturerController extends Controller
{
    public function show_manufacturers(): View
    {
        return view('manufacturers/manufacturers', ['manufacturers' => Manufacturer::orderBy('manufacturer_name')->paginate(10)]);
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
            'manufacturers' => Manufacturer::all()
        ]);
    }
    public function car_create(Request $request)
    {
        Car::create([
            'wheel_type' => $request->type,



            'updated_at' => now()
        ]);
        return redirect()->action([ManufacturerController::class, 'show_cars']);
    }
    public function car_update_post(Request $request)
    {
        return redirect()->action([ManufacturerController::class, 'show_cars']);
    }
}
