<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Traits\UploadsImages;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    use UploadsImages;

    public function index()
    {
        $promos = Promo::all();
        return view('admin.promos.index', compact('promos'));
    }

    public function create()
    {
        return view('admin.promos.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'valid_until' => 'nullable|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'promos');
        }

        Promo::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'valid_until' => $request->input('valid_until'),
        ]);

        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil ditambahkan');
    }

    public function show(Promo $promo) { }

    public function edit(Promo $promo)
    {
        return view('admin.promos.form', compact('promo'));
    }

    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'valid_until' => 'nullable|date',
        ]);

        $imagePath = $promo->image;
        if ($request->hasFile('image')) {
            $this->deleteOldImage($promo->image);
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'promos');
        }

        $promo->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'valid_until' => $request->input('valid_until'),
        ]);

        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil diperbarui');
    }

    public function destroy(Promo $promo)
    {
        $this->deleteOldImage($promo->image);
        $promo->delete();
        return redirect()->route('admin.promos.index')->with('success', 'Promo berhasil dihapus');
    }
}
