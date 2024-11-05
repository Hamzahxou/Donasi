<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $donations = Donation::where('user_id', $user->id)->with('project')->paginate(10);
        $projects = $donations;

        $my_projects = Project::with('donations')->where('user_id', $user->id)->paginate(10);
        return view('dashboard', compact('donations', 'projects', 'my_projects'));
    }
}
