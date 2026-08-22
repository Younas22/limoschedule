@extends('layouts.public')

@php
    $seo = [
        'title'       => 'Page Not Found — LimoSchedule',
        'description' => 'The page you were looking for could not be found. Return to LimoSchedule to explore the platform, pricing and more.',
        'canonical'   => url()->current(),
        'og_type'     => 'website',
        'og_image'    => url('public/logo/favicon.png'),
        'twitter_card'=> 'summary',
    ];
@endphp

@push('styles')
<meta name="robots" content="noindex, follow">
@endpush

@section('content')

<section class="relative overflow-hidden" style="background: #030303; min-height: calc(100vh - 66px); display: flex; align-items: center;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-2xl mx-auto px-5 sm:px-6 lg:px-8 py-20 text-center">
        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">404 Error</span>
        </div>

        <div class="text-[88px] sm:text-[110px] font-black leading-none tracking-tight mb-4" style="background: linear-gradient(135deg, #ffffff 20%, #3B82F6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
            404
        </div>

        <h1 class="text-white text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5">
            This Page Doesn&rsquo;t Exist
        </h1>

        <p class="text-gray-400 text-[16px] leading-relaxed max-w-lg mx-auto mb-10">
            The page you&rsquo;re looking for may have been moved, renamed, or never existed. Let&rsquo;s get you back on track.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mb-12">
            <a href="{{ url('/') }}"
               class="btn-cta w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#3B82F6] text-white font-bold px-8 py-4 rounded-xl text-[15px] border border-blue-500/30">
                <span>Back to Homepage</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('contact') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-semibold px-7 py-4 rounded-xl text-[15px] text-white transition-all duration-200 hover:bg-white/10"
               style="background: #000; border: 1px solid rgba(255,255,255,0.28);">
                <span>Contact Us</span>
            </a>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-x-5 gap-y-2 text-[13.5px]">
            <a href="{{ route('platform') }}" class="text-gray-500 hover:text-white transition-colors duration-200">Platform</a>
            <span class="text-gray-700">&middot;</span>
            <a href="{{ route('solutions') }}" class="text-gray-500 hover:text-white transition-colors duration-200">Solutions</a>
            <span class="text-gray-700">&middot;</span>
            <a href="{{ route('features') }}" class="text-gray-500 hover:text-white transition-colors duration-200">Features</a>
            <span class="text-gray-700">&middot;</span>
            <a href="{{ route('pricing') }}" class="text-gray-500 hover:text-white transition-colors duration-200">Pricing</a>
            <span class="text-gray-700">&middot;</span>
            <a href="{{ route('faq') }}" class="text-gray-500 hover:text-white transition-colors duration-200">FAQ</a>
            <span class="text-gray-700">&middot;</span>
            <a href="{{ route('blogs.index') }}" class="text-gray-500 hover:text-white transition-colors duration-200">Blog</a>
        </div>
    </div>
</section>

@endsection
