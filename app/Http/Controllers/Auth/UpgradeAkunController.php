<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UpgradeAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpgradeAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avatars = User::whereNotNull('avatar')->limit(5)->get();
        return view('auth.upgrade-akun.index', compact('avatars'));
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
        // dd($request->all());
        $request->validate([
            'bank_account_name' => 'required',
            'bank_account_number' => 'required',
            'bank_branch' => 'required',
            'phone' => 'required',
            'upgrade_reason' => 'required',
            'supporting_documents' => 'required|mimes:png,jpg,jpeg,pdf',
        ]);
        $image = $request->file('supporting_documents')->store('supporting_documents', 'public');
        UpgradeAccount::create([
            'bank_account_name' => $request->bank_account_name,
            'bank_account_number' => $request->bank_account_number,
            'bank_branch' => $request->bank_branch,
            'phone' => $request->phone,
            'upgrade_reason' => $request->upgrade_reason,
            'supporting_documents' => $image,
            'is_approved' => false,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('dashboard')->with('success', 'upgrade account berhasil dikirim');
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
        //
    }
}
