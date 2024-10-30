<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $projects = Project::with(['donations' => function ($query) {
            $query->where('is_verified', true);
        }])->get();
        $donations = Donation::all();
        // dd($projects->toArray());
        return view('admin.dashboard.index', compact('projects', 'donations'));
    }
}
