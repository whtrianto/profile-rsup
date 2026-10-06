<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use App\Traits\UploadsImages;
use Illuminate\Http\Request;

class KarirController extends Controller
{
    use UploadsImages;

    // Frontend method
    public function indexFrontend()
    {
        $karirs = Karir::orderBy('id', 'desc')->get();
        return view('karir', compact('karirs'));
    }

    // Admin methods
    public function index()
    {
        $karirs = Karir::orderBy('id', 'desc')->get();
        return view('admin.karirs.index', compact('karirs'));
    }

    public function create()
    {
        return view('admin.karirs.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:10240',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'karirs');
        }

        Karir::create([
            'title' => $request->input('title'),
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.karirs.index')->with('success', 'Lowongan Karir berhasil ditambahkan');
    }

    public function edit(Karir $karir)
    {
        return view('admin.karirs.form', compact('karir'));
    }

    public function update(Request $request, Karir $karir)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:10240',
            'description' => 'nullable|string',
        ]);

        $imagePath = $karir->image;
        if ($request->hasFile('image')) {
            $this->deleteOldImage($karir->image);
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'karirs');
        }

        $karir->update([
            'title' => $request->input('title'),
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.karirs.index')->with('success', 'Lowongan Karir berhasil diperbarui');
    }

    public function destroy(Karir $karir)
    {
        $this->deleteOldImage($karir->image);
        $karir->delete();
        return redirect()->route('admin.karirs.index')->with('success', 'Lowongan Karir berhasil dihapus');
    }
}
