<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash; // อย่าลืม import Hash
use App\Models\Order;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Fetch the user and their related user information (first_name, last_name, phone)
        $userInformation = $request->user()->userInformation;

        // If no user information exists, create a default empty one
        if (!$userInformation) {
            $userInformation = new \App\Models\UserInformation();
            $userInformation->first_name = '';
            $userInformation->last_name = '';
            $userInformation->phone_number = '';
        }

        return view('profile.edit', [
            'user' => $request->user(),
            'userInformation' => $userInformation,  // Pass userInformation to the view
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update user (name and email) in the 'users' table
        $user->fill($request->only(['name', 'email']));

        // If email is changed, reset email_verified_at
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Save the user changes
        $user->save();

        // Now, handle user information (first_name, last_name, phone) in the 'user_information' table
        $userInformation = $user->userInformation;

        if ($userInformation) {
            // Update existing user information
            $userInformation->first_name = $request->input('first_name');
            $userInformation->last_name = $request->input('last_name');
            $userInformation->phone_number = $request->input('phone_number');
            $userInformation->save();
        } else {
            // If no user information exists, create new
            $user->userInformation()->create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone_number' => $request->input('phone_number'),
            ]);
        }

        // Redirect back to the profile edit page
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

    // **ลบปีกกา `}` ที่นี่**

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

    // ฟังก์ชันแสดงฟอร์มเปลี่ยนรหัสผ่าน
    public function resetPasswordForm()
    {
        return view('profile.resetpassword');
    }

    // ฟังก์ชันสำหรับอัพเดตรหัสผ่าน
    public function resetPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // ตรวจสอบว่ารหัสผ่านเก่าถูกต้องหรือไม่
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'รหัสผ่านเก่าไม่ถูกต้อง']);
        }

        // อัปเดตรหัสผ่านใหม่
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profile.edit')->with('status', 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว');
    }

    public function Order_index()
    {
        $orders = Order::all();
        return view('profile.Order_index', compact('orders'));
    }

    public function Order_pending()
    {
        $orders = Order::where('status', 'pending')->get();
        return view('profile.Order_pending', compact('orders'));
    }

    public function Order_completed()
    {
        $orders = Order::where('status', 'completed')->get();
        return view('profile.Order_completed', compact('orders'));
    }

    public function Order_cancelled()
    {
        $orders = Order::where('status', 'cancelled')->get();
        return view('profile.Order_cancelled', compact('orders'));
    }

}
