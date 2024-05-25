<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Wheel;
use Livewire\Livewire;
use Illuminate\View\View;
use App\Policies\AdPolicy;
use Illuminate\Support\Str;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function ads_show(): View
    {
        $ads = Ad::orderBy('updated_at');

        if (request()->has('search')) {
            $ads = $ads->where('title', 'like', '%' . request()->get('search', '') . "%")->orWhere('description', 'like', '%' . request()->get('search', '') . "%")->orWhere('place', 'like', '%' . request()->get('search', '') . "%");
        }

        return view('ads/ads', [
            'ads' => $ads->paginate(10),
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
