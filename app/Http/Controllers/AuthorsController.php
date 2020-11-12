<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return response()->json([
                'data' => $authors
            ], 200);
    }

    public function show($id)
    {
        $author = Author::find($id);
        if($author){
            return response()->json([
                'data' => $author
            ], 200);
        } else {
            return response()->json([
                'message' => 'Author Not Found'
            ], 404);
        }
    }
    
    public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'gender' => 'required',
      'biography' => 'required'
    ]);

    $author = Author::create(
      $request->only(['name', 'gender', 'biography'])
    );

    return response()->json([
      'created' => true,
      'data' => $author
    ], 201);
  }

  public function update(Request $request, $id)
  {
    try {
      $author = Author::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'message' => 'author not found'
      ], 404);
    }

    $author->fill(
      $request->only(['name', 'gender', 'biography'])
    );
    $author->save();

    return response()->json([
      'updated' => true,
      'data' => $author
    ], 200);
  }

  public function destroy($id)
  {
    try {
      $author = Author::findOrFail($id);
    } catch (ModelNotFoundException $e) {
      return response()->json([
        'error' => [
          'message' => 'author not found'
        ]
      ], 404);
    }

    $author->delete();

    return response()->json([
      'deleted' => true
    ], 200);
  }
  
}
