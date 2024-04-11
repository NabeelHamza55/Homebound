<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EarningController extends Controller
{
    public function index()
    {

        $totalProperties = Property::count();
        $totalOrders = Order::get();
        $totalEarning = Order::sum('total_price');

        // Get the monthly sales data
        $monthlySales = Order::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"), DB::raw('SUM(total_price) as total'))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
        ->orderBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
        ->get();

        // Prepare data for Chart.js
        $chartLabels = $monthlySales->pluck('month')->toArray();
        $chartData = $monthlySales->pluck('total')->toArray();

        $data = [
            'properties' => $totalProperties,
            'activeOrders' => $totalOrders->where('status', '1')->count(),
            'cancelledOrders' => $totalOrders->where('status', '0')->count(),
            'earnings' => \number_format($totalEarning, '2', '.', ','),
            'chartData' => $chartData,
            'chartLabels' => $chartLabels,
        ];



        return view('admin.dashboard.earnings', $data);
    }
}
