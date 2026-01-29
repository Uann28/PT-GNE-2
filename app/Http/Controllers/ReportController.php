<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Report::with('user');

        if ($request->has('tahun') && $request->tahun != '') {
            $query->where('year', $request->tahun);
        }

        $reports = $query->latest('published_at')->paginate(10);
        
        return view('admin.publikasi.index', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'year'         => 'required|numeric',
            'published_at' => 'required|date',
            'file'         => 'required|mimes:pdf|max:20480',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $bytes = $file->getSize();
            $fileSize = ($bytes >= 1048576) 
                ? number_format($bytes / 1048576, 1) . ' MB' 
                : number_format($bytes / 1024, 0) . ' KB';

            $filename = Str::slug($request->title) . '-' . $request->year . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('publikasi', $filename, 'public');

            Report::create([
                'user_id'      => auth()->id(),
                'title'        => $request->title,
                'year'         => $request->year,
                'published_at' => $request->published_at,
                'file_size'    => $fileSize,
                'file_path'    => $path,
            ]);
        }

        return back()->with('success', 'Arsip berhasil ditambahkan.');
    }

    public function edit(Report $report)
    {
        return view('admin.publikasi.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'title'        => 'required|string',
            'year'         => 'required|numeric',
            'published_at' => 'nullable|date',
            'file'         => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->only(['title', 'year', 'published_at']);

        if ($request->hasFile('file')) {
            if (Storage::disk('public')->exists($report->file_path)) {
                Storage::disk('public')->delete($report->file_path);
            }

            $file = $request->file('file');
            
            $bytes = $file->getSize();
            $data['file_size'] = ($bytes >= 1048576) 
                ? number_format($bytes / 1048576, 1) . ' MB' 
                : number_format($bytes / 1024, 0) . ' KB';

            $filename = Str::slug($request->title) . '-' . $request->year . '-' . time() . '.' . $file->getClientOriginalExtension();
            $data['file_path'] = $file->storeAs('publikasi', $filename, 'public');
        }

        $report->update($data);

        return redirect()->route('admin.publikasi.index')->with('success', 'Arsip berhasil diperbarui.');
    }

    public function destroy(Report $report)
    {
        if (Storage::disk('public')->exists($report->file_path)) {
            Storage::disk('public')->delete($report->file_path);
        }

        $report->delete();

        return back()->with('success', 'Arsip dan file fisik berhasil dihapus.');
    }
}