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
<style>
    #wf-page { background: #ffffff; }
    #wf-page * { box-sizing: border-box; }
    #wf-page .wf-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 6px 14px; border-radius: 999px;
        background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.22);
        color: #1D4ED8; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
    }
    #wf-page .wf-h1 { color: #0B1220; font-weight: 800; letter-spacing: -0.02em; line-height: 1.08; }
    #wf-page .wf-h2 { color: #0B1220; font-weight: 800; letter-spacing: -0.015em; line-height: 1.15; }
    #wf-page .wf-h3 { color: #0B1220; font-weight: 700; }
    #wf-page .wf-body { color: #4B5563; }
    #wf-page .wf-muted { color: #6B7280; }
    #wf-page .wf-card {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 16px;
        box-shadow: 0 10px 30px rgba(15,23,42,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }
    #wf-page .wf-card:hover { transform: translateY(-3px); box-shadow: 0 16px 40px rgba(15,23,42,0.09); border-color: rgba(59,130,246,0.35); }
    #wf-page .wf-btn-primary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #2563EB; color: #fff; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1px solid #1D4ED8;
        box-shadow: 0 10px 24px rgba(37,99,235,0.28);
        transition: background 0.2s ease, transform 0.2s ease;
    }
    #wf-page .wf-btn-primary:hover { background: #1D4ED8; transform: translateY(-1px); }
    #wf-page .wf-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #ffffff; color: #0B1220; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1.5px solid rgba(15,23,42,0.14);
        transition: border-color 0.2s ease, background 0.2s ease;
    }
    #wf-page .wf-btn-secondary:hover { border-color: rgba(37,99,235,0.5); background: #F6F8FC; }
    #wf-page .wf-check { color: #16A34A; flex-shrink: 0; }
    #wf-page .wf-soon-badge {
        display: inline-flex; align-items: center; gap: 5px;
        background: rgba(234,179,8,0.12); border: 1px solid rgba(234,179,8,0.35); color: #92640A;
        font-size: 10.5px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;
        padding: 3px 9px; border-radius: 999px;
    }
    #wf-page .wf-not-avail {
        color: #9CA3AF; text-decoration: line-through; text-decoration-color: rgba(156,163,175,0.6);
    }
    #wf-page .wf-flow-step {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 12px;
        padding: 9px 12px; display: flex; align-items: center; gap: 8px;
        box-shadow: 0 6px 16px rgba(15,23,42,0.05); font-size: 12px; font-weight: 600; color: #0B1220;
    }
    #wf-page .wf-arrow { color: #93A3B8; flex-shrink: 0; }

    /* Explorer layout */
    #wf-page .wf-explorer { display: flex; align-items: flex-start; gap: 24px; }
    #wf-page .wf-tabs {
        flex: 0 0 260px; width: 260px; position: sticky; top: 84px;
        display: flex; flex-direction: column; gap: 3px;
        max-height: calc(100vh - 104px); overflow-y: auto;
        padding-right: 4px;
    }
    #wf-page .wf-tab {
        display: flex; align-items: center; gap: 11px;
        padding: 9px 12px; border-radius: 11px;
        border: 1px solid transparent; border-left: 3px solid transparent;
        background: transparent; text-align: left; cursor: pointer;
        transition: background 0.15s ease, border-color 0.15s ease;
        width: 100%;
    }
    #wf-page .wf-tab:hover { background: #F6F8FC; }
    #wf-page .wf-tab.active {
        background: rgba(37,99,235,0.07);
        border-color: rgba(37,99,235,0.16);
        border-left-color: #2563EB;
    }
    #wf-page .wf-tab-icon {
        width: 30px; height: 30px; border-radius: 8px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: #F1F5F9; color: #64748B;
        transition: background 0.15s ease, color 0.15s ease;
    }
    #wf-page .wf-tab.active .wf-tab-icon { background: #2563EB; color: #fff; }
    #wf-page .wf-tab-name { font-size: 13px; font-weight: 700; color: #0B1220; line-height: 1.25; }
    #wf-page .wf-tab-desc { font-size: 11px; color: #94A3B8; line-height: 1.2; margin-top: 1px; }
    #wf-page .wf-tab.active .wf-tab-desc { color: #6B7280; }

    #wf-page .wf-content { flex: 1 1 0%; min-width: 0; }
    #wf-page .wf-panel { display: none; }
    #wf-page .wf-panel.active { display: block; animation: wf-fade 0.3s ease; }
    @keyframes wf-fade { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }

    #wf-page .wf-panel-grid { display: grid; grid-template-columns: 1fr; gap: 22px; align-items: center; }
    @media (min-width: 1024px) { #wf-page .wf-panel-grid { grid-template-columns: 1fr 1fr; gap: 32px; } }

    #wf-page .wf-figure {
        border-radius: 16px; overflow: hidden; border: 1px solid rgba(15,23,42,0.08);
        box-shadow: 0 20px 50px rgba(15,23,42,0.09);
        display: flex; align-items: center; justify-content: center;
        background: #F8FAFC; max-height: 420px;
    }
    #wf-page .wf-figure img { max-height: 420px; width: auto; max-width: 100%; height: auto; display: block; margin: 0 auto; }

    #wf-page .wf-feature-card {
        background: #F6F8FC; border: 1px solid rgba(15,23,42,0.06); border-radius: 12px;
        padding: 11px 13px; display: flex; align-items: flex-start; gap: 9px;
    }
    #wf-page .wf-note {
        background: #EFF6FF; border: 1px solid rgba(37,99,235,0.18); border-radius: 12px;
        padding: 10px 14px; color: #1E3A8A; font-size: 12px; line-height: 1.55;
    }
    #wf-page .wf-chip {
        background: #F1F5F9; border: 1px solid rgba(15,23,42,0.06); border-radius: 9px;
        padding: 7px 10px; font-size: 11.5px; font-weight: 600; color: #0B1220; text-align: center;
    }
    #wf-page .wf-cta-box {
        background: linear-gradient(135deg, #0B1220 0%, #14213D 100%);
        border-radius: 20px; padding: 34px 28px; text-align: center;
    }

    @media (max-width: 900px) {
        #wf-page .wf-explorer { flex-direction: column; gap: 14px; }
        #wf-page .wf-tabs {
            position: sticky; top: 0; z-index: 20; width: 100%; flex: none;
            flex-direction: row; overflow-x: auto; overflow-y: hidden; max-height: none;
            padding: 8px 4px; background: #ffffff; border-bottom: 1px solid rgba(15,23,42,0.08);
            gap: 6px; -webkit-overflow-scrolling: touch;
        }
        #wf-page .wf-tab { flex: 0 0 auto; width: auto; border-left: none; border-bottom: 3px solid transparent; border-radius: 9px; }
        #wf-page .wf-tab.active { border-left-color: transparent; border-bottom-color: #2563EB; }
        #wf-page .wf-tab-desc { display: none; }
        #wf-page .wf-figure { max-height: 280px; }
        #wf-page .wf-figure img { max-height: 280px; }
    }
