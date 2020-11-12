<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json([
                'data' => $books
            ], 200);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if($book){
            return response()->json([
                'data' => $book
            ], 200);
        } else {
            return response()->json([
                'message' => 'Book Not Found'
            ], 404);
        }
    }
    
    public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'description' => 'required',
      'author' => 'required'
    ]);

    $book = Book::create(
      $request->only(['title', 'description', 'author'])
    );

    return response()->json([
      'created' => true,
      'data' => $book
    ], 201);
  }

  public function update(Request $request, $id)
  {
    try {
      $book = Book::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'message' => 'book not found'
      ], 404);
    }

    $book->fill(
      $request->only(['title', 'description', 'author'])
    );
    $book->save();

    return response()->json([
      'updated' => true,
      'data' => $book
    ], 200);
  }

  public function destroy($id)
  {
    try {
      $book = Book::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'error' => [
          'message' => 'book not found'
        ]
      ], 404);
    }

    $book->delete();

    return response()->json([
      'deleted' => true
    ], 200);
  }
  
}
