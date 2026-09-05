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
            "@@type": "TechArticle",
            "headline": "LimoSchedule Installation & Documentation",
            "description": "Complete LimoSchedule installation and deployment guide covering server requirements, Laravel setup, database configuration, payments, Google Maps, browser push notifications, production deployment and troubleshooting.",
            "url": "{{ route('installation') }}",
            "publisher": { "@@id": "{{ url('/') }}#organization" }
        },
        {
            "@@type": "FAQPage",
            "mainEntity": [
                { "@@type": "Question", "name": "Do I need a Google Maps API key to use LimoSchedule?", "acceptedAnswer": { "@@type": "Answer", "text": "Yes. LimoSchedule uses Google Maps services, which requires creating a Google Cloud Console API key, enabling the required APIs, and restricting the key by referrer before adding it to your installation." } },
                { "@@type": "Question", "name": "Do browser push notifications require special server setup?", "acceptedAnswer": { "@@type": "Answer", "text": "HTTPS is required in production. Beyond that, push notifications execute inline with each request — there's no separate worker process to run, which keeps setup simple for small deployments." } },
                { "@@type": "Question", "name": "What if I run into a problem during installation?", "acceptedAnswer": { "@@type": "Answer", "text": "The installation guide includes a dedicated Troubleshooting section covering common setup issues, so you can diagnose and resolve problems without leaving the documentation." } }
            ]
        }
    ]
}
</script>
<style>
    #inst-page { background: #ffffff; }
    #inst-page * { box-sizing: border-box; }
    #inst-page .inst-eyebrow {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 6px 14px; border-radius: 999px;
        background: rgba(37,99,235,0.08); border: 1px solid rgba(37,99,235,0.22);
        color: #1D4ED8; font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase;
    }
    #inst-page .inst-h1 { color: #0F172A; font-weight: 800; letter-spacing: -0.02em; line-height: 1.08; }
    #inst-page .inst-h2 { color: #0F172A; font-weight: 800; letter-spacing: -0.015em; line-height: 1.15; }
    #inst-page .inst-h3 { color: #0F172A; font-weight: 700; }
    #inst-page .inst-body { color: #475569; }
    #inst-page .inst-muted { color: #64748B; }
    #inst-page .inst-mono { font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace; }
    #inst-page .inst-btn-primary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #2563EB; color: #fff; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1px solid #1D4ED8;
        box-shadow: 0 10px 24px rgba(37,99,235,0.28);
        transition: background 0.2s ease, transform 0.2s ease;
    }
    #inst-page .inst-btn-primary:hover { background: #1D4ED8; transform: translateY(-1px); }
    #inst-page .inst-btn-secondary {
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        background: #ffffff; color: #0F172A; font-weight: 700; font-size: 15px;
        padding: 15px 30px; border-radius: 12px; border: 1.5px solid rgba(15,23,42,0.14);
        transition: border-color 0.2s ease, background 0.2s ease;
    }
    #inst-page .inst-btn-secondary:hover { border-color: rgba(37,99,235,0.5); background: #F8FAFC; }
    #inst-page .inst-check { color: #2563EB; flex-shrink: 0; }
    #inst-page .inst-flow-step {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 12px;
        padding: 9px 12px; display: flex; align-items: center; gap: 8px;
        box-shadow: 0 6px 16px rgba(15,23,42,0.05); font-size: 12px; font-weight: 600; color: #0F172A;
        white-space: nowrap;
    }
    #inst-page .inst-arrow { color: #93A3B8; flex-shrink: 0; }
    #inst-page .inst-note {
        background: #EFF6FF; border: 1px solid rgba(37,99,235,0.18); border-radius: 12px;
        padding: 10px 14px; color: #1E3A8A; font-size: 12.5px; line-height: 1.6;
    }
    #inst-page .inst-warn {
        background: #FFFBEB; border: 1px solid rgba(217,119,6,0.25); border-radius: 12px;
        padding: 10px 14px; color: #92400E; font-size: 12.5px; line-height: 1.6;
    }
    #inst-page .inst-danger {
        background: #FEF2F2; border: 1px solid rgba(220,38,38,0.25); border-radius: 12px;
        padding: 10px 14px; color: #991B1B; font-size: 12.5px; line-height: 1.6;
    }
    #inst-page .inst-card {
        background: #ffffff; border: 1px solid rgba(15,23,42,0.08); border-radius: 16px;
        box-shadow: 0 10px 30px rgba(15,23,42,0.05);
    }
    #inst-page .inst-icon-box {
        width: 40px; height: 40px; border-radius: 11px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: rgba(37,99,235,0.1); border: 1px solid rgba(37,99,235,0.2);
    }
    #inst-page .inst-feature-card {
        background: #F8FAFC; border: 1px solid rgba(15,23,42,0.06); border-radius: 12px;
        padding: 11px 13px; display: flex; align-items: flex-start; gap: 9px;
    }
    #inst-page .inst-chip {
        background: #F1F5F9; border: 1px solid rgba(15,23,42,0.06); border-radius: 9px;
        padding: 7px 10px; font-size: 11.5px; font-weight: 600; color: #0F172A; text-align: center;
    }
    #inst-page .inst-badge {
        display: inline-flex; align-items: center; gap: 5px;
        background: #F1F5F9; border: 1px solid rgba(15,23,42,0.08); border-radius: 999px;
        padding: 4px 11px; font-size: 10.5px; font-weight: 700; color: #334155; letter-spacing: 0.02em;
    }
    #inst-page .inst-cta-box {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        border-radius: 20px; padding: 34px 28px; text-align: center;
    }

    /* Code blocks */
    #inst-page .inst-code-box {
        background: #0F172A; border-radius: 14px; overflow: hidden; margin: 10px 0;
    }
    #inst-page .inst-code-header {
        display: flex; align-items: center; justify-content: space-between;
        padding: 9px 16px; border-bottom: 1px solid rgba(255,255,255,0.08);
        background: rgba(255,255,255,0.03);
    }
    #inst-page .inst-code-lang {
        font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #64748B;
    }
    #inst-page .inst-copy-btn {
        display: inline-flex; align-items: center; gap: 5px;
        background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12);
        color: #CBD5E1; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 7px;
        cursor: pointer; transition: background 0.15s ease, color 0.15s ease;
    }
    #inst-page .inst-copy-btn:hover { background: rgba(255,255,255,0.12); color: #fff; }
    #inst-page .inst-copy-btn.copied { color: #4ADE80; }
    #inst-page .inst-code-pre {
        margin: 0; padding: 14px 16px; overflow-x: auto; -webkit-overflow-scrolling: touch;
        color: #E2E8F0; font-size: 12.5px; line-height: 1.8; white-space: pre;
    }
    #inst-page .inst-code-pre .inst-c { color: #64748B; }
    #inst-page .inst-code-pre .inst-d { color: #38BDF8; }

    /* Accordion */
    #inst-page .inst-accordion { border: 1px solid rgba(15,23,42,0.08); border-radius: 12px; overflow: hidden; margin-bottom: 8px; }
    #inst-page .inst-accordion summary {
        display: flex; align-items: center; justify-content: space-between; gap: 10px;
        padding: 13px 16px; cursor: pointer; font-weight: 700; font-size: 13.5px; color: #0F172A;
        background: #F8FAFC; list-style: none;
    }
    #inst-page .inst-accordion summary::-webkit-details-marker { display: none; }
    #inst-page .inst-accordion summary .inst-chev { transition: transform 0.2s ease; color: #64748B; flex-shrink: 0; }
    #inst-page .inst-accordion[open] summary .inst-chev { transform: rotate(180deg); }
    #inst-page .inst-accordion-body { padding: 14px 16px; }

    /* Checklist */
    #inst-page .inst-checklist-item {
        display: flex; align-items: flex-start; gap: 10px;
        padding: 9px 4px; border-bottom: 1px solid rgba(15,23,42,0.06);
    }
    #inst-page .inst-checklist-item:last-child { border-bottom: none; }
    #inst-page .inst-checklist-box {
        width: 18px; height: 18px; border-radius: 5px; border: 1.5px solid rgba(15,23,42,0.2);
        flex-shrink: 0; margin-top: 1px;
    }

    /* Explorer layout */
    #inst-page .inst-explorer { display: flex; align-items: flex-start; gap: 24px; }
    #inst-page .inst-tabs {
        flex: 0 0 250px; width: 250px; position: sticky; top: 84px;
        display: flex; flex-direction: column; gap: 2px;
        max-height: calc(100vh - 104px); overflow-y: auto;
        padding-right: 4px;
    }
    #inst-page .inst-tab {
        display: flex; align-items: center; gap: 10px;
        padding: 8px 11px; border-radius: 10px;
        border: 1px solid transparent; border-left: 3px solid transparent;
        background: transparent; text-align: left; cursor: pointer;
        transition: background 0.15s ease, border-color 0.15s ease;
        width: 100%;
    }
    #inst-page .inst-tab:hover { background: #F8FAFC; }
    #inst-page .inst-tab.active {
        background: rgba(37,99,235,0.07);
        border-color: rgba(37,99,235,0.16);
        border-left-color: #2563EB;
    }
    #inst-page .inst-tab-icon {
        width: 26px; height: 26px; border-radius: 7px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: #F1F5F9; color: #64748B;
        transition: background 0.15s ease, color 0.15s ease;
    }
    #inst-page .inst-tab.active .inst-tab-icon { background: #2563EB; color: #fff; }
    #inst-page .inst-tab-name { font-size: 12.5px; font-weight: 700; color: #0F172A; line-height: 1.25; }

    #inst-page .inst-content { flex: 1 1 0%; min-width: 0; }
    #inst-page .inst-panel { display: none; }
    #inst-page .inst-panel.active { display: block; animation: inst-fade 0.3s ease; }
    @keyframes inst-fade { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }

    #inst-page .inst-step {
        display: flex; gap: 14px; padding: 16px 0; border-bottom: 1px solid rgba(15,23,42,0.07);
    }
    #inst-page .inst-step:last-child { border-bottom: none; }
    #inst-page .inst-step-num {
        width: 30px; height: 30px; border-radius: 9px; flex-shrink: 0;
        display: flex; align-items: center; justify-content: center;
        background: rgba(37,99,235,0.1); border: 1px solid rgba(37,99,235,0.22);
        color: #1D4ED8; font-weight: 800; font-size: 13px;
    }

    @media (max-width: 900px) {
        #inst-page .inst-explorer { flex-direction: column; gap: 14px; }
        #inst-page .inst-tabs {
            position: sticky; top: 0; z-index: 20; width: 100%; flex: none;
            flex-direction: row; overflow-x: auto; overflow-y: hidden; max-height: none;
            padding: 8px 4px; background: #ffffff; border-bottom: 1px solid rgba(15,23,42,0.08);
            gap: 6px; -webkit-overflow-scrolling: touch;
        }
        #inst-page .inst-tab { flex: 0 0 auto; width: auto; border-left: none; border-bottom: 3px solid transparent; border-radius: 9px; }
        #inst-page .inst-tab.active { border-left-color: transparent; border-bottom-color: #2563EB; }
    }

    @media (prefers-reduced-motion: reduce) {
        #inst-page .inst-panel.active, #inst-page .inst-card { transition: none !important; animation: none !important; }
    }
