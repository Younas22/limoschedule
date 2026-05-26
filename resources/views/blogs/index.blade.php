@extends('layouts.public')

@section('content')
<div class="max-w-6xl mx-auto px-5 sm:px-6 py-14">

    <!-- Page Header -->
    <div class="mb-10">
        <p class="text-blue-400 text-[12px] font-semibold uppercase tracking-widest mb-2">LimoSchedule Blog</p>
        <h1 class="text-3xl sm:text-4xl font-bold text-white leading-tight">
            Insights &amp; Updates
        </h1>
        <p class="text-gray-500 mt-3 text-[15px] max-w-xl">
            Articles on limo dispatch automation, booking technology, and growing your limo business.
        </p>
    </div>

    <!-- Blog Grid -->
    <div id="blog-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @include('blogs._cards', ['blogs' => $blogs])
    </div>

    <!-- Empty state -->
    @if ($blogs->isEmpty())
        <div class="text-center py-20">
            <svg class="mx-auto mb-4 opacity-20" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                <polyline points="10 9 9 9 8 9"/>
            </svg>
            <p class="text-gray-500 text-lg">No blog posts yet. Check back soon!</p>
        </div>
    @endif

    <!-- Load More Button -->
    @if ($blogs->hasMorePages())
        <div class="text-center mt-12" id="load-more-wrap">
            <button id="load-more-btn"
                    data-page="{{ $blogs->currentPage() }}"
                    class="inline-flex items-center gap-2 px-7 py-3 rounded-xl text-[14px] font-semibold text-white transition-all duration-200"
                    style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);"
                    onmouseover="this.style.background='rgba(59,130,246,0.15)';this.style.borderColor='rgba(59,130,246,0.35)'"
                    onmouseout="this.style.background='rgba(255,255,255,0.06)';this.style.borderColor='rgba(255,255,255,0.12)'">
                <span id="load-more-text">Load More Posts</span>
                <svg id="load-more-spinner" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden" style="animation: spin .7s linear infinite;">
                    <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" opacity=".25"/><path d="M21 12a9 9 0 00-9-9"/>
                </svg>
            </button>
        </div>
    @endif

</div>
@endsection

@push('styles')
<style>
    @keyframes spin { to { transform: rotate(360deg); } }
</style>
@endpush

@push('scripts')
<script>
(function () {
    const btn = document.getElementById('load-more-btn');
    if (!btn) return;

    const grid    = document.getElementById('blog-grid');
    const wrap    = document.getElementById('load-more-wrap');
    const spinner = document.getElementById('load-more-spinner');
    const btnText = document.getElementById('load-more-text');
    let loading   = false;

    btn.addEventListener('click', function () {
        if (loading) return;
        loading = true;

        const nextPage = parseInt(btn.dataset.page) + 1;
        spinner.classList.remove('hidden');
        btnText.textContent = 'Loading...';
        btn.disabled = true;

        fetch('{{ route("blogs.index") }}?page=' + nextPage, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(data => {
            grid.insertAdjacentHTML('beforeend', data.html);
            btn.dataset.page = nextPage;

            if (!data.hasMorePages) {
                wrap.style.display = 'none';
            } else {
                btnText.textContent = 'Load More Posts';
                spinner.classList.add('hidden');
                btn.disabled = false;
            }
        })
        .catch(() => {
            btnText.textContent = 'Load More Posts';
            spinner.classList.add('hidden');
            btn.disabled = false;
        })
        .finally(() => { loading = false; });
    });
})();
</script>
@endpush
