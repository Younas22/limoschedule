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
            "logo": "{{ url('public/logo/logo-white.png') }}",
            "contactPoint": {
                "@@type": "ContactPoint",
                "contactType": "customer service",
                "email": "support@limoschedule.com",
                "telephone": "+923460820722"
            }
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
                { "@@type": "Question", "name": "Is LimoSchedule an off-the-shelf product or a custom development project?", "acceptedAnswer": { "@@type": "Answer", "text": "LimoSchedule is an off-the-shelf, ready-to-configure platform — not a custom development project. You set up your branding and business settings; you don't build the software from scratch." } },
                { "@@type": "Question", "name": "Does LimoSchedule replace multiple separate tools?", "acceptedAnswer": { "@@type": "Answer", "text": "Yes. LimoSchedule replaces phone bookings, WhatsApp threads, manual dispatching and spreadsheets with one connected system covering the booking website, customer panel, driver panel and admin dashboard." } }
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
        ['label' => 'About', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-16 lg:pt-32 lg:pb-20 text-center">
        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">About LimoSchedule</span>
        </div>

        <h1 class="text-white text-4xl sm:text-5xl lg:text-[52px] font-black tracking-tight leading-[1.08] mb-6">
            Technology Built for Transportation Businesses
        </h1>

        <p class="text-gray-400 text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto">
            LimoSchedule provides transportation businesses with a complete white-label booking platform designed to simplify bookings, operations and customer management.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     OUR MISSION
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-14">
            <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-4">Our Mission</div>
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-6 text-white">
                Making Transportation Technology Simple to Launch and Own
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                LimoSchedule exists to give transportation businesses a straightforward path to running their operations on their own technology &mdash; without a long development project and without a recurring software bill standing between them and their own brand.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-3xl mx-auto text-left">
            <div class="flex items-start gap-3">
                <svg class="flex-shrink-0 mt-0.5" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                <p class="text-gray-300 text-[14.5px] leading-relaxed">Making transportation technology easier to launch, with a platform that&rsquo;s ready to configure rather than build from scratch.</p>
            </div>
            <div class="flex items-start gap-3">
                <svg class="flex-shrink-0 mt-0.5" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                <p class="text-gray-300 text-[14.5px] leading-relaxed">Reducing dependency on manual booking processes like phone calls, chat threads and spreadsheets.</p>
            </div>
            <div class="flex items-start gap-3">
                <svg class="flex-shrink-0 mt-0.5" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                <p class="text-gray-300 text-[14.5px] leading-relaxed">Providing an alternative to recurring SaaS costs, through a single one-time payment.</p>
            </div>
            <div class="flex items-start gap-3">
                <svg class="flex-shrink-0 mt-0.5" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                <p class="text-gray-300 text-[14.5px] leading-relaxed">Helping businesses operate under their own brand, with white-label ownership of the platform customers see.</p>
            </div>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     PROBLEM WE SOLVE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                The Problem We Solve
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                Most transportation businesses still run on tools that were never built for booking a ride.
            </p>
        </div>

        <div class="rounded-2xl overflow-hidden max-w-3xl mx-auto" style="border: 1px solid rgba(255,255,255,0.08);">
            <div class="hidden sm:grid grid-cols-2 gap-4 px-6 py-3.5 text-[11px] font-bold uppercase tracking-wide text-gray-500" style="background: rgba(255,255,255,0.03); border-bottom: 1px solid rgba(255,255,255,0.08);">
                <span>The Old Way</span>
                <span>With LimoSchedule</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 px-6 py-4 items-center" style="border-bottom: 1px solid rgba(255,255,255,0.06); background: rgba(255,255,255,0.015);">
                <span class="text-gray-500 text-[14px]">Phone bookings</span>
                <span class="text-gray-200 text-[14px]">A branded booking website that takes bookings automatically</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 px-6 py-4 items-center" style="border-bottom: 1px solid rgba(255,255,255,0.06);">
                <span class="text-gray-500 text-[14px]">WhatsApp bookings</span>
                <span class="text-gray-200 text-[14px]">Customers book directly on your platform instead of chat threads</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 px-6 py-4 items-center" style="border-bottom: 1px solid rgba(255,255,255,0.06); background: rgba(255,255,255,0.015);">
                <span class="text-gray-500 text-[14px]">Manual dispatching</span>
                <span class="text-gray-200 text-[14px]">The admin dashboard assigns bookings straight to the driver panel</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 px-6 py-4 items-center" style="border-bottom: 1px solid rgba(255,255,255,0.06);">
                <span class="text-gray-500 text-[14px]">Spreadsheets</span>
                <span class="text-gray-200 text-[14px]">Bookings, customers and drivers organized in one system</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 px-6 py-4 items-center" style="border-bottom: 1px solid rgba(255,255,255,0.06); background: rgba(255,255,255,0.015);">
                <span class="text-gray-500 text-[14px]">Expensive custom development</span>
                <span class="text-gray-200 text-[14px]">A ready-built, complete platform &mdash; no development project required</span>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-4 px-6 py-4 items-center">
                <span class="text-gray-500 text-[14px]">Recurring SaaS fees</span>
                <span class="text-gray-200 text-[14px]">One one-time payment &mdash; no monthly subscription</span>
            </div>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     WHAT WE PROVIDE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-5xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                What We Provide
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                One complete platform, covering every part of a transportation business&rsquo;s booking operation.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="rounded-xl p-5 text-center" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <h3 class="text-white text-[14.5px] font-bold">Booking Website</h3>
            </div>
            <div class="rounded-xl p-5 text-center" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <h3 class="text-white text-[14.5px] font-bold">Customer Panel</h3>
            </div>
            <div class="rounded-xl p-5 text-center" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <h3 class="text-white text-[14.5px] font-bold">Driver Panel</h3>
            </div>
            <div class="rounded-xl p-5 text-center" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <h3 class="text-white text-[14.5px] font-bold">Admin Dashboard</h3>
            </div>
            <div class="rounded-xl p-5 text-center" style="background: rgba(59,130,246,0.06); border: 1px solid rgba(59,130,246,0.25);">
                <h3 class="text-blue-300 text-[14.5px] font-bold">White-Label Platform</h3>
            </div>
        </div>

        <p class="text-center text-gray-500 text-[14px] mt-10">
            See the full platform in detail on the <a href="{{ route('platform') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Platform page</a>.
        </p>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     WHY LIMOSCHEDULE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.07) 0%, transparent 68%);"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                Why LimoSchedule
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="text-center">
                <span class="w-[56px] h-[56px] mx-auto rounded-2xl flex items-center justify-center mb-4" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                </span>
                <h3 class="text-white font-bold text-[15px] mb-1.5">Complete Platform</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed">Website, customer, driver and admin &mdash; in one system.</p>
            </div>
            <div class="text-center">
                <span class="w-[56px] h-[56px] mx-auto rounded-2xl flex items-center justify-center mb-4" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                </span>
                <h3 class="text-white font-bold text-[15px] mb-1.5">One-Time Payment</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed">No recurring subscription to keep using the platform.</p>
            </div>
            <div class="text-center">
                <span class="w-[56px] h-[56px] mx-auto rounded-2xl flex items-center justify-center mb-4" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                </span>
                <h3 class="text-white font-bold text-[15px] mb-1.5">White-Label</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed">Your logo, your colors, your domain &mdash; your brand.</p>
            </div>
            <div class="text-center">
                <span class="w-[56px] h-[56px] mx-auto rounded-2xl flex items-center justify-center mb-4" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </span>
                <h3 class="text-white font-bold text-[15px] mb-1.5">Fast Setup</h3>
                <p class="text-gray-500 text-[13px] leading-relaxed">Configured and branded in about 30 minutes on average.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     ABOUT FAQ
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-2xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-8 text-white text-center">
            Common Questions
        </h2>
        <div class="flex flex-col gap-3">
            <div class="rounded-2xl p-5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[15px] mb-1.5">Is LimoSchedule an off-the-shelf product or a custom development project?</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed">LimoSchedule is an off-the-shelf, ready-to-configure platform &mdash; not a custom development project. You set up your branding and business settings; you don't build the software from scratch.</p>
            </div>
            <div class="rounded-2xl p-5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[15px] mb-1.5">Does LimoSchedule replace multiple separate tools?</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed">Yes. LimoSchedule replaces phone bookings, WhatsApp threads, manual dispatching and spreadsheets with one connected system covering the booking website, customer panel, driver panel and admin dashboard.</p>
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
            Find your <a href="{{ route('solutions') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">industry solution</a>, check <a href="{{ route('pricing') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">pricing</a>, or <a href="{{ route('demo') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">see a live demo</a>.
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
        <h2 class="font-black text-white leading-[1.1] tracking-tight mb-9" style="font-size: clamp(2.2rem, 5vw, 3.5rem);">
            Let&rsquo;s Build a Better Booking Experience for Your Business.
        </h2>

        <a href="https://wa.me/923460820722?text=Hi%2C%20I%27d%20like%20to%20talk%20to%20an%20expert%20about%20LimoSchedule%20for%20my%20business." target="_blank" rel="noopener"
           class="btn-cta inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-9 py-4 rounded-xl text-[15.5px] border border-blue-500/30 mb-5">
            <span>Talk to an Expert</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <p class="text-gray-600 text-[12.5px] mt-8">
            <a href="{{ route('contact') }}" class="text-gray-500 hover:text-white transition-colors duration-200">Or get started via the contact form</a>
        </p>
    </div>
</section>

@endsection
