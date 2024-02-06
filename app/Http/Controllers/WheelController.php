<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Wheel;

class WheelController extends Controller
{
    public function wheels_show() : View {
        return view('wheels/wheels',[
            'wheels'=>Wheel::all()
        ]);
    }
    public function wheel_with_id(int $id): View{
        return view('wheels/wheel_with_id',[
            'wheel'=>Wheel::find($id)
        ]);
    }
}
