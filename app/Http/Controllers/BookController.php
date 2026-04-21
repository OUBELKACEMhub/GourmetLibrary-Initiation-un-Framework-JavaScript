<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('category');

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        return response()->json($query->get());
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $books = Book::where('title', 'LIKE', "%{$search}%")
            ->orWhere('chef_name', 'LIKE', "%{$search}%")
            ->orWhereHas('category', function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            })
            ->with('category')
            ->get();

        return response()->json($books);
    }

    public function getPopular()
    {
        $popularBooks = Book::orderBy('borrow_count', 'desc')
            ->take(5)
            ->get();

        return response()->json($popularBooks);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'chef_name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $book = Book::create($validated);

        return response()->json($book, 201);
    }

    public function updateCondition(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update([
            'is_damaged' => $request->is_damaged
        ]);


        return response()->json(['message' => 'État du livre mis à jour']);
    }


    public function update(Request $request, $id)
{
    $book = Book::findOrFail($id);

    $validated = $request->validate([
    'title' => 'required|string|max:255|unique:books,title,' . $id, 
    'chef_name' => 'required|string',
    'category_id' => 'required|exists:categories,id',
    'description' => 'nullable|string',
    'is_damaged' => 'boolean'
]);

    $validated['slug'] = Str::slug($request->title);

    $book->update($validated);

    return response()->json([
        'message' => 'Livre mis à jour avec succès',
        'book' => $book
    ], 200);
}

public function destroy($id)
{
    $book = Book::findOrFail($id);

    $book->delete();

    return response()->json([
        'message' => 'Le livre a été supprimé avec succès.'
    ], 200);
}
 

  
}

