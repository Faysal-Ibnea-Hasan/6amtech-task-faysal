<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Task;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function renderDashboard()
    {
        $user = Auth::user();
        $userRole = $user?->role;
        $users = [];
        if ($userRole === 'admin') {
            $users = User::orderBy('created_at', 'desc')->latest()->get();
        }
        $users_count = User::count();
        if ($userRole === 'admin') {
            $tasks_count = Task::count();
        }
        $tasks_count = auth()->user()->tasks()->count();
        $products_count = Product::count();
        $categories_count = Category::count();
        $total_transactions = Transaction::sum('total_price');
        $tasks = auth()->user()->tasks()->with(['assignee', 'assigner'])->latest()->get();
        if ($userRole === 'admin') {
            $tasks = Task::with(['assignee', 'assigner'])->latest()->get();
        }
        return Inertia::render('Dashboard', [
            'stats' => [
                'users' => ['value' => $users_count],
                'tasks' => ['value' => $tasks_count],
            ],
            'users' => $users,
            'role' => $userRole,
            'tasks' => $tasks,
            'products' => $products_count,
            'categories' => $categories_count,
            'transactions' => $total_transactions,
        ]);
    }
}
