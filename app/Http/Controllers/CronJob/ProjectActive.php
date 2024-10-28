<?php

namespace App\Http\Controllers\CronJob;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectActive extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $projects = Project::where('is_active', true)->get();
        $date = date('Y-m-d');
        $projects_singkron = [];
        foreach ($projects as $project) {
            if (strtotime($project->target_date) < strtotime($date)) {
                $project->update(['is_active' => false]);
                $projects_singkron[] = $project;
            }
        }
        return response()->json([
            'status' => 'success',
            'count' => count($projects_singkron),
            'data' => $projects_singkron,
        ]);
    }
}
