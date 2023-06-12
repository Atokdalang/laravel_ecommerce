<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile.admin', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|string|min:8',
            'address1' => 'required|string|max:255',
            'address2' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'image_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->phone = $request->phone;

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('image_profile', 'public');
            $user->image_profile = $imagePath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
