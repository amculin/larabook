<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBorrowingRequest;
use App\Models\Book;
use App\Models\Transaction as Borrowing;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::with('book:id,title')
            ->with('member:id,full_name')
            ->latest('created_at')
            ->borrowed()
            ->simplePaginate(10);

        return view('borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::orderBy('title', 'asc')
            ->where('stock', '>', 0)
            ->pluck('title', 'id');

        $members = Member::orderBy('full_name', 'asc')
            ->pluck('full_name', 'id');

        return view('borrowings.create', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|integer|exists:books,id',
            'member_id' => 'required|integer|exists:members,id',
        ]);

        Borrowing::create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'is_borrowed' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('books')->where('id', $request->book_id)->decrement('stock');

        return redirect()->route('borrowings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        $books = Book::orderBy('title', 'asc')
            ->where('stock', '>', 0)
            ->pluck('title', 'id');

        $members = Member::orderBy('full_name', 'asc')
            ->pluck('full_name', 'id');

        return view('borrowings.edit', compact('books', 'members', 'borrowing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBorrowingRequest $request, Borrowing $borrowing)
    {
        $borrowing->fill($request->validated());

        $borrowing->updated_at = date('Y-m-d H:i:s');

        $borrowing->save();
    
        return redirect()->route('borrowings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        $borrowing->is_borrowed = 0;
        $borrowing->updated_at = date('Y-m-d H:i:s');

        $borrowing->save();
    
        return redirect()->route('borrowings.index');
    }
}
