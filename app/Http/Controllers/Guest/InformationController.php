<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Information;

class InformationController extends Controller
{


    public function index()
    {
        $information = Information::where('status', 'publish')
            ->latest()
            ->paginate(9);

        return view('user.pages.information.index', compact('information'));
    }

    public function show($slug)
    {
        $information = Information::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        $related = Information::where('status', 'publish')
            ->where('id', '!=', $information->id)
            ->latest()
            ->take(3)
            ->get();

        return view('user.pages.information.show', compact('information', 'related'));
    }
}
