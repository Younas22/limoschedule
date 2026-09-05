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
            "@@type": "SoftwareApplication",
            "name": "LimoSchedule",
            "url": "{{ url('/') }}",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "Web",
            "description": "White-label transportation booking software with a booking website, customer panel, driver panel and admin dashboard.",
            "offers": {
                "@@type": "Offer",
                "price": "1999",
                "priceCurrency": "USD",
                "availability": "https://schema.org/InStock"
            },
            "publisher": { "@@id": "{{ url('/') }}#organization" }
        }
    ]
}
</script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <style>
        /* Select2 light theme (the only Select2 field on this page lives in the
           now-white #contact form, so this override is styled light for it) */
        .select2-container--default .select2-selection--single {
            background: #F8FAFC !important;
            border: 1px solid rgba(15,23,42,0.12) !important;
            border-radius: 10px !important;
            height: 44px !important;
            display: flex !important;
            align-items: center !important;
            color: #0F172A !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #0F172A !important;
            line-height: 44px !important;
            padding-left: 14px !important;
            font-size: 13.5px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #94A3B8 !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px !important;
            right: 10px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #64748B transparent transparent transparent !important;
        }
        .select2-dropdown {
            background: #ffffff !important;
            border: 1px solid rgba(15,23,42,0.12) !important;
            border-radius: 10px !important;
            box-shadow: 0 20px 50px rgba(15,23,42,0.12) !important;
        }
        .select2-container--default .select2-search--dropdown .select2-search__field {
            background: #F8FAFC !important;
            border: 1px solid rgba(15,23,42,0.12) !important;
            border-radius: 6px !important;
            color: #0F172A !important;
            font-size: 13px !important;
            padding: 6px 10px !important;
        }
        .select2-container--default .select2-results__option {
            color: #334155 !important;
            font-size: 13.5px !important;
            padding: 8px 14px !important;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background: rgba(37,99,235,0.1) !important;
            color: #1D4ED8 !important;
        }
        .select2-container--default .select2-results__option[aria-selected=true] {
            background: rgba(37,99,235,0.08) !important;
            color: #2563EB !important;
        }
        .select2-container { width: 100% !important; }
        .select2-container--open .select2-selection--single {
            border-color: rgba(37,99,235,0.5) !important;
        }

        /* The fixed navbar is semi-transparent — it composites against <body>'s own
           background in the strip above the in-flow page content. Body is dark
           site-wide (for the other, dark-themed pages), which showed as an unwanted
           dark sliver under the navbar now that this page's hero is white. Scope the
           fix to just this page. */
        html:has(#hero) body { background: #ffffff; }

        /* #contact form fields — the shared .contact-*/.budget-radio-* classes are
           styled dark (used by the standalone /contact and /careers pages), but this
           section is now pure white, so override them scoped to #contact only. */
        #contact .contact-fieldset {
            border: 1px solid rgba(15,23,42,0.08);
            background: #F8FAFC;
        }
        #contact .contact-legend { color: #2563EB; }
        #contact .contact-label { color: #64748B; }
        #contact .contact-input {
            background-color: #ffffff;
            border: 1px solid rgba(15,23,42,0.12);
            color: #0F172A;
        }
        #contact .contact-input::placeholder { color: #94A3B8; }
        #contact .contact-input:hover { border-color: rgba(15,23,42,0.22); }
        #contact .contact-input:focus {
            border-color: rgba(37,99,235,0.5);
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
        }
        #contact select.contact-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2364748B' stroke-width='2' stroke-linecap='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 13px center;
            height: 44px;
            line-height: 44px;
            padding-top: 0;
            padding-bottom: 0;
            -moz-appearance: none;
            color: #0F172A;
        }
        #contact select.contact-select option { color: #0F172A; background: #ffffff; }
        #contact select.contact-select option[disabled] { color: #94A3B8; }
        #contact .budget-radio-card {
            border: 1px solid rgba(15,23,42,0.12);
            background: #ffffff;
        }
        #contact .budget-radio-card:hover { border-color: rgba(15,23,42,0.25); }
        #contact .budget-radio-card.is-checked { border-color: rgba(37,99,235,0.5); background: rgba(37,99,235,0.05); }
        #contact .budget-radio-dot { border: 1.5px solid rgba(15,23,42,0.2); }
        #contact .budget-radio-label { color: #475569; }
        #contact .budget-radio-card.is-checked .budget-radio-label { color: #0F172A; }
    </style>
@endpush

@section('content')
<!-- â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
     HERO &mdash; PLACEHOLDER (future section prompt)
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• -->
<section id="hero" class="relative overflow-hidden" style="background: #FFFFFF; height: 92vh; min-height: 680px; max-height: 900px;">

    <!-- Photographic centerpiece: complete luxury chauffeur fleet lineup -->
    <img src="{{ asset('public/assets/images/hero/hero-fleet-lineup.jpg') }}?v={{ filemtime(public_path('assets/images/hero/hero-fleet-lineup.jpg')) }}"
         alt="LimoSchedule complete luxury chauffeur fleet — limousine, sedan, SUV, executive sedan, stretch limo and passenger van"
         width="1672" height="941"
         class="absolute inset-0 w-full h-full object-cover"
         style="object-position: center;"
         loading="eager" fetchpriority="high" decoding="sync">

    <div class="relative z-10 h-full max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="h-full flex flex-col justify-center pb-48 sm:pb-40">

            <div class="max-w-7xl text-center mx-auto">

                <!-- Eyebrow -->
                <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full section-fade"
                     style="background: rgba(37,99,235,0.08); border: 1px solid rgba(37,99,235,0.24);">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
                    <span class="text-[11px] font-bold tracking-[0.16em] uppercase" style="color:#1D4ED8;">White-Label Chauffeur Technology</span>
                </div>

                <!-- Headline -->
                <h1 class="font-black tracking-tight leading-[1.15] mb-5 section-fade whitespace-normal" style="transition-delay: 0.05s; color:#0F172A; font-size: clamp(1.875rem, 1rem + 4vw, 3.5rem); font-weight: 900;">
                    <span class="block">Limo, Taxi &amp; Chauffeur <span style="color:#2563EB;">Booking Software</span></span><span class="block">White Label, One-Time Investment</span>
                </h1>

                <!-- Supporting copy -->
                <p class="text-[14px] sm:text-[15.5px] leading-relaxed mb-8 max-w-5xl mx-auto section-fade whitespace-normal" style="transition-delay: 0.1s; color:#475569;">
                    <span class="block">Launch your own limo, taxi or chauffeur business with a complete white-label booking platform &mdash;</span><span class="block">Website, Customer, Driver &amp; Admin panels, ready in 30 minutes with a one-time payment and no monthly fees.</span>
                </p>

                <!-- CTA row -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-3 mb-6 section-fade" style="transition-delay: 0.15s;">
                    <a href="{{ route('contact') }}"
                       class="btn-cta btn-primary w-full sm:w-auto"
                       style="padding: 14px 28px; font-size: 14.5px;">
                        <span>Get Started Today</span>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule%27s%20white-label%20chauffeur%20platform.%20Can%20I%20talk%20to%20an%20expert%3F" target="_blank" rel="noopener"
                       class="btn-outline-light w-full sm:w-auto"
                       style="padding: 14px 28px; font-size: 14.5px;">
                        <span>Talk to an Expert</span>
                    </a>
                </div>

                <!-- Trust indicators -->
                <div class="flex flex-wrap items-center justify-center gap-x-5 gap-y-2 section-fade" style="transition-delay: 0.2s;">
                    @foreach(['One-Time Payment','White-Label','Stripe & PayPal Payments','Google Maps Integration','Browser Push Notifications','30-Minute Setup'] as $point)
                    <span class="inline-flex items-center gap-1.5 text-[12.5px] font-medium" style="color:#334155;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        {{ $point }}
                    </span>
                    @endforeach
                </div>

            </div>

        </div>
    </div>

    <!-- Bottom trust bar -->
    <div class="absolute bottom-0 inset-x-0 z-10" style="background: rgba(255,255,255,0.88); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border-top: 1px solid rgba(15,23,42,0.08);">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-3.5 flex flex-col lg:flex-row items-center justify-center lg:justify-between gap-2.5 lg:gap-6 text-center lg:text-left">
            <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-3.5">
                <span class="text-[10.5px] font-bold tracking-[0.14em] uppercase" style="color:#2563EB;">Complete Platform</span>
                <span class="hidden sm:block w-px h-3" style="background: rgba(15,23,42,0.12);"></span>
                <span class="text-[12.5px]" style="color:#334155;">Website &middot; Customer &middot; Driver &middot; Admin</span>
            </div>
            <span class="hidden lg:block w-px h-3" style="background: rgba(15,23,42,0.12);"></span>
            <span class="text-[11.5px] tracking-wide" style="color:#64748B;">Multi-Language &middot; Multi-Currency &middot; Advanced Booking &middot; Fare Calculator &middot; Mobile Responsive</span>
        </div>
    </div>

