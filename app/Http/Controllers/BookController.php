<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('book.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request -> all();
        $request -> validate([
            'title' => "required",
            'cover' => "required|mimes:png,jpg,jpeg,gif|max:1024"
        ]);

        // Upload Cover Photo 

        //Genarate a file name

        $image = $request->file('cover');

        $fileName = md5(rand(1000, 100000) . '_' . time()) . '.' . $image->getClientOriginalExtension();

        $image -> move(public_path('media/book'), $fileName);

        // DB::table('galleries') -> insert([
        //     "image_url" => $fileName,
        // ]);

        // data Store
        DB::table ('books') -> insert([
            "title"             => $request -> title,
            "author"            => $request ->  author,
            "isbn"              => $request ->  isbn,
            "copy"              => $request ->  copy,
            "cover"             => $fileName,
            "available_copy"    => $request ->  copy,
            "created_at"        => now(),
        ]);

        return back()->with('success', 'Book Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
