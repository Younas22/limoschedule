<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('category')->latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('title', 'like', "%{$s}%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $blogs      = $query->paginate(15)->withQueryString();
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('name')->get();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required|max:255',
            'category_id'      => 'nullable|exists:blog_categories,id',
            'content'          => 'nullable|string',
            'excerpt'          => 'nullable|string|max:600',
            'featured_image'   => 'nullable|image|max:3072',
            'meta_title'       => 'nullable|max:70',
            'meta_description' => 'nullable|max:160',
            'status'           => 'required|in:draft,published,scheduled',
            'published_at'     => 'nullable|date',
        ]);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->saveImage($request->file('featured_image'));
        }

        $data['slug'] = Blog::generateSlug($data['title']);

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post create ho gaya!');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::orderBy('name')->get();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title'            => 'required|max:255',
            'category_id'      => 'nullable|exists:blog_categories,id',
            'content'          => 'nullable|string',
            'excerpt'          => 'nullable|string|max:600',
            'featured_image'   => 'nullable|image|max:3072',
            'meta_title'       => 'nullable|max:70',
            'meta_description' => 'nullable|max:160',
            'status'           => 'required|in:draft,published,scheduled',
            'published_at'     => 'nullable|date',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                @unlink(public_path($blog->featured_image));
            }
            $data['featured_image'] = $this->saveImage($request->file('featured_image'));
        }

        $data['slug'] = Blog::generateSlug($data['title'], $blog->id);

        if ($data['status'] === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post update ho gaya!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
            @unlink(public_path($blog->featured_image));
        }
        $blog->delete();
        return back()->with('success', 'Blog post delete ho gaya.');
    }

    public function uploadImage(Request $request)
    {
        $request->validate(['image' => 'required|image|max:5120']);

        $file     = $request->file('image');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $dir      = public_path('uploads/blogs');

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $file->move($dir, $filename);

        return response()->json(['url' => url('public/uploads/blogs/' . $filename)]);
    }

    private function saveImage($file): string
    {
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $dir      = public_path('uploads/blogs');

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $file->move($dir, $filename);
        return 'uploads/blogs/' . $filename;
    }
}
