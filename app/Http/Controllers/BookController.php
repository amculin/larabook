<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('publisher:id,name')
            ->simplePaginate(10);

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::pluck('name', 'id');

        return view('books.create', compact('publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'publisher_id' => 'required|integer|exists:publishers,id',
            'dimension_length' => 'required|integer',
            'dimension_height' => 'required|integer',
            'stock' => 'required|integer',
        ]);

        Book::create([
            'title' => $request->title,
            'publisher_id' => $request->publisher_id,
            'dimension' => $request->dimension_length . 'cm x ' . $request->dimension_height . 'cm',
            'stock' => $request->stock,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $publishers = Publisher::pluck('name', 'id');

        return view('books.edit', compact('publishers', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->fill($request->validated());

        $book->updated_at = date('Y-m-d H:i:s');

        $book->save();
    
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
