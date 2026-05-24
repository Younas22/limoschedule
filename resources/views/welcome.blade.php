<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LimoSchedule — Self-Hosted Automated Limo Booking System</title>
    <meta name="description" content="Self-hosted, white-label limo booking system. Install on your own server in 30 minutes. Full source code included. One-time license.">

    <!-- Official Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ url('public/logo/favicon.jpg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700;0,14..32,800;0,14..32,900;1,14..32,400&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ url('public/assets/js/tailwind.config.js') }}"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ url('public/assets/css/limoschedule.css') }}">
</head>

<body>

<!-- ════════════════════════════════════════════════════════
     SECTION 1 — STICKY PREMIUM NAVBAR
═════════════════════════════════════════════════════════ -->
<header
    id="navbar"
    class="fixed top-0 left-0 right-0 z-50"
    style="background: rgba(10,10,10,0.65); backdrop-filter: blur(22px); -webkit-backdrop-filter: blur(22px); border-bottom: 1px solid rgba(255,255,255,0.06);"
    role="banner"
>
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-[66px]">

            <!-- ─── Official Logo ─── -->
            <a href="/" class="flex-shrink-0 block" aria-label="LimoSchedule — Home">
                <div class="logo-badge bg-white rounded-xl px-3 py-[7px]">
                    <img
                        src="{{ url('public/logo/logo.jpg') }}"
                        alt="LimoSchedule — Automated Limo Booking System"
                        class="h-[30px] w-auto block"
                        loading="eager"
                        decoding="sync"
                    >
                </div>
            </a>

            <!-- ─── Desktop Navigation ─── -->
            <nav class="hidden xl:flex items-center" aria-label="Primary navigation">
                <ul class="flex items-center gap-0.5 list-none m-0 p-0">
                    <li>
                        <a href="#features"     class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">Features</a>
                    </li>
                    <li>
                        <a href="#voice-search" class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">Voice Search</a>
                    </li>
                    <li>
                        <a href="#ai-agent"     class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">AI Agent</a>
                    </li>
                    <li>
                        <a href="#admin-panel"  class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">Admin Panel</a>
                    </li>
                    <li>
                        <a href="#how-it-works" class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">How It Works</a>
                    </li>
                    <li>
                        <a href="#contact"      class="nav-link text-[13.5px] font-medium text-gray-400 hover:text-white px-3.5 py-2 rounded-lg block whitespace-nowrap">Contact</a>
                    </li>
                </ul>
            </nav>

            <!-- ─── Desktop Right Actions ─── -->
            <div class="hidden xl:flex items-center gap-3 flex-shrink-0">

                <!-- Auth links -->
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="text-[13.5px] font-medium text-gray-400 hover:text-white transition-colors duration-200 px-3 py-1.5">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-[13.5px] font-medium text-gray-400 hover:text-white transition-colors duration-200 px-3 py-1.5">
                            Log in
                        </a>
                    @endauth
                @endif

                <!-- Divider -->
                <span class="w-px h-4 bg-white/10 block"></span>

                <!-- Primary CTA -->
                <a href="#license"
                   class="btn-cta inline-flex items-center gap-2 bg-[#3B82F6] text-white text-[13.5px] font-semibold px-5 py-2.5 rounded-xl border border-blue-500/30">
                    <!-- Key icon -->
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="7.5" cy="15.5" r="5.5"/>
                        <path d="M21 2l-9.6 9.6"/>
                        <path d="M15.5 7.5l3 3L22 7l-3-3"/>
                    </svg>
                    <span>Get License Access</span>
                </a>
            </div>

            <!-- ─── Mobile Hamburger ─── -->
            <button
                id="hamburger"
                type="button"
                class="xl:hidden flex flex-col justify-center items-center gap-[5.5px] w-9 h-9 rounded-lg border border-white/10 hover:border-white/20 hover:bg-white/5 flex-shrink-0 transition-all duration-200"
                aria-label="Toggle navigation menu"
                aria-expanded="false"
                aria-controls="mobile-menu"
            >
                <span class="hb-line hb-top  block w-[18px] h-[1.5px] bg-white   rounded-full"></span>
                <span class="hb-line hb-mid  block w-[18px] h-[1.5px] bg-white   rounded-full"></span>
                <span class="hb-line hb-bot  block w-[13px] h-[1.5px] bg-white/50 rounded-full"></span>
            </button>

        </div><!-- /flex row -->
    </div><!-- /container -->

    <!-- ─── Mobile Menu Panel ─── -->
    <div
        id="mobile-menu"
        class="mobile-menu xl:hidden"
        style="background: rgba(9,9,9,0.98); backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px); border-top: 1px solid rgba(255,255,255,0.06);"
        role="dialog"
        aria-label="Mobile navigation"
    >
        <div class="max-w-7xl mx-auto px-5 sm:px-6 py-3 pb-4">

            <!-- Nav links -->
            <ul class="list-none m-0 p-0 flex flex-col gap-0.5">

                <li>
                    <a href="#features"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Star / features icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">Features</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Full platform overview</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#voice-search"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Mic icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                                <path d="M19 10v2a7 7 0 01-14 0v-2M12 19v3M8 22h8"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">Voice Search</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Book rides by voice command</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#ai-agent"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- AI/brain icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9.5 2A2.5 2.5 0 007 4.5v15A2.5 2.5 0 009.5 22h5a2.5 2.5 0 002.5-2.5v-15A2.5 2.5 0 0014.5 2h-5z"/>
                                <path d="M7 8H4a2 2 0 00-2 2v4a2 2 0 002 2h3M17 8h3a2 2 0 012 2v4a2 2 0 01-2 2h-3"/>
                                <circle cx="12" cy="12" r="1.5" fill="#3B82F6" stroke="none"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">AI Agent</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Intelligent booking automation</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#admin-panel"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Grid / dashboard icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                                <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                                <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                                <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">Admin Panel</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Full control dashboard</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#how-it-works"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Play / steps icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 12A10 10 0 1112 2"/>
                                <polyline points="22 2 22 8 16 8"/>
                                <path d="M12 12l3-3"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">How It Works</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">30-min setup guide</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

                <li>
                    <a href="#contact"
                       class="mob-nav-item flex items-center gap-3 text-[14px] font-medium text-gray-400 hover:text-white px-3 py-3 rounded-xl group">
                        <span class="flex-shrink-0 w-[34px] h-[34px] rounded-lg flex items-center justify-center"
                              style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.15);">
                            <!-- Mail icon -->
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </span>
                        <div>
                            <div class="font-semibold text-[14px] text-gray-200">Contact</div>
                            <div class="text-[11.5px] text-gray-500 mt-0.5 font-normal">Talk to our team</div>
                        </div>
                        <svg class="ml-auto flex-shrink-0 text-gray-600 group-hover:text-gray-400 transition-colors" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                </li>

            </ul>

            <!-- Mobile CTA block -->
            <div class="mt-3 pt-3 border-t flex flex-col gap-2" style="border-color: rgba(255,255,255,0.07);">

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="flex items-center justify-center text-[14px] font-medium text-gray-300 hover:text-white border rounded-xl px-4 py-3 transition-all duration-200 hover:border-white/20"
                           style="border-color: rgba(255,255,255,0.1); background: rgba(255,255,255,0.03);">
                            Dashboard →
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="flex items-center justify-center text-[14px] font-medium text-gray-300 hover:text-white border rounded-xl px-4 py-3 transition-all duration-200 hover:border-white/20"
                           style="border-color: rgba(255,255,255,0.1); background: rgba(255,255,255,0.03);">
                            Log in
                        </a>
                    @endauth
                @endif

                <a href="#license"
                   class="btn-cta flex items-center justify-center gap-2 bg-[#3B82F6] text-white text-[14px] font-semibold px-4 py-3 rounded-xl border border-blue-500/30">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="7.5" cy="15.5" r="5.5"/>
                        <path d="M21 2l-9.6 9.6"/>
                        <path d="M15.5 7.5l3 3L22 7l-3-3"/>
                    </svg>
                    <span>Get License Access</span>
                </a>
            </div>

        </div><!-- /mobile inner -->
    </div><!-- /mobile-menu -->

