<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function clients(Request $request)
    {
        $collection = User::where('role', 'User');
        if($request->has('search_q') && $request->has('search_q')) {
            $collection = $collection->where('name', 'LIKE', '%'. $request->get('search_q') .'%');
        }
        $collection = $collection->get();
        // $collection = User::where('role', 'User')->get();
        return view('admin.dashboard.clients', compact('collection'));
    }
    public function owners(Request $request)
    {
        $collection = User::where('role', 'Admin');
        if($request->has('search_q') && $request->has('search_q')) {
            $collection = $collection->where('name', 'LIKE', '%'. $request->get('search_q') .'%');
        }
        $collection = $collection->get();
        // $collection = User::where('role', 'Admin')->get();
        return view('admin.dashboard.owners', compact('collection'));
    }
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function create($role)
    {
        return view('admin.dashboard.userform', compact('role'));
    }
    public function store(Request $request, $role)
    {
        $attribute = $request->all();
        $attribute['password'] = Hash::make($attribute['password']);
        if($role == 'admin') {
            $attribute['role'] = "Admin";
        } else {
            $attribute['role'] = "User";
        }

        // dd($role);
        $attribute['phone_number'] = $request->input('phone_number');
        $profilePicture = $request->file('profile_picture');
        if ($profilePicture) {
            $publicPath = public_path('ProfilePicture');
            $profilePictureName = time().'.'.$profilePicture->getClientOriginalExtension();
            $profilePicture->move($publicPath, $profilePictureName);
            $attribute['profile_picture'] = $profilePictureName;
        }
        $user = User::create($attribute);
        if ($user) {
            $notificationMessage = "User Created Successfully.";
            if($role == 'Admin') {

                return redirect(route('admin.owners'))->with($notificationMessage);
            } else {
                return redirect(route('admin.clients'))->with($notificationMessage);

            }
        } else {
            return redirect()->back();
        }
    }
}
