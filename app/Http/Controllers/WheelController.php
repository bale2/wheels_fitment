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
    public function wheel_create(): View{
        return view('wheels/wheel_create',[
        ]);
    }
    public function wheel_create_post(Request $request)
    {

        $newPhotoName = time() . '-' . $request->model . '.' .
        $request->photo->extension();
        $request->photo->move(public_path('photos'), $newPhotoName);

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
            'multipiece'=>$request->multipiece,
            'photo'=>$newPhotoName,
            'note'=>$request->note,
            'updated_at'=>now()
        ]);
        return redirect()->action([WheelController::class, 'wheels_show']);
    }
}
