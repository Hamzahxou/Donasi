<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $donations = Donation::with(['user', 'project']);

        if ($request->q) {
            $q = $request->q;
            $donations->orWhere('bank_account_name', 'like', '%' . $q . '%')
                ->orWhereHas('user', function ($query) use ($q) {
                    $query->where('name', 'like', '%' . $q . '%');
                });
        }


        if ($request->status == 'true') {
            $donations->where('is_verified', true);
        } elseif ($request->status == 'false' || $request->status == '') {
            $donations->where('is_verified', false);
        }

        if ($request->sampah == 'true') {
            $donations = Donation::with(['user', 'project'])->onlyTrashed();
        }


        $donations = $donations->paginate(10);
        return view('admin.pembayaran.index', compact('donations'));
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
        //
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
            "konfirmasi" => 'required|boolean',
            'project_id' => 'required|exists:projects,id',
        ]);

        $donation = Donation::findOrFail($id);
        $project = Project::findOrFail($request->project_id);

        $donation->is_verified = $request->konfirmasi;
        $donation->save();

        if ($donation->is_verified) {
            $project->collected_amount += $donation->amount;
            $project->save();
            $text = 'Donasi berhasil dikonfirmasi';
        } else {
            $text = "Donasi tidak dikonfirmasi";
            $jumlah_dana = 0;
            foreach ($project->donations as $item) {
                if ($item->is_verified) {
                    $jumlah_dana += $item->amount;
                }
            }
            if ($project->collected_amount == $jumlah_dana + $donation->amount) {
                $project->collected_amount -= $donation->amount;
                $project->save();
            }
        }

        return redirect()->back()->with('success', $text);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donation = Donation::findOrFail($id);
        $donation->is_verified = false;
        $donation->delete();
        return redirect()->back()->with('success', 'Donasi berhasil dihapus');
    }

    public function restore(string $id)
    {
        $donation = Donation::onlyTrashed()->firstWhere('id', $id);
        $donation->restore();
        return redirect()->back()->with('success', 'Donasi berhasil dikembalikan');
    }
}
