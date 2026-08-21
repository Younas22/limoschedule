@extends('layouts.public')

@push('styles')
<style>
    .toc-scroll { scrollbar-width: thin; scrollbar-color: rgba(255,255,255,0.15) transparent; }
    .toc-scroll::-webkit-scrollbar { width: 4px; }
    .toc-scroll::-webkit-scrollbar-track { background: transparent; }
    .toc-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.15); border-radius: 4px; }

    /* Keep anchored headings from landing underneath the fixed 66px header */
    .prose-blog h2, .prose-blog h3, .prose-blog h4, .prose-blog h5, .prose-blog h6 {
        scroll-margin-top: 90px;
    }
</style>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════════════════════
     HEADER
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Blog', 'url' => route('blogs.index')],
        ['label' => $blog->title, 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 pt-8 pb-10">

        <div class="flex items-center gap-2.5 flex-wrap mb-4">
            @if ($blog->category)
                <span class="category-badge">{{ $blog->category->name }}</span>
            @endif
            <span class="text-gray-500 text-[13px]">
                {{ $blog->published_at ? $blog->published_at->format('F d, Y') : $blog->created_at->format('F d, Y') }}
            </span>
        </div>

        <h1 class="text-[1.9rem] sm:text-[2.4rem] font-extrabold text-white leading-tight mb-5">
            {{ $blog->title }}
        </h1>

        <div class="flex items-center gap-2.5">
            <img src="{{ url('public/logo/favicon.png') }}"
                 alt="LimoSchedule"
                 width="48" height="48"
                 class="w-8 h-8 rounded-full object-cover"
                 style="border: 1px solid rgba(255,255,255,0.1);"
                 loading="lazy" decoding="async">
            <div>
                <div class="text-gray-200 text-[13px] font-semibold leading-none mb-0.5">LimoSchedule</div>
                <div class="text-gray-600 text-[11.5px]">
                    {{ $blog->published_at ? $blog->published_at->diffForHumans() : $blog->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     ARTICLE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-10 lg:py-14" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 {{ count($tableOfContents) ? 'lg:grid-cols-[220px_1fr]' : '' }} gap-10 lg:gap-14">

            @if (count($tableOfContents))
            <!-- Table of Contents -->
            <aside class="hidden lg:block">
                <nav aria-label="Table of contents" class="sticky toc-scroll" style="top: 90px; max-height: calc(100vh - 110px); overflow-y: auto; padding-bottom: 12px;">
                    <div class="text-[11px] font-bold tracking-[0.12em] uppercase text-gray-500 mb-3">On This Page</div>
                    <ul id="blogToc" class="text-[13px] leading-snug" style="border-left: 1px solid rgba(255,255,255,0.08);">
                        @foreach ($tableOfContents as $item)
                            <li style="padding-left: {{ ($item['level'] - 2) * 14 }}px; margin-left: -1px;">
                                <a href="#{{ $item['id'] }}" data-toc-link data-toc-target="{{ $item['id'] }}"
                                   class="block text-gray-500 hover:text-white transition-colors duration-200 py-1"
                                   style="border-left: 2px solid transparent; padding-left: 10px; margin-left: -12px;">
                                    {{ $item['text'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </aside>
            @endif

            <!-- Main content -->
            <div class="min-w-0">
                <div class="max-w-3xl">

                    <!-- Featured Image -->
                    @if ($blog->featured_image)
                        @php
                            $featuredImagePath = public_path($blog->featured_image);
                            $featuredImageSize = is_file($featuredImagePath) ? @getimagesize($featuredImagePath) : false;
                        @endphp
                        <div class="mb-8 rounded-2xl overflow-hidden" style="border: 1px solid rgba(255,255,255,0.08);">
                            <img src="{{ url('public/' . $blog->featured_image) }}"
                                 alt="{{ $blog->title }}"
                                 @if($featuredImageSize) width="{{ $featuredImageSize[0] }}" height="{{ $featuredImageSize[1] }}" @endif
                                 class="w-full object-cover"
                                 style="max-height: 480px;"
                                 loading="eager" fetchpriority="high" decoding="async">
                        </div>
                    @endif

                    <!-- Excerpt -->
                    @if ($blog->excerpt)
                        <p class="text-[1.05rem] text-gray-400 leading-relaxed mb-8 italic"
                           style="border-left: 3px solid rgba(59,130,246,0.4); padding-left: 1.2rem;">
                            {{ $blog->excerpt }}
                        </p>
                    @endif

                    <!-- Main Content -->
                    <div class="prose-blog">
                        {!! $contentHtml !!}
                    </div>

                    <!-- Bottom CTA -->
                    <div class="mt-14 rounded-2xl p-8 text-center"
                         style="background: rgba(59,130,246,0.06); border: 1px solid rgba(59,130,246,0.15);">
                        <p class="text-gray-300 font-semibold text-[15px] mb-1">Ready to automate your transportation business?</p>
                        <p class="text-gray-500 text-[13px] mb-5">Complete white-label booking platform &mdash; one-time payment, no monthly SaaS fee.</p>
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center gap-2 bg-[#3B82F6] text-white text-[13px] font-semibold px-5 py-2.5 rounded-xl border border-blue-500/30 hover:bg-blue-500 transition-colors">
                            Request a Live Demo
                        </a>
                    </div>

                    <!-- Back link -->
                    <div class="mt-10">
                        <a href="{{ route('blogs.index') }}"
                           class="inline-flex items-center gap-1.5 text-gray-500 hover:text-gray-300 text-[13px] font-medium transition-colors">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                            Back to Blog
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@if (count($tableOfContents))
@push('scripts')
<script>
(function () {
    'use strict';
    var links = document.querySelectorAll('[data-toc-link]');
    if (!links.length) return;

    var headings = Array.prototype.map.call(links, function (link) {
        return document.getElementById(link.getAttribute('data-toc-target'));
    }).filter(Boolean);

    if (!headings.length) return;

    function setActive(id) {
        links.forEach(function (link) {
            var isActive = link.getAttribute('data-toc-target') === id;
            link.style.color = isActive ? '#60a5fa' : '';
            link.style.borderLeftColor = isActive ? '#3B82F6' : 'transparent';
            link.style.fontWeight = isActive ? '600' : '';
        });
    }

    // Clicking a link (or the browser jumping straight to a #hash on load)
    // should mark that heading active immediately, without waiting for the
    // scroll-driven observer below to catch up.
    links.forEach(function (link) {
        link.addEventListener('click', function () {
            setActive(link.getAttribute('data-toc-target'));
        });
    });

    if (window.location.hash) {
        var initialTarget = window.location.hash.slice(1);
        if (headings.some(function (h) { return h.id === initialTarget; })) {
            setActive(initialTarget);
        }
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                setActive(entry.target.id);
            }
        });
    }, { rootMargin: '-100px 0px -70% 0px' });

    headings.forEach(function (h) { observer.observe(h); });
})();
</script>
@endpush
@endif
