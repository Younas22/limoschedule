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
            "url": "{{ url('/') }}",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "Web",
            "softwareVersion": "Laravel 12",
            "image": "{{ url('public/assets/images/hero/hero-luxury-dashboard.jpg') }}",
            "publisher": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "FAQPage",
            "mainEntity": [
                { "@@type": "Question", "name": "Is LimoSchedule self-hosted or cloud-hosted?", "acceptedAnswer": { "@@type": "Answer", "text": "LimoSchedule is self-hosted — you deploy it on your own server. It requires PHP 8.2+, a MySQL or MariaDB database, and an Apache or Nginx web server." } },
                { "@@type": "Question", "name": "What security measures does LimoSchedule include?", "acceptedAnswer": { "@@type": "Answer", "text": "LimoSchedule includes CSRF protection, session-based authentication with separate guards for Admin, Customer and Driver, role-based permissions, bcrypt password hashing, input validation, mass-assignment protection, SQL injection and XSS protection, and rate limiting." } },
                { "@@type": "Question", "name": "What technology stack is LimoSchedule built with?", "acceptedAnswer": { "@@type": "Answer", "text": "LimoSchedule is built on PHP 8.2+, Laravel 12, a MySQL/MariaDB database, Blade templates, Alpine.js, Tailwind CSS and Vite." } }
            ]
        }
    ]
}
</script>
<style>
    #td-page { background: #ffffff; }
    #td-page * { box-sizing: border-box; }
    #td-page .td-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 6px 14px; border-radius: 999px;
        background: rgba(37,99,235,0.08); border: 1px solid rgba(37,99,235,0.22);
        color: #1D4ED8; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
    }
    #td-page .td-h1 { color: #0F172A; font-weight: 800; letter-spacing: -0.02em; line-height: 1.08; }
    #td-page .td-h2 { color: #0F172A; font-weight: 800; letter-spacing: -0.015em; line-height: 1.15; }
    #td-page .td-h3 { color: #0F172A; font-weight: 700; }
    #td-page .td-body { color: #475569; }
    #td-page .td-muted { color: #64748B; }
    #td-page .td-mono { font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace; }
    #td-page .td-btn-primary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #2563EB; color: #fff; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1px solid #1D4ED8;
        box-shadow: 0 10px 24px rgba(37,99,235,0.28);
        transition: background 0.2s ease, transform 0.2s ease;
    }
    #td-page .td-btn-primary:hover { background: #1D4ED8; transform: translateY(-1px); }
    #td-page .td-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #ffffff; color: #0F172A; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1.5px solid rgba(15,23,42,0.14);
        transition: border-color 0.2s ease, background 0.2s ease;
    }
    #td-page .td-btn-secondary:hover { border-color: rgba(37,99,235,0.5); background: #F8FAFC; }
    #td-page .td-check { color: #2563EB; flex-shrink: 0; }
    #td-page .td-flow-step {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 12px;
        padding: 9px 12px; display: flex; align-items: center; gap: 8px;
        box-shadow: 0 6px 16px rgba(15,23,42,0.05); font-size: 12px; font-weight: 600; color: #0F172A;
    }
    #td-page .td-arrow { color: #93A3B8; flex-shrink: 0; }
    #td-page .td-note {
        background: #EFF6FF; border: 1px solid rgba(37,99,235,0.18); border-radius: 12px;
        padding: 10px 14px; color: #1E3A8A; font-size: 12px; line-height: 1.55;
    }
    #td-page .td-card {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 16px;
        box-shadow: 0 10px 30px rgba(15,23,42,0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }
    #td-page .td-card:hover { transform: translateY(-3px); box-shadow: 0 16px 40px rgba(15,23,42,0.09); border-color: rgba(37,99,235,0.35); }
    #td-page .td-icon-box {
        width: 40px; height: 40px; border-radius: 11px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: rgba(37,99,235,0.1); border: 1px solid rgba(37,99,235,0.2);
    }
    #td-page .td-feature-card {
        background: #F8FAFC; border: 1px solid rgba(15,23,42,0.06); border-radius: 12px;
        padding: 11px 13px; display: flex; align-items: flex-start; gap: 9px;
    }
    #td-page .td-chip {
        background: #F1F5F9; border: 1px solid rgba(15,23,42,0.06); border-radius: 9px;
        padding: 7px 10px; font-size: 11.5px; font-weight: 600; color: #0F172A; text-align: center;
    }
    #td-page .td-badge {
        display: inline-flex; align-items: center; gap: 5px;
        background: #F1F5F9; border: 1px solid rgba(15,23,42,0.08); border-radius: 999px;
        padding: 4px 11px; font-size: 10.5px; font-weight: 700; color: #334155; letter-spacing: 0.02em;
    }
    #td-page .td-code-box {
        background: #0F172A; border-radius: 14px; padding: 20px 22px;
        color: #E2E8F0; font-size: 13px; line-height: 2; overflow-x: auto;
    }
    #td-page .td-code-box .td-comment { color: #64748B; }
    #td-page .td-code-box .td-dollar { color: #38BDF8; }
    #td-page .td-cta-box {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        border-radius: 20px; padding: 34px 28px; text-align: center;
    }

    /* Explorer layout */
    #td-page .td-explorer { display: flex; align-items: flex-start; gap: 24px; }
    #td-page .td-tabs {
        flex: 0 0 260px; width: 260px; position: sticky; top: 84px;
        display: flex; flex-direction: column; gap: 3px;
        max-height: calc(100vh - 104px); overflow-y: auto;
        padding-right: 4px;
    }
    #td-page .td-tab {
        display: flex; align-items: center; gap: 11px;
        padding: 9px 12px; border-radius: 11px;
        border: 1px solid transparent; border-left: 3px solid transparent;
        background: transparent; text-align: left; cursor: pointer;
        transition: background 0.15s ease, border-color 0.15s ease;
        width: 100%;
    }
    #td-page .td-tab:hover { background: #F8FAFC; }
    #td-page .td-tab.active {
        background: rgba(37,99,235,0.07);
        border-color: rgba(37,99,235,0.16);
        border-left-color: #2563EB;
    }
    #td-page .td-tab-icon {
        width: 30px; height: 30px; border-radius: 8px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: #F1F5F9; color: #64748B;
        transition: background 0.15s ease, color 0.15s ease;
    }
    #td-page .td-tab.active .td-tab-icon { background: #2563EB; color: #fff; }
    #td-page .td-tab-name { font-size: 13px; font-weight: 700; color: #0F172A; line-height: 1.25; }
    #td-page .td-tab-desc { font-size: 11px; color: #94A3B8; line-height: 1.2; margin-top: 1px; }
    #td-page .td-tab.active .td-tab-desc { color: #64748B; }

    #td-page .td-content { flex: 1 1 0%; min-width: 0; }
    #td-page .td-panel { display: none; }
    #td-page .td-panel.active { display: block; animation: td-fade 0.3s ease; }
    @keyframes td-fade { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }

    @media (max-width: 900px) {
        #td-page .td-explorer { flex-direction: column; gap: 14px; }
        #td-page .td-tabs {
            position: sticky; top: 0; z-index: 20; width: 100%; flex: none;
            flex-direction: row; overflow-x: auto; overflow-y: hidden; max-height: none;
            padding: 8px 4px; background: #ffffff; border-bottom: 1px solid rgba(15,23,42,0.08);
            gap: 6px; -webkit-overflow-scrolling: touch;
        }
        #td-page .td-tab { flex: 0 0 auto; width: auto; border-left: none; border-bottom: 3px solid transparent; border-radius: 9px; }
        #td-page .td-tab.active { border-left-color: transparent; border-bottom-color: #2563EB; }
        #td-page .td-tab-desc { display: none; }
    }

    @media (prefers-reduced-motion: reduce) {
        #td-page .td-panel.active, #td-page .td-card, #td-page .td-btn-primary, #td-page .td-btn-secondary { transition: none !important; animation: none !important; }
    }
