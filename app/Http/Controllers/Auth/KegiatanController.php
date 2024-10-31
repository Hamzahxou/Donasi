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
        $projects = Project::where('user_id', $user->id);
        if ($request->q) {
            $projects->where('title', 'like', '%' . $request->q . '%');
        }
        if ($request->status) {
            $status = $request->status == 'true' ? true : false;
            $projects->where('is_active', $status);
        }

        $projects = $projects->paginate(10);
        return view('kegiatan.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::user()->id)->get();
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
            "target_dana" => 'required|max:9999999999999.99',
            "tanggal_akhir" => 'required|date|after:today',
            "kategori" => 'required|exists:categories,id',
            "gambar" => 'required|mimes:png,jpg,jpeg',
        ], [
            'tanggal_akhir.after' => 'Tanggal akhir harus berisi tanggal setelah hari ini.',
        ]);
        $image = $request->file('gambar')->store('gambar', 'public');
        $project = Project::create([
            'image' => $image,
            'title' => $request->title,
            'description' => $request->deskripsi,
            'content' => $request->content,
            'target_amount' => $request->target_dana,
            'target_date' => $request->tanggal_akhir,
            'is_active' => $request->tanggal_akhir >= date('Y-m-d') ? true : false,
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
        $project = Project::findOrFail($id)->load(['projectUpdates' => function ($query) {
            $query->orderBy('id', 'desc');
        }]);
        if ($project->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit kegiatan ini');
        }
        $categories = Category::where('user_id', Auth::user()->id)->get();
        return view('kegiatan.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
        if ($project->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit kegiatan ini');
        }
        $request->validate([
            "title" => 'required|max:255',
            "deskripsi" => 'required',
            "content" => 'required',
            "target_dana" => 'required|max:9999999999999.99',
            "tanggal_akhir" => 'required|date',
            "kategori" => 'required|exists:categories,id',
        ]);
        if ($request->hasFile('gambar')) {
            $request->validate(['gambar' => 'required|mimes:png,jpg,jpeg']);
            if (file_exists(public_path('storage/' . $project->image))) {
                unlink(public_path('storage/' . $project->image));
            }
            $image = $request->file('gambar')->store('gambar', 'public');
        }
        $project = $project->update([
            'image' => $image ?? $project->image,
            'title' => $request->title,
            'description' => $request->deskripsi,
            'content' => $request->content,
            'target_amount' => $request->target_dana,
            'target_date' => $request->tanggal_akhir,
            'is_active' => $request->tanggal_akhir >= date('Y-m-d') ? true : false,
            'category_id' => $request->kategori,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'kegiatan / project berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
