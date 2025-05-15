<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        // $books berdasarkan genre
        $books = Book::with('genre')->get();
        $books = Book::with('author')->get();
        return view('books',['books' => $books]);
    }
}
