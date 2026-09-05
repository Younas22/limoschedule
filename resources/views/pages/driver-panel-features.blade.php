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
                { "@@type": "Question", "name": "Can drivers see their earnings from the driver panel?", "acceptedAnswer": { "@@type": "Answer", "text": "Yes. Drivers can view a commission-based earnings statement directly in the Driver Panel, alongside their assigned trips." } },
                { "@@type": "Question", "name": "Can drivers go offline when they're not working?", "acceptedAnswer": { "@@type": "Answer", "text": "Yes. Drivers can toggle their availability online or offline from the Driver Panel, so they only receive assignments while they're on shift." } },
                { "@@type": "Question", "name": "Does the driver panel show real-time distance and ETA?", "acceptedAnswer": { "@@type": "Answer", "text": "Yes. Distance and ETA are calculated using the Google Distance Matrix API, so drivers and dispatch see accurate, real-time trip timing." } }
            ]
        }
    ]
}
</script>
<style>
    #dp-page { background: #ffffff; }
    #dp-page * { box-sizing: border-box; }
    #dp-page .dp-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 6px 14px; border-radius: 999px;
        background: rgba(37,99,235,0.08); border: 1px solid rgba(37,99,235,0.22);
        color: #1D4ED8; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
    }
    #dp-page .dp-h1 { color: #0F172A; font-weight: 800; letter-spacing: -0.02em; line-height: 1.08; }
    #dp-page .dp-h2 { color: #0F172A; font-weight: 800; letter-spacing: -0.015em; line-height: 1.15; }
    #dp-page .dp-h3 { color: #0F172A; font-weight: 700; }
    #dp-page .dp-body { color: #475569; }
    #dp-page .dp-muted { color: #64748B; }
    #dp-page .dp-btn-primary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #2563EB; color: #fff; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1px solid #1D4ED8;
        box-shadow: 0 10px 24px rgba(37,99,235,0.28);
        transition: background 0.2s ease, transform 0.2s ease;
    }
    #dp-page .dp-btn-primary:hover { background: #1D4ED8; transform: translateY(-1px); }
    #dp-page .dp-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #ffffff; color: #0F172A; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1.5px solid rgba(15,23,42,0.14);
        transition: border-color 0.2s ease, background 0.2s ease;
    }
    #dp-page .dp-btn-secondary:hover { border-color: rgba(37,99,235,0.5); background: #F8FAFC; }
    #dp-page .dp-check { color: #2563EB; flex-shrink: 0; }
    #dp-page .dp-flow-step {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 12px;
        padding: 9px 12px; display: flex; align-items: center; gap: 8px;
        box-shadow: 0 6px 16px rgba(15,23,42,0.05); font-size: 12px; font-weight: 600; color: #0F172A;
    }
    #dp-page .dp-arrow { color: #93A3B8; flex-shrink: 0; }
    #dp-page .dp-note {
        background: #EFF6FF; border: 1px solid rgba(37,99,235,0.18); border-radius: 12px;
        padding: 10px 14px; color: #1E3A8A; font-size: 12px; line-height: 1.55;
    }

    /* Explorer layout */
    #dp-page .dp-explorer { display: flex; align-items: flex-start; gap: 24px; }
    #dp-page .dp-tabs {
        flex: 0 0 260px; width: 260px; position: sticky; top: 84px;
        display: flex; flex-direction: column; gap: 3px;
        max-height: calc(100vh - 104px); overflow-y: auto;
        padding-right: 4px;
    }
    #dp-page .dp-tab {
        display: flex; align-items: center; gap: 11px;
        padding: 9px 12px; border-radius: 11px;
        border: 1px solid transparent; border-left: 3px solid transparent;
        background: transparent; text-align: left; cursor: pointer;
        transition: background 0.15s ease, border-color 0.15s ease;
        width: 100%;
    }
    #dp-page .dp-tab:hover { background: #F8FAFC; }
    #dp-page .dp-tab.active {
        background: rgba(37,99,235,0.07);
        border-color: rgba(37,99,235,0.16);
        border-left-color: #2563EB;
    }
    #dp-page .dp-tab-icon {
        width: 30px; height: 30px; border-radius: 8px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: #F1F5F9; color: #64748B;
        transition: background 0.15s ease, color 0.15s ease;
    }
    #dp-page .dp-tab.active .dp-tab-icon { background: #2563EB; color: #fff; }
    #dp-page .dp-tab-name { font-size: 13px; font-weight: 700; color: #0F172A; line-height: 1.25; }
    #dp-page .dp-tab-desc { font-size: 11px; color: #94A3B8; line-height: 1.2; margin-top: 1px; }
    #dp-page .dp-tab.active .dp-tab-desc { color: #64748B; }

    #dp-page .dp-content { flex: 1 1 0%; min-width: 0; }
    #dp-page .dp-panel { display: none; }
    #dp-page .dp-panel.active { display: block; animation: dp-fade 0.3s ease; }
    @keyframes dp-fade { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }

    #dp-page .dp-panel-grid { display: grid; grid-template-columns: 1fr; gap: 22px; align-items: center; }
    @media (min-width: 1024px) { #dp-page .dp-panel-grid { grid-template-columns: 1fr 1fr; gap: 32px; } }

    #dp-page .dp-figure {
        border-radius: 16px; overflow: hidden; border: 1px solid rgba(15,23,42,0.08);
        box-shadow: 0 20px 50px rgba(15,23,42,0.09);
        display: flex; align-items: center; justify-content: center;
        background: #F8FAFC; max-height: 400px;
    }
    #dp-page .dp-figure img { max-height: 400px; width: auto; max-width: 100%; height: auto; display: block; margin: 0 auto; }

    #dp-page .dp-feature-card {
        background: #F8FAFC; border: 1px solid rgba(15,23,42,0.06); border-radius: 12px;
        padding: 11px 13px; display: flex; align-items: flex-start; gap: 9px;
    }
    #dp-page .dp-chip {
        background: #F1F5F9; border: 1px solid rgba(15,23,42,0.06); border-radius: 9px;
        padding: 7px 10px; font-size: 11.5px; font-weight: 600; color: #0F172A; text-align: center;
    }
    #dp-page .dp-cta-box {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        border-radius: 20px; padding: 34px 28px; text-align: center;
    }

    @media (max-width: 900px) {
        #dp-page .dp-explorer { flex-direction: column; gap: 14px; }
        #dp-page .dp-tabs {
            position: sticky; top: 0; z-index: 20; width: 100%; flex: none;
            flex-direction: row; overflow-x: auto; overflow-y: hidden; max-height: none;
            padding: 8px 4px; background: #ffffff; border-bottom: 1px solid rgba(15,23,42,0.08);
            gap: 6px; -webkit-overflow-scrolling: touch;
        }
        #dp-page .dp-tab { flex: 0 0 auto; width: auto; border-left: none; border-bottom: 3px solid transparent; border-radius: 9px; }
        #dp-page .dp-tab.active { border-left-color: transparent; border-bottom-color: #2563EB; }
        #dp-page .dp-tab-desc { display: none; }
        #dp-page .dp-figure { max-height: 280px; }
        #dp-page .dp-figure img { max-height: 280px; }
    }
