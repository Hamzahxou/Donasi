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
        $donations = Donation::where('user_id', $user->id)->with('project')->get();
        // $projects = Project::with(['donations' => function ($query) {
        //     $query->where('is_verified', true);
        // }])->get();
        $projects = $donations->where('is_verified', true);
        // dd($projects->toArray());
        return view('dashboard', compact('donations', 'projects'));
    }
}