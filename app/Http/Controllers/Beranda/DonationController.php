<?php

namespace App\Http\Controllers\Beranda;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('beranda.donasi.index', compact('categories'));
    }
    public function show(Request $request, string $id) //, Project $id
    {

        $project = Project::findOrFail($id)->load('donations.user', 'comments.commentReplies')->loadCount('donations');
        return view('beranda.donasi.show', compact('project'));
    }
}
