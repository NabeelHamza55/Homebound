<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Mime\cc;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)
            ->with('properties')
            ->with('books')
            ->with('orders')
            ->first();
        return view('UserDashboardComponents.userdashboard',compact('user'));
    }
}
