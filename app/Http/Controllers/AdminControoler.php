<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminControoler extends Controller
{
   

public function stats()
{
        return response()->json([
            'total_books' => Book::count(),
            'damaged_books_count' => Book::where('is_damaged', true)->count(),
            'most_consulted' => Book::orderBy('borrow_count', 'desc')->first()
        ]);

        }


        
public function ViewDegraded()
{
    $degradedBooks = Book::where('is_damaged', true)
        ->with('category')
        ->get();

    $totalDegraded = $degradedBooks->count();

    return response()->json([  
        'total_degraded_count' => $totalDegraded,
        'books' => $degradedBooks
    ], 200);
}
}
