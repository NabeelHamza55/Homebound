<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.userprofile',compact('user'));
    }
    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        $user->phone_number = $request->phone_number ?? $user->phone_number;
        $profilePicture = $request->file('profile_picture');
        if ($profilePicture) {
            $publicPath = public_path('ProfilePicture/');
            $oldProfilePicturePath = $publicPath . basename($user->profile_picture);
            if ($user->profile_picture && file_exists($oldProfilePicturePath)) {
                unlink($oldProfilePicturePath);
            }
            $profilePictureName = time() . '.' . $profilePicture->getClientOriginalExtension();
            $profilePicture->move($publicPath, $profilePictureName);
            $user->profile_picture = $profilePictureName;
        }
        $user->save();
        return redirect()->route('user.profile');
    }
    public function setting()
    {
        return view('UserDashboardComponents.settings');
    }
}
