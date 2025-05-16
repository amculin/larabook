<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryController extends Controller
{
    public function index()
    {
        $month = date('m');

        $borrowingSummary = DB::table('summaries')
            ->select(DB::raw('WEEK(date) AS week_number, YEAR(date) AS year, SUM(amount) AS total_amount'))
            ->where('is_borrowed', 1)
            ->whereRaw('MONTH(date) = ?', [$month])
            ->groupBy('year', 'week_number')
            ->get();
        
        $returningSummary = DB::table('summaries')
            ->select(DB::raw('WEEK(date) AS week_number, YEAR(date) AS year, SUM(amount) AS total_amount'))
            ->where('is_borrowed', 0)
            ->whereRaw('MONTH(date) = ?', [$month])
            ->groupBy('year', 'week_number')
            ->get();

        return view('summaries.index', compact('borrowingSummary', 'returningSummary'));
    }
}
