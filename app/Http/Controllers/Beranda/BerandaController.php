<?php

namespace App\Http\Controllers\Beranda;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        $categories = Category::with(['projects' => function ($query) {
            $query->withCount(['donations' => function ($query) {
                $query->where('is_verified', true);
            }]);
        }])->get();
        return view('welcome', compact('categories'));
    }
}
