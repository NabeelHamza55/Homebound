<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class AuthController extends Controller
{
   
    public function view()
    {
        Cache::clear();
        return view('home');
    }
    public function view_login()
    {
        return view('auth.login');
    }
    public function createRegistration()
    {
        return view('auth.register');
    }
    protected function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $user = Auth::user();
            $token = $user->createToken('Token')->accessToken;
            if ($user->type=="Admin")
            {
                $notificationMessage = "login success";
                return view('welcome');
            }
            else
            {
                $notificationMessage = "login success";
                return redirect(route('user.dashboard'))->with($notificationMessage);
            }
        }
        else{
            return view('auth.login')->with('message', 'Invalid credentials');
        }
    }
    public function Registration(UserRegisterRequest $request)
    {
        $attribute = $request->all();
        $attribute['password'] = Hash::make($attribute['password']);
        $attribute['role'] = "User";
        $attribute['phone_number'] = $request->input('phone_number');
        $profilePicture = $request->file('profile_picture');
        if ($profilePicture)
        {
            $publicPath = public_path('ProfilePicture');
            $profilePictureName = time().'.'.$profilePicture->getClientOriginalExtension();
            $profilePicture->move($publicPath, $profilePictureName);
            $attribute['profile_picture'] = $profilePictureName;
        }
        $user = User::create($attribute);
        if ($user) {
            $token = $user->createToken('Token')->accessToken;
            $notificationMessage = "User registration successful. Please log in.";
            return redirect(route('user.dashboard'))->with($notificationMessage);
        } else {
            // User creation failed, so return to the login page with an error message
            $notificationMessage = "User registration failed. Please try again.";
            return view('auth.login')->with('message', 'Invalid credentials');
        }
    }
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        Session::invalidate();
        Session::regenerate();
        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return redirect()->route('login');
    }
}
