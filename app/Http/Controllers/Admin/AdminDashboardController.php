<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::where('payment_status', 'completed')->sum('total_amount');
        $totalProducts = Product::count();
        $totalUsers = User::where('is_admin', false)->count();
        $totalCategories = Category::count();

        $recentOrders = Order::with(['user', 'orderItems'])
            ->latest()
            ->limit(10)
            ->get();

        $lowStockProducts = Product::where('stock_quantity', '<', 10)
            ->where('is_active', true)
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalRevenue',
            'totalProducts',
            'totalUsers',
            'totalCategories',
            'recentOrders',
            'lowStockProducts'
        ));
    }
}
