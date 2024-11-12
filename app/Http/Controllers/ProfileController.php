<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'Profil berhasil diperbarui !');
    }


    public function updateBiography(Request $request, $id): RedirectResponse
    {

        $user = User::findOrFail($id);
        $biography = $request->input('biography');
        $cleanBiography = Str::of(strip_tags($biography))->trim();
        $user->biography = $biography;
        $user->biography = $cleanBiography;
        $user->save();

        Session::flash('status', 'Biografi berhasil diperbarui !');

        return redirect()->route('profile.edit')->with('status', 'Biografi berhasil diperbarui !');
    }

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
}