</header>
<!-- ════ END NAVBAR ════ -->


<!-- ════════════════════════════════════════════════════════
     HERO — PLACEHOLDER (future section prompt)
═════════════════════════════════════════════════════════ -->
<main id="hero" class="hero-grid relative min-h-screen flex items-center justify-center overflow-hidden" style="padding-top: 66px;">

    <!-- Ambient glow orb -->
    <div class="glow-orb absolute inset-0 pointer-events-none"></div>

    <!-- Noise texture overlay -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=&quot;0 0 256 256&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cfilter id=&quot;noise&quot;%3E%3CfeTurbulence type=&quot;fractalNoise&quot; baseFrequency=&quot;0.9&quot; numOctaves=&quot;4&quot; stitchTiles=&quot;stitch&quot;/%3E%3C/filter%3E%3Crect width=&quot;100%25&quot; height=&quot;100%25&quot; filter=&quot;url(%23noise)&quot; opacity=&quot;0.03&quot;/%3E%3C/svg%3E'); opacity: 0.4;"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-5 sm:px-6 lg:px-8 text-center py-24">

        <!-- Top badge -->
        <div class="inline-flex items-center gap-2.5 mb-8 px-4 py-2 rounded-full"
             style="background: rgba(59,130,246,0.06); border: 1px solid rgba(59,130,246,0.18);">
            <span class="ping-dot relative w-2 h-2 rounded-full bg-[#3B82F6] flex-shrink-0"></span>
            <span class="text-blue-400 text-xs font-semibold tracking-[0.12em] uppercase">
                Self-Hosted · Open Source · White-Label
            </span>
        </div>

        <!-- Main headline -->
        <h1 class="text-5xl sm:text-6xl lg:text-[72px] xl:text-[80px] font-black tracking-tight leading-[1.05] mb-6">
            The Complete<br>
            <span style="background: linear-gradient(135deg, #ffffff 0%, #93c5fd 40%, #3B82F6 80%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Limo Booking System
            </span>
        </h1>

        <!-- Sub-headline -->
        <p class="text-gray-400 text-lg sm:text-xl max-w-2xl mx-auto leading-relaxed mb-4">
            Install on your own server in <span class="text-white font-semibold">30 minutes</span>.
            Full source code. One-time license.
            Rebrand and resell as your own.
        </p>
        <p class="text-gray-600 text-sm max-w-xl mx-auto mb-11">
            Powered by AI Voice Search · Real-time Dispatch · Fleet Management · White-label Ready
        </p>

        <!-- CTA row -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="#license"
               class="btn-cta w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#3B82F6] text-white font-semibold px-7 py-3.5 rounded-xl text-[15px] border border-blue-500/30">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="7.5" cy="15.5" r="5.5"/>
                    <path d="M21 2l-9.6 9.6"/>
                    <path d="M15.5 7.5l3 3L22 7l-3-3"/>
                </svg>
                <span>Get License Access</span>
            </a>

            <a href="#how-it-works"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border text-gray-300 hover:text-white font-medium px-7 py-3.5 rounded-xl text-[15px] transition-all duration-200 hover:border-white/25 hover:bg-white/5"
               style="border-color: rgba(255,255,255,0.12);">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polygon points="10 8 16 12 10 16 10 8" fill="currentColor" stroke="none"/>
                </svg>
                Watch Demo
            </a>
        </div>

        <!-- Trust strip -->
        <div class="flex flex-wrap items-center justify-center gap-x-8 gap-y-3 mt-14 pt-10 border-t"
             style="border-color: rgba(255,255,255,0.07);">
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Open Source Code
            </div>
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500" style="transition-delay: 0.08s">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Self-Hosted &amp; Private
            </div>
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500" style="transition-delay: 0.16s">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                One-Time License
            </div>
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500" style="transition-delay: 0.24s">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                White-Label &amp; Resellable
            </div>
            <div class="stat-item flex items-center gap-2 text-sm text-gray-500" style="transition-delay: 0.32s">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                30-Min Server Install
            </div>
        </div>

    </div>
</main>


<!-- ════════════════════════════════════════════════════════
     SECTION 2 — FEATURES GRID
