@extends('layouts.public')


@section('content')
<div class="max-w-3xl mx-auto px-5 sm:px-6 py-12">

    <!-- Back link -->
    <a href="{{ route('blogs.index') }}"
       class="inline-flex items-center gap-1.5 text-gray-500 hover:text-gray-300 text-[13px] font-medium transition-colors mb-8">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Back to Blog
    </a>

    <!-- Category + Date -->
    <div class="flex items-center gap-2.5 flex-wrap mb-4">
        @if ($blog->category)
            <span class="category-badge">{{ $blog->category->name }}</span>
        @endif
        <span class="text-gray-500 text-[13px]">
            {{ $blog->published_at ? $blog->published_at->format('F d, Y') : $blog->created_at->format('F d, Y') }}
        </span>
    </div>

    <!-- Title -->
    <h1 class="text-[1.9rem] sm:text-[2.2rem] font-extrabold text-white leading-tight mb-5">
        {{ $blog->title }}
    </h1>

    <!-- Author row -->
    <div class="flex items-center gap-2.5 mb-8 pb-8" style="border-bottom: 1px solid rgba(255,255,255,0.07);">
        <img src="{{ url('public/logo/favicon.png') }}"
             alt="LimoSchedule"
             class="w-8 h-8 rounded-full object-cover"
             style="border: 1px solid rgba(255,255,255,0.1);">
        <div>
            <div class="text-gray-200 text-[13px] font-semibold leading-none mb-0.5">LimoSchedule</div>
            <div class="text-gray-600 text-[11.5px]">
                {{ $blog->published_at ? $blog->published_at->diffForHumans() : $blog->created_at->diffForHumans() }}
            </div>
        </div>
    </div>

    <!-- Featured Image -->
    @if ($blog->featured_image)
        <div class="mb-8 rounded-2xl overflow-hidden" style="border: 1px solid rgba(255,255,255,0.08);">
            <img src="{{ url('public/' . $blog->featured_image) }}"
                 alt="{{ $blog->title }}"
                 class="w-full object-cover"
                 style="max-height: 480px;">
        </div>
    @endif

    <!-- Excerpt (if present, styled as lead) -->
    @if ($blog->excerpt)
        <p class="text-[1.05rem] text-gray-400 leading-relaxed mb-8 italic"
           style="border-left: 3px solid rgba(59,130,246,0.4); padding-left: 1.2rem;">
            {{ $blog->excerpt }}
        </p>
    @endif

    <!-- Main Content -->
    <div class="prose-blog">
        {!! $blog->content !!}
    </div>

    <!-- Bottom CTA -->
    <div class="mt-14 rounded-2xl p-8 text-center"
         style="background: rgba(59,130,246,0.06); border: 1px solid rgba(59,130,246,0.15);">
        <p class="text-gray-300 font-semibold text-[15px] mb-1">Ready to automate your limo business?</p>
        <p class="text-gray-500 text-[13px] mb-5">Self-hosted booking system — one-time license, full source code.</p>
        <a href="{{ url('/contact') }}"
           class="inline-flex items-center gap-2 bg-[#3B82F6] text-white text-[13px] font-semibold px-5 py-2.5 rounded-xl border border-blue-500/30 hover:bg-blue-500 transition-colors">
            Request a Live Demo
        </a>
    </div>

    <!-- Back link bottom -->
    <div class="mt-10">
        <a href="{{ route('blogs.index') }}"
           class="inline-flex items-center gap-1.5 text-gray-500 hover:text-gray-300 text-[13px] font-medium transition-colors">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Back to Blog
        </a>
    </div>

</div>
@endsection
