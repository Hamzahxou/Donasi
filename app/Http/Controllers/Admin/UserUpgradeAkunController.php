<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UpgradeAccount;
use Illuminate\Http\Request;

class UserUpgradeAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upgrade_accounts = UpgradeAccount::where('is_approved', false)->with('user')->get();
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
        //
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