</style>
@endpush

@section('content')

<div id="dp-page">

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #F8FAFC 0%, #ffffff 60%);">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Driver Panel', 'url' => null],
    ];
@endphp
<style>#dp-page nav[aria-label="Breadcrumb"] a, #dp-page nav[aria-label="Breadcrumb"] span { color: #64748B !important; }
#dp-page nav[aria-label="Breadcrumb"] a:hover { color: #0F172A !important; }
#dp-page nav[aria-label="Breadcrumb"] span[aria-current] { color: #0F172A !important; }</style>
@include('partials._breadcrumbs')

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-8 pb-10 lg:pt-10 lg:pb-12 text-center">
        <span class="dp-eyebrow mb-5">Driver Panel</span>

        <h1 class="dp-h1 text-3xl sm:text-4xl lg:text-[44px] mb-4">
            A Smarter Driver Panel for Every Ride
        </h1>

        <p class="dp-body text-[15px] leading-relaxed max-w-2xl mx-auto mb-2">
            Give your drivers everything they need to manage assigned rides, track trip progress, monitor earnings, and stay connected &mdash; all from one simple dashboard.
        </p>
        <p class="dp-muted text-[13px] leading-relaxed max-w-2xl mx-auto mb-7">
            Built for daily chauffeur, limo, black car, taxi, and airport-transfer operations.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="#dp-explorer" class="dp-btn-primary w-full sm:w-auto">
                <span>Explore Driver Features</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('contact') }}" class="dp-btn-secondary w-full sm:w-auto">Get LimoSchedule</a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     COMPACT INTRO
═══════════════════════════════════════════════════════════════ -->
<section id="dp-explorer" class="relative pt-2 pb-6">
    <div class="max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="dp-h2 text-xl sm:text-2xl mb-2">Everything a Driver Needs. Nothing They Don&rsquo;t.</h2>
        <p class="dp-body text-[13.5px] leading-relaxed">Browse each part of the Driver Panel below &mdash; from the dashboard to trip workflow, earnings and mobile access.</p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MAIN FEATURE EXPLORER
