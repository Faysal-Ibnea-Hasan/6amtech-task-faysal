<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function renderDashboard()
    {
        $users = User::count();
        $tasks = Task::count();
        return Inertia::render('Dashboard', [ // Ensure 'Dashboard/Index' matches your actual page path
            'stats' => [
                'users' => ['value' => $users],
                'tasks' => ['value' => $tasks],
            ],
            'monthlyTarget' => [
                'percentage' => 75.55,
                'targetAmount' => '20K',
                'revenueAmount' => '16K',
                'todayAmount' => '1.5K',
                'todayChange' => '+10%',
                'message' => 'You earn $3287 today, its higher than last month. Keep up your good work!'
            ],
            'monthlySalesData' => [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'data' => [300, 450, 600, 400, 550, 480, 500, 350, 420, 650, 580, 700], // Example data
            ],
            'statisticsData' => [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'overview' => [600, 450, 500, 700, 650, 720, 680, 750, 800, 850, 900, 950],
                'sales' => [500, 400, 450, 600, 550, 620, 580, 650, 700, 750, 800, 850],
                'revenue' => [400, 350, 400, 500, 450, 520, 480, 550, 600, 650, 700, 750],
            ],
            'customerDemographic' => [
                ['country' => 'USA', 'customers' => '2.37M', 'percentage' => 79],
                ['country' => 'France', 'customers' => '897K', 'percentage' => 23],
            ],
            'recentOrders' => [
                [
                    'product' => 'Macbook pro 15"',
                    'variants' => '2 variants',
                    'image' => '/images/macbook.webp', // Placeholder image path
                    'category' => 'Laptop',
                    'price' => '$2399.00',
                    'status' => 'Delivered',
                    'statusColor' => 'bg-green-100 text-green-700'
                ],
                [
                    'product' => 'Apple Watch Ultra',
                    'variants' => '1 variants',
                    'image' => '/images/apple-watch.webp',
                    'category' => 'Watch',
                    'price' => '$879.00',
                    'status' => 'Pending',
                    'statusColor' => 'bg-yellow-100 text-yellow-700'
                ],
                [
                    'product' => 'iPhone 15 Pro Max',
                    'variants' => '2 variants',
                    'image' => '/images/iphone.webp',
                    'category' => 'Smart Phone',
                    'price' => '$1869.00',
                    'status' => 'Delivered',
                    'statusColor' => 'bg-green-100 text-green-700'
                ],
                [
                    'product' => 'iPad Pro 3rd Gen',
                    'variants' => '2 variants',
                    'image' => '/images/ipad.webp',
                    'category' => 'Electronics',
                    'price' => '$1699.00',
                    'status' => 'Canceled',
                    'statusColor' => 'bg-red-100 text-red-700'
                ],
                [
                    'product' => 'Airpods Pro 2nd Gen',
                    'variants' => '1 variants',
                    'image' => '/images/airpods.webp',
                    'category' => 'Accessories',
                    'price' => '$240.00',
                    'status' => 'Delivered',
                    'statusColor' => 'bg-green-100 text-green-700'
                ],
            ]
        ]);
    }
}
