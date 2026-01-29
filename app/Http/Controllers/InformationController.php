<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function index()
    {
        $information = Information::latest()->paginate(10);
        return view('admin.information.index', compact('information'));
    }

    public function create()
    {
        return view('admin.information.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable',
            'instagram_url' => 'nullable|url',
            'status' => 'required|in:draft,publish',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'user_id'       => auth()->id(),
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'content'       => $request->content,
            'instagram_url' => $request->instagram_url,
            'status'        => $request->status,
            'published_at'  => $request->status === 'publish' ? now() : null,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('information', 'public');
        }

        Information::create($data);

        return redirect()->route('admin.information.index')
            ->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function show(Information $information)
    {
        return view('admin.information.show', compact('information'));
    }

    public function edit(Information $information)
    {
        return view('admin.information.edit', compact('information'));
    }

    public function update(Request $request, Information $information)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'nullable',
            'instagram_url' => 'nullable|url',
            'status'  => 'required|in:draft,publish',
            'image'   => 'nullable|image|max:2048',
        ]);

        $information->title = $request->title;
        $information->slug = Str::slug($request->title);
        $information->content = $request->content;
        $information->instagram_url = $request->instagram_url;
        $information->status = $request->status;
       
        if($request->status === 'publish' && !$information->published_at) {
            $information->published_at = now();
        }

        if($request->hasFile('image')) {
            if ($information->image) {
                Storage::disk('public')->delete($information->image);
            }
            $information->image = $request->file('image')->store('information', 'public');
        }

        $information->save();

        return redirect()->route('admin.information.index')
            ->with('success', 'Informasi diperbarui!');
    }

    public function destroy(Information $information)
    {
        if ($information->image) {
            Storage::disk('public')->delete($information->image);
        }

        $information->delete();

        return redirect()->route('admin.information.index')
            ->with('success', 'Information berhasil dihapus!');
    }
}