</section>


<!-- ═══════════════════════════════════════════════════════════════
     SECTION — PLATFORM MODULES (Built for the Way Transportation Businesses Operate)
═══════════════════════════════════════════════════════════════ -->
<section id="platform-modules" class="relative py-24 lg:py-32 overflow-hidden" style="background: #0A0A0A;">

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[400px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.09) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">One Platform, Four Experiences</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                Built for the Way Transportation Businesses Operate
            </h2>
            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                A public booking website, a customer panel, a driver panel and an admin panel &mdash; four connected experiences working together as one complete platform.
            </p>
        </div>

        <!-- Single-row 4-up module grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-6">

            <!-- Public Website -->
            <div class="feature-card section-fade" style="transition-delay: 0.05s">
                <div style="margin: -28px -28px 20px -28px; border-bottom: 1px solid rgba(255,255,255,0.08); background-color: white;">
                    <img src="{{ asset('public/assets/images/home-showcase/showcase-website.png') }}" alt="LimoSchedule booking website shown on a laptop" class="w-full h-auto block" loading="lazy" decoding="async">
                </div>
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
                </div>
                <h3 class="text-white text-[19px] font-bold mb-2 leading-snug">Public Website</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed mb-6 max-w-md">
                    Showcase your fleet, accept guest bookings and calculate live fares &mdash; a complete booking website built to turn visitors into customers.
                </p>
                <a href="{{ route('website-features') }}" class="inline-flex items-center gap-2 text-[13.5px] font-bold text-blue-400 hover:text-blue-300 transition-colors duration-200">
                    View Website Features
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Customer Panel -->
            <div class="feature-card section-fade" style="transition-delay: 0.1s">
                <div style="margin: -28px -28px 20px -28px; border-bottom: 1px solid rgba(255,255,255,0.08); background-color: white;">
                    <img src="{{ asset('public/assets/images/home-showcase/showcase-customer.png') }}" alt="LimoSchedule customer panel dashboard shown on a laptop" class="w-full h-auto block" loading="lazy" decoding="async">
                </div>
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h3 class="text-white text-[19px] font-bold mb-2 leading-snug">Customer Panel</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed mb-6 max-w-md">
                    A self-service dashboard where customers book rides, track drivers, manage payments and access invoices &mdash; from any device.
                </p>
                <a href="{{ route('customer-panel-features') }}" class="inline-flex items-center gap-2 text-[13.5px] font-bold text-blue-400 hover:text-blue-300 transition-colors duration-200">
                    View Customer Panel
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Driver Panel -->
            <div class="feature-card section-fade" style="transition-delay: 0.15s">
                <div style="margin: -28px -28px 20px -28px; border-bottom: 1px solid rgba(255,255,255,0.08);  background-color: white;">
                    <img src="{{ asset('public/assets/images/home-showcase/showcase-driver.png') }}" alt="LimoSchedule driver panel dashboard shown on a laptop" class="w-full h-auto block" loading="lazy" decoding="async">
                </div>
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17h14M5 17a2 2 0 01-2-2v-2l2-5h14l2 5v2a2 2 0 01-2 2M5 17v2a1 1 0 001 1h1a1 1 0 001-1v-2m8 0v2a1 1 0 001 1h1a1 1 0 001-1v-2"/></svg>
                </div>
                <h3 class="text-white text-[19px] font-bold mb-2 leading-snug">Driver Panel</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed mb-6 max-w-md">
                    A focused workspace for drivers to manage assigned rides, track trip progress, monitor earnings and stay connected.
                </p>
                <a href="{{ route('driver-panel-features') }}" class="inline-flex items-center gap-2 text-[13.5px] font-bold text-blue-400 hover:text-blue-300 transition-colors duration-200">
                    View Driver Panel
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Admin Panel -->
            <div class="feature-card section-fade" style="transition-delay: 0.2s">
                <div style="margin: -28px -28px 20px -28px; border-bottom: 1px solid rgba(255,255,255,0.08); background-color: white;">
                    <img src="{{ asset('public/assets/images/home-showcase/showcase-admin.png') }}" alt="LimoSchedule admin panel dashboard shown on a laptop" class="w-full h-auto block" loading="lazy" decoding="async">
                </div>
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                </div>
                <h3 class="text-white text-[19px] font-bold mb-2 leading-snug">Admin Panel</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed mb-6 max-w-md">
                    Complete operational control &mdash; bookings, fleet, pricing, payments, reports and system settings from one dashboard.
                </p>
                <a href="{{ route('admin-panel-features') }}" class="inline-flex items-center gap-2 text-[13.5px] font-bold text-blue-400 hover:text-blue-300 transition-colors duration-200">
                    View Admin Panel
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SECTION — INTEGRATIONS TRUST STRIP (real, built-in integrations —
     a truthful proof point, not a fabricated testimonial section)
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden section-fade" style="background: #060606; border-top: 1px solid rgba(255,255,255,0.05); border-bottom: 1px solid rgba(255,255,255,0.05);">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-7">
        <div class="flex flex-wrap items-center justify-center gap-x-10 gap-y-4">
            <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-gray-500 mr-1">Built-In &amp; Ready</span>
            @foreach([
                'Stripe &amp; PayPal Payments',
                'Google Maps Integration',
                'Browser Push Notifications',
                'Multi-Language',
                'Multi-Currency',
            ] as $integration)
                <span class="inline-flex items-center gap-2 text-[13.5px] font-medium text-gray-300">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                    {!! $integration !!}
                </span>
            @endforeach
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SECTION &mdash; PLATFORM OVERVIEW (One Complete Platform)
═══════════════════════════════════════════════════════════════ -->
<section id="launch-process" class="relative py-24 lg:py-32 overflow-hidden" style="background: #0A0A0A;">

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.018) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.018) 1px, transparent 1px); background-size: 60px 60px;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[420px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.06) 0%, transparent 68%);"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-20 lg:mb-24 section-fade">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] font-bold tracking-[0.1em] uppercase mb-5" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25); color: #3B82F6;">
                <svg width="8" height="8" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="6"/></svg>
                Done-For-You Launch
            </div>
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                From Setup to Your First Booking &mdash; Fast.
            </h2>
            <p class="text-[15px] sm:text-[15.5px] text-gray-400 leading-relaxed max-w-xl mx-auto">
                We handle the setup so you can focus on running your business.
            </p>
        </div>

        <!-- Step number timeline -->
        <div class="relative mb-10 lg:mb-14">
            <div class="hidden lg:block absolute top-1/2 left-[16.6%] right-[16.6%] h-[1.5px] -translate-y-1/2 pointer-events-none" style="background: linear-gradient(90deg, rgba(59,130,246,0.12), rgba(59,130,246,0.9));"></div>
            <div class="relative grid grid-cols-3 gap-5 lg:gap-7">
                <div class="flex justify-center">
                    <span class="relative z-10 w-11 h-11 rounded-full flex items-center justify-center text-[13px] font-black text-white flex-shrink-0" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.4); box-shadow: 0 0 14px rgba(59,130,246,0.18);">01</span>
                </div>
                <div class="flex justify-center">
                    <span class="relative z-10 w-11 h-11 rounded-full flex items-center justify-center text-[13px] font-black text-white flex-shrink-0" style="background:#0A0A0A; border: 2px solid rgba(59,130,246,0.65); box-shadow: 0 0 20px rgba(59,130,246,0.3);">02</span>
                </div>
                <div class="flex justify-center">
                    <span class="relative z-10 w-11 h-11 rounded-full flex items-center justify-center text-[13px] font-black text-white flex-shrink-0" style="background:#3B82F6; border: 2px solid #60a5fa; box-shadow: 0 0 28px rgba(59,130,246,0.55);">03</span>
                </div>
            </div>
        </div>

        <!-- Steps -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-7">

            <!-- ═══ STEP 1 — Choose Your Setup ═══ -->
            <div class="section-fade" style="transition-delay: 0.06s;">
                <!-- Branding config preview -->
                <div class="rounded-xl p-4" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(59,130,246,0.16);">
                    <div class="flex items-center gap-2.5 mb-3.5">
                        <span class="w-9 h-9 rounded-lg flex items-center justify-center text-[13px] font-black text-white flex-shrink-0" style="background: linear-gradient(135deg, #3B82F6, #1d4ed8);">Y</span>
                        <div>
                            <div class="text-[12px] font-bold text-white leading-tight">Your Brand</div>
                            <div class="text-[9px] text-gray-500">Logo &amp; identity</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-3.5">
                        <span class="w-5 h-5 rounded-full ring-2 ring-white/40" style="background:#3B82F6;"></span>
                        <span class="w-5 h-5 rounded-full" style="background:#0A0A0A; border:1px solid rgba(255,255,255,0.15);"></span>
                        <span class="w-5 h-5 rounded-full" style="background:#60a5fa;"></span>
                        <span class="w-5 h-5 rounded-full" style="background:#1d4ed8;"></span>
                        <span class="text-[9px] text-gray-500 ml-1">Brand colors</span>
                    </div>
                    <div class="flex items-center gap-2 rounded-lg px-3 py-2" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20 15.3 15.3 0 010-20z"/></svg>
                        <span class="text-[10px] text-gray-400">yourcompany.com</span>
                    </div>
                </div>
                <div class="mt-5 text-center lg:text-left">
                    <div class="text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-500 mb-2">Step 01 &mdash; Choose Your Setup</div>
                    <h3 class="text-[19px] font-bold text-white leading-tight">Make It Yours</h3>
                </div>
            </div><!-- /step 1 -->

            <!-- ═══ STEP 2 — We Set It Up ═══ -->
            <div class="section-fade" style="transition-delay: 0.16s;">
                <!-- Four-module build preview -->
                <div class="rounded-xl p-4" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(59,130,246,0.16);">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="rounded-lg p-2.5 text-center" style="background: rgba(59,130,246,0.06); border:1px solid rgba(59,130,246,0.18);">
                            <svg class="mx-auto" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20 15.3 15.3 0 010-20z"/></svg>
                            <div class="text-[9.5px] font-semibold text-gray-300 mt-1.5">Website</div>
                        </div>
                        <div class="rounded-lg p-2.5 text-center" style="background: rgba(59,130,246,0.06); border:1px solid rgba(59,130,246,0.18);">
                            <svg class="mx-auto" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <div class="text-[9.5px] font-semibold text-gray-300 mt-1.5">Customer</div>
                        </div>
                        <div class="rounded-lg p-2.5 text-center" style="background: rgba(59,130,246,0.06); border:1px solid rgba(59,130,246,0.18);">
                            <svg class="mx-auto" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17h14M5 17a2 2 0 01-2-2v-2l2-5h14l2 5v2a2 2 0 01-2 2M5 17v2a1 1 0 001 1h1a1 1 0 001-1v-2m8 0v2a1 1 0 001 1h1a1 1 0 001-1v-2"/></svg>
                            <div class="text-[9.5px] font-semibold text-gray-300 mt-1.5">Driver</div>
                        </div>
                        <div class="rounded-lg p-2.5 text-center" style="background: rgba(59,130,246,0.06); border:1px solid rgba(59,130,246,0.18);">
                            <svg class="mx-auto" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                            <div class="text-[9.5px] font-semibold text-gray-300 mt-1.5">Admin</div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-center lg:text-left">
                    <div class="text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-500 mb-2">Step 02 &mdash; We Set It Up</div>
                    <h3 class="text-[19px] font-bold text-white leading-tight">We Handle the Setup</h3>
                </div>
            </div><!-- /step 2 -->

            <!-- ═══ STEP 3 — Start Taking Bookings ═══ -->
            <div class="section-fade" style="transition-delay: 0.26s;">
                <!-- Live booking confirmation preview -->
                <div class="rounded-xl p-4" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(34,197,94,0.22);">
                    <div class="flex items-center gap-2.5 mb-3">
                        <span class="w-9 h-9 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(34,197,94,0.15); border:1px solid rgba(34,197,94,0.4); box-shadow: 0 0 16px rgba(34,197,94,0.25);">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        </span>
                        <div>
                            <div class="text-[12px] font-bold text-white leading-tight">Booking Confirmed</div>
                            <div class="text-[9px] text-gray-500">#LS-1001</div>
                        </div>
                    </div>
                    <div class="text-[10px] text-gray-400 leading-snug mb-2">JFK Airport &rarr; Manhattan, NY</div>
                    <div class="flex items-center justify-between">
                        <span class="text-[9.5px] text-gray-500">Executive Sedan</span>
                        <span class="text-[13px] font-bold text-white">$120.00</span>
                    </div>
                </div>
                <div class="mt-5 text-center lg:text-left">
                    <div class="text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-500 mb-2">Step 03 &mdash; Start Taking Bookings</div>
                    <h3 class="text-[19px] font-bold text-white leading-tight">Go Live &amp; Take Bookings</h3>
                </div>
            </div><!-- /step 3 -->

        </div>

        <!-- Highlight callout -->
        <div class="mt-16 lg:mt-20 relative rounded-2xl overflow-hidden text-center px-8 py-12 sm:py-14 section-fade" style="background: rgba(59,130,246,0.05); border: 1px solid rgba(59,130,246,0.28);">
            <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.2) 0%, transparent 70%);"></div>
            <div class="relative z-10">
                <svg class="mx-auto mb-4" width="18" height="18" viewBox="0 0 24 24" fill="#3B82F6"><path d="M13 2L3 14h7l-1 8 11-14h-7l1-6z"/></svg>
                <div class="text-[24px] sm:text-[32px] lg:text-[38px] font-black uppercase tracking-tight leading-tight mb-3" style="background: linear-gradient(135deg, #ffffff 20%, #3B82F6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    Ready in as Little as 30 Minutes
                </div>
                <p class="text-gray-400 text-[15px] sm:text-[16px]">No lengthy development process. No complicated setup.</p>
            </div>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SECTION — CAPABILITIES (Premium asymmetric feature grid)
