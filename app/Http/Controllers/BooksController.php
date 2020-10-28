<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json([
                'message' => 'Menampilkan semua buku',
                'data' => $books
            ], 200);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if($book){
            return response()->json([
                'message' => 'Book Found',
                'data' => $book
            ], 200);
        } else {
            return response()->json([
                'message' => 'Book Not Found'
            ], 404);
        }
    } 
}
