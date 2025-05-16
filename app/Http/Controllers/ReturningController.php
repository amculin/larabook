<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction as Returning;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returnings = Returning::with('book:id,title')
            ->with('member:id,full_name')
            ->latest('updated_at')
            ->returned()
            ->simplePaginate(10);

        return view('returnings.index', compact('returnings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookCollection = Returning::select('book_id')
            ->with('book:id,title')
            ->oldest('created_at')
            ->borrowed()->get();

        $books = $bookCollection->pluck('book.title', 'book_id');

        return view('returnings.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:transactions,id',
            'book_id' => 'required|integer|exists:books,id',
            'member_id' => 'required|integer|exists:members,id',
        ]);

        $model = Returning::find($request->id);

        $model->is_borrowed = Returning::IS_RETURNED;
        $model->updated_at = date('Y-m-d H:i:s');
        $model->save();

        DB::table('books')->where('id', $request->book_id)->increment('stock');

        return redirect()->route('returnings.index');
    }

    public function members(string $bookId) {
        $memberCollection = Returning::select('id', 'member_id')
            ->with('member:id,full_name')
            ->oldest('created_at')
            ->where('book_id', $bookId)
            ->borrowed()->get();

        return response()->json($memberCollection);
    }
}
