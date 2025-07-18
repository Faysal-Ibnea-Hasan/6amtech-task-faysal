<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Task;
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
        $tasks = Task::count();
        return Inertia::render('Dashboard', [
            'stats' => [
                'users' => ['value' => $users_count],
                'tasks' => ['value' => $tasks],
            ],
            'users' => $users,
            'role' => $userRole,

        ]);
    }
}
