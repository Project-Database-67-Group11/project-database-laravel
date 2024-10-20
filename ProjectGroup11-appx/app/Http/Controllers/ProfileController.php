<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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

    // Show the address edit form
    public function editAddress(Request $request): View
    {
        $userInformation = $request->user()->userInformation;  // Get user information

        if (!$userInformation) {
            $userInformation = new \App\Models\UserInformation();
            $userInformation->address = '';  // Default empty address
        }

        return view('profile.address', ['userInformation' => $userInformation]);
    }

    public function editAddressForm(Request $request): View
    {
        // Access the user's related information
        $userInformation = $request->user()->userInformation;

        // If user information is null or address is not set, create a default empty one
        if (!$userInformation) {
            $userInformation = new \App\Models\UserInformation();
            $userInformation->address = '';
        }

        return view('profile.editAddress', [
            'userInformation' => $userInformation,
        ]);
    }

    public function updateAddress(Request $request): RedirectResponse
    {
        $request->validate([
            'address' => ['required', 'string', 'max:255'],
        ]);

        $userInformation = $request->user()->userInformation;

        if ($userInformation) {
            // If user information exists, update it
            $userInformation->address = $request->input('address');
            $userInformation->save();
        } else {
            // If no user information exists, create a new one
            $request->user()->userInformation()->create([
                'address' => $request->input('address'),
            ]);
        }

        return Redirect::route('profile.address')->with('status', 'address-updated');
    }

}
