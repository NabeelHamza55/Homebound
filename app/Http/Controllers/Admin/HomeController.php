<?php

namespace App\Http\Controllers\Admin;

use admin;
use App\Models\User;
use App\Models\Order;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $totalProperties = Property::count();
        $totalClients = User::where('role', 'User')->count();
        $totalOwners = User::where('role', 'Admin')->count();
        $totalOrders = Order::count();
        $totalEarning = Order::sum('total_price');

        // Get the monthly sales data
        $orders = Order::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"), DB::raw('COUNT(total_price) as total'))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
        ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
        ->get();

        // Prepare data for Chart.js
        $chartLabels = $orders->pluck('month')->toArray();
        $chartData = $orders->pluck('total')->toArray();

        $data = [
            'properties' => $totalProperties,
            'owners' => $totalOwners,
            'orders' => $totalOrders,
            'clients' => $totalClients,
            'earnings' => \number_format($totalEarning, '2', '.', ','),
            'chartData' => $chartData,
            'chartLabels' => $chartLabels,
        ];
        return view('admin.dashboard.index', $data);
    }
}
