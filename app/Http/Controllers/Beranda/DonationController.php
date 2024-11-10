<?php

namespace App\Http\Controllers\Beranda;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class DonationController extends Controller
{
    public function index()
    {
        $categories = Category::with('projects')->get();
        return view('beranda.donasi.index', compact('categories'));
    }
    public function show(Request $request, string $id) //, Project $id
    {

        $project = Project::findOrFail($id)->load([
            'donations' => function ($query) {
                $query->where('is_verified', true)->with('user:id,name,avatar');
            },
            'comments.user:id,name,avatar',
            'comments.commentReplies.user:id,name,avatar',
            'comments.commentReplies.parentReply.user:id,name,avatar',
            'projectUpdates' => function ($query) {
                $query->orderBy('id', 'desc');
            },
            'user:id,name,avatar'
        ])->loadCount(['donations' => function ($query) {
            $query->where('is_verified', true);
        }]);
        return view('beranda.donasi.show', compact('project'));
    }

    public function store(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $request->validate([
            'project_id' => 'required',
            'nominal' => 'required|max:9999999999999.99',
            'namaAkun' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $image = $request->file('image')->store('gambar', 'public');
        Donation::create([
            'bank_account_name' => $request->namaAkun,
            'amount' => $request->nominal,
            'image' => $image,
            'message' => $request->pesan,
            'user_id' => Auth::user()->id,
            'project_id' => $project->id,
        ]);
        return redirect()->back()->with('success', 'Donasi berhasil dikirim');
    }
    public function update(Request $request, string $id)
    {
        $donation = Donation::findOrFail($id);
        if ($donation->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mengedit kegiatan ini');
        }
        if ($donation->is_verified == true) {
            return redirect()->back()->with('error', 'Donasi sudah disetujui');
        }
        $request->validate([
            'nominal' => 'required|max:9999999999999.99',
            'namaAkun' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);
        if ($request->hasFile('image')) {
            if (file_exists(public_path('storage/' . $donation->image))) {
                unlink(public_path('storage/' . $donation->image));
            }
            $image = $request->file('image')->store('gambar', 'public');
        }
        $donation->update([
            'bank_account_name' => $request->namaAkun,
            'amount' => $request->nominal,
            'image' => $image ?? $donation->image,
            'message' => $request->pesan,
        ]);
        return redirect()->back()->with('success', 'Donasi berhasil diubah');
    }

    public function almost()
    {

        $categories = Category::withWhereHas('projects', function ($query) {
            $query->where('is_active', true)->whereDate('target_date', '<=', \Carbon\Carbon::now()->addDays(10));
        })->get();

        return view('beranda.donasi.show_almost', compact('categories'));
    }
}
