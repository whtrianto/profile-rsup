<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $data = $request->except('icon');

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $file->getClientOriginalName());
            
            $dir = public_path('storage/facilities');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }
            
            $file->move($dir, $filename);
            $data['icon'] = 'facilities/' . $filename;
        }

        Facility::create($data);

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Facility $facility)
    {
        return view('admin.facilities.form', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|file|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $data = $request->except('icon');

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $file->getClientOriginalName());
            
            $dir = public_path('storage/facilities');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }
            
            $file->move($dir, $filename);
            $data['icon'] = 'facilities/' . $filename;
        }

        $facility->update($data);

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();
        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
