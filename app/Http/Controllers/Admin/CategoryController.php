<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
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
            'category' => 'required|max:255|unique:categories,name,' . $request->category,
        ]);

        Category::create(['name' => $request->category]);
        return redirect()->route('category.index')->with('success', 'Category Berhasil ditambahkan');
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
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category' => 'required|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update(['name' => $request->category]);
        return redirect()->route('category.index')->with('success', 'Category Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id)->load('projects');
        if ($category->projects->count() > 0) {
            return redirect()->route('category.index')->with('error', 'Upps, Category tidak dapat dihapus');
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category Berhasil dihapus');
    }
}
