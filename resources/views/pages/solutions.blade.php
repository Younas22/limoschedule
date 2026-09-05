@extends('layouts.public')

@push('styles')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@graph": [
        {
            "@@type": "Organization",
            "@@id": "{{ url('/') }}#organization",
            "name": "LimoSchedule",
            "url": "{{ url('/') }}",
            "logo": "{{ url('public/logo/logo-white.png') }}"
        },
        {
            "@@type": "WebSite",
            "@@id": "{{ url('/') }}#website",
            "name": "LimoSchedule",
            "url": "{{ url('/') }}",
            "publisher": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "FAQPage",
            "mainEntity": [
                { "@@type": "Question", "name": "Is LimoSchedule available for industries not listed here?", "acceptedAnswer": { "@@type": "Answer", "text": "Yes. The platform — a booking website, customer panel, driver panel and admin dashboard — is built to work for any passenger transportation business, not only the twelve industries listed here. If you don't see your exact category, the same platform still applies." } },
                { "@@type": "Question", "name": "Does each industry get different features, or is it the same platform?", "acceptedAnswer": { "@@type": "Answer", "text": "It's the same complete platform for every industry. Each solution page highlights the features most relevant to that type of business, but nothing is removed or restricted by industry." } }
            ]
        }
    ]
}
</script>
{{-- Per-solution Service schema now lives on each dedicated solution page. --}}
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Solutions', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-20 lg:pt-32 lg:pb-24 text-center">

        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">Solutions By Industry</span>
        </div>

        <h1 class="text-white text-4xl sm:text-5xl lg:text-[54px] font-black tracking-tight leading-[1.05] mb-6">
            Transportation Booking Solutions Built Around Your Business
        </h1>

        <p class="text-gray-400 text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto mb-9">
            Power your limo, taxi, chauffeur, corporate, wedding or event transportation business with a complete white-label booking platform.
        </p>

        <a href="#solutions-grid"
           class="btn-cta inline-flex items-center justify-center gap-2 bg-[#3B82F6] text-white font-bold px-8 py-4 rounded-xl text-[15px] border border-blue-500/30">
            <span>Find Your Solution</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
        </a>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     INTRO
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 lg:py-20 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
            One Platform. Twelve Ways to Use It.
        </h2>
        <p class="text-gray-400 text-[16px] leading-relaxed">
            LimoSchedule is built on the same complete <a href="{{ route('platform') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">booking platform</a> &mdash; a booking website, customer panel, driver panel and admin dashboard &mdash; adapted to how each type of transportation business actually operates. Find your industry below.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SOLUTIONS GRID — short index cards, each linking to its own page
═══════════════════════════════════════════════════════════════ -->
<section id="solutions-grid" class="relative py-16 lg:py-20 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
            @foreach($solutions as $slug => $solution)
                <a href="{{ route($slug) }}" class="feature-card section-fade block" style="transition-delay: {{ $loop->index * 0.03 }}s;">
                    @if($solution['image'])
                        <div style="margin: -28px -28px 20px -28px; border-bottom: 1px solid rgba(255,255,255,0.08);">
                            <img src="{{ asset($solution['image']) }}" alt="{{ $solution['image_alt'] }}" class="w-full aspect-[16/10] object-cover block" loading="lazy" decoding="async">
                        </div>
                    @else
                        <div class="feat-icon-wrap">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">{!! $solution['icon_svg'] !!}</svg>
                        </div>
                    @endif
                    <h3 class="text-white text-[17px] font-bold mb-1.5 leading-snug">{{ $solution['name'] }}</h3>
                    <p class="text-gray-400 text-[13px] leading-relaxed mb-4">{{ $solution['challenge'] }}</p>
                    <span class="inline-flex items-center gap-1.5 text-[13px] font-bold text-blue-400">
                        Learn more
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SOLUTIONS FAQ
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 lg:py-20 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-2xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.1] mb-8 text-white text-center">
            Solutions Questions
        </h2>
        <div class="flex flex-col gap-3">
            <div class="rounded-2xl p-5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[15px] mb-1.5">Is LimoSchedule available for industries not listed here?</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed">Yes. The platform &mdash; a booking website, customer panel, driver panel and admin dashboard &mdash; is built to work for any passenger transportation business, not only the twelve industries listed here. If you don't see your exact category, the same platform still applies.</p>
            </div>
            <div class="rounded-2xl p-5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[15px] mb-1.5">Does each industry get different features, or is it the same platform?</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed">It's the same complete platform for every industry. Each solution page highlights the features most relevant to that type of business, but nothing is removed or restricted by industry.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MORE TO EXPLORE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-500 text-[14px]">
            Not sure your business fits one of these categories? <a href="{{ route('features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Browse all features</a> or see <a href="{{ route('how-it-works') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">how LimoSchedule works</a> from setup to your first booking.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FINAL CTA
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303; padding: 100px 0 110px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.02) 1px, transparent 1px); background-size: 64px 64px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[450px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.14) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="font-black text-white leading-[1.1] tracking-tight mb-5" style="font-size: clamp(2.2rem, 5vw, 3.5rem);">
            Find the Right Booking Solution for Your Business
        </h2>
        <p class="text-gray-400 text-[15px] mb-9">
            One complete platform &middot; <a href="{{ route('pricing') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">$1,999 one-time payment</a> &middot; no monthly SaaS fee
        </p>

        <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule%20for%20my%20transportation%20business.%20Can%20I%20talk%20to%20an%20expert%3F" target="_blank" rel="noopener"
           class="btn-cta inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-9 py-4 rounded-xl text-[15.5px] border border-blue-500/30 mb-5">
            <span>Talk to an Expert</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <div class="text-[13px]">
            <span class="text-gray-500">Prefer to see it in action first?</span>
            <a href="{{ route('demo') }}" class="inline-flex items-center gap-1 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 ml-1">
                Explore the live demo
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <p class="text-gray-600 text-[12.5px] mt-10">
            <a href="{{ route('platform') }}" class="text-gray-500 hover:text-white transition-colors duration-200">See the full platform</a> &middot;
            <a href="{{ route('contact') }}" class="text-gray-500 hover:text-white transition-colors duration-200">Get started</a>
        </p>
    </div>
</section>

@endsection
