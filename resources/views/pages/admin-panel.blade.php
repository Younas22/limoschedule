@extends('layouts.public')

@section('content')
<section id="admin-panel" class="relative py-28 overflow-hidden">

    <!-- Background -->
    <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse 80% 50% at 50% 0%, rgba(59,130,246,0.055) 0%, transparent 65%);"></div>
    <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(ellipse 50% 35% at 15% 85%, rgba(59,130,246,0.04) 0%, transparent 60%);"></div>

    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 relative">

        <!-- Section Header -->
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-[12px] font-semibold tracking-[0.1em] uppercase text-blue-400 mb-6"
                 style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.2);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Enterprise Admin Panel
            </div>
            <h2 class="text-4xl sm:text-5xl font-bold text-white tracking-tight leading-tight mb-5">
                Complete Control.<br class="hidden sm:block"> Zero Limitations.
            </h2>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto leading-relaxed">
                A fully-featured operations dashboard &mdash; manage bookings, fleet, pricing,
                analytics and your entire team from one powerful interface. Fully yours, fully branded.
            </p>
        </div>

        <!-- Tab Navigation -->
        <div class="flex items-center justify-center mb-8 overflow-x-auto pb-1">
            <div class="flex items-center gap-1 p-1 rounded-xl flex-shrink-0"
                 style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">
                <button class="admin-tab active-tab" data-panel="ap-dashboard">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                    Dashboard
                </button>
                <button class="admin-tab" data-panel="ap-bookings">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg>
                    Bookings
                </button>
                <button class="admin-tab" data-panel="ap-fleet">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/><circle cx="16" cy="19" r="2"/><circle cx="9" cy="19" r="2"/><path d="M21 19h2v-6l-3-4H7v9M7 19h2"/></svg>
                    Fleet
                </button>
                <button class="admin-tab" data-panel="ap-pricing">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                    Pricing
                </button>
                <button class="admin-tab" data-panel="ap-analytics">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                    Analytics
                </button>
                <button class="admin-tab" data-panel="ap-team">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                    Team
                </button>
            </div>
        </div>

        <!-- Browser Frame Wrapper (horizontal scroll on mobile) -->
        <div class="overflow-x-auto rounded-2xl" style="box-shadow: 0 40px 100px rgba(0,0,0,0.55), 0 0 0 1px rgba(59,130,246,0.06);">
        <div class="min-w-[900px] rounded-2xl overflow-hidden" style="background: rgba(12,12,12,0.95); border: 1px solid rgba(255,255,255,0.08); box-shadow: inset 0 1px 0 rgba(255,255,255,0.06);">

            <!-- Browser Chrome Bar -->
            <div class="flex items-center gap-3 px-4 py-3" style="background: rgba(255,255,255,0.025); border-bottom: 1px solid rgba(255,255,255,0.06);">
                <div class="flex items-center gap-1.5 flex-shrink-0">
                    <div class="w-3 h-3 rounded-full" style="background: #FF5F57;"></div>
                    <div class="w-3 h-3 rounded-full" style="background: #FFBD2E;"></div>
                    <div class="w-3 h-3 rounded-full" style="background: #28C840;"></div>
                </div>
                <div class="flex-1 flex justify-center">
                    <div class="flex items-center gap-2 px-4 py-1.5 rounded-lg text-[11.5px] text-gray-500 max-w-xs w-full"
                         style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        yourbrand.com/admin/dashboard
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <div class="flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-semibold text-green-400"
                         style="background: rgba(34,197,94,0.08); border: 1px solid rgba(34,197,94,0.15);">
                        <div class="w-1.5 h-1.5 rounded-full bg-green-400 admin-live-dot"></div>
                        Live
                    </div>
                </div>
            </div>

            <!-- Admin App: Sidebar + Main -->
            <div class="flex" style="height: 580px;">

                <!-- Sidebar -->
                <div class="flex-shrink-0 flex flex-col" style="width: 196px; background: rgba(7,7,7,0.98); border-right: 1px solid rgba(255,255,255,0.05);">

                    <!-- Brand mark -->
                    <div class="flex items-center gap-2.5 px-4 py-4" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        </div>
                        <div>
                            <div class="text-[12px] font-bold text-white leading-none">LimoAdmin</div>
                            <div class="text-[10px] text-gray-500 mt-0.5">v2.4 Enterprise</div>
                        </div>
                    </div>

                    <!-- Nav -->
                    <nav class="flex-1 px-2.5 py-3 flex flex-col gap-0.5">
                        <div class="sidebar-nav-item active-nav" data-nav="ap-dashboard">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                            <span>Dashboard</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-bookings">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/></svg>
                            <span>Bookings</span>
                            <span class="ml-auto text-[10px] px-1.5 py-0.5 rounded-full font-bold" style="background: rgba(59,130,246,0.2); color: #60a5fa;">12</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-fleet">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/><circle cx="16" cy="19" r="2"/><circle cx="9" cy="19" r="2"/><path d="M21 19h2v-6l-3-4H7v9M7 19h2"/></svg>
                            <span>Fleet</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-pricing">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                            <span>Pricing</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-analytics">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                            <span>Analytics</span>
                        </div>
                        <div class="sidebar-nav-item" data-nav="ap-team">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                            <span>Team</span>
                        </div>
                        <div class="mt-2 pt-2" style="border-top: 1px solid rgba(255,255,255,0.05);">
                            <div class="sidebar-nav-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93l-1.41 1.41M22 12h-2M19.07 19.07l-1.41-1.41M12 22v-2M4.93 19.07l1.41-1.41M2 12h2M4.93 4.93l1.41 1.41M12 2v2"/></svg>
                                <span>Settings</span>
                            </div>
                        </div>
                    </nav>

                    <!-- User -->
                    <div class="px-3 py-3 flex items-center gap-2.5" style="border-top: 1px solid rgba(255,255,255,0.05);">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0 text-[11px] font-bold text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">A</div>
                        <div class="min-w-0">
                            <div class="text-[11.5px] font-semibold text-white truncate">Admin</div>
                            <div class="text-[10px] text-gray-500 truncate">Super Admin</div>
                        </div>
                    </div>
                </div><!-- /sidebar -->

                <!-- Main Content -->
                <div class="flex-1 flex flex-col overflow-hidden" style="background: rgba(10,10,12,0.99);">

                    <!-- Top Bar -->
                    <div class="flex items-center justify-between px-5 py-3 flex-shrink-0" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <div class="ap-page-title text-[14px] font-bold text-white">Overview</div>
                        <div class="flex items-center gap-3">
                            <div class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-[11.5px] text-gray-500"
                                 style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                                Search...
                            </div>
                            <div class="relative w-7 h-7 rounded-lg flex items-center justify-center"
                                 style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.5)" stroke-width="2" stroke-linecap="round"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
                                <div class="absolute top-1 right-1 w-2 h-2 rounded-full bg-blue-500" style="border: 1.5px solid rgba(10,10,12,0.99);"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Scrollable Panel Area -->
                    <div class="flex-1 overflow-y-auto admin-content-scroll">

                        <!-- DASHBOARD PANEL -->
                        <div id="ap-dashboard" class="admin-panel p-5 space-y-4">

                            <!-- KPI Cards -->
                            <div class="grid grid-cols-4 gap-3">

                                <div class="admin-kpi-card p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="text-[11px] text-gray-500 font-medium">Total Revenue</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center" style="background: rgba(59,130,246,0.1);">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-[20px] font-bold text-white mb-1.5">$48,290</div>
                                    <div class="flex items-center gap-1 text-[10.5px] text-green-400">
                                        <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>
                                        +12.4% this month
                                    </div>
                                </div>

                                <div class="admin-kpi-card p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="text-[11px] text-gray-500 font-medium">Active Bookings</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center" style="background: rgba(59,130,246,0.1);">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-[20px] font-bold text-white mb-1.5">247</div>
                                    <div class="flex items-center gap-1 text-[10.5px] text-green-400">
                                        <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>
                                        +8 since yesterday
                                    </div>
                                </div>

                                <div class="admin-kpi-card p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="text-[11px] text-gray-500 font-medium">Fleet Utilization</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center" style="background: rgba(59,130,246,0.1);">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/><circle cx="16" cy="19" r="2"/><circle cx="9" cy="19" r="2"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-[20px] font-bold text-white mb-2">84%</div>
                                    <div class="w-full h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);">
                                        <div class="h-full rounded-full" style="width: 84%; background: linear-gradient(90deg, #1d4ed8, #3B82F6);"></div>
                                    </div>
                                </div>

                                <div class="admin-kpi-card p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="text-[11px] text-gray-500 font-medium">Team Online</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center" style="background: rgba(59,130,246,0.1);">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/></svg>
                                        </div>
                                    </div>
                                    <div class="text-[20px] font-bold text-white mb-1.5">18 / 24</div>
                                    <div class="flex items-center gap-1.5 text-[10.5px] text-gray-400">
                                        <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>
                                        6 drivers available
                                    </div>
                                </div>

                            </div><!-- /kpi -->

                            <!-- Revenue Chart + Activity Feed -->
                            <div class="grid grid-cols-3 gap-3">

                                <div class="col-span-2 p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <div class="text-[13px] font-bold text-white">Revenue Overview</div>
                                            <div class="text-[11px] text-gray-500 mt-0.5">Last 7 months</div>
                                        </div>
                                        <div class="px-2.5 py-1 rounded-lg text-[11px] font-medium text-blue-400"
                                             style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">Monthly</div>
                                    </div>
                                    <svg viewBox="0 0 360 90" class="w-full" style="height: 100px;" preserveAspectRatio="none">
                                        <defs>
                                            <linearGradient id="rev-grad" x1="0" y1="0" x2="0" y2="1">
                                                <stop offset="0%" stop-color="#3B82F6" stop-opacity="0.22"/>
                                                <stop offset="100%" stop-color="#3B82F6" stop-opacity="0"/>
                                            </linearGradient>
                                        </defs>
                                        <line x1="0" y1="22" x2="360" y2="22" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                                        <line x1="0" y1="45" x2="360" y2="45" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                                        <line x1="0" y1="68" x2="360" y2="68" stroke="rgba(255,255,255,0.04)" stroke-width="1"/>
                                        <path d="M0 78 L51 63 L103 70 L154 45 L206 52 L257 28 L308 18 L360 12 L360 90 L0 90Z" fill="url(#rev-grad)"/>
                                        <path d="M0 78 L51 63 L103 70 L154 45 L206 52 L257 28 L308 18 L360 12" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="0"   cy="78" r="3" fill="#3B82F6"/>
                                        <circle cx="51"  cy="63" r="3" fill="#3B82F6"/>
                                        <circle cx="103" cy="70" r="3" fill="#3B82F6"/>
                                        <circle cx="154" cy="45" r="3" fill="#3B82F6"/>
                                        <circle cx="206" cy="52" r="3" fill="#3B82F6"/>
                                        <circle cx="257" cy="28" r="3" fill="#3B82F6"/>
                                        <circle cx="308" cy="18" r="3" fill="#3B82F6"/>
                                        <circle cx="360" cy="12" r="3" fill="#3B82F6"/>
                                    </svg>
                                    <div class="flex justify-between mt-1">
                                        <span class="text-[9.5px] text-gray-600">Nov</span>
                                        <span class="text-[9.5px] text-gray-600">Dec</span>
                                        <span class="text-[9.5px] text-gray-600">Jan</span>
                                        <span class="text-[9.5px] text-gray-600">Feb</span>
                                        <span class="text-[9.5px] text-gray-600">Mar</span>
                                        <span class="text-[9.5px] text-gray-600">Apr</span>
                                        <span class="text-[9.5px] text-gray-600">May</span>
                                    </div>
                                </div>

                                <!-- Live Activity -->
                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[13px] font-bold text-white mb-3.5">Live Activity</div>
                                    <div class="space-y-3">
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.2);">
                                                <div class="w-1.5 h-1.5 rounded-full bg-green-400"></div>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">Booking #4892 confirmed</div><div class="text-[10px] text-gray-600 mt-0.5">2 min ago</div></div>
                                        </div>
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/></svg>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">Vehicle #7 dispatched</div><div class="text-[10px] text-gray-600 mt-0.5">5 min ago</div></div>
                                        </div>
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(234,179,8,0.1); border: 1px solid rgba(234,179,8,0.2);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#EAB308" stroke-width="2.5" stroke-linecap="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">Driver late alert #3041</div><div class="text-[10px] text-gray-600 mt-0.5">8 min ago</div></div>
                                        </div>
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.2);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#22C55E" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">Payment received $240</div><div class="text-[10px] text-gray-600 mt-0.5">12 min ago</div></div>
                                        </div>
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-6 h-6 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                                            </div>
                                            <div><div class="text-[11px] text-gray-300 leading-tight">New driver registered</div><div class="text-[10px] text-gray-600 mt-0.5">18 min ago</div></div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- /chart row -->

                        </div><!-- /ap-dashboard -->

                        <!-- BOOKINGS PANEL -->
                        <div id="ap-bookings" class="admin-panel p-5 hidden">

                            <!-- Toolbar -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <div class="px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-white cursor-pointer" style="background: rgba(59,130,246,0.15); border: 1px solid rgba(59,130,246,0.25);">All (247)</div>
                                    <div class="px-3 py-1.5 rounded-lg text-[11.5px] text-gray-400 cursor-pointer" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Pending (12)</div>
                                    <div class="px-3 py-1.5 rounded-lg text-[11.5px] text-gray-400 cursor-pointer" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Active (38)</div>
                                    <div class="px-3 py-1.5 rounded-lg text-[11.5px] text-gray-400 cursor-pointer" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Done (197)</div>
                                </div>
                                <button class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-white flex-shrink-0" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); border: 1px solid rgba(59,130,246,0.5);">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                    New Booking
                                </button>
                            </div>

                            <!-- Table -->
                            <div class="rounded-xl overflow-hidden" style="border: 1px solid rgba(255,255,255,0.07);">
                                <div class="grid text-[10px] font-semibold text-gray-500 uppercase tracking-[0.08em] px-4 py-2.5" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px; background: rgba(255,255,255,0.03); border-bottom: 1px solid rgba(255,255,255,0.07);">
                                    <div>ID</div><div>Customer</div><div>Route</div><div>Vehicle</div><div>Status</div><div>Fare</div><div></div>
                                </div>
                                <div class="divide-y divide-white/[0.04]">

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4892</div>
                                        <div><div class="text-[12px] font-medium text-white">James Carter</div><div class="text-[10px] text-gray-500">+1 555 234 8900</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">JFK &rarr; Manhattan Hotel</div><div class="text-[10px] text-gray-500">Today, 9:30 PM</div></div>
                                        <div class="text-[11px] text-gray-400">Exec Sedan #04</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-green-400" style="background: rgba(34,197,94,0.1);">Active</span></div>
                                        <div class="text-[12px] font-semibold text-white">$145</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4891</div>
                                        <div><div class="text-[12px] font-medium text-white">Sarah Williamson</div><div class="text-[10px] text-gray-500">+1 555 872 3100</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Midtown &rarr; LaGuardia</div><div class="text-[10px] text-gray-500">Today, 11:00 PM</div></div>
                                        <div class="text-[11px] text-gray-400">SUV Premium #09</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-yellow-400" style="background: rgba(234,179,8,0.1);">Pending</span></div>
                                        <div class="text-[12px] font-semibold text-white">$210</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4889</div>
                                        <div><div class="text-[12px] font-medium text-white">Michael Torres</div><div class="text-[10px] text-gray-500">+1 555 431 2200</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Newark EWR &rarr; Downtown</div><div class="text-[10px] text-gray-500">Tomorrow, 7:00 AM</div></div>
                                        <div class="text-[11px] text-gray-400">Stretch Limo #02</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-blue-400" style="background: rgba(59,130,246,0.1);">Confirmed</span></div>
                                        <div class="text-[12px] font-semibold text-white">$380</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4888</div>
                                        <div><div class="text-[12px] font-medium text-white">Emily Chen</div><div class="text-[10px] text-gray-500">+1 555 128 9900</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Chelsea &rarr; JFK Airport</div><div class="text-[10px] text-gray-500">Today, 6:45 PM</div></div>
                                        <div class="text-[11px] text-gray-400">Exec Sedan #07</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-gray-400" style="background: rgba(255,255,255,0.06);">Completed</span></div>
                                        <div class="text-[12px] font-semibold text-white">$175</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4885</div>
                                        <div><div class="text-[12px] font-medium text-white">David Osei</div><div class="text-[10px] text-gray-500">+1 555 667 4400</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Upper East Side &rarr; Boston</div><div class="text-[10px] text-gray-500">Tomorrow, 9:00 AM</div></div>
                                        <div class="text-[11px] text-gray-400">Van Premium #11</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-yellow-400" style="background: rgba(234,179,8,0.1);">Pending</span></div>
                                        <div class="text-[12px] font-semibold text-white">$520</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                    <div class="grid items-center px-4 py-2.5 hover:bg-white/[0.02] transition-colors" style="grid-template-columns: 70px 1fr 1fr 110px 78px 65px 55px;">
                                        <div class="text-[11px] font-mono text-gray-500">#4882</div>
                                        <div><div class="text-[12px] font-medium text-white">Priya Sharma</div><div class="text-[10px] text-gray-500">+1 555 303 7700</div></div>
                                        <div><div class="text-[11px] text-gray-300 truncate">Wall Street &rarr; Newark EWR</div><div class="text-[10px] text-gray-500">Today, 4:15 PM</div></div>
                                        <div class="text-[11px] text-gray-400">Exec Sedan #12</div>
                                        <div><span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-green-400" style="background: rgba(34,197,94,0.1);">Active</span></div>
                                        <div class="text-[12px] font-semibold text-white">$290</div>
                                        <div class="w-6 h-6 rounded-lg flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- /ap-bookings -->

                        <!-- FLEET PANEL -->
                        <div id="ap-fleet" class="admin-panel p-5 hidden">

                            <!-- Fleet Stats -->
                            <div class="grid grid-cols-4 gap-3 mb-4">
                                <div class="p-3 rounded-xl flex items-center gap-3" style="background: rgba(34,197,94,0.05); border: 1px solid rgba(34,197,94,0.15);">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(34,197,94,0.1);"><div class="w-2 h-2 rounded-full bg-green-400"></div></div>
                                    <div><div class="text-[17px] font-bold text-white">18</div><div class="text-[10.5px] text-green-400 font-medium">Available</div></div>
                                </div>
                                <div class="p-3 rounded-xl flex items-center gap-3" style="background: rgba(59,130,246,0.05); border: 1px solid rgba(59,130,246,0.15);">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1);"><div class="w-2 h-2 rounded-full bg-blue-400"></div></div>
                                    <div><div class="text-[17px] font-bold text-white">24</div><div class="text-[10.5px] text-blue-400 font-medium">On Ride</div></div>
                                </div>
                                <div class="p-3 rounded-xl flex items-center gap-3" style="background: rgba(234,179,8,0.05); border: 1px solid rgba(234,179,8,0.15);">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(234,179,8,0.1);"><div class="w-2 h-2 rounded-full bg-yellow-400"></div></div>
                                    <div><div class="text-[17px] font-bold text-white">3</div><div class="text-[10.5px] text-yellow-400 font-medium">Maintenance</div></div>
                                </div>
                                <div class="p-3 rounded-xl flex items-center gap-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(255,255,255,0.05);">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="2" stroke-linecap="round"><path d="M5 17H3a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v3"/><circle cx="16" cy="19" r="2"/><circle cx="9" cy="19" r="2"/></svg>
                                    </div>
                                    <div><div class="text-[17px] font-bold text-white">45</div><div class="text-[10.5px] text-gray-400 font-medium">Total Fleet</div></div>
                                </div>
                            </div>

                            <!-- Vehicle Cards -->
                            <div class="grid grid-cols-3 gap-3">

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">Executive Sedan</div><div class="text-[10.5px] text-gray-500 mt-0.5">Mercedes S-Class &middot; #04</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-green-400" style="background: rgba(34,197,94,0.1);">Available</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 140 48" class="w-28" fill="none"><path d="M8 36 L24 20 L46 14 L94 14 L112 22 L132 28 L132 36 Q125 43 112 43 L24 43 Q12 43 8 36Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="32" cy="43" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="108" cy="43" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M44 14 L46 26 L94 26 L96 14" stroke="rgba(59,130,246,0.3)" stroke-width="1" fill="rgba(59,130,246,0.03)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px]">
                                        <span class="text-gray-500">ODO: 42,180 km</span>
                                        <span class="text-gray-500">Service in 8 days</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.12);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">SUV Premium</div><div class="text-[10.5px] text-gray-500 mt-0.5">Cadillac Escalade &middot; #09</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-blue-400" style="background: rgba(59,130,246,0.1);">On Ride</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 150 52" class="w-32" fill="none"><path d="M6 38 L22 18 L50 12 L100 12 L118 20 L144 28 L144 38 Q136 46 120 46 L22 46 Q12 46 6 38Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="34" cy="46" r="9" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="116" cy="46" r="9" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M48 12 L50 26 L100 26 L102 12" stroke="rgba(59,130,246,0.35)" stroke-width="1" fill="rgba(59,130,246,0.04)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px]">
                                        <span class="text-gray-500">ODO: 28,450 km</span>
                                        <span class="text-blue-400/70">En route &middot; ETA 14 min</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(234,179,8,0.12);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">Stretch Limousine</div><div class="text-[10.5px] text-gray-500 mt-0.5">Lincoln Continental &middot; #02</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-yellow-400" style="background: rgba(234,179,8,0.1);">Maintenance</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 190 48" class="w-full max-w-[140px]" fill="none"><path d="M5 36 L20 22 L40 14 L150 14 L170 22 L185 28 L185 36 Q178 44 165 44 L20 44 Q10 44 5 36Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="30" cy="44" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="158" cy="44" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M38 14 L40 26 L150 26 L152 14" stroke="rgba(59,130,246,0.3)" stroke-width="1" fill="rgba(59,130,246,0.03)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px]">
                                        <span class="text-yellow-600/80">Brake service needed</span>
                                        <span class="text-gray-500">ODO: 71,200 km</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">Luxury Van</div><div class="text-[10.5px] text-gray-500 mt-0.5">Mercedes Sprinter &middot; #11</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-green-400" style="background: rgba(34,197,94,0.1);">Available</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 155 50" class="w-32" fill="none"><path d="M8 36 L22 16 L52 10 L108 10 L125 18 L147 28 L147 36 Q140 44 125 44 L22 44 Q12 44 8 36Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="34" cy="44" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="120" cy="44" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M50 10 L52 22 L108 22 L110 10" stroke="rgba(59,130,246,0.3)" stroke-width="1" fill="rgba(59,130,246,0.03)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px];">
                                        <span class="text-gray-500">ODO: 18,930 km</span>
                                        <span class="text-gray-500">Service in 30 days</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(59,130,246,0.12);">
                                    <div class="flex items-start justify-between mb-3">
                                        <div><div class="text-[12.5px] font-bold text-white">Executive Sedan</div><div class="text-[10.5px] text-gray-500 mt-0.5">BMW 7 Series &middot; #07</div></div>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold text-blue-400" style="background: rgba(59,130,246,0.1);">On Ride</span>
                                    </div>
                                    <div class="h-12 rounded-lg mb-3 flex items-center justify-center" style="background: rgba(255,255,255,0.025); border: 1px solid rgba(255,255,255,0.05);">
                                        <svg viewBox="0 0 140 48" class="w-28" fill="none"><path d="M8 36 L24 20 L46 14 L94 14 L112 22 L132 28 L132 36 Q125 43 112 43 L24 43 Q12 43 8 36Z" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="rgba(255,255,255,0.035)"/><circle cx="32" cy="43" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><circle cx="108" cy="43" r="8" stroke="rgba(255,255,255,0.22)" stroke-width="1.5" fill="rgba(255,255,255,0.05)"/><path d="M44 14 L46 26 L94 26 L96 14" stroke="rgba(59,130,246,0.35)" stroke-width="1" fill="rgba(59,130,246,0.04)"/></svg>
                                    </div>
                                    <div class="flex items-center justify-between text-[10.5px]">
                                        <span class="text-gray-500">ODO: 55,640 km</span>
                                        <span class="text-blue-400/70">En route &middot; ETA 7 min</span>
                                    </div>
                                </div>

                                <div class="p-3.5 rounded-xl flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.03); border: 1px dashed rgba(59,130,246,0.18); min-height: 140px;">
                                    <div class="text-center">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center mx-auto mb-2" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                        </div>
                                        <div class="text-[11.5px] font-medium text-blue-400">Add Vehicle</div>
                                        <div class="text-[10px] text-gray-600 mt-0.5">40 more in fleet</div>
                                    </div>
                                </div>

                            </div><!-- /vehicle grid -->

                        </div><!-- /ap-fleet -->

                        <!-- PRICING PANEL -->
                        <div id="ap-pricing" class="admin-panel p-5 hidden">

                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <div class="text-[14px] font-bold text-white">Pricing Configuration</div>
                                    <div class="text-[11.5px] text-gray-500 mt-0.5">Base rates, per-mile fares, and surge multipliers</div>
                                </div>
                                <button class="px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); border: 1px solid rgba(59,130,246,0.5);">Save Changes</button>
                            </div>

                            <div class="rounded-xl overflow-hidden mb-4" style="border: 1px solid rgba(255,255,255,0.07);">
                                <div class="grid text-[10px] font-semibold text-gray-500 uppercase tracking-[0.08em] px-5 py-3" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px; background: rgba(255,255,255,0.03); border-bottom: 1px solid rgba(255,255,255,0.07);">
                                    <div>Service Type</div><div>Base Fare</div><div>Per Mile</div><div>Min Fare</div><div>Wait Time</div><div>Surge</div>
                                </div>
                                <div class="divide-y divide-white/[0.04]">

                                    <div class="grid items-center px-5 py-3.5 hover:bg-white/[0.015] transition-colors" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px;">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8"/><path d="M5 5l14 14"/></svg>
                                            </div>
                                            <div><div class="text-[12px] font-semibold text-white">Airport Transfer</div><div class="text-[10.5px] text-gray-500">All major airports</div></div>
                                        </div>
                                        <div class="text-[12px] text-white font-mono">$35.00</div><div class="text-[12px] text-white font-mono">$3.20</div><div class="text-[12px] text-white font-mono">$75.00</div><div class="text-[12px] text-white font-mono">$0.50/min</div>
                                        <div class="w-9 h-5 rounded-full flex items-center px-0.5 cursor-pointer" style="background: #3B82F6;"><div class="w-4 h-4 rounded-full bg-white ml-auto shadow-sm"></div></div>
                                    </div>

                                    <div class="grid items-center px-5 py-3.5 hover:bg-white/[0.015] transition-colors" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px;">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                            </div>
                                            <div><div class="text-[12px] font-semibold text-white">City Transfer</div><div class="text-[10.5px] text-gray-500">Point-to-point urban</div></div>
                                        </div>
                                        <div class="text-[12px] text-white font-mono">$20.00</div><div class="text-[12px] text-white font-mono">$2.80</div><div class="text-[12px] text-white font-mono">$40.00</div><div class="text-[12px] text-white font-mono">$0.40/min</div>
                                        <div class="w-9 h-5 rounded-full flex items-center px-0.5 cursor-pointer" style="background: #3B82F6;"><div class="w-4 h-4 rounded-full bg-white ml-auto shadow-sm"></div></div>
                                    </div>

                                    <div class="grid items-center px-5 py-3.5 hover:bg-white/[0.015] transition-colors" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px;">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                            </div>
                                            <div><div class="text-[12px] font-semibold text-white">Hourly Charter</div><div class="text-[10.5px] text-gray-500">Billed per hour</div></div>
                                        </div>
                                        <div class="text-[12px] text-white font-mono">$90.00</div><div class="text-[12px] text-gray-500 font-mono">N/A</div><div class="text-[12px] text-white font-mono">$90.00</div><div class="text-[12px] text-gray-500 font-mono">Included</div>
                                        <div class="w-9 h-5 rounded-full flex items-center px-0.5 cursor-pointer" style="background: rgba(255,255,255,0.1);"><div class="w-4 h-4 rounded-full bg-white/40 shadow-sm"></div></div>
                                    </div>

                                    <div class="grid items-center px-5 py-3.5 hover:bg-white/[0.015] transition-colors" style="grid-template-columns: 1fr 95px 95px 95px 95px 75px;">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M3 12h18M3 6l9-3 9 3M3 18l9 3 9-3"/></svg>
                                            </div>
                                            <div><div class="text-[12px] font-semibold text-white">Long Distance</div><div class="text-[10.5px] text-gray-500">Interstate / 50+ miles</div></div>
                                        </div>
                                        <div class="text-[12px] text-white font-mono">$50.00</div><div class="text-[12px] text-white font-mono">$2.40</div><div class="text-[12px] text-white font-mono">$200.00</div><div class="text-[12px] text-white font-mono">$0.35/min</div>
                                        <div class="w-9 h-5 rounded-full flex items-center px-0.5 cursor-pointer" style="background: #3B82F6;"><div class="w-4 h-4 rounded-full bg-white ml-auto shadow-sm"></div></div>
                                    </div>

                                </div>
                            </div>

                            <!-- Surge Rules -->
                            <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                <div class="text-[12.5px] font-bold text-white mb-3">Dynamic Surge Multipliers</div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="p-3 rounded-lg" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                                        <div class="text-[10.5px] text-gray-500 mb-1.5">Peak Hours (6&ndash;9AM, 5&ndash;8PM)</div>
                                        <div class="text-[18px] font-bold text-blue-400">1.5&times;</div>
                                    </div>
                                    <div class="p-3 rounded-lg" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                                        <div class="text-[10.5px] text-gray-500 mb-1.5">High Demand (&gt;85% fleet)</div>
                                        <div class="text-[18px] font-bold text-yellow-400">2.0&times;</div>
                                    </div>
                                    <div class="p-3 rounded-lg" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06);">
                                        <div class="text-[10.5px] text-gray-500 mb-1.5">Late Night (11PM&ndash;4AM)</div>
                                        <div class="text-[18px] font-bold text-purple-400">1.25&times;</div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /ap-pricing -->

                        <!-- ANALYTICS PANEL -->
                        <div id="ap-analytics" class="admin-panel p-5 hidden">

                            <div class="grid grid-cols-3 gap-3 mb-4">
                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[11px] text-gray-500 mb-2">Monthly Revenue</div>
                                    <div class="text-[22px] font-bold text-white">$48,290</div>
                                    <div class="flex items-center gap-1 mt-1.5 text-[10.5px] text-green-400"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>+12.4% vs last month</div>
                                </div>
                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[11px] text-gray-500 mb-2">Avg. Booking Value</div>
                                    <div class="text-[22px] font-bold text-white">$195.60</div>
                                    <div class="flex items-center gap-1 mt-1.5 text-[10.5px] text-green-400"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>+$18.40 vs last month</div>
                                </div>
                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[11px] text-gray-500 mb-2">Repeat Customer Rate</div>
                                    <div class="text-[22px] font-bold text-white">68%</div>
                                    <div class="flex items-center gap-1 mt-1.5 text-[10.5px] text-green-400"><svg width="9" height="9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="18 15 12 9 6 15"/></svg>+5% vs last month</div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-3">

                                <div class="col-span-2 p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[13px] font-bold text-white mb-4">Weekly Bookings</div>
                                    <div class="flex items-end gap-3" style="height: 120px;">
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 55%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Mon</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 72%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Tue</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 67%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Wed</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 88%; background: linear-gradient(180deg, #60a5fa, #3B82F6);"></div><div class="text-[9.5px] text-gray-600">Thu</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 96%; background: linear-gradient(180deg, #93c5fd, #3B82F6); box-shadow: 0 0 12px rgba(59,130,246,0.3);"></div><div class="text-[9.5px] text-blue-400">Fri</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 82%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Sat</div></div>
                                        <div class="flex flex-col items-center gap-1 flex-1"><div class="w-full rounded-t-md" style="height: 58%; background: linear-gradient(180deg, #3B82F6, rgba(59,130,246,0.4));"></div><div class="text-[9.5px] text-gray-600">Sun</div></div>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="text-[13px] font-bold text-white mb-4">Booking Sources</div>
                                    <div class="space-y-3.5">
                                        <div>
                                            <div class="flex items-center justify-between mb-1.5"><span class="text-[11.5px] text-gray-400">Website</span><span class="text-[11.5px] text-white font-semibold">42%</span></div>
                                            <div class="h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);"><div class="h-full rounded-full bg-blue-500" style="width: 42%;"></div></div>
                                        </div>
                                        <div>
                                            <div class="flex items-center justify-between mb-1.5"><span class="text-[11.5px] text-gray-400">Mobile App</span><span class="text-[11.5px] text-white font-semibold">35%</span></div>
                                            <div class="h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);"><div class="h-full rounded-full" style="width: 35%; background: #6366f1;"></div></div>
                                        </div>
                                        <div>
                                            <div class="flex items-center justify-between mb-1.5"><span class="text-[11.5px] text-gray-400">AI Phone Agent</span><span class="text-[11.5px] text-white font-semibold">15%</span></div>
                                            <div class="h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);"><div class="h-full rounded-full" style="width: 15%; background: #22d3ee;"></div></div>
                                        </div>
                                        <div>
                                            <div class="flex items-center justify-between mb-1.5"><span class="text-[11.5px] text-gray-400">Manual / Phone</span><span class="text-[11.5px] text-white font-semibold">8%</span></div>
                                            <div class="h-1.5 rounded-full" style="background: rgba(255,255,255,0.06);"><div class="h-full rounded-full" style="width: 8%; background: #a3e635;"></div></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!-- /ap-analytics -->

                        <!-- TEAM PANEL -->
                        <div id="ap-team" class="admin-panel p-5 hidden">

                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <div class="text-[14px] font-bold text-white">Team Management</div>
                                    <div class="text-[11.5px] text-gray-500 mt-0.5">24 members &middot; Role-based access control</div>
                                </div>
                                <button class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6); border: 1px solid rgba(59,130,246,0.5);">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                    Invite Member
                                </button>
                            </div>

                            <div class="grid grid-cols-3 gap-3">

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #1d4ed8, #3B82F6);">A</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Alex Morgan</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(59,130,246,0.15); color: #60a5fa; border: 1px solid rgba(59,130,246,0.2);">Super Admin</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-green-400 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">alex@yourbrand.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Fleet</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Pricing</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Team</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-blue-400" style="background: rgba(59,130,246,0.06); border: 1px solid rgba(59,130,246,0.15);">+4 more</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #6d28d9, #7c3aed);">S</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Sarah Kim</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(124,58,237,0.15); color: #a78bfa; border: 1px solid rgba(124,58,237,0.2);">Dispatcher</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-green-400 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">sarah@yourbrand.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Bookings</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Fleet</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Drivers</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #065f46, #059669);">R</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Ryan Osei</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(5,150,105,0.15); color: #34d399; border: 1px solid rgba(5,150,105,0.2);">Driver</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-gray-600 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">ryan.osei@drivers.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">My Rides</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Schedule</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #92400e, #d97706);">M</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Maria Santos</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(217,119,6,0.15); color: #fbbf24; border: 1px solid rgba(217,119,6,0.2);">Manager</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-green-400 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">m.santos@yourbrand.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Reports</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Analytics</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Team</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                                    <div class="flex items-start gap-3 mb-3">
                                        <div class="w-9 h-9 rounded-xl flex-shrink-0 flex items-center justify-center text-[13px] font-bold text-white" style="background: linear-gradient(135deg, #1e1b4b, #4338ca);">J</div>
                                        <div class="min-w-0 flex-1">
                                            <div class="text-[12.5px] font-bold text-white truncate">Jordan Lee</div>
                                            <span class="inline-block px-1.5 py-0.5 rounded mt-0.5 text-[9.5px] font-bold uppercase tracking-wide" style="background: rgba(67,56,202,0.15); color: #818cf8; border: 1px solid rgba(67,56,202,0.2);">Dispatcher</span>
                                        </div>
                                        <div class="w-2 h-2 rounded-full bg-yellow-400 flex-shrink-0 mt-1.5"></div>
                                    </div>
                                    <div class="text-[10.5px] text-gray-500 mb-3">j.lee@yourbrand.com</div>
                                    <div class="flex flex-wrap gap-1">
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Bookings</span>
                                        <span class="px-1.5 py-0.5 rounded text-[9.5px] text-gray-400" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.07);">Fleet</span>
                                    </div>
                                </div>

                                <div class="p-4 rounded-xl flex items-center justify-center cursor-pointer" style="background: rgba(59,130,246,0.03); border: 1px dashed rgba(59,130,246,0.18);">
                                    <div class="text-center">
                                        <div class="w-9 h-9 rounded-full flex items-center justify-center mx-auto mb-2" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.2);">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                        </div>
                                        <div class="text-[11.5px] font-medium text-blue-400">Invite Member</div>
                                        <div class="text-[10px] text-gray-600 mt-0.5">+19 more in team</div>
                                    </div>
                                </div>

                            </div><!-- /team grid -->

                        </div><!-- /ap-team -->

                    </div><!-- /scroll area -->

                </div><!-- /main content -->

            </div><!-- /admin app layout -->

        </div><!-- /browser frame inner -->
        </div><!-- /overflow wrapper -->

        <!-- Feature Pills -->
        <div class="flex flex-wrap items-center justify-center gap-3 mt-10">
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Role-based access control
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                Real-time live updates
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                Fully white-label UI
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                Unlimited team seats
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                Export &amp; reporting
            </div>
            <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl text-[12px] text-gray-400" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                Dynamic surge pricing
            </div>
        </div>

    </div><!-- /container -->
</section>
@endsection