═══════════════════════════════════════════════════════════════ -->
<section id="capabilities" class="relative py-24 lg:py-32 overflow-hidden" style="background: #060606;">

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[340px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.09) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">Complete Feature Set</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                One Platform. Every Daily Operation Covered.
            </h2>
            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                Everything your team needs to manage bookings, customers, drivers and daily operations from one platform.
            </p>
        </div>

        <!-- Asymmetric feature grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 lg:gap-5">

            <!-- ═══ LARGE 1: Advanced Booking ═══ -->
            <div class="feature-card featured section-fade lg:col-span-7" style="transition-delay: 0.05s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
                <h3 class="text-white text-[19px] font-bold mb-2 leading-snug">Advanced Booking</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed mb-5 max-w-md">
                    Create and manage complex transportation bookings with an intuitive booking experience.
                </p>
                <!-- UI snippet: booking form -->
                <div class="rounded-lg p-3.5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                    <div class="grid grid-cols-2 gap-2 mb-2">
                        <div class="flex items-center gap-1.5 rounded-md px-2.5 py-2 text-[10.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2"><path d="M12 21s-7-6.5-7-11a7 7 0 0114 0c0 4.5-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>
                            JFK Airport
                        </div>
                        <div class="flex items-center gap-1.5 rounded-md px-2.5 py-2 text-[10.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2"><path d="M12 21s-7-6.5-7-11a7 7 0 0114 0c0 4.5-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>
                            Manhattan, NY
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2 mb-2.5">
                        <div class="rounded-md px-2 py-1.5 text-[9.5px] text-gray-500 text-center" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">May 15, 10:30 AM</div>
                        <div class="rounded-md px-2 py-1.5 text-[9.5px] text-gray-500 text-center" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">Executive Sedan</div>
                        <div class="rounded-md px-2 py-1.5 text-[9.5px] text-gray-500 text-center" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">2 Passengers</div>
                    </div>
                    <div class="flex items-center justify-between rounded-md px-3 py-2" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                        <span class="text-[10.5px] text-gray-400">Estimated Fare</span>
                        <span class="text-[15px] font-bold text-white">$120.00</span>
                    </div>
                </div>
            </div>

            <!-- ═══ LARGE 2: Fare Calculator ═══ -->
            <div class="feature-card featured section-fade lg:col-span-5" style="transition-delay: 0.1s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2"/><line x1="8" y1="7" x2="16" y2="7"/><line x1="8" y1="11" x2="10" y2="11"/><line x1="13" y1="11" x2="15" y2="11"/><line x1="8" y1="15" x2="10" y2="15"/><line x1="13" y1="15" x2="15" y2="15"/></svg>
                </div>
                <h3 class="text-white text-[19px] font-bold mb-2 leading-snug">Fare Calculator</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed mb-5">
                    Calculate trip pricing quickly based on your configured business rules.
                </p>
                <!-- UI snippet: fare breakdown -->
                <div class="rounded-lg p-3.5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                    <div class="flex items-center justify-between text-[11px] text-gray-500 mb-2"><span>Base Fare</span><span class="text-gray-300">$45.00</span></div>
                    <div class="flex items-center justify-between text-[11px] text-gray-500 mb-2"><span>Distance (12.4 mi)</span><span class="text-gray-300">$38.60</span></div>
                    <div class="flex items-center justify-between text-[11px] text-gray-500 mb-3"><span>Peak Time Surcharge</span><span class="text-gray-300">$12.00</span></div>
                    <div class="pt-3 flex items-center justify-between" style="border-top: 1px solid rgba(255,255,255,0.08);">
                        <span class="text-[12px] font-semibold text-white">Total Fare</span>
                        <span class="text-[18px] font-black text-blue-400">$95.60</span>
                    </div>
                </div>
            </div>

            <!-- ═══ MEDIUM 1: Booking Management ═══ -->
            <div class="feature-card section-fade lg:col-span-4" style="transition-delay: 0.15s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Booking Management</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed mb-4">
                    Manage your complete booking workflow from the admin platform.
                </p>
                <!-- UI snippet: mini booking rows -->
                <div class="rounded-lg overflow-hidden" style="border: 1px solid rgba(255,255,255,0.08);">
                    <div class="flex items-center justify-between px-3 py-2 text-[10px]" style="background: rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.06);">
                        <span class="text-gray-400">#LS-7842</span>
                        <span class="px-1.5 py-0.5 rounded text-[8px] font-semibold" style="background: rgba(34,197,94,0.12); color:#4ade80;">Confirmed</span>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 text-[10px]">
                        <span class="text-gray-400">#LS-7841</span>
                        <span class="px-1.5 py-0.5 rounded text-[8px] font-semibold" style="background: rgba(59,130,246,0.12); color:#60a5fa;">On The Way</span>
                    </div>
                </div>
            </div>

            <!-- ═══ MEDIUM 2: Customer Management ═══ -->
            <div class="feature-card section-fade lg:col-span-4" style="transition-delay: 0.2s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Customer Management</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed mb-4">
                    Keep customer information and booking history organized.
                </p>
                <!-- UI snippet: mini customer rows -->
                <div class="space-y-1.5">
                    <div class="flex items-center gap-2 rounded-lg px-2.5 py-1.5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                        <span class="w-5 h-5 rounded-full flex-shrink-0" style="background: linear-gradient(135deg, #3B82F6, #1d4ed8);"></span>
                        <span class="text-[10.5px] text-gray-300 flex-1">John Smith</span>
                        <span class="text-[9px] text-gray-500">12 rides</span>
                    </div>
                    <div class="flex items-center gap-2 rounded-lg px-2.5 py-1.5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                        <span class="w-5 h-5 rounded-full flex-shrink-0" style="background: linear-gradient(135deg, #60a5fa, #3B82F6);"></span>
                        <span class="text-[10.5px] text-gray-300 flex-1">Sarah Johnson</span>
                        <span class="text-[9px] text-gray-500">8 rides</span>
                    </div>
                </div>
            </div>

            <!-- ═══ MEDIUM 3: Driver Management ═══ -->
            <div class="feature-card section-fade lg:col-span-4" style="transition-delay: 0.25s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17h14M5 17a2 2 0 01-2-2v-2l2-5h14l2 5v2a2 2 0 01-2 2M5 17v2a1 1 0 001 1h1a1 1 0 001-1v-2m8 0v2a1 1 0 001 1h1a1 1 0 001-1v-2"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Driver Management</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed mb-4">
                    Manage drivers, assignments and trip information.
                </p>
                <!-- UI snippet: mini driver rows -->
                <div class="space-y-1.5">
                    <div class="flex items-center gap-2 rounded-lg px-2.5 py-1.5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                        <span class="relative flex-shrink-0 w-5 h-5 rounded-full" style="background: rgba(255,255,255,0.08);">
                            <span class="absolute -right-0.5 -bottom-0.5 w-2 h-2 rounded-full" style="background:#22c55e; box-shadow: 0 0 0 1.5px #0A0A0A;"></span>
                        </span>
                        <span class="text-[10.5px] text-gray-300 flex-1">Michael Brown</span>
                        <span class="text-[9px] text-gray-500">On Trip</span>
                    </div>
                    <div class="flex items-center gap-2 rounded-lg px-2.5 py-1.5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                        <span class="relative flex-shrink-0 w-5 h-5 rounded-full" style="background: rgba(255,255,255,0.08);">
                            <span class="absolute -right-0.5 -bottom-0.5 w-2 h-2 rounded-full" style="background:#3B82F6; box-shadow: 0 0 0 1.5px #0A0A0A;"></span>
                        </span>
                        <span class="text-[10.5px] text-gray-300 flex-1">David Wilson</span>
                        <span class="text-[9px] text-gray-500">Active</span>
                    </div>
                </div>
            </div>

            <!-- ═══ SMALL 1: Multi-Language ═══ -->
            <div class="feature-card section-fade lg:col-span-4" style="transition-delay: 0.3s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20 15.3 15.3 0 010-20z"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Multi-Language</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed mb-4">
                    Serve customers in multiple languages.
                </p>
                <div class="flex flex-wrap gap-1.5">
                    <span class="px-2 py-1 rounded text-[9.5px] font-semibold text-blue-300" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.18);">EN</span>
                    <span class="px-2 py-1 rounded text-[9.5px] font-semibold text-blue-300" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.18);">ES</span>
                    <span class="px-2 py-1 rounded text-[9.5px] font-semibold text-blue-300" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.18);">FR</span>
                    <span class="px-2 py-1 rounded text-[9.5px] font-semibold text-blue-300" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.18);">AR</span>
                    <span class="px-2 py-1 rounded text-[9.5px] font-semibold text-blue-300" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.18);">ZH</span>
                </div>
            </div>

            <!-- ═══ SMALL 2: Multi-Currency ═══ -->
            <div class="feature-card section-fade lg:col-span-4" style="transition-delay: 0.35s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M14.5 9a2.5 2.5 0 00-2.5-1.5c-1.66 0-3 .9-3 2s1.34 2 3 2 3 .9 3 2-1.34 2-3 2a2.5 2.5 0 01-2.5-1.5M12 6v1.5M12 16.5V18"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Multi-Currency</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed mb-4">
                    Accept and display pricing in multiple currencies.
                </p>
                <div class="flex flex-wrap gap-1.5">
                    <span class="px-2 py-1 rounded text-[9.5px] font-semibold text-blue-300" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.18);">$ USD</span>
                    <span class="px-2 py-1 rounded text-[9.5px] font-semibold text-blue-300" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.18);">&euro; EUR</span>
                    <span class="px-2 py-1 rounded text-[9.5px] font-semibold text-blue-300" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.18);">&pound; GBP</span>
                    <span class="px-2 py-1 rounded text-[9.5px] font-semibold text-blue-300" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.18);">AED</span>
                </div>
            </div>

            <!-- ═══ SMALL 3: Mobile Responsive ═══ -->
            <div class="feature-card section-fade lg:col-span-4" style="transition-delay: 0.4s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Mobile Responsive</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed mb-4">
                    Give customers and staff a seamless experience across desktop, tablet and mobile.
                </p>
                <div class="flex items-center gap-3">
                    <svg width="20" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/></svg>
                    <svg width="14" height="18" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2"/></svg>
                    <svg width="10" height="16" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SECTION — INDUSTRIES (Built for Transportation Businesses)
