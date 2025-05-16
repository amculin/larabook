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
            ->latest('created_at')
            ->returned()
            ->simplePaginate(10);

        return view('returnings.index', compact('returnings'));
    }
}
