<?php

namespace App\Http\Controllers\Beranda;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        return view('beranda.index');
    }
    public function show(Request $request) //, Project $id
    {
        return view('beranda.show');
    }
}
