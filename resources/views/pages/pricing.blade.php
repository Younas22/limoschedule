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
            "@@type": "SoftwareApplication",
            "name": "LimoSchedule",
            "url": "{{ route('pricing') }}",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "Web",
            "description": "White-label transportation booking platform with a booking website, customer panel, driver panel and admin dashboard, available for a one-time payment.",
            "offers": {
                "@@type": "Offer",
                "price": "1999",
                "priceCurrency": "USD",
                "availability": "https://schema.org/InStock"
            },
            "publisher": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "FAQPage",
            "mainEntity": [
                { "@@type": "Question", "name": "Is LimoSchedule a monthly subscription?", "acceptedAnswer": { "@@type": "Answer", "text": "No. LimoSchedule is a one-time payment of $1,999 — there are no recurring subscription fees to use the platform." } },
                { "@@type": "Question", "name": "What exactly is included in the $1,999 price?", "acceptedAnswer": { "@@type": "Answer", "text": "Your one-time payment includes the complete white-label platform — a branded booking website, Customer Panel, Driver Panel and Admin Dashboard — configured and ready to launch." } },
                { "@@type": "Question", "name": "Are there any hidden costs or add-on fees?", "acceptedAnswer": { "@@type": "Answer", "text": "No. The $1,999 price covers the complete platform — no hidden costs, no surprise add-on fees for standard use." } },
                { "@@type": "Question", "name": "Do I pay more as my bookings grow?", "acceptedAnswer": { "@@type": "Answer", "text": "No. There are no limits on bookings — you won't be charged more as your business grows." } },
                { "@@type": "Question", "name": "How quickly can I launch after payment?", "acceptedAnswer": { "@@type": "Answer", "text": "Most businesses are configured and ready to launch in as little as 30 minutes once your branding and business settings are in place." } },
                { "@@type": "Question", "name": "What if my business has custom requirements?", "acceptedAnswer": { "@@type": "Answer", "text": "If you need custom integrations or a setup beyond the standard platform, our team can walk you through what's possible." } }
            ]
        }
    ]
}
</script>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Pricing', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-16 lg:pt-32 lg:pb-20 text-center">
        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">Pricing</span>
        </div>

        <h1 class="text-white text-4xl sm:text-5xl lg:text-[52px] font-black tracking-tight leading-[1.08] mb-6">
            One Platform. One Payment. No Monthly SaaS Fee.
        </h1>

        <p class="text-gray-400 text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto">
            Get a complete white-label transportation booking platform for a one-time payment.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MAIN PRICE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-8 lg:py-12 overflow-hidden" style="background: #030303;">
    <div class="relative z-10 max-w-2xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="relative rounded-[28px] p-9 sm:p-12" style="background: linear-gradient(180deg, rgba(59,130,246,0.06), rgba(255,255,255,0.02)); border: 1px solid rgba(59,130,246,0.3); box-shadow: 0 40px 100px rgba(59,130,246,0.14), 0 0 0 1px rgba(59,130,246,0.1);">

            <div class="text-center mb-9">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-400 mb-7" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.3);">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                    LimoSchedule Complete Platform
                </span>

                <div class="flex items-end justify-center gap-2.5 mb-2">
                    <span class="text-[64px] sm:text-[76px] font-black text-white leading-none">$1,999</span>
                </div>
                <div class="text-[14px] text-gray-400 font-semibold mb-1">One-Time Payment</div>
                <div class="text-[13px] text-gray-500">No monthly SaaS subscription.</div>
            </div>

            <div class="pt-8 mb-9" style="border-top: 1px solid rgba(255,255,255,0.08);">
                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-3.5">
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">Booking Website</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">Customer Panel</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">Driver Panel</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">Admin Dashboard</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">White-Label Branding</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">Multi-Language</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">Multi-Currency</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">Advanced Booking</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">Fare Calculator</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-300 text-[14px]">30-Minute Setup</span>
                    </li>
                </ul>
            </div>

            <a href="{{ route('contact') }}"
               class="btn-cta w-full inline-flex items-center justify-center gap-2 bg-[#3B82F6] text-white font-bold px-7 py-4 rounded-xl text-[15.5px] border border-blue-500/30">
                <span>Get Started</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     COMPARISON
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                A Different Ownership Model
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                Most limo dispatch software on the market is a monthly subscription &mdash; publicly listed pricing runs roughly $99&ndash;$349 per month, which totals <strong class="text-white font-semibold">$1,188&ndash;$4,188 in the first year alone</strong>. LimoSchedule is a single $1,999 payment, with no recurring cost after that.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="rounded-2xl p-7 sm:p-8" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <h3 class="text-gray-400 text-[13px] font-bold uppercase tracking-[0.1em] mb-5">Traditional SaaS</h3>
                <ul class="space-y-3.5">
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        <span class="text-gray-400 text-[14.5px]">Monthly subscription</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        <span class="text-gray-400 text-[14.5px]">Recurring fees</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        <span class="text-gray-400 text-[14.5px]">Platform dependency</span>
                    </li>
                </ul>
            </div>

            <div class="rounded-2xl p-7 sm:p-8" style="background: rgba(59,130,246,0.05); border: 1px solid rgba(59,130,246,0.3);">
                <h3 class="text-blue-400 text-[13px] font-bold uppercase tracking-[0.1em] mb-5">LimoSchedule</h3>
                <ul class="space-y-3.5">
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-200 text-[14.5px]">One-time payment</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-200 text-[14.5px]">Your brand</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-200 text-[14.5px]">Your platform</span>
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg class="flex-shrink-0" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-gray-200 text-[14.5px]">No monthly SaaS fee</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     WHAT'S INCLUDED
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-6 text-white">
            What You Actually Receive
        </h2>
        <p class="text-gray-400 text-[16px] leading-relaxed mb-3">
            Your one-time payment includes the complete LimoSchedule platform &mdash; a branded booking website, a customer panel, a driver panel and an admin dashboard &mdash; configured under your own brand and ready to launch.
        </p>
        <p class="text-gray-500 text-[14px]">
            For a full breakdown of every capability, see the <a href="{{ route('features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Features page</a>.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     PRICING FAQ
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center mb-14">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                Pricing Questions
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                Straight answers about how the one-time payment works.
            </p>
        </div>

        <div class="flex flex-col gap-3" id="faq-accordion">

            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">01</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Is LimoSchedule a monthly subscription?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">No. LimoSchedule is a one-time payment of $1,999 &mdash; there are no recurring subscription fees to use the platform.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">02</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">What exactly is included in the $1,999 price?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Your one-time payment includes the complete white-label platform &mdash; a branded booking website, Customer Panel, Driver Panel and Admin Dashboard &mdash; configured and ready to launch. See the <a href="{{ route('features') }}" class="text-blue-400 hover:text-blue-300 font-semibold">Features page</a> for the full list.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">03</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Are there any hidden costs or add-on fees?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">No. The $1,999 price covers the complete platform &mdash; no hidden costs, no surprise add-on fees for standard use.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">04</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Do I pay more as my bookings grow?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">No. There are no limits on bookings &mdash; you won&rsquo;t be charged more as your business grows.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">05</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">How quickly can I launch after payment?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Most businesses are configured and ready to launch in as little as 30 minutes once your branding and business settings are in place.</p>
                    </div>
                </div>
            </div>

            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">06</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">What if my business has custom requirements?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">If you need custom integrations or a setup beyond the standard platform, <a href="{{ route('contact') }}" class="text-blue-400 hover:text-blue-300 font-semibold">talk to our team</a> and we&rsquo;ll walk you through what&rsquo;s possible.</p>
                    </div>
                </div>
            </div>

        </div>

        <p class="text-center text-gray-500 text-[13px] mt-10">
            More questions? See the full <a href="{{ route('faq') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">FAQ page</a>.
        </p>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MORE TO EXPLORE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-500 text-[14px]">
            See the <a href="{{ route('platform') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">full platform</a> or find the <a href="{{ route('solutions') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">right solution</a> for your industry.
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
            Ready to Own Your Booking Platform?
        </h2>
        <p class="text-gray-400 text-[15px] mb-9">
            $1,999 one-time payment &middot; no monthly SaaS fee &middot; ready in 30 minutes
        </p>

        <a href="{{ route('contact') }}"
           class="btn-cta inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-9 py-4 rounded-xl text-[15.5px] border border-blue-500/30 mb-5">
            <span>Get Started</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <div class="text-[13px]">
            <span class="text-gray-500">Prefer to see it first?</span>
            <a href="{{ route('demo') }}" class="inline-flex items-center gap-1 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 ml-1">
                Explore the live demo
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
