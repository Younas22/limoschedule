@foreach ($blogs as $blog)
<article class="blog-card">
    <!-- Featured Image -->
    <a href="{{ route('blog.show', $blog->slug) }}" class="block flex-shrink-0">
        @if ($blog->featured_image)
            <img src="{{ url('public/' . $blog->featured_image) }}"
                 alt="{{ $blog->title }}"
                 class="blog-card-img"
                 loading="lazy">
        @else
            <div class="blog-card-img-placeholder">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.3)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <polyline points="21 15 16 10 5 21"/>
                </svg>
            </div>
        @endif
    </a>

    <!-- Card Body -->
    <div class="p-5 flex flex-col flex-1">
        <!-- Category + Date -->
        <div class="flex items-center gap-2 mb-3 flex-wrap">
            @if ($blog->category)
                <span class="category-badge">{{ $blog->category->name }}</span>
            @endif
            <span class="text-gray-500 text-[11.5px]">
                {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
            </span>
        </div>

        <!-- Title -->
        <h2 class="font-bold text-gray-100 text-[15.5px] leading-snug mb-2 line-clamp-2">
            <a href="{{ route('blog.show', $blog->slug) }}" class="hover:text-blue-400 transition-colors">
                {{ $blog->title }}
            </a>
        </h2>

        <!-- Excerpt -->
        @if ($blog->excerpt)
            <p class="text-gray-500 text-[13px] leading-relaxed mb-4 line-clamp-3 flex-1">
                {{ $blog->excerpt }}
            </p>
        @else
            <div class="flex-1"></div>
        @endif

        <!-- Read More -->
        <a href="{{ route('blog.show', $blog->slug) }}"
           class="inline-flex items-center gap-1.5 text-blue-400 hover:text-blue-300 text-[13px] font-semibold transition-colors mt-auto">
            Read More
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</article>
@endforeach
