<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Wheel;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function users_show(): View
    {
        return view(
            'users',
            [
                'users' => User::orderBy('name')->paginate(3)
            ]
        );
    }
    public function user_with_id(Request $request, string $id): View
    {
        $user = User::find(Auth::user()->id);
        $pivot = array();
        foreach ($user->wheels as $wheel) {
            array_push($pivot, Wheel::find($wheel->pivot));
        }
        // dd($pivot);
        $value = $request->session()->get('key');
        session()->put('fasz', 10);
        // $user = $this->users->find($id);
        $data = $request->session()->get('fasz');
        return view(
            'user',
            [
                'user' => User::find($id),
                'wheels' => Wheel::orderBy('created_at')->paginate(10),
                'data' => $data,
                'pivot' => $pivot,
            ]
        );
    }
    public function user_wheel_post(Request $request, User $user)
    {
        // dd($request, Auth::user());
        // dd($request);
        $user = User::find(Auth::user()->id);
        $user->wheels()->attach($request->wheel_id);
        return redirect()->back();
    }
}
