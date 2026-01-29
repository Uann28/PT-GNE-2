<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::query();

        if ($request->filled('tahun')) {
            $query->where('year', $request->tahun);
        }

        $reports = $query->latest('published_at')->paginate(12);

        return view('user.pages.publikasi', compact('reports'));
    }
}