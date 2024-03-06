<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function show_manufacturers(): View
    {


        return view('manufacturers/manufacturers', ['manufacturers' => Manufacturer::all()->sortBy('manufacturer_name')]);
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
}
