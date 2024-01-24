<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Ad;
use App\Models\User;


class AdController extends Controller
{

    public function show_ads(): View
    {
        $ads = DB::table('users')
        ->join('ads','users.id', '=', 'ads.user_id')
        ->select('ads.*','users.*',)
        ->orderBy('uploaded_at', 'desc')
        ->get();
        return view('ads',[
            'ads'=> $ads
        ]);
    }

    public function show_ad_with_id(string $id): View
    {
        $ad = DB::table('users')
        ->join('ads','users.id', '=', 'ads.user_id')
        ->select('ads.*','users.*')
        ->where('ads.ad_id',$id)
        ->first();
        return view('ad_with_id', [
            'ad' => $ad
        ]);
    }

    public function ad_create(): View
    {
        // $ad = DB::table('ads')
        // ->join('ads','users.id', '=', 'ads.user_id')
        // ->select('ads.*','users.*');
        return view('ad_create', [
        ]);
    }
    public function ad_create_post(Request $request)
    {
        Ad::create([
            'wheel_id'=> $request->wheel_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>$request->user_id,
            'place'=>$request->place,
            'uploaded_at'=>now()
        ]);
        return redirect()->action([AdController::class, 'show_ads']);
    }
}