</style>
@endpush

@section('content')

<div id="td-page">

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #F8FAFC 0%, #ffffff 60%);">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Technical Details', 'url' => null],
    ];
@endphp
<style>#td-page nav[aria-label="Breadcrumb"] a, #td-page nav[aria-label="Breadcrumb"] span { color: #64748B !important; }
#td-page nav[aria-label="Breadcrumb"] a:hover { color: #0F172A !important; }
#td-page nav[aria-label="Breadcrumb"] span[aria-current] { color: #0F172A !important; }</style>
@include('partials._breadcrumbs')

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 pt-8 pb-16 lg:pt-12 lg:pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-14 items-center">

            <div class="text-center lg:text-left">
                <span class="td-eyebrow mb-5">Technical Details</span>
                <h1 class="td-h1 text-3xl sm:text-4xl lg:text-[44px] mb-5">Built on a Modern, Secure &amp; Scalable Architecture</h1>
                <p class="td-body text-[15.5px] leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0">
                    LimoSchedule is engineered with a modern Laravel architecture, structured business logic, secure authentication, integrated payment gateways, Google Maps services, browser push notifications, and a production-ready MySQL database.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                    <a href="#td-explorer" class="td-btn-primary w-full sm:w-auto">
                        <span>Explore Architecture</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('installation') }}" class="td-btn-secondary w-full sm:w-auto">View Installation Guide</a>
                </div>
            </div>

            <!-- Architecture visual -->
            <div class="td-card p-6 sm:p-7">
                <div class="flex flex-col gap-2.5 mb-6">
                    @foreach(['Frontend','Laravel Application','Business Services','Database','External Integrations'] as $layer)
                    <div class="rounded-xl px-4 py-3 text-center" style="background:#F8FAFC; border:1px solid rgba(15,23,42,0.07);">
                        <span class="text-[13px] font-bold" style="color:#0F172A;">{{ $layer }}</span>
                    </div>
                    @if(!$loop->last)
                    <div class="flex justify-center">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#93A3B8" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="flex flex-wrap gap-2 justify-center">
                    @foreach(['PHP 8.2+','Laravel 12','MySQL','Blade','Alpine.js','Tailwind CSS','Vite'] as $tech)
                    <span class="td-badge">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     COMPACT INTRO
