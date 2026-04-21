<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:categories,name',
    ]);

    $category = Category::create([
        'name' => $validated['name'],
        'slug' => Str::slug($validated['name']), 
    ]);

    return response()->json([
        'message' => 'Catégorie créée avec succès',
        'category' => $category
    ], 201);
}

public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:categories,name,' . $id,
    ]);

    $category->update([
        'name' => $validated['name'],
        'slug' => Str::slug($validated['name'])
    ]);

    return response()->json([
        'message' => 'Catégorie mise à jour avec succès',
        'category' => $category
    ]);
}


public function destroy($id)
{
    $category = Category::findOrFail($id);
    
    $category->delete();

    return response()->json([
        'message' => 'Catégorie supprimée avec succès'
    ]);
}

}