═════════════════════════════════════════════════════════ -->
<section id="features" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <!-- Faint section grid -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>

    <!-- Ambient glow — top center -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[340px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.10) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- ── Section Header ── -->
        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">

            <!-- Eyebrow -->
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full"
                 style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">Platform Capabilities</span>
            </div>

            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5">
                Everything your limo<br>
                <span style="background: linear-gradient(135deg, #ffffff 0%, #93c5fd 45%, #3B82F6 90%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    business needs.
                </span>
            </h2>

            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                One system. One license. Every tool your team needs to automate bookings,
                manage your fleet, and deliver a five-star passenger experience.
            </p>
        </div>

        <!-- ── Feature Cards Grid ── -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-5">

            <!-- 1. Open Source Code Access -->
            <div class="feature-card section-fade" style="transition-delay: 0.05s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="16 18 22 12 16 6"/>
                        <polyline points="8 6 2 12 8 18"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Open Source Code Access</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Full, unencrypted source code delivered with your license. Read, modify, and extend every line — no runtime fees, no black boxes.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 2. White Label System -->
            <div class="feature-card section-fade" style="transition-delay: 0.10s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">White Label System</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Replace every trace of our branding with yours. Custom domain, logo, colors, and app name — zero attribution required. Resell as your own product.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 3. Self-Hosted Deployment -->
            <div class="feature-card section-fade" style="transition-delay: 0.15s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="8" rx="2"/>
                        <rect x="2" y="14" width="20" height="8" rx="2"/>
                        <line x1="6" y1="6" x2="6.01" y2="6"/>
                        <line x1="6" y1="18" x2="6.01" y2="18"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Self-Hosted &amp; Private</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Deploy on any VPS, dedicated server, or private cloud. Your data, your infrastructure, your rules — no third-party ever touches your records.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 4. 30-Min Installation -->
            <div class="feature-card section-fade" style="transition-delay: 0.20s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">30-Min Installation</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Our automated installer handles the entire stack. From a blank server to a live, production-ready booking system in under 30 minutes.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 5. AI Booking Agent — FEATURED -->
            <div class="feature-card featured section-fade" style="transition-delay: 0.25s">
                <!-- Featured label -->
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold tracking-widest uppercase text-blue-400 px-2 py-0.5 rounded-full"
                          style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.25);">
                        AI-Powered
                    </span>
                </div>
                <div class="feat-icon-wrap" style="background: rgba(59,130,246,0.12); border-color: rgba(59,130,246,0.25);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a4 4 0 014 4v1h1a3 3 0 013 3v6a3 3 0 01-3 3H7a3 3 0 01-3-3v-6a3 3 0 013-3h1V6a4 4 0 014-4z"/>
                        <circle cx="9" cy="13" r="1" fill="#3B82F6" stroke="none"/>
                        <circle cx="15" cy="13" r="1" fill="#3B82F6" stroke="none"/>
                        <path d="M9 17s1 1 3 1 3-1 3-1"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">AI Booking Agent</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed pr-8">
                    Intelligent AI agent handles customer enquiries, confirms bookings, upsells upgrades, and optimizes schedules autonomously — 24/7, zero staff required.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 6. Voice Search Booking — FEATURED -->
            <div class="feature-card featured section-fade" style="transition-delay: 0.30s">
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center gap-1 text-[10px] font-bold tracking-widest uppercase text-blue-400 px-2 py-0.5 rounded-full"
                          style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.25);">
                        AI-Powered
                    </span>
                </div>
                <div class="feat-icon-wrap" style="background: rgba(59,130,246,0.12); border-color: rgba(59,130,246,0.25);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                        <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                        <line x1="12" y1="19" x2="12" y2="23"/>
                        <line x1="8"  y1="23" x2="16" y2="23"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Voice Search Booking</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed pr-8">
                    Customers book rides with natural voice commands in any language. No typing, no friction — just speak the destination and the system handles the rest.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 7. Fleet Management -->
            <div class="feature-card section-fade" style="transition-delay: 0.35s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11a2 2 0 012 2v3"/>
                        <rect x="9" y="11" width="14" height="10" rx="2"/>
                        <circle cx="12" cy="21" r="1" fill="#3B82F6" stroke="none"/>
                        <circle cx="20" cy="21" r="1" fill="#3B82F6" stroke="none"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Fleet Management</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Real-time vehicle tracking, driver assignment, availability management, and intelligent route optimization across your entire fleet — from one dashboard.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 8. Admin Control Panel -->
            <div class="feature-card section-fade" style="transition-delay: 0.40s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                        <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                        <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                        <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Admin Control Panel</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Comprehensive dashboard for bookings, drivers, pricing rules, revenue reports, and customer management — all in one powerful and intuitive interface.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

            <!-- 9. Team Management -->
            <div class="feature-card section-fade" style="transition-delay: 0.45s">
                <div class="feat-icon-wrap">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                        <path d="M16 3.13a4 4 0 010 7.75"/>
                    </svg>
                </div>
                <h3 class="text-white text-[16px] font-bold mb-2 leading-snug">Team Management</h3>
                <p class="text-gray-500 text-[13.5px] leading-relaxed pr-8">
                    Role-based access control with granular permissions. Add dispatchers, operators, and support staff with exactly the access level each role requires.
                </p>
                <div class="feat-arrow">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(59,130,246,0.6)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>

        </div><!-- /grid -->

        <!-- ── Bottom CTA strip ── -->
        <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-4 section-fade" style="transition-delay: 0.5s">
            <p class="text-gray-500 text-sm">
                All features included in a single one-time license. No monthly fees. No hidden costs.
            </p>
            <a href="#license"
               class="btn-cta inline-flex items-center gap-2 bg-[#3B82F6] text-white font-semibold px-6 py-2.5 rounded-xl text-sm border border-blue-500/30 flex-shrink-0">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="7.5" cy="15.5" r="5.5"/>
                    <path d="M21 2l-9.6 9.6"/>
                    <path d="M15.5 7.5l3 3L22 7l-3-3"/>
                </svg>
                <span>Get License Access</span>
            </a>
        </div>

    </div><!-- /container -->
</section>
<!-- ════ END FEATURES ════ -->


<!-- ════════════════════════════════════════════════════════
     SECTION 3 — VOICE SEARCH BOOKING
