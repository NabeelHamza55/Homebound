<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function clients()
    {
        $collection = User::where('role', 'User')->get();
        return view('admin.dashboard.clients', compact('collection'));
    }
    public function owners()
    {
        $collection = User::where('role', 'Admin')->get();
        return view('admin.dashboard.owners', compact('collection'));
    }
}
