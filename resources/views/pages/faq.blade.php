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
                {
                    "@@type": "Question",
                    "name": "What is included in LimoSchedule?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "A complete white-label platform: a branded booking website, a Customer Portal, a Driver Panel, and a full Admin Dashboard — all included in a single one-time license." }
                },
                {
                    "@@type": "Question",
                    "name": "Is LimoSchedule white-label?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "Yes. LimoSchedule is fully white-label — your logo, your brand colors, your domain. There's no LimoSchedule branding on the platform your customers see." }
                },
                {
                    "@@type": "Question",
                    "name": "How quickly can my platform be set up?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "Most businesses are fully configured and ready to launch in as little as 30 minutes once your branding and business settings are in place." }
                },
                {
                    "@@type": "Question",
                    "name": "Is this a monthly SaaS subscription?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "No. LimoSchedule is a one-time payment of $1,999 — there are no recurring subscription fees to use the platform." }
                },
                {
                    "@@type": "Question",
                    "name": "Does it support multiple languages?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "Yes. LimoSchedule includes multi-language support, so you can serve customers in the language they're most comfortable with." }
                },
                {
                    "@@type": "Question",
                    "name": "Does it support multiple currencies?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "Yes. You can accept and display pricing in multiple currencies to match how your customers actually pay." }
                },
                {
                    "@@type": "Question",
                    "name": "Does it include a booking website?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "Yes. Your license includes a complete, branded booking website where customers can search, book and manage their rides." }
                },
                {
                    "@@type": "Question",
                    "name": "Does it include customer and driver panels?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "Yes. LimoSchedule includes a dedicated Customer Portal for bookings and trip history, and a Driver Panel for assigned trips and trip details — alongside the Admin Dashboard." }
                },
                {
                    "@@type": "Question",
                    "name": "Can I customize my branding?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "Yes. Because LimoSchedule is white-label, you can fully customize your branding — logo, colors and domain — so the platform looks and feels like your own product." }
                },
                {
                    "@@type": "Question",
                    "name": "How does the setup process work?",
                    "acceptedAnswer": { "@@type": "Answer", "text": "We configure your branding, business settings, currency, language and platform details for you, so your complete platform is ready to launch without you having to build anything yourself." }
                }
            ]
        }
    ]
}
</script>
@endpush

@section('content')
<section id="faq" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'FAQ', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-16 lg:mb-20 section-fade">
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                Questions Before You Launch?
            </h1>
            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                Everything you need to know before getting your LimoSchedule platform.
            </p>
        </div>

        <!-- Accordion -->
        <div class="flex flex-col gap-3 section-fade" style="transition-delay: 0.1s;" id="faq-accordion">

            <!-- Q1 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">01</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">What is included in LimoSchedule?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">A complete white-label platform: a branded booking website, a Customer Portal, a Driver Panel, and a full Admin Dashboard &mdash; all included in a single one-time license.</p>
                    </div>
                </div>
            </div>

            <!-- Q2 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">02</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Is LimoSchedule white-label?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes. LimoSchedule is fully white-label &mdash; your logo, your brand colors, your domain. There&rsquo;s no LimoSchedule branding on the platform your customers see.</p>
                    </div>
                </div>
            </div>

            <!-- Q3 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">03</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">How quickly can my platform be set up?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Most businesses are fully configured and ready to launch in as little as 30 minutes once your branding and business settings are in place.</p>
                    </div>
                </div>
            </div>

            <!-- Q4 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">04</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Is this a monthly SaaS subscription?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">No. LimoSchedule is a <span class="text-white font-medium">one-time payment of $1,999</span> &mdash; there are no recurring subscription fees to use the platform.</p>
                    </div>
                </div>
            </div>

            <!-- Q5 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">05</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Does it support multiple languages?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes. LimoSchedule includes multi-language support, so you can serve customers in the language they&rsquo;re most comfortable with.</p>
                    </div>
                </div>
            </div>

            <!-- Q6 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">06</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Does it support multiple currencies?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes. You can accept and display pricing in multiple currencies to match how your customers actually pay.</p>
                    </div>
                </div>
            </div>

            <!-- Q7 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">07</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Does it include a booking website?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes. Your license includes a complete, branded booking website where customers can search, book and manage their rides.</p>
                    </div>
                </div>
            </div>

            <!-- Q8 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">08</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Does it include customer and driver panels?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes. LimoSchedule includes a dedicated Customer Portal for bookings and trip history, and a Driver Panel for assigned trips and trip details &mdash; alongside the Admin Dashboard.</p>
                    </div>
                </div>
            </div>

            <!-- Q9 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">09</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">Can I customize my branding?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">Yes. Because LimoSchedule is white-label, you can fully customize your branding &mdash; logo, colors and domain &mdash; so the platform looks and feels like your own product.</p>
                    </div>
                </div>
            </div>

            <!-- Q10 -->
            <div class="faq-item rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <button class="faq-trigger w-full flex items-center justify-between gap-4 px-6 py-5 text-left" aria-expanded="false">
                    <span class="flex items-center gap-4">
                        <span class="faq-num flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-blue-400" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.2);">10</span>
                        <span class="text-white font-semibold text-[15px] leading-snug">How does the setup process work?</span>
                    </span>
                    <span class="faq-chevron flex-shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-transform duration-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </span>
                </button>
                <div class="faq-body" style="max-height: 0; overflow: hidden; transition: max-height 0.38s cubic-bezier(0.4,0,0.2,1);">
                    <div class="px-6 pb-6 pl-[4.25rem]">
                        <p class="text-gray-400 text-[14px] leading-relaxed">We configure your branding, business settings, currency, language and platform details for you, so your complete platform is ready to launch without you having to build anything yourself.</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Still have questions -->
        <div class="mt-14 text-center section-fade" style="transition-delay: 0.22s;">
            <p class="text-gray-500 text-[13px] mb-5">Still have questions? We respond within a few hours.</p>
            <a href="{{ route('contact') }}" class="btn-cta inline-flex items-center gap-2.5 px-7 py-3.5 rounded-xl font-semibold text-[14px] text-white" style="background: #3B82F6;">
                <span>Talk to the team</span>
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>

    </div>
</section>
@endsection