═══════════════════════════════════════════════════════════════ -->
<section class="relative pb-16">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        @php
            $dpModules = [
                'dashboard' => ['Dashboard', "Today's trips & earnings"],
                'availability' => ['Availability & GPS', 'Online / offline & location'],
                'bookings' => ['Assigned Bookings', 'Ride details, organized'],
                'workflow' => ['Trip Workflow', 'Start to complete'],
                'distance' => ['Distance & ETA', 'Google Distance Matrix'],
                'earnings' => ['Earnings', 'Commission-based statement'],
                'contact' => ['Customer Contact', 'Call & trip notes'],
                'notifications' => ['Notifications', 'Push & in-app alerts'],
                'profile' => ['Profile & Preferences', 'Account & vehicle info'],
                'mobile' => ['Mobile Experience', 'Responsive on any device'],
                'journey' => ['Complete Journey', 'The full connected flow'],
            ];
            $dpIcons = [
                'dashboard' => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
                'availability' => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
                'bookings' => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
                'workflow' => '<path d="M5 12h14M12 5l7 7-7 7"/>',
                'distance' => '<circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>',
                'earnings' => '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>',
                'contact' => '<path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>',
                'notifications' => '<path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/>',
                'profile' => '<path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>',
                'mobile' => '<rect x="7" y="2" width="10" height="20" rx="2"/><line x1="11" y1="18" x2="13" y2="18"/>',
                'journey' => '<path d="M9 20l-5.5-5.5a4.95 4.95 0 010-7 4.95 4.95 0 017 0L12 9l1.5-1.5a4.95 4.95 0 017 0 4.95 4.95 0 010 7L15 20"/>',
            ];
        @endphp

        <div class="dp-explorer">

            <!-- LEFT: STICKY TABS -->
            <nav class="dp-tabs" role="tablist" aria-label="Driver Panel modules">
                @foreach($dpModules as $key => [$name, $desc])
                <button type="button" class="dp-tab @if($loop->first) active @endif" role="tab" data-target="dp-tab-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    <span class="dp-tab-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $dpIcons[$key] !!}</svg>
                    </span>
                    <span>
                        <span class="dp-tab-name block">{{ $name }}</span>
                        <span class="dp-tab-desc block">{{ $desc }}</span>
                    </span>
                </button>
                @endforeach
            </nav>

            <!-- RIGHT: CONTENT -->
            <div class="dp-content">

                <!-- 1. DASHBOARD -->
                <div class="dp-panel active" id="dp-tab-dashboard" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Dashboard</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">A Clear View of Every Driving Day</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-4">A personalized dashboard gives drivers the information they need the moment they sign in.</p>

                            <div class="grid grid-cols-2 gap-2">
                                @foreach(['Online / Offline Control','Current & Next Ride',"Today's Trips",'Month Earnings','Completed Trips','Average Rating'] as $item)
                                <div class="dp-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-dashboard.jpg') }}" alt="LimoSchedule driver dashboard with today's trips, month earnings, completed trips and average rating stat tiles" width="1254" height="1254" loading="eager" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 2. AVAILABILITY & GPS -->
                <div class="dp-panel" id="dp-tab-availability" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Availability &amp; GPS</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">Control Availability. Stay Connected.</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">One-tap Online/Offline. While online, the browser periodically reports GPS location for dispatch and ETA.</p>

                            <div class="flex flex-wrap items-center gap-1.5">
                                @foreach(['Online','GPS Reporting','Dispatch / ETA'] as $step)
                                    <div class="dp-flow-step">{{ $step }}</div>
                                    @if(!$loop->last)<svg class="dp-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                                @endforeach
                            </div>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-availability-gps.jpg') }}" alt="LimoSchedule driver availability toggle and live GPS reporting while online" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 3. ASSIGNED BOOKINGS -->
                <div class="dp-panel" id="dp-tab-bookings" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Assigned Bookings</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">Every Assigned Ride, Clearly Organized</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">Drivers see their assigned bookings and the relevant trip details for each ride.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Pickup & Drop-off','Stops','Customer Name & Phone','Vehicle & Fare'] as $item)
                                <div class="dp-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="dp-note">
                                No accept/decline step. Drivers see the rides assigned to them and the information they need.
                            </div>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-assigned-bookings.jpg') }}" alt="LimoSchedule assigned booking detail with pickup, drop-off, customer, vehicle, date, time and fare" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 4. TRIP WORKFLOW -->
                <div class="dp-panel" id="dp-tab-workflow" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Trip Workflow</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">A Simple Ride Workflow</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">From an assigned booking to a completed ride, drivers follow a short, predictable lifecycle.</p>

                            <div class="flex flex-wrap items-center gap-1.5 mb-2">
                                @foreach(['Assigned','Start Ride','In Progress','Complete Ride','Completed'] as $status)
                                    <div class="dp-flow-step">{{ $status }}</div>
                                    @if(!$loop->last)<svg class="dp-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                                @endforeach
                            </div>
                            <p class="text-[11.5px] dp-muted">Only two actions &mdash; no accept/reject step.</p>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-trip-workflow.jpg') }}" alt="LimoSchedule driver trip workflow from booking assigned through start ride, in progress, complete ride and completed" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 5. DISTANCE & ETA -->
                <div class="dp-panel" id="dp-tab-distance" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Distance &amp; ETA</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">Useful ETA &amp; Distance Information</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">Google Distance Matrix powers distance and time calculations right in the panel.</p>

                            <div class="dp-note">
                                <strong>Distance &amp; ETA only</strong> &mdash; not embedded turn-by-turn navigation. Drivers use their own phone&rsquo;s map app for directions.
                            </div>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-distance-eta.jpg') }}" alt="LimoSchedule distance and ETA calculation using Google Distance Matrix from driver location to pickup and drop-off" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 6. EARNINGS -->
                <div class="dp-panel" id="dp-tab-earnings" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Earnings</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">Know What You&rsquo;re Earning</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">Calculated from paid bookings using the commission rate configured by the admin.</p>

                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <div class="dp-chip" style="flex:1 1 100px;">Fare <strong>$145</strong></div>
                                <span class="dp-muted text-sm font-bold">&times;</span>
                                <div class="dp-chip" style="flex:1 1 100px;">Rate <strong>20%</strong></div>
                                <span class="dp-muted text-sm font-bold">=</span>
                                <div class="dp-chip" style="flex:1 1 100px; border-color: rgba(37,99,235,0.3); color:#2563EB;">Earn <strong>$29</strong></div>
                            </div>

                            <div class="dp-note">
                                A calculated statement for reference only &mdash; no payout, withdrawal, or bank account management.
                            </div>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-earnings.jpg') }}" alt="LimoSchedule driver earnings showing this month, last month, all-time total and per-booking earnings" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 7. CUSTOMER CONTACT -->
                <div class="dp-panel" id="dp-tab-contact" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Customer Contact</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">Customer Details When You Need Them</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">Assigned rides provide the customer information a driver needs for a smooth pickup.</p>

                            <div class="mb-3">
                                <span class="text-[10.5px] font-bold uppercase tracking-wide px-3 py-1.5 rounded-full" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.25);">One Tap to Call</span>
                            </div>

                            <div class="dp-note">
                                Direct phone call, not in-app chat &mdash; there is no driver&ndash;customer messaging interface.
                            </div>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-customer-contact.jpg') }}" alt="LimoSchedule assigned ride showing customer name, call passenger link and trip notes" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 8. NOTIFICATIONS -->
                <div class="dp-panel" id="dp-tab-notifications" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Notifications</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">Never Miss an Important Update</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">Browser push and a full in-app notification center, enabled from the Driver Panel.</p>

                            <div class="flex flex-wrap gap-1.5">
                                @foreach(['New Booking','Booking Cancelled','Pickup Reminder','Dispatch Update'] as $event)
                                <span class="text-[11px] font-medium px-2.5 py-1 rounded-full" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.2);">{{ $event }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-notifications.jpg') }}" alt="LimoSchedule driver notification preferences with browser push notifications and notification sound" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 9. PROFILE & PREFERENCES -->
                <div class="dp-panel" id="dp-tab-profile" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Profile &amp; Preferences</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">Keep Driver Information Up to Date</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">Drivers manage their own profile and account preferences from the panel.</p>

                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Name, Email & Phone','Profile Photo','License / Passport / ID','Password, Language & Theme'] as $item)
                                <div class="dp-chip">{{ $item }}</div>
                                @endforeach
                            </div>

                            <div class="dp-note">
                                License, passport and national ID are reference text fields &mdash; no document upload or verification.
                            </div>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-profile.jpg') }}" alt="LimoSchedule driver profile settings with contact information, vehicle details and preferences" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 10. MOBILE EXPERIENCE -->
                <div class="dp-panel" id="dp-tab-mobile" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Mobile Experience</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">Built for Drivers on the Move</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">A responsive web application that works across desktop, tablet and mobile browsers.</p>

                            <span class="text-[10.5px] font-bold uppercase tracking-wide px-3 py-1.5 rounded-full inline-block" style="background:#EFF6FF; color:#1D4ED8; border:1px solid rgba(37,99,235,0.25);">Responsive Web-Based Driver Panel</span>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-complete-experience.jpg') }}" alt="LimoSchedule driver panel shown responsively across desktop, tablet and mobile screens" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

                <!-- 11. COMPLETE JOURNEY -->
                <div class="dp-panel" id="dp-tab-journey" role="tabpanel">
                    <div class="dp-panel-grid">
                        <div>
                            <span class="dp-eyebrow mb-3">Driver Journey</span>
                            <h2 class="dp-h2 text-xl sm:text-2xl mb-2">The Complete Driver Experience</h2>
                            <p class="dp-body text-[13px] leading-relaxed mb-3">A visual summary of the full connected Driver Panel experience.</p>

                            <div class="flex flex-wrap items-center gap-1.5">
                                @foreach(['Go Online','Assigned Ride','Distance/ETA','Start Ride','Complete','Earnings'] as $step)
                                    <div class="dp-flow-step">{{ $step }}</div>
                                    @if(!$loop->last)<svg class="dp-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                                @endforeach
                            </div>
                        </div>
                        <div class="dp-figure">
                            <img src="{{ asset('public/assets/images/driver-panel-features/dp-complete-experience.jpg') }}" alt="Complete LimoSchedule driver experience from going online through assigned rides, trip execution, earnings and notifications" width="1254" height="1254" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>

            </div><!-- /dp-content -->
        </div><!-- /dp-explorer -->

        <!-- Driver Panel FAQ -->
        <div class="max-w-3xl mx-auto mt-14 mb-2">
            <h2 class="dp-h2 text-xl sm:text-2xl mb-6 text-center">Driver Panel Questions</h2>
            <div class="flex flex-col gap-3">
                <div style="background:#F8FAFC; border:1px solid rgba(15,23,42,0.08); border-radius:16px; padding:20px;">
                    <h3 class="dp-h3 text-[14.5px] mb-1.5">Can drivers see their earnings from the driver panel?</h3>
                    <p class="dp-body text-[13.5px] leading-relaxed">Yes. Drivers can view a commission-based earnings statement directly in the Driver Panel, alongside their assigned trips.</p>
                </div>
                <div style="background:#F8FAFC; border:1px solid rgba(15,23,42,0.08); border-radius:16px; padding:20px;">
                    <h3 class="dp-h3 text-[14.5px] mb-1.5">Can drivers go offline when they're not working?</h3>
                    <p class="dp-body text-[13.5px] leading-relaxed">Yes. Drivers can toggle their availability online or offline from the Driver Panel, so they only receive assignments while they're on shift.</p>
                </div>
                <div style="background:#F8FAFC; border:1px solid rgba(15,23,42,0.08); border-radius:16px; padding:20px;">
                    <h3 class="dp-h3 text-[14.5px] mb-1.5">Does the driver panel show real-time distance and ETA?</h3>
                    <p class="dp-body text-[13.5px] leading-relaxed">Yes. Distance and ETA are calculated using the Google Distance Matrix API, so drivers and dispatch see accurate, real-time trip timing.</p>
                </div>
            </div>
        </div>

        <!-- Compact CTA -->
        <div class="dp-cta-box mt-14">
            <h2 class="text-white font-extrabold tracking-tight text-2xl sm:text-3xl mb-3">Give Your Drivers a Better Way to Work</h2>
            <p class="text-gray-300 text-[14px] max-w-xl mx-auto mb-7">Launch a complete limo, taxi, chauffeur, and airport-transfer booking system with a dedicated Driver Panel built into LimoSchedule.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('contact') }}" class="dp-btn-primary w-full sm:w-auto">
                    <span>Get LimoSchedule</span>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('features') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-[13px] rounded-xl text-[14.5px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                    Explore All Features
                </a>
            </div>
            <p class="text-gray-400 text-[12.5px] mt-6">
                Also see the <a href="{{ route('website-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Website</a>, <a href="{{ route('customer-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Customer Panel</a>, and <a href="{{ route('admin-panel-features') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Admin Panel</a> feature pages, or <a href="{{ route('demo') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">explore the live demo</a>.
            </p>
        </div>

    </div>
</section>

</div>

@endsection

@push('scripts')
<script>
(function () {
    var tabs = document.querySelectorAll('#dp-page .dp-tab');
    var panels = document.querySelectorAll('#dp-page .dp-panel');

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
                var content = document.querySelector('#dp-page .dp-content');
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