═════════════════════════════════════════════════════════ -->
<section id="voice-search" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <!-- Section grid -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>

    <!-- Bottom ambient glow -->
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[900px] h-[420px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 100%, rgba(59,130,246,0.09) 0%, transparent 68%);"></div>

    <!-- Top ambient glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[280px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.07) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">

        <!-- ── Section Header ── -->
        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">

            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full"
                 style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                    <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                    <line x1="12" y1="19" x2="12" y2="23"/>
                    <line x1="8"  y1="23" x2="16" y2="23"/>
                </svg>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">AI Voice Interface</span>
            </div>

            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5">
                Just speak.<br>
                <span style="background: linear-gradient(135deg, #ffffff 0%, #93c5fd 45%, #3B82F6 90%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    AI does the rest.
                </span>
            </h2>

            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                Passengers book their ride with a single voice command. Natural language, any language —
                the AI finds available vehicles and confirms the booking in seconds.
            </p>
        </div>

        <!-- ── Main 2-col layout ── -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-start">

            <!-- ╔═══════════════════╗
                 ║  LEFT: VOICE UI  ║
                 ╚═══════════════════╝ -->
            <div class="voice-panel-reveal">
                <div class="relative rounded-2xl overflow-hidden"
                     style="background: rgba(14,14,18,0.9); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(16px);">

                    <!-- Scan line effect -->
                    <div class="vs-scan-line"></div>

                    <!-- Terminal top bar -->
                    <div class="flex items-center justify-between px-5 py-3.5 border-b"
                         style="border-color: rgba(255,255,255,0.06); background: rgba(255,255,255,0.015);">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(239,68,68,0.7);"></span>
                            <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(234,179,8,0.7);"></span>
                            <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(34,197,94,0.7);"></span>
                        </div>
                        <span class="text-[10.5px] font-medium text-gray-600 tracking-[0.1em] uppercase select-none">Voice Interface · LimoSchedule AI</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400" style="box-shadow: 0 0 7px rgba(74,222,128,0.9);"></span>
                            <span class="text-[10px] text-green-400 font-bold tracking-wider">LIVE</span>
                        </div>
                    </div>

                    <!-- Panel body -->
                    <div class="p-6 lg:p-8">

                        <!-- Status badge -->
                        <div class="flex items-center justify-center mb-7">
                            <div id="vs-status-badge" class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.22);">
                                <span class="ping-dot relative w-2 h-2 rounded-full bg-[#3B82F6] flex-shrink-0"></span>
                                <span id="vs-status-text" class="text-[11.5px] font-bold text-blue-400 tracking-[0.14em] uppercase">Listening</span>
                            </div>
                        </div>

                        <!-- Mic button + rings -->
                        <div class="flex justify-center mb-7">
                            <div class="relative w-24 h-24">
                                <!-- Expanding rings (staggered) -->
                                <div class="mic-ring" style="animation-delay: 0s;"></div>
                                <div class="mic-ring" style="animation-delay: 0.7s;"></div>
                                <div class="mic-ring" style="animation-delay: 1.4s;"></div>

                                <!-- Core button -->
                                <button
                                    id="mic-btn"
                                    type="button"
                                    aria-label="Toggle voice input"
                                    class="mic-btn-listening relative w-full h-full rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 hover:scale-105 active:scale-95 select-none"
                                    style="background: linear-gradient(135deg, rgba(59,130,246,0.22) 0%, rgba(59,130,246,0.09) 100%); border: 2px solid rgba(59,130,246,0.4);">
                                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                                        <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                                        <line x1="12" y1="19" x2="12" y2="23"/>
                                        <line x1="8"  y1="23" x2="16" y2="23"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Voice waveform -->
                        <div id="voice-waveform" class="flex items-end justify-center gap-[3.5px] mb-7" style="height: 36px;">
                            <div class="vw-bar" style="animation-delay:0.00s;animation-duration:0.85s;"></div>
                            <div class="vw-bar" style="animation-delay:0.07s;animation-duration:1.10s;"></div>
                            <div class="vw-bar" style="animation-delay:0.14s;animation-duration:0.78s;"></div>
                            <div class="vw-bar" style="animation-delay:0.21s;animation-duration:1.25s;"></div>
                            <div class="vw-bar" style="animation-delay:0.06s;animation-duration:0.92s;"></div>
                            <div class="vw-bar" style="animation-delay:0.28s;animation-duration:1.05s;"></div>
                            <div class="vw-bar" style="animation-delay:0.13s;animation-duration:0.70s;"></div>
                            <div class="vw-bar" style="animation-delay:0.35s;animation-duration:1.30s;"></div>
                            <div class="vw-bar" style="animation-delay:0.04s;animation-duration:0.95s;"></div>
                            <div class="vw-bar" style="animation-delay:0.42s;animation-duration:0.80s;"></div>
                            <div class="vw-bar" style="animation-delay:0.19s;animation-duration:1.15s;"></div>
                            <div class="vw-bar" style="animation-delay:0.49s;animation-duration:0.68s;"></div>
                            <div class="vw-bar" style="animation-delay:0.08s;animation-duration:1.35s;"></div>
                            <div class="vw-bar" style="animation-delay:0.56s;animation-duration:0.90s;"></div>
                            <div class="vw-bar" style="animation-delay:0.25s;animation-duration:1.00s;"></div>
                            <div class="vw-bar" style="animation-delay:0.63s;animation-duration:0.75s;"></div>
                            <div class="vw-bar" style="animation-delay:0.11s;animation-duration:1.20s;"></div>
                            <div class="vw-bar" style="animation-delay:0.38s;animation-duration:0.88s;"></div>
                            <div class="vw-bar" style="animation-delay:0.70s;animation-duration:1.08s;"></div>
                            <div class="vw-bar" style="animation-delay:0.17s;animation-duration:0.73s;"></div>
                            <div class="vw-bar" style="animation-delay:0.44s;animation-duration:1.18s;"></div>
                            <div class="vw-bar" style="animation-delay:0.03s;animation-duration:0.82s;"></div>
                            <div class="vw-bar" style="animation-delay:0.51s;animation-duration:1.40s;"></div>
                            <div class="vw-bar" style="animation-delay:0.22s;animation-duration:0.66s;"></div>
                            <div class="vw-bar" style="animation-delay:0.60s;animation-duration:0.98s;"></div>
                            <div class="vw-bar" style="animation-delay:0.09s;animation-duration:1.12s;"></div>
                        </div>

                        <!-- Transcript glass card -->
                        <div class="rounded-xl p-4 mb-5" style="background: rgba(59,130,246,0.05); border: 1px solid rgba(59,130,246,0.16);">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-7 h-7 rounded-lg flex items-center justify-center mt-0.5"
                                     style="background: rgba(59,130,246,0.15); border: 1px solid rgba(59,130,246,0.28);">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/>
                                        <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-[10px] font-bold text-blue-400 tracking-[0.14em] uppercase mb-1.5">Detected Speech</div>
                                    <div class="text-white text-[18px] font-semibold leading-snug">
                                        "Airport to City Center"<span class="cursor-blink text-blue-400 ml-0.5 font-light">|</span>
                                    </div>
                                    <!-- Confidence bar -->
                                    <div class="flex items-center gap-2 mt-2.5">
                                        <span class="text-[11px] text-gray-600 flex-shrink-0">Confidence</span>
                                        <div class="flex-1 h-[3px] rounded-full" style="background: rgba(255,255,255,0.06);">
                                            <div class="h-full rounded-full" style="width: 96%; background: linear-gradient(90deg, #3B82F6, #60a5fa);"></div>
                                        </div>
                                        <span class="text-[11px] text-blue-400 font-bold flex-shrink-0">96%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- AI processing checks -->
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center gap-2.5">
                                <div class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background: rgba(59,130,246,0.15);">
                                    <svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                                <span class="text-[12px] text-gray-500">Route analyzed: <span class="text-gray-300">Airport Terminal → City Center · 14.2 km</span></span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <div class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background: rgba(59,130,246,0.15);">
                                    <svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                                <span class="text-[12px] text-gray-500">Fleet queried: <span class="text-gray-300">3 vehicles available nearby</span></span>
                            </div>
                            <div class="flex items-center gap-2.5">
                                <div class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background: rgba(59,130,246,0.15);">
                                    <svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                                <span class="text-[12px] text-gray-500">Pricing computed: <span class="text-gray-300">Dynamic rates applied</span></span>
                            </div>
                        </div>

                        <!-- Try saying chips -->
                        <div>
                            <div class="text-[10.5px] text-gray-600 font-semibold tracking-[0.12em] uppercase mb-2.5">Try saying</div>
                            <div class="flex flex-wrap gap-2">
                                <span class="vs-chip text-[12px] text-gray-400 px-3 py-1.5 rounded-lg select-none" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">"Hotel to Downtown"</span>
                                <span class="vs-chip text-[12px] text-gray-400 px-3 py-1.5 rounded-lg select-none" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">"JFK to Manhattan"</span>
                                <span class="vs-chip text-[12px] text-gray-400 px-3 py-1.5 rounded-lg select-none" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">"Pick me up at Hilton"</span>
                            </div>
                        </div>

                    </div><!-- /panel body -->
                </div><!-- /panel -->
            </div><!-- /LEFT -->

            <!-- ╔════════════════════╗
                 ║  RIGHT: RESULTS   ║
                 ╚════════════════════╝ -->
            <div class="flex flex-col gap-4">

                <!-- Results header -->
                <div class="flex items-center justify-between mb-1 section-fade" style="transition-delay: 0.1s">
                    <div>
                        <div class="text-white font-bold text-[17px]">Available Now</div>
                        <div class="text-gray-500 text-[12.5px] mt-0.5">3 vehicles · Airport → City Center · Tonight</div>
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full flex-shrink-0"
                         style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="#3B82F6" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <span class="text-[10.5px] font-semibold text-blue-400">AI Sorted</span>
                    </div>
                </div>

                <!-- ── Card 1: Executive Sedan ── -->
                <div class="voice-result-card voice-result-reveal p-5" style="transition-delay: 0.25s">
                    <div class="flex items-start gap-4">
                        <!-- Vehicle icon -->
                        <div class="flex-shrink-0 w-[58px] h-[58px] rounded-xl flex items-center justify-center"
                             style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.14);">
                            <svg width="38" height="22" viewBox="0 0 76 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 28 L14 13 Q20 8 38 8 Q56 8 62 13 L68 28 Q72 28 74 31 L74 35 Q74 37 72 37 L62 37 Q60 37 60 35 L60 33 L16 33 L16 35 Q16 37 14 37 L4 37 Q2 37 2 35 L2 31 Q4 28 8 28Z" fill="rgba(59,130,246,0.13)" stroke="#3B82F6" stroke-width="1.2"/>
                                <circle cx="18" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="18" cy="34" r="2" fill="#3B82F6"/>
                                <circle cx="58" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="58" cy="34" r="2" fill="#3B82F6"/>
                                <path d="M16 24 L22 13 Q28 9 38 9 Q48 9 54 13 L60 24 Z" fill="rgba(59,130,246,0.08)" stroke="rgba(59,130,246,0.28)" stroke-width="0.9"/>
                                <line x1="38" y1="9" x2="38" y2="24" stroke="rgba(59,130,246,0.2)" stroke-width="0.7"/>
                            </svg>
                        </div>
                        <!-- Info -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2 mb-1.5">
                                <div>
                                    <h4 class="text-white font-bold text-[14.5px] leading-snug">Executive Sedan</h4>
                                    <p class="text-gray-500 text-[12px] mt-0.5">Mercedes E-Class · Up to 3 pax</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <div class="text-white font-black text-[22px] leading-none">$85</div>
                                    <div class="text-gray-600 text-[10px] mt-0.5">flat rate</div>
                                </div>
                            </div>
                            <!-- Meta row -->
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    ETA 4 min
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    0.8 mi away
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <div class="flex items-center gap-1">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <span class="text-[11.5px] text-gray-400">4.9</span>
                                </div>
                            </div>
                            <button class="btn-cta w-full flex items-center justify-center gap-2 bg-[#3B82F6] text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl border border-blue-500/30">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                <span>Book Now · $85</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ── Card 2: Premium SUV — AI Recommended ── -->
                <div class="voice-result-card voice-result-reveal p-5" style="transition-delay: 0.40s; border-color: rgba(59,130,246,0.22); background: rgba(59,130,246,0.035);">
                    <!-- AI recommended badge -->
                    <div class="flex items-center justify-between mb-3">
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold tracking-[0.14em] uppercase text-blue-300 px-2.5 py-1 rounded-full"
                              style="background: rgba(59,130,246,0.14); border: 1px solid rgba(59,130,246,0.3);">
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="#60a5fa" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            AI Recommended
                        </span>
                        <span class="text-[10.5px] text-gray-600">Best match for your route</span>
                    </div>
                    <div class="flex items-start gap-4">
                        <!-- SUV icon -->
                        <div class="flex-shrink-0 w-[58px] h-[58px] rounded-xl flex items-center justify-center"
                             style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.26);">
                            <svg width="38" height="24" viewBox="0 0 76 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 30 L11 11 Q18 6 38 6 Q58 6 65 11 L70 30 Q73 30 75 33 L75 38 Q75 40 73 40 L63 40 Q61 40 61 38 L61 34 L15 34 L15 38 Q15 40 13 40 L3 40 Q1 40 1 38 L1 33 Q3 30 6 30Z" fill="rgba(59,130,246,0.16)" stroke="#3B82F6" stroke-width="1.2"/>
                                <circle cx="19" cy="36" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="19" cy="36" r="2" fill="#3B82F6"/>
                                <circle cx="57" cy="36" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="57" cy="36" r="2" fill="#3B82F6"/>
                                <path d="M14 25 L19 8 Q24 6 38 6 Q52 6 57 8 L62 25 Z" fill="rgba(59,130,246,0.10)" stroke="rgba(59,130,246,0.32)" stroke-width="0.9"/>
                                <line x1="38" y1="6" x2="38" y2="25" stroke="rgba(59,130,246,0.22)" stroke-width="0.7"/>
                                <line x1="24" y1="6" x2="24" y2="25" stroke="rgba(59,130,246,0.15)" stroke-width="0.6"/>
                                <line x1="52" y1="6" x2="52" y2="25" stroke="rgba(59,130,246,0.15)" stroke-width="0.6"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2 mb-1.5">
                                <div>
                                    <h4 class="text-white font-bold text-[14.5px] leading-snug">Premium SUV</h4>
                                    <p class="text-gray-500 text-[12px] mt-0.5">Cadillac Escalade · Up to 6 pax</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <div class="text-white font-black text-[22px] leading-none">$120</div>
                                    <div class="text-gray-600 text-[10px] mt-0.5">flat rate</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    ETA 7 min
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    1.2 mi away
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <div class="flex items-center gap-1">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <span class="text-[11.5px] text-gray-400">4.8</span>
                                </div>
                            </div>
                            <button class="btn-cta w-full flex items-center justify-center gap-2 bg-[#3B82F6] text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl border border-blue-500/30">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                <span>Book Now · $120</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ── Card 3: Luxury Van ── -->
                <div class="voice-result-card voice-result-reveal p-5" style="transition-delay: 0.55s">
                    <div class="flex items-start gap-4">
                        <!-- Van icon -->
                        <div class="flex-shrink-0 w-[58px] h-[58px] rounded-xl flex items-center justify-center"
                             style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.14);">
                            <svg width="40" height="22" viewBox="0 0 80 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 28 L4 14 Q4 9 9 9 L50 9 L66 16 L76 24 L76 32 Q76 36 72 36 L64 36 Q62 37 60 36 L18 36 Q16 37 14 36 L8 36 Q4 36 4 32 Z" fill="rgba(59,130,246,0.11)" stroke="#3B82F6" stroke-width="1.2"/>
                                <circle cx="17" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="17" cy="34" r="2" fill="#3B82F6"/>
                                <circle cx="63" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/>
                                <circle cx="63" cy="34" r="2" fill="#3B82F6"/>
                                <!-- Windows -->
                                <rect x="8"  y="11" width="18" height="10" rx="2" fill="rgba(59,130,246,0.13)" stroke="rgba(59,130,246,0.28)" stroke-width="0.8"/>
                                <rect x="29" y="11" width="16" height="10" rx="2" fill="rgba(59,130,246,0.13)" stroke="rgba(59,130,246,0.28)" stroke-width="0.8"/>
                                <!-- Cab window -->
                                <path d="M50 9 L66 16 L76 24 L76 23 L50 9Z" fill="rgba(59,130,246,0.09)" stroke="rgba(59,130,246,0.25)" stroke-width="0.7"/>
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2 mb-1.5">
                                <div>
                                    <h4 class="text-white font-bold text-[14.5px] leading-snug">Luxury Van</h4>
                                    <p class="text-gray-500 text-[12px] mt-0.5">Mercedes Sprinter · Up to 8 pax</p>
                                </div>
                                <div class="text-right flex-shrink-0">
                                    <div class="text-white font-black text-[22px] leading-none">$165</div>
                                    <div class="text-gray-600 text-[10px] mt-0.5">flat rate</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    ETA 12 min
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    2.1 mi away
                                </span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <div class="flex items-center gap-1">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                    <span class="text-[11.5px] text-gray-400">4.7</span>
                                </div>
                            </div>
                            <button class="w-full flex items-center justify-center gap-2 text-gray-300 hover:text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl border transition-all duration-200 hover:border-white/25 hover:bg-white/[0.04]"
                                    style="border-color: rgba(255,255,255,0.1);">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                <span>Book Now · $165</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Trust footer -->
                <div class="flex items-center justify-center gap-2 mt-1 voice-result-reveal" style="transition-delay: 0.66s">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span class="text-[12px] text-gray-600">Secure payment · Free cancellation · Confirmed in seconds</span>
                </div>

            </div><!-- /RIGHT -->

        </div><!-- /2-col grid -->

    </div><!-- /container -->
