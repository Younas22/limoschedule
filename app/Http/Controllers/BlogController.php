<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::with('category')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        if ($request->ajax()) {
            return response()->json([
                'html'         => view('blogs._cards', compact('blogs'))->render(),
                'hasMorePages' => $blogs->hasMorePages(),
            ]);
        }

        return view('blogs.index', compact('blogs'));
    }

    public function show(string $slug)
    {
        $blog = Blog::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('blogs.show', compact('blog'));
    }
}
