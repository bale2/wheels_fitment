<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Wheel;
use App\Models\WheelType;
use App\Models\NutBolt;
use App\Models\BoltPattern;
use App\Models\Manufacturer;

use Livewire\Livewire;
use App\Policies\AdPolicy;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function ads_show(): View
    {
        $ads = Ad::join('wheels', 'ads.wheel_id', '=', 'wheels.id')->select('*', 'ads.id AS ad_id', 'wheels.id AS wheel_id', 'ads.price AS ad_price', 'wheels.price AS wheel_price', 'ads.accepted AS ad_accepted', 'wheels.accepted AS wheel_accepted')->orderBy('ads.updated_at');

        if (request()->has('search')) {
            $ads = $ads->where('title', 'like', '%' . request()->get('search', '') . "%")->orWhere('description', 'like', '%' . request()->get('search', '') . "%")->orWhere('place', 'like', '%' . request()->get('search', '') . "%");
        }
        if (request()->has('manufacturer_input')) {
            $ads = $ads->where('wheels.manufacturer_id', request()->get('manufacturer_input', ''));
        }
        // dd(request()->get('bolt_pattern_input'));
        if (request()->has('bolt_pattern_input')) {
            $ads = $ads->where('wheels.bolt_pattern_id', request()->get('bolt_pattern_input', ''));
        }
        // dd(request()->get('wheel_type_input'));
        if (request()->has('wheel_type_input')) {
            $ads = $ads->where('wheels.wheel_type_id', request()->get('wheel_type_input', ''));
        }
        if (request()->has('nut_input')) {
            $ads = $ads->where('wheels.nut_bolt_id', request()->get('nut_input', ''));
        }

        return view('ads/ads', [
            'ads' => $ads->paginate(10),
            'manufacturers' => Manufacturer::orderBy('manufacturer_name')->get(),
            'bolt_patterns' => BoltPattern::all(),
            'wheel_types' => WheelType::all(),
            'nutBolts' => NutBolt::all(),
        ]);
    }

    public function ad_with_id_show(string $id): View
    {
        return view('ads/ad_with_id', [
            'ad' => Ad::find($id),
            'google_api' => config('services.google.key'),
        ]);
    }

    public function ad_create(): View
    {
        return view('ads/ad_create', [
            'wheelModels' => Wheel::all(),
            'manufacturerNames' => Manufacturer::all()
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
        $this->authorize('update', Ad::find($request->ad_id));
        // dd($request->ad_id, $request);
        Ad::find($request->ad_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'place' => $request->place,
            'accepted' => $request->accepted,
        ]);
        return redirect()->back();
    }

    public function ad_create_post(Request $request)
    {
        $this->validate($request, [
            'wheel_id' => ['required'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'price' => ['required', 'numeric', 'min:0', 'max:99999'],
            'place' => ['required'],
            'photo' => ['required'],
            'photo.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
        ]);

        $imagePaths = '';

        if ($request->hasFile('photo')) {
            $files = $request->file('photo');

            foreach ($files as $file) {
                $path = Str::uuid() . '.' . strtolower($file->getClientOriginalExtension());
                $file->move(public_path('photos'), $path);
                $imagePaths = $imagePaths . ';' . $path;
            }
        }

        $imagePaths = trim($imagePaths, ';');
        Ad::create([
            'wheel_id' => $request->wheel_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => $request->user_id,
            'place' => $request->place,
            'updated_at' => now(),
            'photo' => $imagePaths,
            'accepted' => 0
        ]);
        return redirect()->action([AdController::class, 'ads_show']);
    }
}
