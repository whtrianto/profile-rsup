<?php

namespace App\Http\Controllers;

use App\Models\PopupImage;
use App\Traits\UploadsImages;
use Illuminate\Http\Request;

class PopupImageController extends Controller
{
    use UploadsImages;

    public function index()
    {
        $popups = PopupImage::orderBy('order', 'asc')->get();
        return view('admin.popups.index', compact('popups'));
    }

    public function create()
    {
        return view('admin.popups.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|numeric',
            'image' => 'required|image|max:10240',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'popups');
        }

        PopupImage::create([
            'title' => $request->input('title'),
            'order' => (int) $request->input('order') ?? 0,
            'is_active' => $request->has('is_active'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.popups.index')->with('success', 'Popup berhasil ditambahkan');
    }

    public function show(PopupImage $popup) { }

    public function edit(PopupImage $popup)
    {
        return view('admin.popups.form', compact('popup'));
    }

    public function update(Request $request, PopupImage $popup)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|numeric',
            'image' => 'nullable|image|max:10240',
        ]);

        $imagePath = $popup->image;
        if ($request->hasFile('image')) {
            $this->deleteOldImage($popup->image);
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'popups');
        }

        $popup->update([
            'title' => $request->input('title'),
            'order' => (int) $request->input('order') ?? 0,
            'is_active' => $request->has('is_active'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.popups.index')->with('success', 'Popup berhasil diperbarui');
    }

    public function destroy(PopupImage $popup)
    {
        $this->deleteOldImage($popup->image);
        $popup->delete();
        return redirect()->route('admin.popups.index')->with('success', 'Popup berhasil dihapus');
    }
}