</style>
@endpush

@section('content')

<div id="wf-page">

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #F6F8FC 0%, #ffffff 60%);">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Website Features', 'url' => null],
    ];
@endphp
<div style="filter: none;">
@include('partials._breadcrumbs')
</div>
<style>#wf-page nav[aria-label="Breadcrumb"] a, #wf-page nav[aria-label="Breadcrumb"] span { color: #6B7280 !important; }
#wf-page nav[aria-label="Breadcrumb"] a:hover { color: #0B1220 !important; }
#wf-page nav[aria-label="Breadcrumb"] span[aria-current] { color: #0B1220 !important; }</style>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-8 pb-10 lg:pt-10 lg:pb-12 text-center">
        <span class="wf-eyebrow mb-5">Public Website</span>

        <h1 class="wf-h1 text-3xl sm:text-4xl lg:text-[46px] mb-5">
            More Than a Website. A Complete Online Booking Experience.
        </h1>

        <p class="wf-body text-[15.5px] leading-relaxed max-w-2xl mx-auto mb-7">
            LimoSchedule gives your limo, chauffeur or transportation business a powerful public website built to showcase your services, capture bookings, calculate fares and turn visitors into customers.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('contact') }}" class="wf-btn-primary w-full sm:w-auto">
                <span>Book a Demo</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="#wf-explorer" class="wf-btn-secondary w-full sm:w-auto">Explore Features</a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     COMPACT INTRO
═══════════════════════════════════════════════════════════════ -->
<section id="wf-explorer" class="relative pt-2 pb-6">
    <div class="max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="wf-h2 text-xl sm:text-2xl mb-2">Everything Your Transportation Business Needs Online</h2>
        <p class="wf-body text-[13.5px] leading-relaxed">Browse each part of the public website below &mdash; from booking and pricing to fleet, content and global reach.</p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MAIN FEATURE EXPLORER
