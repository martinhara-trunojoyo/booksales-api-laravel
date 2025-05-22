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

    public function show($id){
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Author found',
            'data' => $author,
        ], 200);
    }

    public function destroy($id){
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found',
            ], 404);
        }

        if ($author->photo) {
            // delete image from storage
            Storage::disk('public')->delete('authors/' . $author->photo);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully',
        ], 200);
    }

    public function update(string $id, Request $request){
        // 1. Meencari data
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found',
            ], 404);
        }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'data' => $validator->errors(),
            ], 422);
        }

        // 3. siapkan data yang ingin di update
        $data = [
            'name' => $request->name,
            'bio' => $request->bio,
        ];

        // 4. handle image (upload & delete image)
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->store('authors', 'public');
            
            if ($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            $data['photo'] = $image->hashName();
        }

        // 5. update data baru ke database
        $author->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully',
            'data' => $author,
        ], 200);    
    }
    
}