═══════════════════════════════════════════════════════════════ -->
<section id="td-explorer" class="relative pt-2 pb-6">
    <div class="max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="td-h2 text-xl sm:text-2xl mb-2">A Complete Technical Overview</h2>
        <p class="td-body text-[13.5px] leading-relaxed">Every claim on this page was verified against the actual source code &mdash; browse each area of the architecture below.</p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MAIN EXPLORER
═══════════════════════════════════════════════════════════════ -->
<section class="relative pb-16">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        @php
            $tdModules = [
                'stack' => ['Technology Stack', 'PHP, Laravel, Blade & more'],
                'architecture' => ['Application Architecture', 'MVC & service layer'],
                'panels' => ['Multi-Panel Architecture', 'Website, Customer, Driver, Admin'],
                'database' => ['Database', '109 migrations, 51 models'],
                'auth' => ['Authentication & Security', 'Guards & security layers'],
                'roles' => ['Roles & Permissions', 'Custom RBAC'],
                'payments' => ['Payment Architecture', 'Stripe & PayPal'],
                'maps' => ['Maps & Dispatch', 'Google Maps & GPS'],
                'notifications' => ['Notifications', 'Email, database & push'],
                'performance' => ['Performance & Storage', 'Caching & file handling'],
                'integrations' => ['Integrations & Endpoints', 'Third-party & internal AJAX'],
                'deployment' => ['Server & Deployment', 'Requirements & quick start'],
            ];
            $tdIcons = [
                'stack' => '<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>',
                'architecture' => '<rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/>',
                'panels' => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
                'database' => '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>',
                'auth' => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>',
                'roles' => '<path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>',
                'payments' => '<rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/>',
                'maps' => '<path d="M1 6v16l7-4 8 4 7-4V2l-7 4-8-4-7 4z"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/>',
                'notifications' => '<path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/>',
                'performance' => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
                'integrations' => '<circle cx="6" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"/>',
                'deployment' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
            ];
        @endphp

        <div class="td-explorer">

            <!-- LEFT: STICKY TABS -->
            <nav class="td-tabs" role="tablist" aria-label="Technical detail sections">
                @foreach($tdModules as $key => [$name, $desc])
                <button type="button" class="td-tab @if($loop->first) active @endif" role="tab" data-target="td-tab-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    <span class="td-tab-icon">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $tdIcons[$key] !!}</svg>
                    </span>
                    <span>
                        <span class="td-tab-name block">{{ $name }}</span>
                        <span class="td-tab-desc block">{{ $desc }}</span>
                    </span>
                </button>
                @endforeach
            </nav>

            <!-- RIGHT: CONTENT -->
            <div class="td-content">

                <!-- 1. TECHNOLOGY STACK -->
                <div class="td-panel active" id="td-tab-stack" role="tabpanel">
                    <span class="td-eyebrow mb-4">Technology Stack</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-3">Modern Technology Stack</h2>
                    <p class="td-body text-[14px] leading-relaxed mb-6">Built with proven technologies selected for reliability, maintainability and production performance.</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach([
                            ['PHP', '8.2+', 'Language', 'The server-side language the entire application runs on.'],
                            ['Laravel', '12', 'Framework', 'MVC framework providing routing, Eloquent ORM, auth and validation.'],
                            ['Blade', 'Built-in', 'Templating', 'Server-rendered templates for every page across all four panels.'],
                            ['Alpine.js', '3.x (CDN)', 'Frontend', 'Lightweight interactivity, loaded via CDN — not an npm dependency.'],
                            ['Tailwind CSS', '4', 'Styling', 'Utility-first CSS, compiled via the @tailwindcss/vite plugin.'],
                            ['Vite', '7', 'Build Tool', 'Compiles a pre-built static CSS/JS bundle for production.'],
                            ['MySQL / MariaDB', 'via Laravel', 'Database', 'Relational database — 100% Laravel migrations, no raw SQL dump.'],
                            ['Laravel Dompdf', '3.1', 'PDF Generation', 'Generates branded booking invoice PDFs.'],
                        ] as [$name, $version, $cat, $desc])
                        <div class="td-card p-5">
                            <div class="flex items-center justify-between mb-2.5">
                                <h3 class="td-h3 text-[15px]">{{ $name }}</h3>
                                <span class="td-badge">{{ $cat }}</span>
                            </div>
                            <span class="td-mono text-[12px] font-semibold" style="color:#2563EB;">{{ $version }}</span>
                            <p class="td-body text-[12.5px] leading-relaxed mt-2">{{ $desc }}</p>
                        </div>
                        @endforeach
                    </div>

                    <div class="td-note mt-5">
                        No React, Vue, Next.js or Inertia is used anywhere in the codebase — the frontend is server-rendered Blade with Alpine.js for interactivity.
                    </div>
                </div>

                <!-- 2. APPLICATION ARCHITECTURE -->
                <div class="td-panel" id="td-tab-architecture" role="tabpanel">
                    <span class="td-eyebrow mb-4">Application Architecture</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-3">Clean Laravel MVC Architecture</h2>
                    <p class="td-body text-[14px] leading-relaxed mb-5">The application follows a classic Laravel MVC architecture with purpose-built service classes for complex business logic — business-critical logic is separated from controllers, keeping the application easier to maintain.</p>

                    <div class="flex flex-wrap items-center gap-1.5 mb-6">
                        @foreach(['Public Website','Controllers','Service Layer','Eloquent Models','MySQL Database'] as $layer)
                            <div class="td-flow-step">{{ $layer }}</div>
                            @if(!$loop->last)<svg class="td-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>

                    <h3 class="td-h3 text-[14px] mb-3">Example Service Classes</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                        @foreach(['BookingCreationService','BookingFareCalculator','DriverDispatchService','DriverLocationService','GoogleMapsService','OfficeLocationService','PushNotificationService','ReportService','StripePaymentService','PayPalPaymentService'] as $svc)
                        <div class="td-chip td-mono">{{ $svc }}</div>
                        @endforeach
                    </div>
                </div>

                <!-- 3. MULTI-PANEL ARCHITECTURE -->
                <div class="td-panel" id="td-tab-panels" role="tabpanel">
                    <span class="td-eyebrow mb-4">Multi-Panel Architecture</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-6">One Platform. Four Powerful Experiences.</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach([
                            ['Public Website', 'Customer-facing booking and marketing experience.', 'Guest booking, fleet showcase, content & SEO'],
                            ['Customer Panel', 'Customer account, bookings, payments, invoices and support.', 'Session-authenticated, customer guard'],
                            ['Driver Panel', 'Assigned trips, availability, location updates and trip workflow.', 'Session-authenticated, driver guard'],
                            ['Admin Panel', 'Centralized management, configuration, bookings, drivers, customers and system controls.', 'Session-authenticated, admin guard + RBAC'],
                        ] as [$title, $desc, $access])
                        <div class="td-card p-5">
                            <div class="td-icon-box mb-3">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                            </div>
                            <h3 class="td-h3 text-[15.5px] mb-1.5">{{ $title }}</h3>
                            <p class="td-body text-[13px] leading-relaxed mb-2.5">{{ $desc }}</p>
                            <span class="td-badge">{{ $access }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- 4. DATABASE -->
                <div class="td-panel" id="td-tab-database" role="tabpanel">
                    <span class="td-eyebrow mb-4">Database</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-5">Structured MySQL Database</h2>

                    <div class="grid grid-cols-3 gap-3 mb-6">
                        <div class="td-card p-4 text-center">
                            <div class="td-h2 text-2xl" style="color:#2563EB;">109</div>
                            <div class="td-muted text-[11.5px] font-semibold mt-1">Migration Files</div>
                        </div>
                        <div class="td-card p-4 text-center">
                            <div class="td-h2 text-2xl" style="color:#2563EB;">51</div>
                            <div class="td-muted text-[11.5px] font-semibold mt-1">Eloquent Models</div>
                        </div>
                        <div class="td-card p-4 text-center">
                            <div class="td-h3 text-[13px] mt-2">Relational</div>
                            <div class="td-muted text-[11.5px] font-semibold mt-1">Data Architecture</div>
                        </div>
                    </div>

                    <h3 class="td-h3 text-[14px] mb-3">Key Business Entities</h3>
                    <div class="grid grid-cols-3 sm:grid-cols-4 gap-2 mb-6">
                        @foreach(['Booking','Customer','Driver','Vehicle','Vehicle Category','Pricing Rule','Coupon','Payment Gateway','Invoice','Wallet','Role','Permission','Page','Page Section','Country','State','City','Airport','Train Station','Pickup Point','Language','Currency','Translation'] as $entity)
                        <div class="td-chip">{{ $entity }}</div>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        @foreach([
                            ['Customer','Bookings','Driver','Vehicle'],
                            ['Country','State','City'],
                            ['Role','Permissions','Admin Access'],
                        ] as $chain)
                        <div class="td-card p-4">
                            @foreach($chain as $node)
                            <div class="td-flow-step justify-center mb-1.5" style="width:100%;">{{ $node }}</div>
                            @if(!$loop->last)<div class="flex justify-center mb-1.5"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#93A3B8" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg></div>@endif
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- 5. AUTHENTICATION & SECURITY -->
                <div class="td-panel" id="td-tab-auth" role="tabpanel">
                    <span class="td-eyebrow mb-4">Authentication &amp; Security</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-6">Built with Security in Mind</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <h3 class="td-h3 text-[14px] mb-3">Authentication Architecture</h3>
                            <div class="space-y-2.5">
                                @foreach(['Admin','Customer','Driver'] as $guard)
                                <div class="td-feature-card">
                                    <svg class="td-check" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                                    <span><span class="td-h3 text-[13.5px] block mb-0.5">{{ $guard }} Guard</span><span class="text-[12px] td-body leading-snug">Own session-authenticated guard, login flow and password-reset flow.</span></span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h3 class="td-h3 text-[14px] mb-3">Security Layers</h3>
                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['CSRF Protection','Session Authentication','Role-Based Permissions','Password Hashing (bcrypt)','Input Validation','Mass Assignment Protection','SQL Injection Protection','XSS Protection','Rate Limiting'] as $item)
                                <div class="td-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                            <span class="td-badge" style="background:#EFF6FF; border-color:rgba(37,99,235,0.25); color:#1D4ED8;">Verified Security Controls</span>
                        </div>
                    </div>
                </div>

                <!-- 6. ROLES & PERMISSIONS -->
                <div class="td-panel" id="td-tab-roles" role="tabpanel">
                    <span class="td-eyebrow mb-4">Roles &amp; Permissions</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-3">Granular Role-Based Access Control</h2>
                    <p class="td-body text-[14px] leading-relaxed mb-5">LimoSchedule includes a custom role and permission system for controlling administrative access.</p>

                    <div class="flex flex-wrap items-center gap-1.5 mb-6">
                        @foreach(['Admin','Role','Permissions','Module Access'] as $step)
                            <div class="td-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="td-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>

                    <h3 class="td-h3 text-[14px] mb-3">Permission Modules</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                        @foreach(['Bookings','Customers','Drivers','Vehicles','Payments','Reports','Pricing','Settings','Content','Blog','Languages','Currencies','Coupons','System Tools'] as $module)
                        <div class="td-chip">{{ $module }}</div>
                        @endforeach
                    </div>
                </div>

                <!-- 7. PAYMENT ARCHITECTURE -->
                <div class="td-panel" id="td-tab-payments" role="tabpanel">
                    <span class="td-eyebrow mb-4">Payment Architecture</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-5">Integrated Payment Infrastructure</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div class="td-card p-5">
                            <h3 class="td-h3 text-[15.5px] mb-3">Stripe</h3>
                            <ul class="space-y-1.5">
                                @foreach(['Stripe PHP SDK','Online card payments','Sandbox / Live mode','Configurable credentials'] as $item)
                                <li class="flex items-center gap-2"><svg class="td-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[12.5px] td-body">{{ $item }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="td-card p-5">
                            <h3 class="td-h3 text-[15.5px] mb-3">PayPal</h3>
                            <ul class="space-y-1.5">
                                @foreach(['PayPal REST integration','Sandbox / Live mode','Client ID / Secret','Online payment'] as $item)
                                <li class="flex items-center gap-2"><svg class="td-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[12.5px] td-body">{{ $item }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-1.5 mb-5">
                        @foreach(['Booking','Payment Required','Stripe / PayPal','Payment Confirmation','Booking Confirmation'] as $step)
                            <div class="td-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="td-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>

                    <div class="td-note">
                        Refunds are handled as customer wallet/store credit in the current implementation &mdash; there is no automatic Stripe/PayPal refund reversal call.
                    </div>
                </div>

                <!-- 8. MAPS & DISPATCH -->
                <div class="td-panel" id="td-tab-maps" role="tabpanel">
                    <span class="td-eyebrow mb-4">Maps &amp; Dispatch</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-5">Location-Aware Booking &amp; Dispatch</h2>

                    <div class="flex flex-wrap items-center gap-1.5 mb-3">
                        @foreach(['Booking Location','Google Maps','Distance Calculation','Fare Estimate'] as $step)
                            <div class="td-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="td-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>
                    <div class="flex flex-wrap items-center gap-1.5 mb-6">
                        @foreach(['Driver GPS','Dispatch Service','Distance / ETA','Customer'] as $step)
                            <div class="td-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="td-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>

                    <div class="grid grid-cols-3 sm:grid-cols-6 gap-2 mb-6">
                        @foreach(['Google Places','Distance Matrix','Geocoding','Driver GPS','Dispatch ETA','Caching'] as $item)
                        <div class="td-chip">{{ $item }}</div>
                        @endforeach
                    </div>

                    <div class="td-note">
                        Driver location is a single current latitude/longitude point &mdash; there is no location-history table and no live-updating map view. Distance and ETA are surfaced as numbers, not a moving GPS map.
                    </div>
                </div>

                <!-- 9. NOTIFICATIONS -->
                <div class="td-panel" id="td-tab-notifications" role="tabpanel">
                    <span class="td-eyebrow mb-4">Notifications</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-3">Native Browser Push Notifications</h2>
                    <p class="td-body text-[14px] leading-relaxed mb-5">LimoSchedule uses VAPID-based Web Push directly with browser push services, without Firebase, OneSignal or Pusher.</p>

                    <div class="flex flex-wrap items-center gap-1.5 mb-4">
                        @foreach(['Browser','Push Subscription','VAPID','Web Push Service','Notification'] as $step)
                            <div class="td-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="td-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>

                    <div class="flex flex-wrap gap-1.5 mb-7">
                        @foreach(['VAPID','Web Push','Service Worker','Chrome','Edge','Firefox'] as $item)
                        <span class="td-badge">{{ $item }}</span>
                        @endforeach
                    </div>

                    <h3 class="td-h2 text-xl mb-4">Multi-Channel Notification Architecture</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-5">
                        <div class="td-card p-4">
                            <h4 class="td-h3 text-[13.5px] mb-1">Email</h4>
                            <p class="td-body text-[12px]">Laravel Mail / Notification</p>
                        </div>
                        <div class="td-card p-4">
                            <h4 class="td-h3 text-[13.5px] mb-1">Database</h4>
                            <p class="td-body text-[12px]">In-app notifications</p>
                        </div>
                        <div class="td-card p-4">
                            <h4 class="td-h3 text-[13.5px] mb-1">Web Push</h4>
                            <p class="td-body text-[12px]">Native browser push</p>
                        </div>
                    </div>

                    <div class="td-note">
                        SMS is not currently integrated. WhatsApp booking links use <span class="td-mono">wa.me</span> deep links rather than the WhatsApp Business API.
                    </div>
                </div>

                <!-- 10. PERFORMANCE & STORAGE -->
                <div class="td-panel" id="td-tab-performance" role="tabpanel">
                    <span class="td-eyebrow mb-4">Performance &amp; Storage</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-5">Optimized for Efficient Performance</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-7">
                        @foreach([
                            ['Settings Caching', 'Forever-cached singleton settings with automatic invalidation.'],
                            ['Google Maps Caching', 'Distance Matrix and Geocoding responses are cached to reduce API usage.'],
                            ['Dispatch Snapshot Caching', '60-second / movement-based ETA snapshot caching.'],
                            ['Pagination', 'Large lists use paginated queries.'],
                            ['Pre-Built Assets', 'Tailwind/Vite assets are compiled before production deployment.'],
                        ] as [$title, $desc])
                        <div class="td-feature-card">
                            <svg class="td-check" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span><span class="td-h3 text-[13.5px] block mb-0.5">{{ $title }}</span><span class="text-[12px] td-body leading-snug">{{ $desc }}</span></span>
                        </div>
                        @endforeach
                    </div>

                    <h3 class="td-h2 text-xl mb-3">Simple Production-Ready File Handling</h3>
                    <p class="td-body text-[13.5px] leading-relaxed mb-3">Uploaded files are stored directly under <span class="td-mono" style="color:#2563EB;">public/uploads/</span> — covering Settings, Pages, Vehicles, Blog, push-notification assets and backups.</p>
                    <div class="td-note">
                        Laravel <span class="td-mono">storage:link</span> is not required by the current implementation. No cloud/S3 storage is wired up.
                    </div>
                </div>

                <!-- 11. INTEGRATIONS & ENDPOINTS -->
                <div class="td-panel" id="td-tab-integrations" role="tabpanel">
                    <span class="td-eyebrow mb-4">Integrations &amp; Endpoints</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-5">Third-Party Integrations</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-7">
                        @foreach([
                            ['Google Maps', 'Places, Distance Matrix and Geocoding'],
                            ['Stripe', 'Online card payments'],
                            ['PayPal', 'Alternative online payments'],
                            ['Web Push', 'Native browser notifications'],
                            ['WhatsApp', 'Click-to-chat booking handoff'],
                        ] as [$name, $purpose])
                        <div class="td-feature-card">
                            <svg class="td-check" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span><span class="td-h3 text-[13.5px] block mb-0.5">{{ $name }}</span><span class="text-[12px] td-body leading-snug">{{ $purpose }}</span></span>
                        </div>
                        @endforeach
                    </div>

                    <h3 class="td-h2 text-xl mb-3">Internal Application Endpoints</h3>
                    <p class="td-body text-[13.5px] leading-relaxed mb-4">LimoSchedule does not currently expose a public partner REST API. Instead, the application uses protected internal AJAX endpoints for its own frontend interactions.</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                        @foreach(['/booking/quote','/coupon/apply','/push/subscribe','/push/unsubscribe','/push/status','/driver/location','/account/bookings/{id}/dispatch'] as $endpoint)
                        <div class="td-card px-4 py-3 flex items-center justify-between gap-3">
                            <span class="td-mono text-[12px]" style="color:#0F172A;">{{ $endpoint }}</span>
                            <span class="td-badge flex-shrink-0">Internal AJAX</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- 12. SERVER & DEPLOYMENT -->
                <div class="td-panel" id="td-tab-deployment" role="tabpanel">
                    <span class="td-eyebrow mb-4">Server &amp; Deployment</span>
                    <h2 class="td-h2 text-2xl sm:text-3xl mb-5">Production Environment Requirements</h2>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mb-3">
                        @foreach([
                            ['PHP', '8.2+'],
                            ['Database', 'MySQL / MariaDB'],
                            ['Web Server', 'Apache / Nginx'],
                            ['Composer', '2.x'],
                        ] as [$label, $value])
                        <div class="td-card px-3 py-3 text-center">
                            <div class="text-[10.5px] uppercase tracking-wide td-muted font-semibold mb-1">{{ $label }}</div>
                            <div class="td-h3 text-[13px]">{{ $value }}</div>
                        </div>
                        @endforeach
                    </div>
                    <p class="td-body text-[12.5px] mb-4">Node.js / npm is required for the one-time asset build only — not needed at runtime once <span class="td-mono">public/build/</span> is deployed.</p>

                    <h3 class="td-h3 text-[13px] mb-2.5">PHP Extensions</h3>
                    <div class="flex flex-wrap gap-1.5 mb-5">
                        @foreach(['GD','mbstring','openssl','pdo_mysql','tokenizer','xml','ctype','json','bcmath','fileinfo'] as $ext)
                        <span class="td-badge td-mono">{{ $ext }}</span>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-7">
                        <div class="td-note">Document Root: <span class="td-mono">/public</span></div>
                        <div class="td-note">HTTPS required for browser push outside localhost.</div>
                    </div>

                    <h3 class="td-h2 text-xl mb-4">From Source Code to Production</h3>
                    <div class="flex flex-wrap gap-1.5 mb-7">
                        @foreach(['1. Upload Source Code','2. Configure Environment','3. Create Database','4. Install Composer Dependencies','5. Configure App Key','6. Run Migrations','7. Build Assets','8. Configure Permissions','9. Configure Integrations','10. Enable HTTPS','11. Test Application','12. Go Live'] as $step)
                        <div class="td-flow-step">{{ $step }}</div>
                        @endforeach
                    </div>

                    <h3 class="td-h2 text-xl mb-3">Quick Installation</h3>
                    <div class="td-code-box mb-3">
<span class="td-comment"># Install PHP dependencies</span><br>
<span class="td-dollar">$</span> composer install<br><br>
<span class="td-comment"># Install & build frontend assets</span><br>
<span class="td-dollar">$</span> npm install<br>
<span class="td-dollar">$</span> npm run build<br><br>
<span class="td-comment"># Application setup</span><br>
<span class="td-dollar">$</span> php artisan key:generate<br>
<span class="td-dollar">$</span> php artisan migrate
                    </div>
                    <p class="td-muted text-[12px] mb-5">Production uses pre-built assets and does not require a running Vite dev server.</p>

                    <a href="{{ route('installation') }}" class="td-btn-secondary">View Complete Installation Guide</a>
                </div>

            </div><!-- /td-content -->
        </div><!-- /td-explorer -->

        <!-- Technical scope (compact) -->
        <div class="mt-14">
            <div class="text-center max-w-2xl mx-auto mb-6">
                <span class="td-eyebrow mb-4">Current Technical Scope</span>
                <h3 class="td-h2 text-xl sm:text-2xl">Clear Technical Scope for Transparent Deployment</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 max-w-3xl mx-auto">
                @foreach(['No public REST API','No SMS provider integration','No dedicated 2FA','No live location-history tracking','No scheduled cron tasks currently implemented','No automatic payment-provider refund reversal','No cloud/S3 storage integration'] as $item)
                <div class="td-feature-card">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#64748B" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round" class="flex-shrink-0 mt-0.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <span class="text-[12.5px] td-body">{{ $item }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Technical FAQ -->
        <div class="max-w-3xl mx-auto mt-14 mb-2">
            <h2 class="td-h2 text-xl sm:text-2xl mb-6 text-center">Technical Questions</h2>
            <div class="flex flex-col gap-3">
                <div class="td-card p-5">
                    <h3 class="td-h3 text-[14.5px] mb-1.5">Is LimoSchedule self-hosted or cloud-hosted?</h3>
                    <p class="td-body text-[13.5px] leading-relaxed">LimoSchedule is self-hosted &mdash; you deploy it on your own server. It requires PHP 8.2+, a MySQL or MariaDB database, and an Apache or Nginx web server.</p>
                </div>
                <div class="td-card p-5">
                    <h3 class="td-h3 text-[14.5px] mb-1.5">What security measures does LimoSchedule include?</h3>
                    <p class="td-body text-[13.5px] leading-relaxed">CSRF protection, session-based authentication with separate guards for Admin, Customer and Driver, role-based permissions, bcrypt password hashing, input validation, mass-assignment protection, SQL injection and XSS protection, and rate limiting.</p>
                </div>
                <div class="td-card p-5">
                    <h3 class="td-h3 text-[14.5px] mb-1.5">What technology stack is LimoSchedule built with?</h3>
                    <p class="td-body text-[13.5px] leading-relaxed">PHP 8.2+, Laravel 12, a MySQL/MariaDB database, Blade templates, Alpine.js, Tailwind CSS and Vite.</p>
                </div>
            </div>
        </div>

        <!-- Compact CTA -->
        <div class="td-cta-box mt-14">
            <h2 class="text-white font-extrabold tracking-tight text-2xl sm:text-3xl mb-3">Ready to Deploy Your Own Limo Booking Platform?</h2>
            <p class="text-gray-300 text-[14px] max-w-xl mx-auto mb-7">Get a complete limo and chauffeur booking system built on a modern Laravel architecture with customer, driver and admin experiences.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 flex-wrap">
                <a href="{{ route('features') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-[13px] rounded-xl text-[14.5px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                    Explore Features
                </a>
                <a href="{{ route('installation') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-[13px] rounded-xl text-[14.5px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                    View Installation Guide
                </a>
                <a href="{{ route('contact') }}" class="td-btn-primary w-full sm:w-auto">
                    <span>Get LimoSchedule</span>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

    </div>
</section>

</div>

@endsection

@push('scripts')
<script>
(function () {
    var tabs = document.querySelectorAll('#td-page .td-tab');
    var panels = document.querySelectorAll('#td-page .td-panel');

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
                var content = document.querySelector('#td-page .td-content');
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