═══════════════════════════════════════════════════════════════ -->
<section class="relative pb-16">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        @php
            $wfModules = [
                'booking' => ['Online Booking', 'Guest booking & trip details'],
                'fare' => ['Live Fare Calculator', 'Distance & time-based pricing'],
                'fleet' => ['Fleet Showcase', 'Vehicles & amenities'],
                'services' => ['Services', 'Six service types'],
                'journey' => ['Booking Journey', 'Search to confirmation'],
                'access' => ['Customer Access & Security', 'Login & accounts'],
                'communication' => ['Communication', 'Contact, WhatsApp & alerts'],
                'seo' => ['SEO & Content', 'Sitemap, meta & schema'],
                'content' => ['Blog, Reviews & Local', 'Content that keeps growing'],
                'global' => ['Global Ready', 'Language & currency'],
                'cms' => ['Dynamic CMS', 'Admin-managed sections'],
            ];
            $wfIcons = [
                'booking' => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M9 16l2 2 4-4"/>',
                'fare' => '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>',
                'fleet' => '<circle cx="7" cy="17" r="2"/><circle cx="17" cy="17" r="2"/><path d="M5 17H3v-6l2-5h11l3 5h1a2 2 0 012 2v4h-2"/>',
                'services' => '<path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><path d="M9 22V12h6v10"/>',
                'journey' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
                'access' => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>',
                'communication' => '<path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>',
                'seo' => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
                'content' => '<path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/>',
                'global' => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/>',
                'cms' => '<rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/>',
            ];
        @endphp

        <div class="wf-explorer">

            <!-- LEFT: STICKY TABS -->
            <nav class="wf-tabs" role="tablist" aria-label="Website feature modules">
                @foreach($wfModules as $key => [$name, $desc])
                <button type="button" class="wf-tab @if($loop->first) active @endif" role="tab" data-target="wf-tab-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    <span class="wf-tab-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $wfIcons[$key] !!}</svg>
                    </span>
                    <span>
                        <span class="wf-tab-name block">{{ $name }}</span>
                        <span class="wf-tab-desc block">{{ $desc }}</span>
                    </span>
                </button>
                @endforeach
            </nav>

            <!-- RIGHT: CONTENT -->
            <div class="wf-content">

                <!-- 1. ONLINE BOOKING -->
                <div class="wf-panel active" id="wf-tab-booking" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Online Booking</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-2">Turn Website Visitors Into Bookings</h2>
                            <p class="wf-body text-[13px] leading-relaxed mb-4">Guest booking is fully built in &mdash; no account required, and every detail feeds a live, accurate fare.</p>

                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mb-3">
                                @foreach(['One Way','Round Trip','Hourly','Airport Transfer','Unlimited Stops','Live Fare Quote','Coupon Codes','WhatsApp Hand-off','PDF Invoice'] as $item)
                                <div class="wf-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="wf-soon-badge">Coming Soon</span>
                                <span class="text-[12px] wf-muted">Voice search &mdash; UI present, not yet functional.</span>
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-online-booking.jpg') }}" alt="LimoSchedule online booking form showing trip type, pickup, drop-off, passengers and a live fare quote" width="1536" height="1024" loading="eager" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 2. LIVE FARE CALCULATOR -->
                <div class="wf-panel" id="wf-tab-fare" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Live Fare Calculator</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-2">Know the Fare Before the Customer Books</h2>
                            <p class="wf-body text-[13px] leading-relaxed mb-4">A genuine distance- and time-based pricing engine &mdash; not a static price list.</p>

                            <div class="flex flex-wrap items-center gap-1.5 mb-4">
                                @foreach(['Route','Distance & Time','Pricing Rules','Discounts','Final Fare'] as $step)
                                    <div class="wf-flow-step">{{ $step }}</div>
                                    @if(!$loop->last)<svg class="wf-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                                @endforeach
                            </div>

                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['Base Fare','Per-KM Rate','Long-Distance Tier','Hourly Rate','Night/Weekend','Airport & Toll'] as $factor)
                                <div class="wf-chip">{{ $factor }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-fare-calculator.jpg') }}" alt="LimoSchedule fare calculator pricing flow from route to final fare, with pricing factors listed" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 3. FLEET SHOWCASE -->
                <div class="wf-panel" id="wf-tab-fleet" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Fleet Showcase</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-2">Showcase Your Fleet</h2>
                            <p class="wf-body text-[13px] leading-relaxed mb-4">Give customers a clear view of the vehicles available for their journey.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Sedan, SUV, Van','Vehicle Search','Passenger Capacity','Luggage Capacity','Multiple Gallery Images','Vehicle Pricing','Wi-Fi & Amenities','Air Conditioning'] as $item)
                                <div class="wf-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-fleet-showcase.jpg') }}" alt="LimoSchedule public fleet page showing vehicle cards with pricing and amenities" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 4. SERVICES -->
                <div class="wf-panel" id="wf-tab-services" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Services</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-2">Present Every Service You Offer</h2>
                            <p class="wf-body text-[13px] leading-relaxed mb-4">Every service page is independently editable &mdash; its own hero, content and SEO fields.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Airport Transfer','Chauffeur Service','Corporate Transfer','City Rides','Hourly Rides','VIP Transport'] as $item)
                                <div class="wf-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-services.jpg') }}" alt="LimoSchedule services page showing six transportation service types with booking options" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 5. BOOKING JOURNEY -->
                <div class="wf-panel" id="wf-tab-journey" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Booking Journey</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-2">From Search to Confirmation in Minutes</h2>
                            <p class="wf-body text-[13px] leading-relaxed mb-4">A short, guided path from first search to a confirmed booking.</p>

                            <div class="grid grid-cols-1 gap-2">
                                @foreach([
                                    ['01', 'Enter Pickup & Drop-off'],
                                    ['02', 'Choose Trip Type & Vehicle'],
                                    ['03', 'Add Passengers, Luggage & Stops'],
                                    ['04', 'Get Your Live Fare'],
                                    ['05', 'Confirm & Receive Booking Details'],
                                ] as [$num, $label])
                                <div class="flex items-center gap-2.5 wf-feature-card">
                                    <div class="w-6 h-6 flex-shrink-0 rounded-full flex items-center justify-center font-bold text-[11px]" style="background:#2563EB; color:#fff;">{{ $num }}</div>
                                    <p class="wf-h3 text-[12.5px]">{{ $label }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-booking-journey.jpg') }}" alt="Five-step LimoSchedule customer booking journey from pickup entry to confirmation" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 6. CUSTOMER ACCESS & SECURITY -->
                <div class="wf-panel" id="wf-tab-access" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Customer Access</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-2">Give Customers Their Own Secure Account</h2>
                            <p class="wf-body text-[13px] leading-relaxed mb-3">Customers and admins share a login page; drivers use their own separate login.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Customer Registration','Password Reset (per role)','Separate Driver Login','Active Sessions','Login History','Email Verification'] as $item)
                                <div class="wf-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <p class="text-[11.5px] wf-muted">
                                <span class="wf-not-avail">Social login</span> and <span class="wf-not-avail">OTP/SMS login</span> are not currently available.
                            </p>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-authentication.jpg') }}" alt="LimoSchedule login page with customer, admin and driver access and account security features" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 7. COMMUNICATION -->
                <div class="wf-panel" id="wf-tab-communication" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Communication</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-3">Stay Connected With Every Customer</h2>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Contact Form','Phone Click-to-Call','Email','WhatsApp Click-to-Chat','Browser Push','Booking Updates'] as $item)
                                <div class="wf-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="wf-note">
                                WhatsApp is a click-to-chat link with a pre-filled message &mdash; not a Business API integration.
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-communication.jpg') }}" alt="LimoSchedule communication channels including contact form, phone, email, WhatsApp and browser notifications" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 8. SEO & CONTENT -->
                <div class="wf-panel" id="wf-tab-seo" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">SEO &amp; Content</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-2">Built to Be Found</h2>
                            <p class="wf-body text-[13px] leading-relaxed mb-4">Technical SEO foundations on every page &mdash; not a promise of guaranteed rankings.</p>

                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['XML Sitemap','Robots.txt','Meta Titles','Canonical URLs','OG Images','JSON-LD Schema','301/302 Redirects','SEO Area Pages','Per-Page SEO Fields'] as $item)
                                <div class="wf-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-seo.jpg') }}" alt="LimoSchedule blog and SEO features including sitemap, meta tags, redirects and schema markup" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 9. BLOG, REVIEWS & LOCAL -->
                <div class="wf-panel" id="wf-tab-content" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Content &amp; Local Growth</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-3">Keep Your Website Fresh and Local</h2>

                            <div class="grid grid-cols-1 gap-2">
                                <div class="wf-feature-card"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span><span class="wf-h3 text-[12.5px] block">Blog</span><span class="text-[11.5px] wf-body">Categories, tags, view tracking, per-post SEO.</span></span></div>
                                <div class="wf-feature-card"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span><span class="wf-h3 text-[12.5px] block">Reviews</span><span class="text-[11.5px] wf-body">Moderated ratings, tied to booking/driver/vehicle.</span></span></div>
                                <div class="wf-feature-card"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span><span class="wf-h3 text-[12.5px] block">Popular Routes</span><span class="text-[11.5px] wf-body">City & intercity routes with pricing.</span></span></div>
                                <div class="wf-feature-card"><svg class="wf-check" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span><span class="wf-h3 text-[12.5px] block">Service Areas</span><span class="text-[11.5px] wf-body">Dedicated, SEO-managed coverage pages.</span></span></div>
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-content-growth.jpg') }}" alt="LimoSchedule reviews, blog, popular routes and service area features" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 10. GLOBAL READY -->
                <div class="wf-panel" id="wf-tab-global" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Global Ready</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-2">Ready for Customers Around the World</h2>
                            <p class="wf-body text-[13px] leading-relaxed mb-3">Speak your customers' language, and show fares in a currency they recognize.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Multi-Language (RTL)','DB-Backed Translations','Currency Switcher','Admin-Managed Rates'] as $item)
                                <div class="wf-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                            <div class="wf-note">
                                Exchange rates are set by the admin &mdash; not pulled automatically from a live currency-rate API.
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-global-ready.jpg') }}" alt="LimoSchedule multi-language and multi-currency settings for a global audience" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 11. DYNAMIC CMS -->
                <div class="wf-panel" id="wf-tab-cms" role="tabpanel">
                    <div class="wf-panel-grid">
                        <div>
                            <span class="wf-eyebrow mb-3">Dynamic CMS</span>
                            <h2 class="wf-h2 text-xl sm:text-2xl mb-2">Your Website. Fully Manageable.</h2>
                            <p class="wf-body text-[13px] leading-relaxed mb-3">Every page is built from admin-managed sections &mdash; nothing is hardcoded copy.</p>

                            <div class="flex flex-wrap items-center gap-1.5 mb-3">
                                @foreach(['Add','Reorder','Enable/Disable','Remove'] as $step)
                                    <div class="wf-flow-step">{{ $step }}</div>
                                    @if(!$loop->last)<svg class="wf-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                                @endforeach
                            </div>

                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['Hero','Booking Widget','Fleet','Testimonials','FAQ','Blog','Stats','Process','CTA'] as $section)
                                <div class="wf-chip">{{ $section }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="wf-figure">
                            <img src="{{ asset('public/assets/images/website-features/wf-dynamic-cms.jpg') }}" alt="LimoSchedule admin-managed website section builder with add, reorder and enable or disable controls" width="1536" height="1024" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

            </div><!-- /wf-content -->
        </div><!-- /wf-explorer -->

        <!-- Compact CTA -->
        <div class="wf-cta-box mt-14">
            <h2 class="text-white font-extrabold tracking-tight text-2xl sm:text-3xl mb-3">Give Your Limo Business a Website That Does More Than Look Good.</h2>
            <p class="text-gray-300 text-[14px] max-w-xl mx-auto mb-7">Showcase your fleet, accept bookings, calculate fares and give customers a complete online booking experience with LimoSchedule.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('contact') }}" class="wf-btn-primary w-full sm:w-auto">
                    <span>Book a Demo</span>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('features') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-[13px] rounded-xl text-[14.5px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                    View All Features
                </a>
            </div>
            <p class="text-gray-400 text-[12.5px] mt-6">
                Also see the <a href="{{ route('customer-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Customer Panel</a>, <a href="{{ route('driver-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Driver Panel</a>, and <a href="{{ route('admin-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Admin Panel</a> feature pages.
            </p>
        </div>

    </div>
</section>

</div>

@endsection

@push('scripts')
<script>
(function () {
    var tabs = document.querySelectorAll('#wf-page .wf-tab');
    var panels = document.querySelectorAll('#wf-page .wf-panel');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var targetId = tab.getAttribute('data-target');

            tabs.forEach(function (t) {
                t.classList.remove('active');
                t.setAttribute('aria-selected', 'false');
            });
            tab.classList.add('active');
            tab.setAttribute('aria-selected', 'true');

            panels.forEach(function (p) {
                p.classList.toggle('active', p.id === targetId);
            });

            if (window.innerWidth <= 900) {
                var content = document.querySelector('#wf-page .wf-content');
                if (content) {
                    var top = content.getBoundingClientRect().top + window.scrollY - 70;
                    window.scrollTo({ top: top, behavior: 'smooth' });
                }
                tab.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }
        });
    });
})();
</script>
@endpush
