<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Country;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $countries = Country::orderBy('name')->get();
        return view('home', compact('countries'));
    }

    public function blogs(Request $request)
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

    public function blogShow(string $slug)
    {
        $blog = Blog::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('blogs.show', compact('blog'));
    }
}
