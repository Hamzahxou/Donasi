<?php

namespace App\Http\Controllers\Beranda;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('beranda.donasi.index', compact('categories'));
    }
    public function show(Request $request, string $id) //, Project $id
    {

        $project = Project::findOrFail($id)->load(['donations' => function ($query) {
            $query->where('is_verified', true)->with('user:id,name,avatar');
        }], 'comments.commentReplies')->loadCount(['donations' => function ($query) {
            $query->where('is_verified', true);
        }]);
        return view('beranda.donasi.show', compact('project'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $project = Project::findOrFail($request->project_id);
        $request->validate([
            'project_id' => 'required',
            'nominal' => 'required|numeric|max:9999999999999.99',
            'namaAkun' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $image = $request->file('image')->store('gambar', 'public');
        Donation::create([
            'bank_account_name' => $request->namaAkun,
            'amount' => $request->nominal,
            'image' => $image,
            'message' => $request->message,
            'user_id' => Auth::user()->id,
            'project_id' => $project->id,
        ]);
        return redirect()->back()->with('success', 'Donasi berhasil dikirim');
    }
}
