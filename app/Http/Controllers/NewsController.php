<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Traits\UploadsImages;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use UploadsImages;

    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:10240',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'news');
        }

        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'published_at' => $request->input('published_at'),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show(News $news) { }

    public function edit(News $news)
    {
        return view('admin.news.form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:10240',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = $news->image;
        if ($request->hasFile('image')) {
            $this->deleteOldImage($news->image);
            $imagePath = $this->uploadAndCompressImage($request->file('image'), 'news');
        }

        $news->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'published_at' => $request->input('published_at'),
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news)
    {
        $this->deleteOldImage($news->image);
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }
}
