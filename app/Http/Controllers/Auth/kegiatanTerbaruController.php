<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ProjectUpdate;
use Illuminate\Http\Request;

class kegiatanTerbaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:projects,id',
            'content' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg',
        ]);
        $image = $request->file('gambar')->store('gambar/terbaru', 'public');
        ProjectUpdate::create([
            'project_id' => $request->kegiatan_id,
            'update_content' => $request->content,
            'image' => $image,
        ]);
        return redirect()->back()->with('success', 'kegiatan / project terbaru berhasil dibuat');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $kegiatan_terbaru = ProjectUpdate::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'required|mimes:png,jpg,jpeg',
            ]);
            if (file_exists(public_path('storage/' . $kegiatan_terbaru->image))) {
                unlink(public_path('storage/' . $kegiatan_terbaru->image));
            }
            $image = $request->file('gambar')->store('gambar/terbaru', 'public');
        }
        $kegiatan_terbaru->update([
            'update_content' => $request->content,
            'image' => $image ?? $kegiatan_terbaru->image,
        ]);
        return redirect()->back()->with('success', 'kegiatan / project terbaru berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan_terbaru = ProjectUpdate::findOrFail($id);
        if (file_exists(public_path('storage/' . $kegiatan_terbaru->image))) {
            unlink(public_path('storage/' . $kegiatan_terbaru->image));
        }
        $kegiatan_terbaru->delete();
        return redirect()->back()->with('success', 'kegiatan / project terbaru berhasil dihapus');
    }
}
