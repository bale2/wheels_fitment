<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Wheel;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Policies\AdPolicy;

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
    public function ad_delete_post(Request $request)
    {
        $ad = Ad::find($request->ad_id);
        $this->authorize('delete', $ad);
        $ad->delete();
        return redirect()->back();
    }

    public function ad_update_post(Request $request)
    {
        $this->authorize('update', $request);
        $imagePaths = '';

        if($request->hasFile('photo')){
            $files = $request->file('photo');

            foreach($files as $file){

                 $path = Str::uuid() . '.' . strtolower($file->getClientOriginalExtension());

                $file->move(public_path('photos'), $path);

                $imagePaths = $imagePaths . ';' . $path;
            }
        }

        $imagePaths = trim($imagePaths, ';');

        Ad::find($request->ad_id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price' => $request->price,
            'place' => $request->place,
            'photo' =>$imagePaths
        ]);
        return redirect()->back();
    }

    public function ad_create_post(Request $request)
    {
        $imagePaths = '';

        if($request->hasFile('photo')){
            $files = $request->file('photo');

            foreach($files as $file){

                 $path = Str::uuid() . '.' . strtolower($file->getClientOriginalExtension());

                $file->move(public_path('photos'), $path);

                $imagePaths = $imagePaths . ';' . $path;
            }
        }

        $imagePaths = trim($imagePaths, ';');

        Ad::create([
            'wheel_id'=> $request->wheel_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'user_id'=>$request->user_id,
            'place'=>$request->place,
            'updated_at'=>now(),
            'photo'=>$imagePaths
        ]);
        return redirect()->action([AdController::class, 'ads_show']);
    }
}