═══════════════════════════════════════════════════════════════ -->
<section id="industries" class="relative py-24 lg:py-32 overflow-hidden" style="background: #0A0A0A;">

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,0.018) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.018) 1px, transparent 1px); background-size: 60px 60px;"></div>
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[800px] h-[340px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 100%, rgba(59,130,246,0.08) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="8" rx="2"/><path d="M5 11l1.5-5h11L19 11"/><circle cx="7.5" cy="19" r="1.5"/><circle cx="16.5" cy="19" r="1.5"/></svg>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">Industries We Serve</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                Built for Transportation Businesses
            </h2>
            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                Whether you run a private chauffeur service or a growing transportation company, LimoSchedule gives you the technology to operate professionally.
            </p>
        </div>

        <!-- Industry cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

            <!-- 1. Limo Services -->
            <a href="{{ route('contact') }}" class="industry-card group relative block rounded-2xl overflow-hidden section-fade aspect-[4/3]" style="border: 1px solid rgba(255,255,255,0.08); transition-delay: 0.05s">
                <img src="{{ asset('public/assets/images/industries/limo-services.jpg') }}" alt="Limo Services — LimoSchedule booking platform" width="1448" height="1086" class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 30%, rgba(6,6,10,0.55) 62%, rgba(6,6,10,0.95) 100%);"></div>
                <div class="absolute inset-x-0 bottom-0 p-5">
                    <h3 class="text-white text-[16.5px] font-bold mb-1.5">Limo Services</h3>
                    <p class="text-gray-300 text-[13px] leading-relaxed mb-3">Launch a professional branded booking experience.</p>
                    <div class="inline-flex items-center gap-1.5 text-[12px] font-semibold text-blue-400">
                        Learn more
                        <svg class="transition-transform duration-300 group-hover:translate-x-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>

            <!-- 2. Black Car Services -->
            <a href="{{ route('contact') }}" class="industry-card group relative block rounded-2xl overflow-hidden section-fade aspect-[4/3]" style="border: 1px solid rgba(255,255,255,0.08); transition-delay: 0.1s">
                <img src="{{ asset('public/assets/images/industries/black-car-services.jpg') }}" alt="Black Car Services — LimoSchedule booking platform" width="1448" height="1086" class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 30%, rgba(6,6,10,0.55) 62%, rgba(6,6,10,0.95) 100%);"></div>
                <div class="absolute inset-x-0 bottom-0 p-5">
                    <h3 class="text-white text-[16.5px] font-bold mb-1.5">Black Car Services</h3>
                    <p class="text-gray-300 text-[13px] leading-relaxed mb-3">Give premium clients a seamless reservation experience.</p>
                    <div class="inline-flex items-center gap-1.5 text-[12px] font-semibold text-blue-400">
                        Learn more
                        <svg class="transition-transform duration-300 group-hover:translate-x-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>

            <!-- 3. Taxi Companies -->
            <a href="{{ route('contact') }}" class="industry-card group relative block rounded-2xl overflow-hidden section-fade aspect-[4/3]" style="border: 1px solid rgba(255,255,255,0.08); transition-delay: 0.15s">
                <img src="{{ asset('public/assets/images/industries/taxi-companies.jpg') }}" alt="Taxi Companies — LimoSchedule booking platform" width="1448" height="1086" class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 30%, rgba(6,6,10,0.55) 62%, rgba(6,6,10,0.95) 100%);"></div>
                <div class="absolute inset-x-0 bottom-0 p-5">
                    <h3 class="text-white text-[16.5px] font-bold mb-1.5">Taxi Companies</h3>
                    <p class="text-gray-300 text-[13px] leading-relaxed mb-3">Manage bookings and daily operations from one platform.</p>
                    <div class="inline-flex items-center gap-1.5 text-[12px] font-semibold text-blue-400">
                        Learn more
                        <svg class="transition-transform duration-300 group-hover:translate-x-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>

            <!-- 4. Chauffeur Services -->
            <a href="{{ route('contact') }}" class="industry-card group relative block rounded-2xl overflow-hidden section-fade aspect-[4/3]" style="border: 1px solid rgba(255,255,255,0.08); transition-delay: 0.2s">
                <img src="{{ asset('public/assets/images/industries/chauffeur-services.jpg') }}" alt="Chauffeur Services — LimoSchedule booking platform" width="1448" height="1086" class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 30%, rgba(6,6,10,0.55) 62%, rgba(6,6,10,0.95) 100%);"></div>
                <div class="absolute inset-x-0 bottom-0 p-5">
                    <h3 class="text-white text-[16.5px] font-bold mb-1.5">Chauffeur Services</h3>
                    <p class="text-gray-300 text-[13px] leading-relaxed mb-3">Connect customers, drivers and bookings in one system.</p>
                    <div class="inline-flex items-center gap-1.5 text-[12px] font-semibold text-blue-400">
                        Learn more
                        <svg class="transition-transform duration-300 group-hover:translate-x-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>

            <!-- 5. Airport Transfer Services -->
            <a href="{{ route('contact') }}" class="industry-card group relative block rounded-2xl overflow-hidden section-fade aspect-[4/3]" style="border: 1px solid rgba(255,255,255,0.08); transition-delay: 0.25s">
                <img src="{{ asset('public/assets/images/industries/airport-transfer.jpg') }}" alt="Airport Transfer Services — LimoSchedule booking platform" width="1448" height="1086" class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 30%, rgba(6,6,10,0.55) 62%, rgba(6,6,10,0.95) 100%);"></div>
                <div class="absolute inset-x-0 bottom-0 p-5">
                    <h3 class="text-white text-[16.5px] font-bold mb-1.5">Airport Transfer Services</h3>
                    <p class="text-gray-300 text-[13px] leading-relaxed mb-3">Deliver reliable, on-time airport pickups and drop-offs.</p>
                    <div class="inline-flex items-center gap-1.5 text-[12px] font-semibold text-blue-400">
                        Learn more
                        <svg class="transition-transform duration-300 group-hover:translate-x-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>

            <!-- 6. Corporate Travel -->
            <a href="{{ route('contact') }}" class="industry-card group relative block rounded-2xl overflow-hidden section-fade aspect-[4/3]" style="border: 1px solid rgba(255,255,255,0.08); transition-delay: 0.3s">
                <img src="{{ asset('public/assets/images/industries/corporate-travel.jpg') }}" alt="Corporate Travel — LimoSchedule booking platform" width="1448" height="1086" class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
                <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 30%, rgba(6,6,10,0.55) 62%, rgba(6,6,10,0.95) 100%);"></div>
                <div class="absolute inset-x-0 bottom-0 p-5">
                    <h3 class="text-white text-[16.5px] font-bold mb-1.5">Corporate Travel</h3>
                    <p class="text-gray-300 text-[13px] leading-relaxed mb-3">Give business clients a professional, always-on booking experience.</p>
                    <div class="inline-flex items-center gap-1.5 text-[12px] font-semibold text-blue-400">
                        Learn more
                        <svg class="transition-transform duration-300 group-hover:translate-x-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </a>

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SECTION — COMPARISON (Why Keep Renting Your Software?)
═══════════════════════════════════════════════════════════════ -->
<section id="comparison" class="relative py-24 lg:py-32 overflow-hidden" style="background: #060606;">

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[900px] h-[500px] rounded-full pointer-events-none" style="background: radial-gradient(ellipse at center, rgba(59,130,246,0.08) 0%, transparent 68%);"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">Own It, Don&rsquo;t Rent It</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                Why Keep Renting Your Software?
            </h2>
            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                Get a complete white-label platform designed for your business &mdash; without building everything from scratch.
            </p>
        </div>

        <!-- Comparison columns -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-center mb-14 lg:mb-16">

            <!-- LEFT: Typical SaaS Platform (muted) -->
            <div class="section-fade rounded-2xl p-7 sm:p-8" style="background: rgba(255,255,255,0.018); border: 1px solid rgba(255,255,255,0.07);">
                <div class="flex items-center gap-2.5 mb-6">
                    <span class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="3"/><line x1="3" y1="9" x2="21" y2="9"/></svg>
                    </span>
                    <h3 class="text-gray-400 text-[17px] font-bold">Typical SaaS Platform</h3>
                </div>
                <ul class="space-y-3.5">
                    <li class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(255,255,255,0.05);"><span class="block w-1.5 h-px" style="background:#6b7280;"></span></span>
                        <span class="text-gray-500 text-[14px]">Monthly subscription</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(255,255,255,0.05);"><span class="block w-1.5 h-px" style="background:#6b7280;"></span></span>
                        <span class="text-gray-500 text-[14px]">Recurring software costs</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(255,255,255,0.05);"><span class="block w-1.5 h-px" style="background:#6b7280;"></span></span>
                        <span class="text-gray-500 text-[14px]">Generic platform experience</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(255,255,255,0.05);"><span class="block w-1.5 h-px" style="background:#6b7280;"></span></span>
                        <span class="text-gray-500 text-[14px]">Limited branding flexibility</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(255,255,255,0.05);"><span class="block w-1.5 h-px" style="background:#6b7280;"></span></span>
                        <span class="text-gray-500 text-[14px]">Ongoing dependency</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-4 h-4 rounded-full flex items-center justify-center flex-shrink-0" style="background: rgba(255,255,255,0.05);"><span class="block w-1.5 h-px" style="background:#6b7280;"></span></span>
                        <span class="text-gray-500 text-[14px]">Pay more as your business grows</span>
                    </li>
                </ul>
            </div>

            <!-- RIGHT: LimoSchedule (highlighted) -->
            <div class="section-fade relative rounded-2xl p-7 sm:p-9 lg:-mt-4 lg:-mb-4" style="background: #F8FAFC; box-shadow: 0 30px 80px rgba(59,130,246,0.22), 0 0 0 1px rgba(59,130,246,0.25); transition-delay: 0.1s">
                <!-- Recommended ribbon -->
                <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1.5 rounded-full text-[10.5px] font-bold tracking-[0.1em] uppercase text-white" style="background: linear-gradient(135deg, #3B82F6, #1d4ed8); box-shadow: 0 8px 24px rgba(59,130,246,0.4);">
                    Complete Solution
                </span>
                <div class="flex items-center gap-2.5 mb-6 mt-1.5">
                    <span class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, #3B82F6, #1d4ed8);">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h7l-1 8 11-14h-7l1-6z"/></svg>
                    </span>
                    <h3 class="text-[#0A0A0A] text-[17px] font-black">LimoSchedule</h3>
                </div>
                <ul class="space-y-3.5">
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0" style="background:#3B82F6;"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
                        <span class="text-[#1a1f2b] text-[14px] font-semibold">One-time payment</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0" style="background:#3B82F6;"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
                        <span class="text-[#1a1f2b] text-[14px] font-semibold">Complete white-label platform</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0" style="background:#3B82F6;"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
                        <span class="text-[#1a1f2b] text-[14px] font-semibold">Your brand, your business</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0" style="background:#3B82F6;"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
                        <span class="text-[#1a1f2b] text-[14px] font-semibold">Website + Customer + Driver + Admin</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0" style="background:#3B82F6;"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
                        <span class="text-[#1a1f2b] text-[14px] font-semibold">Complete setup</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full flex items-center justify-center flex-shrink-0" style="background:#3B82F6;"><svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg></span>
                        <span class="text-[#1a1f2b] text-[14px] font-semibold">Ready to launch quickly</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Bottom message + CTA -->
        <div class="text-center section-fade" style="transition-delay: 0.15s">
            <h3 class="text-white text-2xl sm:text-[28px] font-black tracking-tight leading-tight mb-7 max-w-2xl mx-auto">
                Stop paying for access. Start with a complete business solution.
            </h3>
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule%27s%20complete%20white-label%20platform.%20Can%20I%20speak%20with%20a%20limo%20software%20expert%3F" target="_blank" rel="noopener"
               class="btn-cta btn-primary"
               style="padding: 16px 32px; font-size: 15px;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 24 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                <span>Talk to a Limo Software Expert</span>
            </a>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SECTION — PRICING (Launch Your Platform. Pay Once.)
═══════════════════════════════════════════════════════════════ -->
<section id="pricing" class="relative py-24 lg:py-32 overflow-hidden" style="background: #060606;">

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[420px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.1) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-10 lg:mb-12 section-fade">
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                Launch Your Platform. Pay Once.
            </h2>
            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                Choose the setup that fits your transportation business and get your complete white-label platform ready to launch.
            </p>
        </div>

        <!-- Reassurance strip -->
        <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 mb-16 lg:mb-20 section-fade" style="transition-delay: 0.05s">
            <span class="inline-flex items-center gap-1.5 text-[13px] font-medium text-gray-400">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                One-Time Payment
            </span>
            <span class="inline-flex items-center gap-1.5 text-[13px] font-medium text-gray-400">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                No Monthly Fees
            </span>
            <span class="inline-flex items-center gap-1.5 text-[13px] font-medium text-gray-400">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                No Hidden Costs
            </span>
        </div>

        <!-- Pricing cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-start">

            <!-- FEATURED: Complete Platform License -->
            <div class="section-fade relative rounded-2xl p-8 sm:p-10" style="transition-delay: 0.1s; background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.35); box-shadow: 0 30px 90px rgba(59,130,246,0.16), 0 0 0 1px rgba(59,130,246,0.12);">

                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-[10.5px] font-bold tracking-[0.12em] uppercase text-blue-400 mb-6" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.3);">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                    One-Time Payment
                </span>

                <h3 class="text-white text-[22px] font-black mb-2">Complete Platform License</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed mb-8 max-w-sm">
                    Everything you need to launch and run your transportation business &mdash; under your own brand.
                </p>

                <div class="flex items-end gap-2.5 mb-1.5">
                    <span class="text-[52px] sm:text-[58px] font-black text-white leading-none">$1,999</span>
                </div>
                <div class="text-[13px] text-gray-500 font-medium mb-8">One-time payment &middot; No subscriptions, ever</div>

                <a href="{{ route('contact') }}"
                   class="btn-cta btn-primary w-full mb-8"
                   style="padding: 16px 28px; font-size: 15px;">
                    <span>Get Started Today</span>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>

                <div class="pt-7" style="border-top: 1px solid rgba(255,255,255,0.08);">
                    <div class="text-[11px] font-bold tracking-[0.1em] uppercase text-gray-500 mb-4">What&rsquo;s Included</div>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2.5">
                            <svg class="flex-shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span class="text-gray-300 text-[13.5px] leading-snug">Complete white-label platform &mdash; Website + Customer + Driver + Admin</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="flex-shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span class="text-gray-300 text-[13.5px] leading-snug">Your branding, your domain</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="flex-shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span class="text-gray-300 text-[13.5px] leading-snug">Ready to launch in 30 minutes</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="flex-shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span class="text-gray-300 text-[13.5px] leading-snug">No limits on bookings, ever</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- SECONDARY: Custom requirements (no fabricated price) -->
            <div class="section-fade rounded-2xl p-8 sm:p-10" style="transition-delay: 0.15s; background: rgba(255,255,255,0.015); border: 1px solid rgba(255,255,255,0.07);">

                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-[10.5px] font-bold tracking-[0.12em] uppercase text-gray-400 mb-6" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1);">
                    Custom Requirements
                </span>

                <h3 class="text-gray-300 text-[22px] font-black mb-2">Need Something Custom?</h3>
                <p class="text-gray-500 text-[14px] leading-relaxed mb-8 max-w-sm">
                    Multi-fleet deployments, custom integrations, or specific business requirements &mdash; let&rsquo;s talk about what your business needs.
                </p>

                <div class="text-[15px] text-gray-400 font-semibold mb-8">Let&rsquo;s discuss your requirements</div>

                <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule%27s%20complete%20white-label%20platform.%20Can%20I%20talk%20to%20an%20expert%20about%20my%20requirements%3F" target="_blank" rel="noopener"
                   class="btn-outline w-full mb-8"
                   style="padding: 16px 28px; font-size: 15px;">
                    <span>Talk to an Expert</span>
                </a>

                <div class="pt-7" style="border-top: 1px solid rgba(255,255,255,0.07);">
                    <div class="text-[11px] font-bold tracking-[0.1em] uppercase text-gray-600 mb-4">How It Works</div>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2.5">
                            <svg class="flex-shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span class="text-gray-500 text-[13.5px] leading-snug">Tell us about your business and requirements</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="flex-shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span class="text-gray-500 text-[13.5px] leading-snug">We&rsquo;ll walk you through what&rsquo;s included and how it fits</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <svg class="flex-shrink-0 mt-0.5" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span class="text-gray-500 text-[13.5px] leading-snug">No pressure &mdash; get clear answers before you decide</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     SECTION — QUICK FAQ (Questions Before You Launch?)
═══════════════════════════════════════════════════════════════ -->
<section id="quick-faq" class="relative py-24 lg:py-32 overflow-hidden" style="background: #0A0A0A;">

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-16 lg:mb-20 section-fade">
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5 text-white">
                Questions Before You Launch?
            </h2>
            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                Everything you need to know before getting your LimoSchedule platform.
            </p>
        </div>

        <!-- Accordion -->
        <div class="flex flex-col gap-3 section-fade" style="transition-delay: 0.1s;" id="quick-faq-accordion">

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

    </div>
</section>

@push('scripts')
<script>
(function () {
    'use strict';
    var accordion = document.getElementById('quick-faq-accordion');
    if (!accordion) { return; }

    function closeItem(item) {
        var body    = item.querySelector('.faq-body');
        var trigger = item.querySelector('.faq-trigger');
        var chevron = item.querySelector('.faq-chevron');
        body.style.maxHeight = '0';
        trigger.setAttribute('aria-expanded', 'false');
        chevron.style.transform = 'rotate(0deg)';
        item.style.borderColor = 'rgba(255,255,255,0.07)';
    }

    function openItem(item) {
        var body    = item.querySelector('.faq-body');
        var trigger = item.querySelector('.faq-trigger');
        var chevron = item.querySelector('.faq-chevron');
        body.style.maxHeight = body.scrollHeight + 'px';
        trigger.setAttribute('aria-expanded', 'true');
        chevron.style.transform = 'rotate(180deg)';
        item.style.borderColor = 'rgba(59,130,246,0.35)';
    }

    accordion.querySelectorAll('.faq-trigger').forEach(function (trigger) {
        trigger.addEventListener('click', function () {
            var item   = trigger.closest('.faq-item');
            var isOpen = trigger.getAttribute('aria-expanded') === 'true';

            accordion.querySelectorAll('.faq-item').forEach(closeItem);

            if (!isOpen) { openItem(item); }
        });
    });
}());
</script>
@endpush




<!-- ═══════════════════════════════════════════════════════════════
     SECTION &mdash; CONTACT / LEAD GENERATION
═══════════════════════════════════════════════════════════════ -->
<section id="contact" class="relative overflow-hidden" style="background: #FFFFFF;">

    <!-- Grid texture -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(37,99,235,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(37,99,235,0.04) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(37,99,235,0.07) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="grid grid-cols-1 gap-10 lg:gap-12">

            <!-- TOP: Heading + reassurance (full width) -->
            <div class="section-fade text-center max-w-3xl mx-auto">
                <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(37,99,235,0.08); border: 1px solid rgba(37,99,235,0.25);">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
                    <span class="text-blue-600 text-[11px] font-bold tracking-[0.16em] uppercase">Contact</span>
                </div>

                <h2 class="text-slate-900 text-4xl sm:text-5xl font-black tracking-tight leading-[1.08] mb-5">
                    Get Started With LimoSchedule
                </h2>

                <p class="text-slate-600 text-[16px] leading-relaxed max-w-md mx-auto mb-8">
                    Tell us about your transportation business and we&rsquo;ll show you how LimoSchedule fits your operations &mdash; no obligation.
                </p>

                <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-3 mb-8">
                    <span class="inline-flex items-center gap-2 text-[13.5px] font-medium text-slate-700">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        $1,999 one-time payment &mdash; no monthly SaaS fee
                    </span>
                    <span class="inline-flex items-center gap-2 text-[13.5px] font-medium text-slate-700">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        We reply within 4 hours &mdash; usually faster
                    </span>
                    <span class="inline-flex items-center gap-2 text-[13.5px] font-medium text-slate-700">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        Complete white-label platform &mdash; no obligation
                    </span>
                </div>

                <div class="text-[13px]">
                    <span class="text-slate-500">Prefer WhatsApp?</span>
                    <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-1 font-semibold text-blue-600 hover:text-blue-700 transition-colors duration-200 ml-1">
                        Talk to an Expert
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div><!-- /top -->

            <!-- BELOW: Form (full width) -->
            <div class="section-fade max-w-4xl mx-auto w-full" style="transition-delay: 0.12s;">
                <div class="rounded-2xl p-6 sm:p-8 lg:p-10" style="background: #F8FAFC; border: 1px solid rgba(15,23,42,0.08); box-shadow: 0 30px 90px rgba(15,23,42,0.08);">

                    <div class="mb-6">
                        <h3 class="text-[21px] font-bold text-slate-900 mb-1.5">Request Your Private Demo</h3>
                        <p class="text-[13px] text-slate-600">Share a few details about your business and we&rsquo;ll walk you through how LimoSchedule can run it.</p>
                    </div>

                    <form id="contactForm" action="{{ route('demo.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <!-- Contact Information -->
                        <fieldset class="contact-fieldset">
                            <legend class="contact-legend">Contact Information</legend>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                                <div>
                                    <label class="contact-label" for="cf_name">Full Name <span class="text-blue-500 ml-0.5">*</span></label>
                                    <input type="text" id="cf_name" name="name" class="contact-input" placeholder="John Smith" autocomplete="name" required>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_company">Company</label>
                                    <input type="text" id="cf_company" name="company" class="contact-input" placeholder="Acme Limo Co." autocomplete="organization">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                                <div>
                                    <label class="contact-label" for="cf_email">Email Address <span class="text-blue-500 ml-0.5">*</span></label>
                                    <input type="email" id="cf_email" name="email" class="contact-input" placeholder="john@example.com" autocomplete="email" required>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_whatsapp">WhatsApp</label>
                                    <input type="tel" id="cf_whatsapp" name="whatsapp" class="contact-input" placeholder="+1 (555) 000-0000" autocomplete="tel">
                                </div>
                            </div>
                        </fieldset>

                        <!-- Business Details -->
                        <fieldset class="contact-fieldset">
                            <legend class="contact-legend">Business Details</legend>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                                <div>
                                    <label class="contact-label" for="cf_country">Country <span class="text-blue-500 ml-0.5">*</span></label>
                                    <select id="cf_country" name="country" required>
                                        <option value="">Select your country&hellip;</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="contact-label" for="cf_employees">Total Employees <span class="text-blue-500 ml-0.5">*</span></label>
                                    <select id="cf_employees" name="total_employees" class="contact-input contact-select" required>
                                        <option value="" disabled selected>Select range&hellip;</option>
                                        <option value="1-5">1 &ndash; 5</option>
                                        <option value="6-10">6 &ndash; 10</option>
                                        <option value="11-25">11 &ndash; 25</option>
                                        <option value="26-50">26 &ndash; 50</option>
                                        <option value="51-100">51 &ndash; 100</option>
                                        <option value="100+">100+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="contact-label" style="color: #334155; font-size: 13px; font-weight: 600; margin-bottom: 3px;">How Much Are You Planning to Invest? <span class="text-blue-500 ml-0.5">*</span></label>
                                <p class="text-slate-500 text-[11.5px] mb-3">Your budget helps us tailor the right solution for your business.</p>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5" role="radiogroup" aria-label="System setup budget">
                                    <label class="budget-radio-card">
                                        <input type="radio" name="budget" value="USD — Under 1000" class="sr-only" required>
                                        <span class="budget-radio-dot"></span>
                                        <span class="budget-radio-label">USD &mdash; Under 1000</span>
                                    </label>
                                    <label class="budget-radio-card">
                                        <input type="radio" name="budget" value="USD — 1500 – 2000" class="sr-only" required>
                                        <span class="budget-radio-dot"></span>
                                        <span class="budget-radio-label">USD &mdash; 1500 &ndash; 2000</span>
                                    </label>
                                    <label class="budget-radio-card">
                                        <input type="radio" name="budget" value="USD — 2000 – 2500" class="sr-only" required>
                                        <span class="budget-radio-dot"></span>
                                        <span class="budget-radio-label">USD &mdash; 2000 &ndash; 2500</span>
                                    </label>
                                    <label class="budget-radio-card">
                                        <input type="radio" name="budget" value="USD — 2500 – 3000" class="sr-only" required>
                                        <span class="budget-radio-dot"></span>
                                        <span class="budget-radio-label">USD &mdash; 2500 &ndash; 3000</span>
                                    </label>
                                    <label class="budget-radio-card">
                                        <input type="radio" name="budget" value="USD — 3000 – 3500" class="sr-only" required>
                                        <span class="budget-radio-dot"></span>
                                        <span class="budget-radio-label">USD &mdash; 3000 &ndash; 3500</span>
                                    </label>
                                    <label class="budget-radio-card">
                                        <input type="radio" name="budget" value="USD — 5000+" class="sr-only" required>
                                        <span class="budget-radio-dot"></span>
                                        <span class="budget-radio-label">USD &mdash; 5000+</span>
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        <!-- Message -->
                        <fieldset class="contact-fieldset">
                            <legend class="contact-legend">Message</legend>
                            <div class="mt-3">
                                <label class="contact-label" for="cf_message">Tell us about your business</label>
                                <textarea id="cf_message" name="message" class="contact-input" rows="3" placeholder="Tell us about your transportation business and what you're looking to build&hellip;" style="resize: vertical; min-height: 90px;"></textarea>
                            </div>
                        </fieldset>

                        <div class="pt-1">
                            <button type="submit" id="cfSubmitBtn" class="btn-cta btn-primary w-full" style="padding: 16px 28px; font-size: 15.5px;">
                                <span>Get Started</span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                    </form>

                    <p class="text-center text-slate-500 text-[11.5px] mt-5">
                        Your information is private and never shared with third parties. See our <a href="{{ route('privacy-policy') }}" class="text-slate-600 hover:text-slate-900 transition-colors duration-200">Privacy Policy</a>.
                    </p>

                </div>
            </div><!-- /form -->

        </div>
    </div>

</section>
<!-- ═════ END CONTACT ═════ -->

@endsection

@push('scripts')
<!-- jQuery + Select2 -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(function () {
    $('#cf_country').select2({
        placeholder: 'Select your country…',
        allowClear: false,
        dropdownCssClass: 'select2-dark',
        theme: 'default'
    });

    /* Submit: show loading state while form posts */
    $('#contactForm').on('submit', function () {
        var btn = document.getElementById('cfSubmitBtn');
        if (btn) {
            btn.disabled = true;
            btn.querySelector('span').textContent = 'Sending…';
        }
    });
});
</script>

<!-- Main JavaScript -->
<script src="{{ url('public/assets/js/limoschedule.js') }}"></script>
@endpush

