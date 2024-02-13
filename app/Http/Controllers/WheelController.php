<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Wheel;
use App\Models\Manufacturer;
use App\Models\WheelType;
use App\Models\BoltPattern;
use App\Models\NutBolt;

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
    public function wheel_create(): View{

        return view('wheels/wheel_create',[
            'manufacturers'=>Manufacturer::all(),
            'wheelTypes'=>WheelType::all(),
            'boltPatterns'=>BoltPattern::all(),
            'nutBolts'=>NutBolt::all()
        ]);
    }
    public function wheel_create_post(Request $request)
    {

        $newPhotoName = time() . '-' . $request->model . '.' .
        $request->photo->extension();
        $request->photo->move(public_path('photos'), $newPhotoName);

        $multipiece = $request->multipiece !== null;

        Wheel::create([
            'manufacturer_id'=> $request->manufacturer_id,
            'model'=>$request->model,
            'price'=>$request->price,
            'wheel_type_id'=>$request->wheel_type_id,
            'diameter'=>$request->diameter,
            'width'=>$request->width,
            'et_number'=>$request->ET_number,
            'bolt_pattern_id'=>$request->bolt_pattern_id,
            'kba_number'=>$request->kba_number,
            'center_bore'=>$request->center_bore,
            'nut_bolt_id'=>$request->nut_bolt_id,
            'multipiece'=>$multipiece,
            'photo'=>$newPhotoName,
            'note'=>$request->note,
            'updated_at'=>now()
        ]);
        return redirect()->action([WheelController::class, 'wheels_show']);
    }

//wheel_types
    public function wheel_types(): View{
        return view('wheels/wheel_types',[
            'wheel_types'=>WheelType::all()
        ]);

    }

    public function wheel_type_create_post(Request $request)
    {
        WheelType::create([
            'wheel_type'=>$request->type,
            'updated_at'=>now()
        ]);
    return redirect()->action([WheelController::class, 'wheel_types']);
    }

    public function bolt_patterns(): View{
        return view('wheels/bolt_patterns',[
            'bolt_patterns'=>BoltPattern::all()
        ]);
    }

    public function bolt_pattern_create_post(Request $request)
    {
        BoltPattern::create([
            'bolt_pattern'=>$request->type,
            'updated_at'=>now()
        ]);
    return redirect()->action([WheelController::class, 'bolt_patterns']);
    }

    public function nut_bolts(): View{
        return view('wheels/nut_bolts',[
            'nut_bolts'=>NutBolt::all()
        ]);
    }

    public function nut_bolts_create_post(Request $request)
    {
        NutBolt::create([
            'type'=>$request->type,
            'updated_at'=>now()
        ]);
    return redirect()->action([WheelController::class, 'nut_bolts']);
    }
}
