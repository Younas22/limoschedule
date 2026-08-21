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
        ['label' => 'How It Works', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-16 lg:pt-32 lg:pb-20 text-center">
        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">How It Works</span>
        </div>

        <h1 class="text-white text-4xl sm:text-5xl lg:text-[50px] font-black tracking-tight leading-[1.1] mb-6">
            Launch Your Transportation Booking Platform in Simple Steps
        </h1>

        <p class="text-gray-400 text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto">
            Get your LimoSchedule platform configured, branded and ready for your business without a long development cycle.
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     PROCESS
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                Four Steps From Sign-Up to Live Platform
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                No lengthy development cycle &mdash; your platform is configured and branded for your business, ready to launch.
            </p>
        </div>

        <div class="relative">
            <div class="hidden lg:block absolute top-9 left-[10%] right-[10%] h-[1.5px]" style="background: linear-gradient(90deg, rgba(59,130,246,0.15), rgba(59,130,246,0.7) 50%, rgba(59,130,246,0.15));"></div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-6">

                <div class="text-center">
                    <span class="relative z-10 w-[72px] h-[72px] mx-auto rounded-2xl flex items-center justify-center mb-5" style="background:#060606; border: 2px solid rgba(59,130,246,0.4); box-shadow: 0 0 16px rgba(59,130,246,0.2);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
                    </span>
                    <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-2">01 &mdash; Choose</div>
                    <h3 class="text-white font-bold text-[16px] mb-2">Choose</h3>
                    <p class="text-gray-500 text-[13.5px] leading-relaxed">Choose the LimoSchedule platform for your transportation business.</p>
                </div>

                <div class="text-center">
                    <span class="relative z-10 w-[72px] h-[72px] mx-auto rounded-2xl flex items-center justify-center mb-5" style="background:#060606; border: 2px solid rgba(59,130,246,0.5); box-shadow: 0 0 18px rgba(59,130,246,0.25);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                    </span>
                    <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-2">02 &mdash; Configure</div>
                    <h3 class="text-white font-bold text-[16px] mb-2">Configure</h3>
                    <p class="text-gray-500 text-[13.5px] leading-relaxed">Configure your business settings and booking requirements.</p>
                </div>

                <div class="text-center">
                    <span class="relative z-10 w-[72px] h-[72px] mx-auto rounded-2xl flex items-center justify-center mb-5" style="background:#060606; border: 2px solid rgba(59,130,246,0.6); box-shadow: 0 0 20px rgba(59,130,246,0.3);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    </span>
                    <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-2">03 &mdash; Brand</div>
                    <h3 class="text-white font-bold text-[16px] mb-2">Brand</h3>
                    <p class="text-gray-500 text-[13.5px] leading-relaxed">Apply your company branding and white-label identity.</p>
                </div>

                <div class="text-center">
                    <span class="relative z-10 w-[72px] h-[72px] mx-auto rounded-2xl flex items-center justify-center mb-5" style="background:#22c55e; box-shadow: 0 0 26px rgba(34,197,94,0.5);">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12l14 0"/><path d="M13 6l6 6-6 6"/></svg>
                    </span>
                    <div class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400 mb-2">04 &mdash; Launch</div>
                    <h3 class="text-white font-bold text-[16px] mb-2">Launch</h3>
                    <p class="text-gray-500 text-[13.5px] leading-relaxed">Get your booking platform ready to accept customers.</p>
                </div>

            </div>
        </div>

        <!-- Highlight -->
        <div class="mt-16 lg:mt-20 flex flex-col items-center gap-3 text-center">
            <div class="inline-flex items-center gap-2.5 px-5 py-3 rounded-xl" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <span class="text-[14px] font-bold text-white">Approximately 30-Minute Average Setup</span>
            </div>
            <p class="text-gray-500 text-[13px] max-w-lg">
                Most businesses are configured and ready to launch in about 30 minutes. Actual setup time can vary depending on your branding and configuration requirements.
            </p>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     AFTER LAUNCH
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center mb-16 lg:mb-20">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                What Happens After Launch
            </h2>
            <p class="text-gray-400 text-[16px] leading-relaxed">
                Once you&rsquo;re live, every booking moves through one connected workflow &mdash; automatically.
            </p>
        </div>

        <!-- Flow diagram -->
        <div class="flex flex-col items-center">

            <div class="flex flex-col items-center text-center">
                <span class="w-[64px] h-[64px] rounded-2xl flex items-center justify-center mb-3" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.4); box-shadow: 0 0 16px rgba(59,130,246,0.2);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </span>
                <h3 class="text-white font-bold text-[14px]">Customer</h3>
            </div>

            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" stroke="rgba(59,130,246,0.5)" stroke-width="2" stroke-linecap="round"><line x1="8" y1="0" x2="8" y2="22"/><polyline points="2 18 8 26 14 18"/></svg>

            <div class="flex flex-col items-center text-center">
                <span class="w-[64px] h-[64px] rounded-2xl flex items-center justify-center mb-3" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.5); box-shadow: 0 0 18px rgba(59,130,246,0.25);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20 15.3 15.3 0 010-20z"/></svg>
                </span>
                <h3 class="text-white font-bold text-[14px]">Booking</h3>
            </div>

            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" stroke="rgba(59,130,246,0.55)" stroke-width="2" stroke-linecap="round"><line x1="8" y1="0" x2="8" y2="22"/><polyline points="2 18 8 26 14 18"/></svg>

            <div class="flex flex-col items-center text-center">
                <span class="w-[64px] h-[64px] rounded-2xl flex items-center justify-center mb-3" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.6); box-shadow: 0 0 20px rgba(59,130,246,0.3);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                </span>
                <h3 class="text-white font-bold text-[14px]">Admin</h3>
            </div>

            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" stroke="rgba(59,130,246,0.65)" stroke-width="2" stroke-linecap="round"><line x1="8" y1="0" x2="8" y2="22"/><polyline points="2 18 8 26 14 18"/></svg>

            <div class="flex flex-col items-center text-center">
                <span class="w-[64px] h-[64px] rounded-2xl flex items-center justify-center mb-3" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.7); box-shadow: 0 0 22px rgba(59,130,246,0.35);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17h14M5 17a2 2 0 01-2-2v-2l2-5h14l2 5v2a2 2 0 01-2 2M5 17v2a1 1 0 001 1h1a1 1 0 001-1v-2m8 0v2a1 1 0 001 1h1a1 1 0 001-1v-2"/></svg>
                </span>
                <h3 class="text-white font-bold text-[14px]">Driver</h3>
            </div>

            <svg width="16" height="28" viewBox="0 0 16 28" fill="none" stroke="rgba(34,197,94,0.6)" stroke-width="2" stroke-linecap="round"><line x1="8" y1="0" x2="8" y2="22"/><polyline points="2 18 8 26 14 18"/></svg>

            <div class="flex flex-col items-center text-center">
                <span class="w-[64px] h-[64px] rounded-2xl flex items-center justify-center mb-3" style="background:#22c55e; box-shadow: 0 0 26px rgba(34,197,94,0.5);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                </span>
                <h3 class="text-white font-bold text-[14px]">Ride</h3>
            </div>

        </div>

        <p class="text-center text-gray-500 text-[14px] mt-14">
            See this workflow in detail on the <a href="{{ route('platform') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Platform page</a>.
        </p>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MORE TO EXPLORE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <p class="text-gray-500 text-[14px]">
            Explore all <a href="{{ route('features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">features</a>, check <a href="{{ route('pricing') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">pricing</a>, or <a href="{{ route('demo') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">explore the live demo</a>.
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
            Ready to Launch?
        </h2>
        <p class="text-gray-400 text-[15px] mb-9">
            One complete platform &middot; <a href="{{ route('pricing') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">$1,999 one-time payment</a> &middot; no monthly SaaS fee
        </p>

        <a href="{{ route('contact') }}"
           class="btn-cta inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-9 py-4 rounded-xl text-[15.5px] border border-blue-500/30 mb-5">
            <span>Get Started</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        <div class="text-[13px]">
            <span class="text-gray-500">Prefer WhatsApp?</span>
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20I%20talk%20to%20an%20expert%20about%20getting%20started%3F" target="_blank" rel="noopener"
               class="inline-flex items-center gap-1 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 ml-1">
                Talk to an Expert
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
