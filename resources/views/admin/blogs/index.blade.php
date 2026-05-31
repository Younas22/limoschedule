@extends('admin.layouts.app')

@section('title', 'Blogs')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Blog Posts</h1>
            <p class="text-gray-500 text-sm mt-1">Manage all blog posts</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}"
           class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold px-5 py-2.5 rounded-lg text-sm transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Post
        </a>
    </div>

    @if(session('success'))
        <div class="mb-5 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-4">
        <form method="GET" action="{{ route('admin.blogs.index') }}" class="flex flex-wrap gap-3">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by title..."
                class="flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
            >
            <select name="category" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option value="">All Status</option>
                <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft"     {{ request('status') === 'draft'     ? 'selected' : '' }}>Draft</option>
                <option value="scheduled" {{ request('status') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
            </select>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-medium px-5 py-2 rounded-lg text-sm transition">
                Filter
            </button>
            @if(request()->hasAny(['search', 'status', 'category']))
                <a href="{{ route('admin.blogs.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg text-sm transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        @if($blogs->isEmpty())
            <div class="text-center py-16 text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <p class="text-sm">No blog posts found</p>
                <a href="{{ route('admin.blogs.create') }}" class="mt-3 inline-block text-yellow-500 hover:underline text-sm">Write your first post</a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">#</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Post</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Category</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Status</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Publish Date</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($blogs as $i => $blog)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-5 py-3 text-xs font-medium text-gray-400 w-10">
                                {{ $blogs->firstItem() + $i }}
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    @if($blog->featured_image)
                                        <img src="{{ url('public/' . $blog->featured_image) }}" class="w-10 h-10 rounded-lg object-cover shrink-0">
                                    @else
                                        <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center shrink-0">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-medium text-gray-800 line-clamp-1">{{ $blog->title }}</p>
                                        <p class="text-xs text-gray-400 mt-0.5">/{{ $blog->slug }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-gray-600">{{ $blog->category?->name ?? '—' }}</td>
                            <td class="px-5 py-3">
                                @php
                                    $statusMap = [
                                        'published' => 'bg-green-100 text-green-700',
                                        'draft'     => 'bg-gray-100 text-gray-600',
                                        'scheduled' => 'bg-blue-100 text-blue-700',
                                    ];
                                @endphp
                                <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $statusMap[$blog->status] ?? '' }}">
                                    {{ ucfirst($blog->status) }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-gray-500 whitespace-nowrap text-xs">
                                {{ $blog->published_at ? $blog->published_at->format('d M Y, H:i') : '—' }}
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-blue-500 hover:text-blue-700 text-xs font-medium transition">Edit</a>
                                    <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" onsubmit="return confirm('Delete this blog post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($blogs->hasPages())
                <div class="px-5 py-4 border-t border-gray-100">
                    {{ $blogs->links() }}
                </div>
            @endif
        @endif
    </div>

    @if(!$blogs->isEmpty())
        <p class="text-xs text-gray-400 mt-3 text-right">
            Showing {{ $blogs->firstItem() }}–{{ $blogs->lastItem() }} of {{ $blogs->total() }} results
        </p>
    @endif

@endsection
