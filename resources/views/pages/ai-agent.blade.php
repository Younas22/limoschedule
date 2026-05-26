@extends('layouts.public')

@section('content')
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
                Fire your dispatcher.<br class="hidden sm:block">
                <span style="background: linear-gradient(135deg, #3B82F6 30%, #93c5fd); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Your AI never sleeps.</span>
            </h2>
            <p class="text-gray-400 text-[17px] leading-relaxed max-w-2xl mx-auto">
                Every call answered instantly &mdash; 2 AM, Christmas morning, every weekend. The AI collects trip details, quotes real-time pricing, checks availability, and confirms bookings automatically. No human delays. No missed bookings. No staff dependency. Your operation runs 24/7 on autopilot.
            </p>
        </div>

        <!-- 2-col layout -->
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            <!-- LEFT: Step-by-step flow -->
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
                            <p class="text-gray-500 text-[14px] leading-relaxed">Your AI agent answers every call instantly &mdash; 24/7, no hold music, no waiting. Fully branded to your company.</p>
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
                            <p class="text-gray-500 text-[14px] leading-relaxed">Pickup location, drop-off address, date, time, and passenger count &mdash; gathered naturally through conversation.</p>
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
                            <p class="text-gray-500 text-[14px] leading-relaxed">AI calculates the exact fare and presents clear pricing options &mdash; sedan, SUV, stretch, or whatever your fleet offers.</p>
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
                            <p class="text-gray-500 text-[14px] leading-relaxed">Booking created, driver notified, SMS confirmation sent to the customer &mdash; all before the call ends.</p>
                        </div>
                    </div>

                </div>
            </div><!-- /LEFT -->

            <!-- RIGHT: Call UI mockup -->
            <div class="ai-call-right-reveal">
                <div class="relative">

                    <!-- Outer glow halo -->
                    <div class="absolute -inset-6 rounded-3xl pointer-events-none" style="background: radial-gradient(ellipse at 50% 50%, rgba(59,130,246,0.12) 0%, transparent 68%);"></div>

                    <!-- Call card -->
                    <div class="ai-call-card relative rounded-2xl overflow-hidden"
                         style="background: rgba(12,12,20,0.98); border: 1px solid rgba(255,255,255,0.07); box-shadow: 0 32px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(59,130,246,0.05);">

                        <!-- Call header -->
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

                        <!-- Conversation -->
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
                                    <div class="text-[10px] text-gray-600 mt-1 ml-1">LimoAgent &middot; just now</div>
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
                                        Got it! Checking availability for 9 PM JFK &rarr; Midtown&hellip;
                                        <!-- Pricing card inside bubble -->
                                        <div class="mt-3 rounded-xl overflow-hidden"
                                             style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.16);">
                                            <div class="px-3.5 py-2.5 flex items-center justify-between hover:bg-white/5 transition-colors cursor-default">
                                                <div>
                                                    <div class="text-white font-semibold text-[12.5px]">Executive Sedan</div>
                                                    <div class="text-gray-500 text-[10.5px] mt-0.5">Mercedes E-Class &middot; up to 3 pax</div>
                                                </div>
                                                <div class="text-white font-black text-[18px]">$95</div>
                                            </div>
                                            <div class="h-px" style="background: rgba(255,255,255,0.05);"></div>
                                            <div class="px-3.5 py-2.5 flex items-center justify-between hover:bg-white/5 transition-colors cursor-default">
                                                <div>
                                                    <div class="text-white font-semibold text-[12.5px]">Luxury SUV</div>
                                                    <div class="text-gray-500 text-[10.5px] mt-0.5">Cadillac Escalade &middot; up to 6 pax</div>
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
                                    <div class="text-[10px] text-gray-600 mt-1 ml-1">LimoAgent &middot; just now</div>
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

                        <!-- Waveform + controls -->
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

        <!-- WhatsApp nudge below AI agent section -->
        <div class="mt-16 text-center section-fade" style="transition-delay: 0.3s">
            <p class="text-gray-500 text-[14px] mb-4">Want to see the AI agent in action? Watch a live demo on WhatsApp.</p>
            <a href="https://wa.me/923460820722?text=Hi%2C%20I%27m%20interested%20in%20LimoSchedule.%20Can%20you%20show%20me%20a%20live%20demo%3F" target="_blank" rel="noopener"
               class="wa-hero-cta inline-flex items-center gap-2.5 font-bold px-7 py-3.5 rounded-xl text-[14px] text-white"
               style="background: linear-gradient(135deg, #16a34a, #22c55e); animation: wa-pulse-glow 2.5s ease-in-out infinite;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.99 0C5.376 0 0 5.373 0 11.988c0 2.104.549 4.14 1.595 5.945L0 24l6.335-1.652A11.981 11.981 0 0011.99 24C18.604 24 18.604 18.627 24 12.012 24 5.373 18.604 0 11.99 0zm.01 21.823a9.886 9.886 0 01-5.03-1.372l-.362-.214-3.762.981.999-3.649-.235-.374a9.837 9.837 0 01-1.511-5.195c0-5.452 4.443-9.893 9.901-9.893 5.452 0 9.895 4.441 9.895 9.893 0 5.452-4.443 9.823-9.895 9.823z"/></svg>
                Get Instant Demo on WhatsApp
            </a>
        </div>

    </div><!-- /container -->
</section>
@endsection
