<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Wheel;
use Illuminate\View\View;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    // Update the user's profile information.

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    // Delete the user's account.

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();
        $user->wheels()->where('user_id', $user)->detach();
        $user->cars()->where('user_id', $user)->detach();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function users_show(): View
    {
        $users = User::orderBy('name');

        if (request()->has('search')) {
            $users = $users->where('name', 'like', '%' . request()->get('search', '') . "%");
        }
        return view(
            'users',
            [
                'users' => $users->paginate(3)
            ]
        );
    }
    public function user_with_id(Request $request, string $id): View
    {
        $user = User::find($id);
        return view(
            'user',
            [
                'user' => User::find($id),
                'wheels' => Wheel::all(),
            ]
        );
    }
    public function user_wheel_post(Request $request)
    {
        $user = User::find($request->user_id_userpage);
        $user->wheels()->attach($request->wheel_id);
        return redirect()->back();
    }
    public function user_wheel_post_delete(Request $request)
    {
        $user = User::find($request->user_id_userpage);
        $user->wheels()->detach($request->wheel_id_userpage);
        return redirect()->back();
    }
    public function user_car_post(Request $request)
    {
        $user = User::find($request->user_id_userpage);
        $user->cars()->attach($request->car_id);
        return redirect()->back();
    }
    public function user_car_post_delete(Request $request)
    {
        $user = User::find($request->user_id_userpage);
        $user->cars()->detach($request->car_id_userpage);
        return redirect()->back();
    }
}
