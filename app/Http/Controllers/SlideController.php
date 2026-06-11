<?php
 
namespace App\Http\Controllers;
 
use App\Models\Slide;
use App\Traits\UploadsImages;
use Illuminate\Http\Request;
 
class SlideController extends Controller
{
    use UploadsImages;
 
    public function index()
    {
        $slides = Slide::orderBy('order', 'asc')->get();
        return view('admin.slides.index', compact('slides'));
    }
 
    public function create()
    {
        return view('admin.slides.form');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'image' => 'required|image|max:10240',
        ]);
 
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'slides');
        }
 
        Slide::create([
            'title' => $request->input('title'),
            'order' => $request->input('order') ?? 0,
            'is_active' => $request->has('is_active'),
            'image' => $imagePath,
        ]);
 
        return redirect()->route('admin.slides.index')->with('success', 'Slide berhasil ditambahkan');
    }
 
    public function show(Slide $slide) { }
 
    public function edit(Slide $slide)
    {
        return view('admin.slides.form', compact('slide'));
    }
 
    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|max:10240',
        ]);
 
        $imagePath = $slide->image;
        if ($request->hasFile('image')) {
            $this->deleteOldImage($slide->image);
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'slides');
        }
 
        $slide->update([
            'title' => $request->input('title'),
            'order' => $request->input('order') ?? 0,
            'is_active' => $request->has('is_active'),
            'image' => $imagePath,
        ]);
 
        return redirect()->route('admin.slides.index')->with('success', 'Slide berhasil diperbarui');
    }
 
    public function destroy(Slide $slide)
    {
        $this->deleteOldImage($slide->image);
        $slide->delete();
        return redirect()->route('admin.slides.index')->with('success', 'Slide berhasil dihapus');
    }
}
