<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UpgradeAccount;
use App\Models\User;
use Illuminate\Http\Request;

class UserUpgradeAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $upgrade_accounts = UpgradeAccount::with('user');
        if ($request->q) {
            $q = $request->q;
            $upgrade_accounts->orWhere('bank_account_name', 'like', '%' . $q . '%')
                ->orWhereHas('user', function ($query) use ($q) {
                    $query->where('name', 'like', '%' . $q . '%');
                });
        }

        if ($request->status == 'true') {
            $upgrade_accounts->where('is_approved', true);
        } else  if ($request->status == 'false') {
            $upgrade_accounts->where('is_approved', false);
        }

        $upgrade_accounts = $upgrade_accounts->paginate(10);
        return view('admin.upgrade.index', compact('upgrade_accounts'));
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
        $upgrade = UpgradeAccount::findOrFail($id);
        $request->validate([
            'konfirmasi' => 'required|in:1,0',
        ]);
        $upgrade->update([
            'is_approved' => $request->konfirmasi,
        ]);
        $user = User::findOrFail($upgrade->user_id);
        if ($request->konfirmasi == 1) {
            $user->update([
                'role' => 'project_owner'
            ]);
            return redirect()->route('upgrade-akun.index')->with('success', 'upgrade account berhasil disetujui');
        } else {
            $user->update([
                'role' => 'donor'
            ]);
            return redirect()->route('upgrade-akun.index')->with('success', 'upgrade account tidak disetujui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $upgrade = UpgradeAccount::findOrFail($id);
        $upgrade->delete();

        return redirect()->route('dashboard')->with('success', 'upgrade account berhasil dihapus');
    }
}
