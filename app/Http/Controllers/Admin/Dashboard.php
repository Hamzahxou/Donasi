<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $users = User::with('UpgradeAccount')->whereHas('UpgradeAccount', function ($query) {
            $query->where('is_approved', true);
        })->get();
        $Admin = User::where('role', 'admin')->get();
        $users = $Admin->merge($users);

        $projects = Project::with(['donations' => function ($query) {
            $query->where('is_verified', true);
        }, 'user.UpgradeAccount']);

        if ($request->user) {
            $projects->where('user_id', $request->user);
        }
        if ($request->status) {
            $projects->where('is_active', $request->status);
        }


        $projects = $projects->paginate(1);
        $donations = Donation::all();

        return view('admin.dashboard.index', compact('projects', 'donations', 'users'));
    }
}
