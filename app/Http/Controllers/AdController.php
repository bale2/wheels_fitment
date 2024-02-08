<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Ad;
use App\Models\User;
use App\Models\Wheel;
use App\Models\Manufacturer;

class AdController extends Controller
{

    public function ads_show(): View
    {
        // $ads = DB::table('users')
        // ->join('ads','users.id', '=', 'ads.user_id')
        // ->select('ads.*','users.name',)
        // ->orderBy('ads.created_at', 'desc')
        // ->get();

        return view('ads/ads',[
            // 'ads'=> $ads
            'ads'=>Ad::all()
        ]);
    }

    public function ad_with_id_show(int $id): View
    {
        // $ad = DB::table('users')
        // ->join('ads','users.id', '=', 'ads.user_id')
        // ->select('ads.*','users.name')
        // ->where('ads.id',$id)
        // ->first();
        return view('ads/ad_with_id', [
            'ad' =>Ad::find($id)
        ]);
    }

    public function ad_create(): View
    {
        return view('ads/ad_create', [
            'wheelModels'=>Wheel::all(),
            'manufacturerNames'=>Manufacturer::all()
        ]);
    }

    public function ad_create_post(Request $request)
    {
        $newPhotoName = time() . '-' . $request->title . '.' .
        $request->photo->extension();
        $request->photo->move(public_path('photos'), $newPhotoName);

        Ad::create([
            'wheel_id'=> $request->wheel_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>$request->user_id,
            'place'=>$request->place,
            'updated_at'=>now(),
            'photo'=>$newPhotoName
        ]);
        return redirect()->action([AdController::class, 'ads_show']);
    }
}