</style>
@endpush

@section('content')

<div id="inst-page">

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #F8FAFC 0%, #ffffff 60%);">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Installation & Documentation', 'url' => null],
    ];
@endphp
<style>#inst-page nav[aria-label="Breadcrumb"] a, #inst-page nav[aria-label="Breadcrumb"] span { color: #64748B !important; }
#inst-page nav[aria-label="Breadcrumb"] a:hover { color: #0F172A !important; }
#inst-page nav[aria-label="Breadcrumb"] span[aria-current] { color: #0F172A !important; }</style>
@include('partials._breadcrumbs')

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 pt-8 pb-14 lg:pt-12 lg:pb-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-14 items-center">

            <div class="text-center lg:text-left">
                <span class="inst-eyebrow mb-5">Installation &amp; Documentation</span>
                <h1 class="inst-h1 text-3xl sm:text-4xl lg:text-[42px] mb-5">Deploy LimoSchedule With Confidence</h1>
                <p class="inst-body text-[15px] leading-relaxed mb-6 max-w-xl mx-auto lg:mx-0">
                    Everything you need to install, configure, deploy, update and maintain your LimoSchedule booking platform on a production server.
                </p>
                <div class="flex flex-wrap gap-2 justify-center lg:justify-start mb-7">
                    @foreach(['PHP 8.2+','Laravel 12','MySQL / MariaDB','Composer 2.x','Node.js + npm'] as $tech)
                    <span class="inst-badge">{{ $tech }}</span>
                    @endforeach
                </div>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3">
                    <a href="#inst-explorer" class="inst-btn-primary w-full sm:w-auto">
                        <span>Start Installation</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="#inst-tab-requirements" class="inst-btn-secondary w-full sm:w-auto" onclick="document.querySelector('[data-target=inst-tab-requirements]')?.click();">View Requirements</a>
                </div>
            </div>

            <div class="inst-card p-6">
                <span class="inst-badge mb-4" style="background:#ECFDF5; border-color:rgba(22,163,74,0.25); color:#15803D;">Production Ready</span>
                <div class="space-y-3">
                    @foreach([
                        ['Application', 'LimoSchedule'],
                        ['Architecture', 'Laravel + Blade'],
                        ['Database', 'MySQL / MariaDB'],
                        ['Assets', 'Vite / Tailwind'],
                    ] as [$label, $value])
                    <div class="flex items-center justify-between py-2" style="border-bottom: 1px solid rgba(15,23,42,0.06);">
                        <span class="inst-muted text-[12.5px] font-semibold">{{ $label }}</span>
                        <span class="inst-h3 text-[13px]">{{ $value }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     QUICK START OVERVIEW
═══════════════════════════════════════════════════════════════ -->
<section id="inst-explorer" class="relative pt-2 pb-10">
    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-8">
            <h2 class="inst-h2 text-xl sm:text-2xl mb-2">Installation at a Glance</h2>
            <p class="inst-body text-[13.5px] leading-relaxed">Most installations can be completed using the included Composer setup command.</p>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-1.5 mb-6">
            @foreach(['01 Server Requirements','02 Upload Source Code','03 Configure Database','04 Configure Environment','05 Run Migrations & Seeders','06 Build Assets','07 Configure Web Server','08 Enable Integrations','09 Run Production Checks','10 Go Live'] as $step)
                <div class="inst-flow-step">{{ $step }}</div>
                @if(!$loop->last)<svg class="inst-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
            @endforeach
        </div>

        <div class="inst-code-box max-w-md mx-auto">
            <div class="inst-code-header">
                <span class="inst-code-lang">bash</span>
                <button type="button" class="inst-copy-btn" data-copy="composer setup">Copy</button>
            </div>
            <pre class="inst-code-pre">composer setup</pre>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     MAIN EXPLORER
═══════════════════════════════════════════════════════════════ -->
<section class="relative pb-16">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        @php
            $instModules = [
                'requirements' => 'Requirements',
                'installation' => 'Installation',
                'database' => 'Database',
                'environment' => 'Environment',
                'storage' => 'Storage',
                'permissions' => 'Permissions',
                'webserver' => 'Web Server',
                'https' => 'HTTPS',
                'queues' => 'Queues & Cron',
                'email' => 'Email',
                'payments' => 'Payments',
                'maps' => 'Google Maps',
                'push' => 'Push Notifications',
                'accounts' => 'Admin & Accounts',
                'deployment' => 'Production Deployment',
                'troubleshooting' => 'Troubleshooting',
                'updating' => 'Updating',
                'backups' => 'Backups & Notes',
            ];
            $instIcons = [
                'requirements' => '<path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>',
                'installation' => '<path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>',
                'database' => '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>',
                'environment' => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>',
                'storage' => '<path d="M22 12H2M5.45 5.11L2 12v6a2 2 0 002 2h16a2 2 0 002-2v-6l-3.45-6.89A2 2 0 0016.76 4H7.24a2 2 0 00-1.79 1.11z"/>',
                'permissions' => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>',
                'webserver' => '<rect x="2" y="3" width="20" height="8" rx="2"/><rect x="2" y="13" width="20" height="8" rx="2"/><line x1="6" y1="7" x2="6.01" y2="7"/><line x1="6" y1="17" x2="6.01" y2="17"/>',
                'https' => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/><circle cx="12" cy="16" r="1.5"/>',
                'queues' => '<path d="M9 11l3 3L22 4"/><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
                'email' => '<path d="M4 4h16v16H4z"/><polyline points="22 6 12 13 2 6"/>',
                'payments' => '<rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/>',
                'maps' => '<path d="M1 6v16l7-4 8 4 7-4V2l-7 4-8-4-7 4z"/><line x1="8" y1="2" x2="8" y2="18"/><line x1="16" y1="6" x2="16" y2="22"/>',
                'push' => '<path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/>',
                'accounts' => '<path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>',
                'deployment' => '<circle cx="12" cy="12" r="10"/><polyline points="16 8 12 12 16 16"/><line x1="8" y1="12" x2="12" y2="12"/>',
                'troubleshooting' => '<path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>',
                'updating' => '<polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 11-2.12-9.36L23 10"/>',
                'backups' => '<path d="M22 12H2M5.45 5.11L2 12v6a2 2 0 002 2h16a2 2 0 002-2v-6l-3.45-6.89A2 2 0 0016.76 4H7.24a2 2 0 00-1.79 1.11z"/><path d="M12 12v4"/>',
            ];
        @endphp

        <div class="inst-explorer">

            <!-- LEFT: STICKY DOC NAVIGATION -->
            <nav class="inst-tabs" role="tablist" aria-label="Documentation sections">
                @foreach($instModules as $key => $name)
                <button type="button" class="inst-tab @if($loop->first) active @endif" role="tab" data-target="inst-tab-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                    <span class="inst-tab-icon">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">{!! $instIcons[$key] !!}</svg>
                    </span>
                    <span class="inst-tab-name">{{ $name }}</span>
                </button>
                @endforeach
            </nav>

            <!-- RIGHT: CONTENT -->
            <div class="inst-content">

                <!-- REQUIREMENTS -->
                <div class="inst-panel active" id="inst-tab-requirements" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Requirements</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-3">System Requirements</h2>
                    <p class="inst-body text-[14px] leading-relaxed mb-6">Prepare your server with the following requirements before installation.</p>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mb-4">
                        @foreach([
                            ['PHP', '8.2+'],
                            ['Database', 'MySQL / MariaDB'],
                            ['Composer', '2.x'],
                            ['Web Server', 'Apache / Nginx'],
                        ] as [$label, $value])
                        <div class="inst-card px-3 py-3 text-center">
                            <div class="text-[10.5px] uppercase tracking-wide inst-muted font-semibold mb-1">{{ $label }}</div>
                            <div class="inst-h3 text-[13px]">{{ $value }}</div>
                        </div>
                        @endforeach
                    </div>
                    <p class="inst-body text-[12.5px] mb-5">Developed and tested against PHP 8.2.12. Node.js + npm is required for frontend asset compilation only.</p>

                    <h3 class="inst-h3 text-[13px] mb-2.5">Required PHP Extensions</h3>
                    <div class="flex flex-wrap gap-1.5 mb-5">
                        @foreach(['gd','pdo_mysql','mbstring','openssl','tokenizer','xml','ctype','json','bcmath','fileinfo'] as $ext)
                        <span class="inst-badge inst-mono">{{ $ext }}</span>
                        @endforeach
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-5">
                        <div class="inst-note">Document Root: <span class="inst-mono">/public</span></div>
                        <div class="inst-note">HTTPS required for browser push notifications in production.</div>
                    </div>

                    <div class="inst-note">
                        Node.js/npm is required to build frontend assets. It is not required at runtime once <span class="inst-mono">public/build/</span> exists on the server. MySQL/MariaDB only — no SQLite/Postgres installation path is configured.
                    </div>
                </div>

                <!-- INSTALLATION -->
                <div class="inst-panel" id="inst-tab-installation" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Installation</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-2">Fresh Installation</h2>
                    <p class="inst-body text-[14px] leading-relaxed mb-2">Step-by-step installation for a fresh server.</p>

                    <div class="inst-step">
                        <div class="inst-step-num">1</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Obtain the Source Code</h3>
                            <p class="inst-body text-[12.5px] mb-2">Clone the repository, or extract the delivered source archive.</p>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="git clone <repository>&#10;cd limoschedule_software">Copy</button></div>
                                <pre class="inst-code-pre">git clone &lt;repository&gt;
cd limoschedule_software</pre>
                            </div>
                        </div>
                    </div>

                    <div class="inst-step">
                        <div class="inst-step-num">2</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Install Composer Dependencies</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="composer install">Copy</button></div>
                                <pre class="inst-code-pre">composer install</pre>
                            </div>
                        </div>
                    </div>

                    <div class="inst-step">
                        <div class="inst-step-num">3</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Create Environment File</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="cp .env.example .env">Copy</button></div>
                                <pre class="inst-code-pre">cp .env.example .env</pre>
                            </div>
                        </div>
                    </div>

                    <div class="inst-step">
                        <div class="inst-step-num">4</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Generate Application Key</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan key:generate">Copy</button></div>
                                <pre class="inst-code-pre">php artisan key:generate</pre>
                            </div>
                        </div>
                    </div>

                    <div class="inst-step">
                        <div class="inst-step-num">5</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Create Database</h3>
                            <p class="inst-body text-[12.5px] mb-2">LimoSchedule uses Laravel migrations exclusively &mdash; there is no SQL dump to import.</p>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy='mysql -u root -p -e "CREATE DATABASE limoschedule CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"'>Copy</button></div>
                                <pre class="inst-code-pre">mysql -u root -p -e "CREATE DATABASE limoschedule CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"</pre>
                            </div>
                        </div>
                    </div>

                    <div class="inst-step">
                        <div class="inst-step-num">6</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Configure Database</h3>
                            <p class="inst-body text-[12.5px] mb-2">Add your DB credentials to <span class="inst-mono">.env</span>.</p>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">env</span><button type="button" class="inst-copy-btn" data-copy="DB_CONNECTION=mysql&#10;DB_HOST=127.0.0.1&#10;DB_PORT=3306&#10;DB_DATABASE=&#10;DB_USERNAME=&#10;DB_PASSWORD=">Copy</button></div>
                                <pre class="inst-code-pre">DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=</pre>
                            </div>
                        </div>
                    </div>

                    <div class="inst-step">
                        <div class="inst-step-num">7</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Run Migrations</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan migrate">Copy</button></div>
                                <pre class="inst-code-pre">php artisan migrate</pre>
                            </div>
                        </div>
                    </div>

                    <div class="inst-step">
                        <div class="inst-step-num">8</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Seed Demo / Initial Data</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan db:seed">Copy</button></div>
                                <pre class="inst-code-pre">php artisan db:seed</pre>
                            </div>
                            <p class="inst-body text-[12.5px] mt-2 mb-2">Strongly recommended &mdash; creates site settings, languages, translations, currencies, payment gateway rows, notification settings, vehicle categories, pricing rules, popular routes, coupons, promotions, vehicles, drivers, CMS pages, blog content, locations, roles, permissions, the first admin, and demo customers/bookings.</p>
                            <div class="inst-warn"><span class="inst-mono">composer setup</span> does NOT run <span class="inst-mono">php artisan db:seed</span>.</div>
                        </div>
                    </div>

                    <div class="inst-step">
                        <div class="inst-step-num">9</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Install Frontend Dependencies</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="npm install">Copy</button></div>
                                <pre class="inst-code-pre">npm install</pre>
                            </div>
                        </div>
                    </div>

                    <div class="inst-step">
                        <div class="inst-step-num">10</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Build Production Assets</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="npm run build">Copy</button></div>
                                <pre class="inst-code-pre">npm run build</pre>
                            </div>
                            <p class="inst-body text-[12.5px] mt-2">Production assets are compiled into <span class="inst-mono">public/build/</span>.</p>
                        </div>
                    </div>

                    <div class="mt-6 inst-card p-5" style="background:#0F172A; border-color:#0F172A;">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-white font-bold text-[15px]">Prefer a One-Command Setup?</h3>
                            <span class="inst-badge">Recommended</span>
                        </div>
                        <p class="text-gray-400 text-[12.5px] mb-3">The project includes a Composer convenience script that automates the primary installation steps.</p>
                        <div class="inst-code-box">
                            <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="composer setup">Copy</button></div>
                            <pre class="inst-code-pre">composer setup</pre>
                        </div>
                        <div class="flex flex-wrap items-center gap-1.5 my-3">
                            @foreach(['composer install','cp .env.example .env','key:generate','migrate --force','npm install','npm run build'] as $step)
                                <div class="inst-flow-step" style="background:rgba(255,255,255,0.05); border-color:rgba(255,255,255,0.1); color:#E2E8F0;">{{ $step }}</div>
                                @if(!$loop->last)<svg class="inst-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#64748B" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                            @endforeach
                        </div>
                        <div class="inst-warn">composer setup does NOT run php artisan db:seed.</div>
                    </div>
                </div>

                <!-- DATABASE -->
                <div class="inst-panel" id="inst-tab-database" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Database</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-3">Database Installation</h2>
                    <p class="inst-body text-[14px] leading-relaxed mb-5">LimoSchedule uses Laravel migrations exclusively. There is no SQL dump that needs to be imported.</p>

                    <div class="flex flex-wrap items-center gap-1.5 mb-5">
                        @foreach(['Create Database','Configure DB_* Variables','Run Migrations','Run Seeders','Database Ready'] as $step)
                            <div class="inst-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="inst-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>

                    <div class="inst-code-box mb-5">
                        <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan migrate&#10;php artisan db:seed">Copy</button></div>
                        <pre class="inst-code-pre">php artisan migrate
php artisan db:seed</pre>
                    </div>

                    <div class="inst-card p-5">
                        <h3 class="inst-h3 text-[14px] mb-2">Run a Specific Seeder</h3>
                        <div class="inst-code-box">
                            <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan db:seed --class=VehicleCategorySeeder">Copy</button></div>
                            <pre class="inst-code-pre">php artisan db:seed --class=VehicleCategorySeeder</pre>
                        </div>
                    </div>
                </div>

                <!-- ENVIRONMENT -->
                <div class="inst-panel" id="inst-tab-environment" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Environment</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Configure Your Environment</h2>

                    <div class="inst-code-box mb-5">
                        <div class="inst-code-header"><span class="inst-code-lang">env</span><button type="button" class="inst-copy-btn" data-copy="APP_NAME=&quot;Your Company&quot;&#10;APP_ENV=production&#10;APP_KEY=&#10;APP_DEBUG=false&#10;APP_URL=https://yourdomain.com&#10;&#10;DB_CONNECTION=mysql&#10;DB_HOST=127.0.0.1&#10;DB_PORT=3306&#10;DB_DATABASE=&#10;DB_USERNAME=&#10;DB_PASSWORD=&#10;&#10;SESSION_DRIVER=database&#10;CACHE_STORE=database&#10;QUEUE_CONNECTION=sync&#10;&#10;MAIL_MAILER=log&#10;MAIL_HOST=&#10;MAIL_PORT=&#10;MAIL_USERNAME=&#10;MAIL_PASSWORD=&#10;MAIL_FROM_ADDRESS=&#10;MAIL_FROM_NAME=&quot;${APP_NAME}&quot;&#10;&#10;GOOGLE_MAPS_API_KEY=&#10;&#10;VAPID_PUBLIC_KEY=&#10;VAPID_PRIVATE_KEY=&#10;VAPID_SUBJECT=mailto:admin@yourdomain.com">Copy</button></div>
                        <pre class="inst-code-pre">APP_NAME="Your Company"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=sync

MAIL_MAILER=log
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"

GOOGLE_MAPS_API_KEY=

VAPID_PUBLIC_KEY=
VAPID_PRIVATE_KEY=
VAPID_SUBJECT=mailto:admin@yourdomain.com</pre>
                    </div>

                    <div class="inst-note">
                        Day-to-day business configuration &mdash; company information, logo, SEO defaults, Stripe/PayPal credentials, tax rate, business hours and social links &mdash; is database-backed and managed through the Admin Panel rather than requiring <span class="inst-mono">.env</span> edits.
                    </div>
                </div>

                <!-- STORAGE -->
                <div class="inst-panel" id="inst-tab-storage" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Storage</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Configure File Uploads</h2>

                    <div class="inst-note mb-5">
                        Laravel <span class="inst-mono">storage:link</span> is NOT required. Uploads are written directly into <span class="inst-mono">public/uploads/</span> using the application's own upload implementation, bypassing Laravel's storage symlink pattern entirely.
                    </div>

                    <div class="inst-code-box mb-5">
                        <div class="inst-code-header"><span class="inst-code-lang">text</span></div>
                        <pre class="inst-code-pre">public/uploads/</pre>
                    </div>

                    <h3 class="inst-h3 text-[14px] mb-2.5">Upload Categories</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mb-5">
                        @foreach(['Settings Logos','Favicons','Page Images','Vehicle Photos','Blog Images','Push Sound Files','Database Backups'] as $item)
                        <div class="inst-chip">{{ $item }}</div>
                        @endforeach
                    </div>

                    <div class="inst-warn">Ensure <span class="inst-mono">public/uploads/</span> is writable by the web server user.</div>
                </div>

                <!-- PERMISSIONS -->
                <div class="inst-panel" id="inst-tab-permissions" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Permissions</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Set Production Permissions</h2>

                    <div class="inst-code-box mb-5">
                        <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="chmod -R 775 storage bootstrap/cache">Copy</button></div>
                        <pre class="inst-code-pre">chmod -R 775 storage bootstrap/cache</pre>
                    </div>

                    <p class="inst-body text-[13px] mb-4"><span class="inst-mono">public/uploads/</span> must also be writable by the web server user.</p>

                    <div class="inst-code-box">
                        <div class="inst-code-header"><span class="inst-code-lang">text</span></div>
                        <pre class="inst-code-pre">LimoSchedule
├── public/
│   └── uploads/
├── storage/
└── bootstrap/
    └── cache/</pre>
                    </div>
                </div>

                <!-- WEB SERVER -->
                <div class="inst-panel" id="inst-tab-webserver" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Web Server</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Configure Apache or Nginx</h2>

                    <div class="inst-danger mb-5">Document root must point to <span class="inst-mono">/public</span> &mdash; never the project root.</div>

                    <h3 class="inst-h3 text-[14px] mb-2.5">Nginx</h3>
                    <div class="inst-code-box mb-5">
                        <div class="inst-code-header"><span class="inst-code-lang">nginx</span><button type="button" class="inst-copy-btn" data-copy="server {&#10;    listen 80;&#10;    server_name yourdomain.com;&#10;    root /var/www/limoschedule_software/public;&#10;&#10;    index index.php;&#10;&#10;    location / {&#10;        try_files $uri $uri/ /index.php?$query_string;&#10;    }&#10;&#10;    location ~ \.php$ {&#10;        fastcgi_pass unix:/run/php/php8.2-fpm.sock;&#10;        fastcgi_index index.php;&#10;        include fastcgi_params;&#10;        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;&#10;    }&#10;&#10;    location ~ /\.(?!well-known).* {&#10;        deny all;&#10;    }&#10;}">Copy</button></div>
                        <pre class="inst-code-pre">server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/limoschedule_software/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}</pre>
                    </div>

                    <h3 class="inst-h3 text-[14px] mb-2.5">Apache</h3>
                    <p class="inst-body text-[13px] leading-relaxed">The project's <span class="inst-mono">public/.htaccess</span> (Laravel's default) handles URL rewriting as long as <span class="inst-mono">mod_rewrite</span> is enabled and <span class="inst-mono">AllowOverride All</span> is set for the <span class="inst-mono">/public</span> directory.</p>
                </div>

                <!-- HTTPS -->
                <div class="inst-panel" id="inst-tab-https" role="tabpanel">
                    <span class="inst-eyebrow mb-4">HTTPS</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Enable HTTPS Before Production</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-5">
                        <div class="inst-card p-5">
                            <h3 class="inst-h3 text-[14px] mb-3">Required For</h3>
                            <ul class="space-y-1.5">
                                @foreach(['Browser push notifications','Production Stripe / PayPal checkout'] as $item)
                                <li class="flex items-center gap-2"><svg class="inst-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[12.5px] inst-body">{{ $item }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="inst-card p-5">
                            <h3 class="inst-h3 text-[14px] mb-3">Strongly Recommended For</h3>
                            <ul class="space-y-1.5">
                                @foreach(['Login pages','Customer, driver & admin panels','Pages handling personal data'] as $item)
                                <li class="flex items-center gap-2"><svg class="inst-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[12.5px] inst-body">{{ $item }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="inst-note">Browser push registration works over HTTPS or localhost. Production deployments should use HTTPS.</div>
                </div>

                <!-- QUEUES & CRON -->
                <div class="inst-panel" id="inst-tab-queues" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Queues &amp; Cron</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Choose Your Queue Strategy</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-7">
                        <div class="inst-card p-5">
                            <div class="flex items-center gap-2 mb-2"><h3 class="inst-h3 text-[15px]">Sync</h3><span class="inst-badge">Default</span></div>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">env</span><button type="button" class="inst-copy-btn" data-copy="QUEUE_CONNECTION=sync">Copy</button></div>
                                <pre class="inst-code-pre">QUEUE_CONNECTION=sync</pre>
                            </div>
                            <p class="inst-body text-[12.5px] mt-2">Push notifications execute inline during the request. No worker process required. Best for small deployments and simple setup.</p>
                        </div>
                        <div class="inst-card p-5">
                            <div class="flex items-center gap-2 mb-2"><h3 class="inst-h3 text-[15px]">Database</h3><span class="inst-badge">Optional</span></div>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">env</span><button type="button" class="inst-copy-btn" data-copy="QUEUE_CONNECTION=database">Copy</button></div>
                                <pre class="inst-code-pre">QUEUE_CONNECTION=database</pre>
                            </div>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan queue:table&#10;php artisan queue:work --tries=3">Copy</button></div>
                                <pre class="inst-code-pre">php artisan queue:table
php artisan queue:work --tries=3</pre>
                            </div>
                            <p class="inst-body text-[12px] mt-2"><span class="inst-mono">queue:table</span> is only needed if the jobs table isn't already migrated.</p>
                        </div>
                    </div>

                    <h3 class="inst-h3 text-[13px] mb-2.5">Supervisor Example</h3>
                    <div class="inst-code-box mb-3">
                        <div class="inst-code-header"><span class="inst-code-lang">ini</span><button type="button" class="inst-copy-btn" data-copy="[program:limoschedule-worker]&#10;command=php /var/www/limoschedule_software/artisan queue:work --tries=3 --timeout=90&#10;autostart=true&#10;autorestart=true&#10;user=www-data&#10;numprocs=1">Copy</button></div>
                        <pre class="inst-code-pre">[program:limoschedule-worker]
command=php /var/www/limoschedule_software/artisan queue:work --tries=3 --timeout=90
autostart=true
autorestart=true
user=www-data
numprocs=1</pre>
                    </div>
                    <p class="inst-body text-[12.5px] mb-7">Use Supervisor or systemd to keep the worker running automatically.</p>

                    <div class="inst-note">
                        <strong>No Cron Jobs Required.</strong> The current codebase does not implement scheduled tasks &mdash; no <span class="inst-mono">schedule:run</span>, no cron entry, and no cron-dependent functionality exists.
                    </div>
                </div>

                <!-- EMAIL -->
                <div class="inst-panel" id="inst-tab-email" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Email</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Configure Email Delivery</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-5">
                        <div class="inst-feature-card">
                            <svg class="inst-check" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span><span class="inst-h3 text-[13.5px] block mb-0.5">Framework Fallback</span><span class="text-[12px] inst-body leading-snug"><span class="inst-mono">.env</span> MAIL_* variables.</span></span>
                        </div>
                        <div class="inst-feature-card">
                            <svg class="inst-check" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span><span class="inst-h3 text-[13.5px] block mb-0.5">Admin Configuration</span><span class="text-[12px] inst-body leading-snug">Admin → Settings → Email Settings (database-backed SMTP).</span></span>
                        </div>
                    </div>

                    <div class="inst-warn">
                        <span class="inst-mono">MAIL_MAILER=log</span> is suitable for local development/testing only &mdash; it does NOT deliver real emails. Configure real SMTP credentials for production.
                    </div>
                </div>

                <!-- PAYMENTS -->
                <div class="inst-panel" id="inst-tab-payments" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Payments</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Configure Stripe &amp; PayPal</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div class="inst-card p-5">
                            <h3 class="inst-h3 text-[15px] mb-3">Stripe</h3>
                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Publishable Key','Secret Key','Sandbox / Live','Enable / Disable'] as $item)
                                <div class="inst-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                            <p class="inst-muted text-[11.5px]">Admin → Settings → Payment Gateways</p>
                        </div>
                        <div class="inst-card p-5">
                            <h3 class="inst-h3 text-[15px] mb-3">PayPal</h3>
                            <div class="grid grid-cols-2 gap-2 mb-3">
                                @foreach(['Client ID','Client Secret','Sandbox / Live','Enable / Disable'] as $item)
                                <div class="inst-chip">{{ $item }}</div>
                                @endforeach
                            </div>
                            <p class="inst-muted text-[11.5px]">Admin → Settings → Payment Gateways</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-1.5 mb-5">
                        @foreach(['Booking','Payment Required','Selected Gateway','Payment Confirmation','Booking Confirmation'] as $step)
                            <div class="inst-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="inst-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>

                    <div class="inst-note">A gateway only becomes ready when its active-mode credentials are configured and the gateway is enabled. No <span class="inst-mono">.env</span> editing needed &mdash; both gateways are configured entirely from the Admin Panel.</div>
                </div>

                <!-- GOOGLE MAPS -->
                <div class="inst-panel" id="inst-tab-maps" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Google Maps</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Configure Google Maps Services</h2>

                    <h3 class="inst-h3 text-[13px] mb-2.5">Required APIs</h3>
                    <div class="flex flex-wrap gap-1.5 mb-6">
                        @foreach(['Geocoding API','Distance Matrix API','Maps JavaScript API','Places API'] as $item)
                        <span class="inst-badge">{{ $item }}</span>
                        @endforeach
                    </div>

                    <div class="flex flex-wrap items-center gap-1.5 mb-6">
                        @foreach(['Google Cloud Console','Enable APIs','Create API Key','Restrict by Referrer','Add Key','Test Connection'] as $step)
                            <div class="inst-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="inst-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>

                    <p class="inst-body text-[13px] mb-4">Configure via <span class="inst-mono">.env</span> (<span class="inst-mono">GOOGLE_MAPS_API_KEY</span>) or Admin → System Tools → Integrations.</p>

                    <div class="inst-note">The <strong>Test Connection</strong> button returns Google's actual error &mdash; invalid key, restricted key, API not enabled, over quota, or a billing issue.</div>
                </div>

                <!-- PUSH NOTIFICATIONS -->
                <div class="inst-panel" id="inst-tab-push" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Push Notifications</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-3">Enable Browser Push Notifications</h2>
                    <p class="inst-body text-[14px] leading-relaxed mb-5">LimoSchedule uses VAPID-based browser Web Push.</p>

                    <h3 class="inst-h3 text-[13px] mb-2.5">Generate VAPID Keys</h3>
                    <div class="inst-code-box mb-5">
                        <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php -r &quot;require 'vendor/autoload.php'; print_r(Minishlink\WebPush\VAPID::createVapidKeys());&quot;">Copy</button></div>
                        <pre class="inst-code-pre">php -r "require 'vendor/autoload.php'; print_r(Minishlink\WebPush\VAPID::createVapidKeys());"</pre>
                    </div>

                    <div class="inst-code-box mb-5">
                        <div class="inst-code-header"><span class="inst-code-lang">env</span><button type="button" class="inst-copy-btn" data-copy="VAPID_PUBLIC_KEY=<publicKey>&#10;VAPID_PRIVATE_KEY=<privateKey>&#10;VAPID_SUBJECT=mailto:admin@yourdomain.com">Copy</button></div>
                        <pre class="inst-code-pre">VAPID_PUBLIC_KEY=&lt;publicKey&gt;
VAPID_PRIVATE_KEY=&lt;privateKey&gt;
VAPID_SUBJECT=mailto:admin@yourdomain.com</pre>
                    </div>

                    <p class="inst-body text-[13px] mb-3">Then, as an admin, visit Admin → Settings → Notifications, enable <strong>Enable Browser Push Notifications</strong>, turn on the roles/events you want, and use <strong>Send Test</strong> to verify delivery.</p>

                    <div class="flex flex-wrap gap-1.5 mb-6">
                        @foreach(['Admin','Customer','Driver'] as $role)
                        <span class="inst-badge">{{ $role }}</span>
                        @endforeach
                    </div>

                    <div class="inst-warn">
                        <strong>Windows Development Note:</strong> if VAPID signing produces an OpenSSL "configuration file routines::no such file" error, set <span class="inst-mono">WEBPUSH_OPENSSL_CONF</span> in <span class="inst-mono">.env</span> to the full path of a valid <span class="inst-mono">openssl.cnf</span> on that machine. Not a production Linux issue.
                    </div>
                </div>

                <!-- ADMIN & ACCOUNTS -->
                <div class="inst-panel" id="inst-tab-accounts" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Admin &amp; Accounts</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Create Your First Admin</h2>

                    <div class="inst-code-box mb-4">
                        <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan db:seed --class=AdminSeeder">Copy</button></div>
                        <pre class="inst-code-pre">php artisan db:seed --class=AdminSeeder</pre>
                    </div>

                    <div class="inst-danger mb-3">
                        <strong>Change Immediately:</strong> the seeder creates a default admin login (Super Admin role). Change this password immediately after first login via Admin → Profile.
                    </div>

                    <p class="inst-body text-[13px] mb-7">Additional admins are managed from Admin → Settings → Roles &amp; Permissions → Admins, each with their own email/password and a chosen role's permission set.</p>

                    <h2 class="inst-h2 text-xl sm:text-2xl mb-4">Account Setup</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="inst-card p-5">
                            <h3 class="inst-h3 text-[15px] mb-2.5">Customer</h3>
                            <ul class="space-y-1.5 mb-2">
                                @foreach(['Self-register via /register','Created by an admin directly','Guest booking with no account'] as $item)
                                <li class="flex items-center gap-2"><svg class="inst-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[12.5px] inst-body">{{ $item }}</span></li>
                                @endforeach
                            </ul>
                            <p class="inst-muted text-[11.5px]">A guest booking resolves/creates a Customer record from contact details.</p>
                        </div>
                        <div class="inst-card p-5">
                            <h3 class="inst-h3 text-[15px] mb-2.5">Driver</h3>
                            <ul class="space-y-1.5 mb-2">
                                @foreach(['Do NOT self-register','Created by Admin only','Log in at /driver/login'] as $item)
                                <li class="flex items-center gap-2"><svg class="inst-check" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg><span class="text-[12.5px] inst-body">{{ $item }}</span></li>
                                @endforeach
                            </ul>
                            <p class="inst-muted text-[11.5px]">There is no public driver sign-up form.</p>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTION DEPLOYMENT -->
                <div class="inst-panel" id="inst-tab-deployment" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Production Deployment</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Production Deployment</h2>

                    <div class="flex flex-wrap items-center gap-1.5 mb-6">
                        @foreach(['Source','Environment','Database','Dependencies','Assets','Web Server','HTTPS','Integrations','Testing','Go Live'] as $step)
                            <div class="inst-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="inst-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>

                    <div class="inst-code-box mb-3">
                        <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan migrate --force&#10;&#10;php artisan config:cache&#10;php artisan route:cache&#10;php artisan view:cache">Copy</button></div>
                        <pre class="inst-code-pre">php artisan migrate --force

php artisan config:cache
php artisan route:cache
php artisan view:cache</pre>
                    </div>
                    <div class="inst-code-box mb-7">
                        <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="npm run build">Copy</button></div>
                        <pre class="inst-code-pre">npm run build</pre>
                    </div>
                    <p class="inst-body text-[12.5px] mb-8"><span class="inst-mono">public/build/</span> must be deployed after the asset build.</p>

                    <h2 class="inst-h2 text-xl sm:text-2xl mb-4">Pre-Launch Checklist</h2>
                    <div class="inst-card p-5 mb-8">
                        @foreach(['APP_ENV=production','APP_DEBUG=false','Real APP_URL configured','Production database configured','Database migrations completed','Config/route/view caches generated','public/build/ deployed','HTTPS enabled','SMTP tested','Stripe/PayPal live credentials configured','Real payment tested','Google Maps connection tested','Google billing enabled','VAPID keys configured','Browser push tested','storage/ writable','bootstrap/cache writable','public/uploads/ writable','.env protected (not web-accessible)','First admin password changed','Full booking workflow tested'] as $item)
                        <div class="inst-checklist-item">
                            <span class="inst-checklist-box"></span>
                            <span class="text-[12.5px] inst-body">{{ $item }}</span>
                        </div>
                        @endforeach
                    </div>

                    <h2 class="inst-h2 text-xl sm:text-2xl mb-4">Test the Complete Booking Workflow</h2>
                    <div class="flex flex-wrap items-center gap-1.5 mb-3">
                        @foreach(['Guest Booking','Payment','Admin Confirmation','Driver Assignment','Driver Start','Driver Completion','Customer Invoice / PDF'] as $step)
                            <div class="inst-flow-step">{{ $step }}</div>
                            @if(!$loop->last)<svg class="inst-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>@endif
                        @endforeach
                    </div>
                    <p class="inst-body text-[12.5px]">Run this workflow before launching the production system.</p>
                </div>

                <!-- TROUBLESHOOTING -->
                <div class="inst-panel" id="inst-tab-troubleshooting" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Troubleshooting</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Troubleshooting</h2>

                    @php
                        $troubleshooting = [
                            ['500 Error / Blank Page', 'Uncaught application error.', 'Temporarily enable APP_DEBUG=true (development/staging only) and check storage/logs/laravel.log, or use Admin → System Tools → Error Logs.'],
                            ['Missing APP_KEY', 'Application key not generated.', 'Run php artisan key:generate.'],
                            ['Database Connection Error', 'Incorrect DB credentials or unreachable server.', 'Check DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD; confirm database connectivity and permissions.'],
                            ['Composer / PHP Version Error', 'Composer using an older PHP CLI version.', 'Run php -v and confirm Composer is using PHP 8.2+.'],
                            ['npm Build Error', 'Node.js issue or dependency mismatch.', 'Confirm Node.js is installed, then run npm install and npm run build. Remove node_modules and retry if a lockfile mismatch is suspected.'],
                            ['Uploaded Images 404', 'Missing or non-writable uploads directory.', 'This project does not use storage:link — check that public/uploads/ exists and is writable, not that a symlink is missing.'],
                            ['Email Not Sending', 'MAIL_MAILER still set to log.', 'Mail is written to Laravel logs instead of being delivered. Configure real SMTP through Admin → Email Settings.'],
                            ['Payments Not Working', 'Gateway disabled or mode mismatch.', 'Confirm the gateway is enabled, the correct Sandbox/Live mode is selected, credentials match, and run an end-to-end test.'],
                            ['Google Maps Not Working', 'Invalid key, restrictions, quota, or billing.', 'Use Admin → System Tools → Integrations → Test Connection to see the exact API restriction, quota, or billing error.'],
                            ['Push Notifications Not Arriving', 'HTTPS, VAPID keys, or toggle configuration.', 'Check HTTPS, VAPID keys, the master notification switch, role/event switches, browser permission, and use Send Test.'],
                            ['Queue Not Running', 'sync vs database queue confusion.', 'If QUEUE_CONNECTION=sync, there is no worker to run — jobs execute inline. If database, ensure php artisan queue:work --tries=3 is running.'],
                            ['Cron Not Running', 'No cron-dependent functionality exists.', 'No scheduled tasks are implemented in the current codebase, so there is no application cron to troubleshoot.'],
                        ];
                    @endphp

                    @foreach($troubleshooting as [$problem, $cause, $solution])
                    <details class="inst-accordion">
                        <summary>
                            <span>{{ $problem }}</span>
                            <svg class="inst-chev" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                        </summary>
                        <div class="inst-accordion-body">
                            <p class="inst-muted text-[11.5px] font-semibold uppercase tracking-wide mb-1">Likely Cause</p>
                            <p class="inst-body text-[13px] mb-3">{{ $cause }}</p>
                            <p class="inst-muted text-[11.5px] font-semibold uppercase tracking-wide mb-1">Solution</p>
                            <p class="inst-body text-[13px]">{{ $solution }}</p>
                        </div>
                    </details>
                    @endforeach
                </div>

                <!-- UPDATING -->
                <div class="inst-panel" id="inst-tab-updating" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Updating</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">How to Update the Application</h2>

                    <div class="inst-step">
                        <div class="inst-step-num">1</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Back Up</h3>
                            <p class="inst-body text-[12.5px]">Back up the database and <span class="inst-mono">public/uploads/</span>.</p>
                        </div>
                    </div>
                    <div class="inst-step">
                        <div class="inst-step-num">2</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Apply New Source Code</h3>
                            <p class="inst-body text-[12.5px]">Pull or apply the new source code, preserving <span class="inst-mono">.env</span> and <span class="inst-mono">public/uploads/</span>.</p>
                        </div>
                    </div>
                    <div class="inst-step">
                        <div class="inst-step-num">3</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Install Dependencies</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="composer install --no-dev --optimize-autoloader">Copy</button></div>
                                <pre class="inst-code-pre">composer install --no-dev --optimize-autoloader</pre>
                            </div>
                        </div>
                    </div>
                    <div class="inst-step">
                        <div class="inst-step-num">4</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Run Migrations</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan migrate --force">Copy</button></div>
                                <pre class="inst-code-pre">php artisan migrate --force</pre>
                            </div>
                        </div>
                    </div>
                    <div class="inst-step">
                        <div class="inst-step-num">5</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Build Assets</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="npm install&#10;npm run build">Copy</button></div>
                                <pre class="inst-code-pre">npm install
npm run build</pre>
                            </div>
                        </div>
                    </div>
                    <div class="inst-step">
                        <div class="inst-step-num">6</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Rebuild Caches</h3>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan config:cache&#10;php artisan route:cache&#10;php artisan view:cache">Copy</button></div>
                                <pre class="inst-code-pre">php artisan config:cache
php artisan route:cache
php artisan view:cache</pre>
                            </div>
                        </div>
                    </div>
                    <div class="inst-step">
                        <div class="inst-step-num">7</div>
                        <div class="flex-1">
                            <h3 class="inst-h3 text-[14px] mb-1">Restart Queue Workers</h3>
                            <p class="inst-body text-[12.5px] mb-2">If using queue workers:</p>
                            <div class="inst-code-box">
                                <div class="inst-code-header"><span class="inst-code-lang">bash</span><button type="button" class="inst-copy-btn" data-copy="php artisan queue:restart">Copy</button></div>
                                <pre class="inst-code-pre">php artisan queue:restart</pre>
                            </div>
                        </div>
                    </div>

                    <div class="inst-note mt-4">
                        Admin → System Tools also exposes Run Migrations and Composer Update for environments without SSH access. Use these carefully in production. There is no built-in "check for updates" or auto-updater &mdash; updates are performed manually.
                    </div>
                </div>

                <!-- BACKUPS & NOTES -->
                <div class="inst-panel" id="inst-tab-backups" role="tabpanel">
                    <span class="inst-eyebrow mb-4">Backups &amp; Notes</span>
                    <h2 class="inst-h2 text-2xl sm:text-3xl mb-5">Backup Strategy</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                        <div class="inst-card p-5">
                            <h3 class="inst-h3 text-[15px] mb-2.5">Database</h3>
                            <p class="inst-body text-[12.5px] leading-relaxed mb-2">Admin → System Tools → Backup generates a downloadable SQL dump via a custom exporter.</p>
                            <div class="flex flex-wrap gap-1.5">
                                <span class="inst-badge">Manual / On-Demand</span>
                                <span class="inst-badge">Not Cron-Scheduled</span>
                            </div>
                        </div>
                        <div class="inst-card p-5">
                            <h3 class="inst-h3 text-[15px] mb-2.5">Uploaded Files</h3>
                            <p class="inst-body text-[12.5px] leading-relaxed">Back up <span class="inst-mono">public/uploads/</span> separately &mdash; it is not part of the database backup. Also back up <span class="inst-mono">.env</span>, which holds critical configuration and secrets.</p>
                        </div>
                    </div>

                    <div class="inst-danger mb-8">Restoring or dropping database tables is destructive. There is no undo.</div>

                    <h2 class="inst-h2 text-xl sm:text-2xl mb-4">Important Production Notes</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach([
                            ['No storage:link', 'Not required by this implementation.'],
                            ['No Cron', 'No scheduled tasks currently implemented.'],
                            ['No Runtime Vite Server', 'Production uses pre-built assets.'],
                            ['HTTPS Required for Push', 'Browser push requires HTTPS outside localhost.'],
                            ['Manual Backups', "The application's backup tool is not automatically scheduled."],
                            ['No Auto-Updater', 'Updates are performed manually.'],
                        ] as [$title, $desc])
                        <div class="inst-feature-card">
                            <svg class="inst-check" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                            <span><span class="inst-h3 text-[13.5px] block mb-0.5">{{ $title }}</span><span class="text-[12px] inst-body leading-snug">{{ $desc }}</span></span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div><!-- /inst-content -->
        </div><!-- /inst-explorer -->

        <!-- Installation FAQ -->
        <div class="max-w-3xl mx-auto mt-14 mb-2">
            <h2 class="inst-h2 text-xl sm:text-2xl mb-6 text-center">Installation Questions</h2>
            <div class="flex flex-col gap-3">
                <div style="background:#F8FAFC; border:1px solid rgba(15,23,42,0.08); border-radius:16px; padding:20px;">
                    <h3 class="inst-h3 text-[14.5px] mb-1.5">Do I need a Google Maps API key to use LimoSchedule?</h3>
                    <p class="inst-body text-[13.5px] leading-relaxed">Yes. LimoSchedule uses Google Maps services, which requires creating a Google Cloud Console API key, enabling the required APIs, and restricting the key by referrer before adding it to your installation.</p>
                </div>
                <div style="background:#F8FAFC; border:1px solid rgba(15,23,42,0.08); border-radius:16px; padding:20px;">
                    <h3 class="inst-h3 text-[14.5px] mb-1.5">Do browser push notifications require special server setup?</h3>
                    <p class="inst-body text-[13.5px] leading-relaxed">HTTPS is required in production. Beyond that, push notifications execute inline with each request &mdash; there's no separate worker process to run, which keeps setup simple for small deployments.</p>
                </div>
                <div style="background:#F8FAFC; border:1px solid rgba(15,23,42,0.08); border-radius:16px; padding:20px;">
                    <h3 class="inst-h3 text-[14.5px] mb-1.5">What if I run into a problem during installation?</h3>
                    <p class="inst-body text-[13.5px] leading-relaxed">The installation guide includes a dedicated Troubleshooting section covering common setup issues, so you can diagnose and resolve problems without leaving the documentation.</p>
                </div>
            </div>
        </div>

        <!-- Compact CTA -->
        <div class="inst-cta-box mt-14">
            <h2 class="text-white font-extrabold tracking-tight text-2xl sm:text-3xl mb-3">Ready to Put LimoSchedule Into Production?</h2>
            <p class="text-gray-300 text-[14px] max-w-xl mx-auto mb-7">Follow the installation guide, configure your integrations, complete the production checklist and launch your own limo booking platform.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 flex-wrap">
                <a href="#inst-explorer" class="inst-btn-primary w-full sm:w-auto">
                    <span>Start Installation</span>
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('technical-details') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-[13px] rounded-xl text-[14.5px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                    View Technical Details
                </a>
                <a href="{{ route('contact') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-bold px-8 py-[13px] rounded-xl text-[14.5px] text-white transition-all duration-200 hover:bg-white/10" style="background: rgba(255,255,255,0.06); border: 1.5px solid rgba(255,255,255,0.25);">
                    Explore LimoSchedule
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
    var tabs = document.querySelectorAll('#inst-page .inst-tab');
    var panels = document.querySelectorAll('#inst-page .inst-panel');

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
                var content = document.querySelector('#inst-page .inst-content');
                if (content) {
                    var top = content.getBoundingClientRect().top + window.scrollY - 70;
                    window.scrollTo({ top: top, behavior: 'smooth' });
                }
                tab.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }
        });
    });

    var copyBtns = document.querySelectorAll('#inst-page .inst-copy-btn');
    copyBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var text = btn.getAttribute('data-copy');
            if (!text) {
                var box = btn.closest('.inst-code-box');
                var pre = box ? box.querySelector('.inst-code-pre') : null;
                text = pre ? pre.innerText : '';
            }
            var done = function () {
                var original = btn.textContent;
                btn.textContent = 'Copied!';
                btn.classList.add('copied');
                setTimeout(function () {
                    btn.textContent = original === 'Copied!' ? 'Copy' : original;
                    btn.classList.remove('copied');
                }, 1500);
            };
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(done).catch(function () {});
            } else {
                try {
                    var ta = document.createElement('textarea');
                    ta.value = text;
                    ta.style.position = 'fixed';
                    ta.style.opacity = '0';
                    document.body.appendChild(ta);
                    ta.select();
                    document.execCommand('copy');
                    document.body.removeChild(ta);
                    done();
                } catch (e) {}
            }
        });
    });
})();
</script>
@endpush
