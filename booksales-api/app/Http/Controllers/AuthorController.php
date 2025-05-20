<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                'success' => false,
                "message" => "Data not found",
            ], 200);
        }

        return response()->json([
            'success' => true,
            "message" => "Get All Resource",
            "data" => $authors,
        ], 200);
    }

        // create author
        public function store(Request $request){
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'bio' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation Error',
                    'data' => $validator->errors(),
                ], 422);
            }

        // upload image
        $image = $request->file('photo');
        $image->store('authors', 'public');

        // create author
        $author = Author::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'data' => $author,
        ], 201);
    }
}