</section>
<!-- ════ END VOICE SEARCH ════ -->


<!-- ════════════════════════════════════════════════════════
     SECTION 4 — AI LIMO CALL AGENT
═════════════════════════════════════════════════════════ -->
<section id="ai-call-agent" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">

    <!-- Grid overlay -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>

    <!-- Top ambient glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[420px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.09) 0%, transparent 65%);"></div>

    <!-- Bottom ambient glow -->
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[700px] h-[320px] pointer-events-none"
         style="background: radial-gradient(ellipse at 50% 100%, rgba(59,130,246,0.06) 0%, transparent 65%);"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

        <!-- Section header -->
        <div class="text-center mb-16 lg:mb-22 ai-call-fade">
            <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full mb-7"
                 style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <div class="w-1.5 h-1.5 rounded-full bg-blue-400" style="box-shadow: 0 0 6px #3B82F6; animation: ai-pulse 1.4s ease-in-out infinite;"></div>
                <span class="text-[11px] font-bold text-blue-400 tracking-[0.16em] uppercase">AI Voice Agent</span>
            </div>
            <h2 class="text-[36px] sm:text-[48px] lg:text-[58px] font-black text-white leading-[1.06] tracking-tight mb-6">
                Your 24/7 AI<br class="hidden sm:block">
                <span style="background: linear-gradient(135deg, #3B82F6 30%, #93c5fd); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Booking Agent</span>
            </h2>
            <p class="text-gray-400 text-[17px] leading-relaxed max-w-2xl mx-auto">
                Customers call. The AI handles everything — trip details, real-time pricing, availability, and full booking confirmation. Zero staff needed.
            </p>
        </div>

        <!-- 2-col layout -->
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            <!-- ── LEFT: Step-by-step flow ── -->
            <div class="ai-call-left-reveal">
                <div class="flex flex-col gap-0">

                    <!-- Step 1 -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.01 2.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/>
                                </svg>
                            </div>
                            <div class="w-px flex-1 min-h-[36px] my-2" style="background: linear-gradient(to bottom, rgba(59,130,246,0.28), rgba(59,130,246,0.05));"></div>
                        </div>
                        <div class="pb-6 pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Customer Calls In</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">Your AI agent answers every call instantly — 24/7, no hold music, no waiting. Fully branded to your company.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <div class="w-px flex-1 min-h-[36px] my-2" style="background: linear-gradient(to bottom, rgba(59,130,246,0.28), rgba(59,130,246,0.05));"></div>
                        </div>
                        <div class="pb-6 pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Collects Trip Details</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">Pickup location, drop-off address, date, time, and passenger count — gathered naturally through conversation.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>
                                </svg>
                            </div>
                            <div class="w-px flex-1 min-h-[36px] my-2" style="background: linear-gradient(to bottom, rgba(59,130,246,0.28), rgba(59,130,246,0.05));"></div>
                        </div>
                        <div class="pb-6 pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Instant Pricing Quote</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">AI calculates the exact fare and presents clear pricing options — sedan, SUV, stretch, or whatever your fleet offers.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex flex-col items-center flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                            </div>
                            <div class="w-px flex-1 min-h-[36px] my-2" style="background: linear-gradient(to bottom, rgba(59,130,246,0.28), rgba(59,130,246,0.05));"></div>
                        </div>
                        <div class="pb-6 pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Live Availability Check</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">Connects to your fleet in real-time and confirms exactly which vehicles are free for the requested date and time.</p>
                        </div>
                    </div>

                    <!-- Step 5 — final, no connector line -->
                    <div class="ai-step-item flex items-start gap-5 group">
                        <div class="flex-shrink-0">
                            <div class="ai-step-icon w-12 h-12 rounded-xl flex items-center justify-center transition-all duration-300"
                                 style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.32); box-shadow: 0 0 22px rgba(59,130,246,0.18);">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </div>
                        </div>
                        <div class="pt-1">
                            <h3 class="text-white font-bold text-[17px] mb-1.5 group-hover:text-blue-300 transition-colors duration-200">Booking Confirmed Automatically</h3>
                            <p class="text-gray-500 text-[14px] leading-relaxed">Booking created, driver notified, SMS confirmation sent to the customer — all before the call ends.</p>
                        </div>
                    </div>

                </div>
            </div><!-- /LEFT -->

            <!-- ── RIGHT: Call UI mockup ── -->
            <div class="ai-call-right-reveal">
                <div class="relative">

                    <!-- Outer glow halo -->
                    <div class="absolute -inset-6 rounded-3xl pointer-events-none" style="background: radial-gradient(ellipse at 50% 50%, rgba(59,130,246,0.12) 0%, transparent 68%);"></div>

                    <!-- Call card -->
                    <div class="ai-call-card relative rounded-2xl overflow-hidden"
                         style="background: rgba(12,12,20,0.98); border: 1px solid rgba(255,255,255,0.07); box-shadow: 0 32px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(59,130,246,0.05);">

                        <!-- ── Call header ── -->
                        <div class="px-5 py-4 flex items-center justify-between"
                             style="background: rgba(59,130,246,0.04); border-bottom: 1px solid rgba(255,255,255,0.06);">
                            <div class="flex items-center gap-3">
                                <!-- AI avatar -->
                                <div class="relative w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                                     style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); box-shadow: 0 0 18px rgba(59,130,246,0.45);">
                                    <svg width="17" height="17" viewBox="0 0 24 24" fill="white" stroke="none">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H7l5-8v4h4l-5 8z"/>
                                    </svg>
                                    <!-- Live dot -->
                                    <div class="absolute -top-0.5 -right-0.5 w-3 h-3 rounded-full bg-green-400 border-2 border-[#0c0c14]"
                                         style="animation: ai-pulse 1.4s ease-in-out infinite;"></div>
                                </div>
                                <div>
                                    <div class="text-white font-bold text-[14px] leading-none mb-1">LimoAgent AI</div>
                                    <div class="flex items-center gap-1.5">
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-400"
                                             style="animation: ai-pulse 1.4s ease-in-out infinite 0.2s;"></div>
                                        <span class="text-green-400 text-[10.5px] font-bold tracking-widest uppercase">Live Call</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Duration + end-call -->
                            <div class="flex items-center gap-3">
                                <div id="ai-call-duration" class="text-[12.5px] font-mono text-gray-400 tabular-nums">0:42</div>
                                <button class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-200"
                                        style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.22);"
                                        onmouseenter="this.style.background='rgba(239,68,68,0.2)'"
                                        onmouseleave="this.style.background='rgba(239,68,68,0.1)'"
                                        title="End call">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.3" stroke-linecap="round">
                                        <path d="M10.68 13.31a16 16 0 003.41 2.6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.01 2.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91"/>
                                        <line x1="23" y1="1" x2="1" y2="23"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- ── Conversation ── -->
                        <div id="ai-chat-area" class="px-5 py-5 flex flex-col gap-3.5 overflow-hidden" style="min-height: 360px;">

                            <!-- AI: greeting -->
                            <div class="flex items-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.05s">
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H7l5-8v4h4l-5 8z"/></svg>
                                </div>
                                <div class="max-w-[80%]">
                                    <div class="px-4 py-3 rounded-2xl rounded-bl-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(59,130,246,0.09); border: 1px solid rgba(59,130,246,0.16);">
                                        Hello! Thank you for calling. I'm your AI booking agent. Where would you like to be picked up today?
                                    </div>
                                    <div class="text-[10px] text-gray-600 mt-1 ml-1">LimoAgent · just now</div>
                                </div>
                            </div>

                            <!-- Customer: pickup request -->
                            <div class="flex items-end justify-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.22s">
                                <div class="max-w-[74%]">
                                    <div class="px-4 py-3 rounded-2xl rounded-br-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(255,255,255,0.055); border: 1px solid rgba(255,255,255,0.09);">
                                        JFK Airport, Terminal 4. I need a ride to Midtown Manhattan tonight at 9 PM.
                                    </div>
                                    <div class="text-[10px] text-gray-600 mt-1 mr-1 text-right">Customer</div>
                                </div>
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: rgba(255,255,255,0.055); border: 1px solid rgba(255,255,255,0.09);">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.45)" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                            </div>

                            <!-- AI: pricing + availability -->
                            <div class="flex items-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.44s">
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H7l5-8v4h4l-5 8z"/></svg>
                                </div>
                                <div class="max-w-[84%]">
                                    <div class="px-4 py-3 rounded-2xl rounded-bl-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(59,130,246,0.09); border: 1px solid rgba(59,130,246,0.16);">
                                        Got it! Checking availability for 9 PM JFK → Midtown…
                                        <!-- Pricing card inside bubble -->
                                        <div class="mt-3 rounded-xl overflow-hidden"
                                             style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.16);">
                                            <div class="px-3.5 py-2.5 flex items-center justify-between hover:bg-white/5 transition-colors cursor-default">
                                                <div>
                                                    <div class="text-white font-semibold text-[12.5px]">Executive Sedan</div>
                                                    <div class="text-gray-500 text-[10.5px] mt-0.5">Mercedes E-Class · up to 3 pax</div>
                                                </div>
                                                <div class="text-white font-black text-[18px]">$95</div>
                                            </div>
                                            <div class="h-px" style="background: rgba(255,255,255,0.05);"></div>
                                            <div class="px-3.5 py-2.5 flex items-center justify-between hover:bg-white/5 transition-colors cursor-default">
                                                <div>
                                                    <div class="text-white font-semibold text-[12.5px]">Luxury SUV</div>
                                                    <div class="text-gray-500 text-[10.5px] mt-0.5">Cadillac Escalade · up to 6 pax</div>
                                                </div>
                                                <div class="text-white font-black text-[18px]">$135</div>
                                            </div>
                                            <div class="h-px" style="background: rgba(255,255,255,0.05);"></div>
                                            <div class="px-3.5 py-2 flex items-center gap-1.5">
                                                <div class="w-1.5 h-1.5 rounded-full bg-green-400"
                                                     style="animation: ai-pulse 1.2s ease-in-out infinite;"></div>
                                                <span class="text-green-400 text-[10.5px] font-semibold">3 vehicles available tonight</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-[10px] text-gray-600 mt-1 ml-1">LimoAgent · just now</div>
                                </div>
                            </div>

                            <!-- Customer: confirm -->
                            <div class="flex items-end justify-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.62s">
                                <div class="max-w-[68%]">
                                    <div class="px-4 py-3 rounded-2xl rounded-br-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(255,255,255,0.055); border: 1px solid rgba(255,255,255,0.09);">
                                        The sedan sounds perfect. Go ahead and book it.
                                    </div>
                                </div>
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: rgba(255,255,255,0.055); border: 1px solid rgba(255,255,255,0.09);">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.45)" stroke-width="2" stroke-linecap="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </div>
                            </div>

                            <!-- AI: booking confirmed -->
                            <div class="flex items-end gap-2.5 ai-bubble-reveal" style="transition-delay: 0.82s">
                                <div class="w-7 h-7 rounded-full flex-shrink-0 flex items-center justify-center"
                                     style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15v-4H7l5-8v4h4l-5 8z"/></svg>
                                </div>
                                <div class="max-w-[84%]">
                                    <div class="px-4 py-3.5 rounded-2xl rounded-bl-sm text-[13px] text-white leading-relaxed"
                                         style="background: rgba(59,130,246,0.09); border: 1px solid rgba(59,130,246,0.16);">
                                        <div class="flex items-center gap-2 mb-2.5">
                                            <div class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center flex-shrink-0"
                                                 style="box-shadow: 0 0 10px rgba(34,197,94,0.4);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                            </div>
                                            <span class="text-green-400 font-bold text-[13px] tracking-wide">Booking Confirmed!</span>
                                        </div>
                                        Executive Sedan booked for tonight at 9:00 PM. Your driver will arrive 5 minutes early. Confirmation SMS sent to your phone!
                                    </div>
                                </div>
                            </div>

                        </div><!-- /conversation -->

                        <!-- ── Waveform + controls ── -->
                        <div class="px-5 pb-5 pt-3" style="border-top: 1px solid rgba(255,255,255,0.05);">

                            <!-- Active call waveform -->
                            <div id="ai-call-waveform" class="flex items-center justify-center gap-[3.5px] mb-4" style="height: 30px;"></div>

                            <!-- Control buttons -->
                            <div class="flex items-center justify-center gap-4">

                                <!-- Mute button -->
                                <button class="w-11 h-11 rounded-full flex items-center justify-center transition-all duration-200"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.09);"
                                        onmouseenter="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.15)'"
                                        onmouseleave="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.09)'"
                                        title="Mute">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.45)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 1a3 3 0 00-3 3v8a3 3 0 006 0V4a3 3 0 00-3-3z"/>
                                        <path d="M19 10v2a7 7 0 01-14 0v-2"/>
                                        <line x1="12" y1="19" x2="12" y2="23"/>
                                        <line x1="8" y1="23" x2="16" y2="23"/>
                                    </svg>
                                </button>

                                <!-- End call (large red) -->
                                <button id="ai-end-call-btn"
                                        class="w-[58px] h-[58px] rounded-full flex items-center justify-center transition-all duration-200"
                                        style="background: linear-gradient(135deg, #dc2626, #ef4444); box-shadow: 0 0 24px rgba(239,68,68,0.35);"
                                        onmouseenter="this.style.boxShadow='0 0 36px rgba(239,68,68,0.55)'; this.style.transform='scale(1.07)'"
                                        onmouseleave="this.style.boxShadow='0 0 24px rgba(239,68,68,0.35)'; this.style.transform='scale(1)'"
                                        title="End call">
                                    <svg width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10.68 13.31a16 16 0 003.41 2.6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8 19.79 19.79 0 01.01 2.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91"/>
                                        <line x1="23" y1="1" x2="1" y2="23"/>
                                    </svg>
                                </button>

                                <!-- Speaker button -->
                                <button class="w-11 h-11 rounded-full flex items-center justify-center transition-all duration-200"
                                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.09);"
                                        onmouseenter="this.style.background='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.15)'"
                                        onmouseleave="this.style.background='rgba(255,255,255,0.05)'; this.style.borderColor='rgba(255,255,255,0.09)'"
                                        title="Speaker">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.45)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
                                        <path d="M19.07 4.93a10 10 0 010 14.14"/>
                                        <path d="M15.54 8.46a5 5 0 010 7.07"/>
                                    </svg>
                                </button>

                            </div>
                        </div>

                    </div><!-- /call card -->
                </div>
            </div><!-- /RIGHT -->

        </div><!-- /2-col grid -->

    </div><!-- /container -->
</section>
<!-- ════ END AI CALL AGENT ════ -->


<!-- Main JavaScript -->
<script src="{{ url('public/assets/js/limoschedule.js') }}"></script>

</body>
</html>
