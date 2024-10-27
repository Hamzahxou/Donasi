<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        // if ($user->role == 'admin') {
        //     $projects = Project::paginate(10);
        // } else {
        $projects = Project::where('user_id', $user->id)->paginate(10);
        // }
        return view('kegiatan.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('kegiatan.tambah', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required|max:255',
            "deskripsi" => 'required',
            "content" => 'required',
            "target_dana" => 'required',
            "tanggal_akhir" => 'required|date',
            "kategori" => 'required|exists:categories,id',
            "gambar" => 'required|mimes:png,jpg,jpeg',
        ]);
        $image = $request->file('gambar')->store('gambar', 'public');
        $project = Project::create([
            'image' => $image,
            'title' => $request->title,
            'description' => $request->deskripsi,
            'content' => $request->content,
            'target_amount' => $request->target_dana,
            'target_date' => $request->tanggal_akhir,
            'is_active' => true,
            'user_id' => Auth::user()->id,
            'category_id' => $request->kategori,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'kegiatan / project berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        if ($project->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit kegiatan ini');
        }
        $categories = Category::all();
        return view('kegiatan.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
