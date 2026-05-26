@extends('layouts.public')

@section('content')
<section id="voice-search" class="relative py-28 lg:py-36 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[900px] h-[420px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 100%, rgba(59,130,246,0.09) 0%, transparent 68%);"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[280px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.07) 0%, transparent 70%);"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 lg:mb-20 section-fade">
            <div class="inline-flex items-center gap-2 mb-5 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/><path d="M19 10v2a7 7 0 01-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
                <span class="text-[11px] font-bold tracking-[0.14em] uppercase text-blue-400">AI Voice Interface</span>
            </div>
            <h2 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.1] mb-5">
                Your customers speak.<br>
                <span style="background: linear-gradient(135deg, #ffffff 0%, #93c5fd 45%, #3B82F6 90%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Revenue appears instantly.</span>
            </h2>
            <p class="text-gray-400 text-[16.5px] leading-relaxed">
                The world's most frictionless booking experience &mdash; passengers speak a single voice command in any language, and the AI instantly finds vehicles, quotes fares, and confirms bookings.
            </p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-start">
            <!-- LEFT: Voice UI -->
            <div class="voice-panel-reveal">
                <div class="relative rounded-2xl overflow-hidden" style="background: rgba(14,14,18,0.9); border: 1px solid rgba(255,255,255,0.08); backdrop-filter: blur(16px);">
                    <div class="vs-scan-line"></div>
                    <div class="flex items-center justify-between px-5 py-3.5 border-b" style="border-color: rgba(255,255,255,0.06); background: rgba(255,255,255,0.015);">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(239,68,68,0.7);"></span>
                            <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(234,179,8,0.7);"></span>
                            <span class="w-2.5 h-2.5 rounded-full" style="background: rgba(34,197,94,0.7);"></span>
                        </div>
                        <span class="text-[10.5px] font-medium text-gray-600 tracking-[0.1em] uppercase select-none">Voice Interface &middot; LimoSchedule AI</span>
                        <div class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400" style="box-shadow: 0 0 7px rgba(74,222,128,0.9);"></span>
                            <span class="text-[10px] text-green-400 font-bold tracking-wider">LIVE</span>
                        </div>
                    </div>
                    <div class="p-6 lg:p-8">
                        <div class="flex items-center justify-center mb-7">
                            <div id="vs-status-badge" class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.22);">
                                <span class="ping-dot relative w-2 h-2 rounded-full bg-[#3B82F6] flex-shrink-0"></span>
                                <span id="vs-status-text" class="text-[11.5px] font-bold text-blue-400 tracking-[0.14em] uppercase">Listening</span>
                            </div>
                        </div>
                        <div class="flex justify-center mb-7">
                            <div class="relative w-24 h-24">
                                <div class="mic-ring" style="animation-delay: 0s;"></div>
                                <div class="mic-ring" style="animation-delay: 0.7s;"></div>
                                <div class="mic-ring" style="animation-delay: 1.4s;"></div>
                                <button id="mic-btn" type="button" aria-label="Toggle voice input"
                                    class="mic-btn-listening relative w-full h-full rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 hover:scale-105 active:scale-95 select-none"
                                    style="background: linear-gradient(135deg, rgba(59,130,246,0.22) 0%, rgba(59,130,246,0.09) 100%); border: 2px solid rgba(59,130,246,0.4);">
                                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/><path d="M19 10v2a7 7 0 01-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
                                </button>
                            </div>
                        </div>
                        <div id="voice-waveform" class="flex items-end justify-center gap-[3.5px] mb-7" style="height: 36px;">
                            <div class="vw-bar" style="animation-delay:0.00s;animation-duration:0.85s;"></div>
                            <div class="vw-bar" style="animation-delay:0.07s;animation-duration:1.10s;"></div>
                            <div class="vw-bar" style="animation-delay:0.14s;animation-duration:0.78s;"></div>
                            <div class="vw-bar" style="animation-delay:0.21s;animation-duration:1.25s;"></div>
                            <div class="vw-bar" style="animation-delay:0.28s;animation-duration:1.05s;"></div>
                            <div class="vw-bar" style="animation-delay:0.35s;animation-duration:1.30s;"></div>
                            <div class="vw-bar" style="animation-delay:0.42s;animation-duration:0.80s;"></div>
                            <div class="vw-bar" style="animation-delay:0.49s;animation-duration:0.68s;"></div>
                            <div class="vw-bar" style="animation-delay:0.56s;animation-duration:0.90s;"></div>
                            <div class="vw-bar" style="animation-delay:0.63s;animation-duration:0.75s;"></div>
                            <div class="vw-bar" style="animation-delay:0.70s;animation-duration:1.08s;"></div>
                            <div class="vw-bar" style="animation-delay:0.25s;animation-duration:0.88s;"></div>
                        </div>
                        <div class="rounded-xl p-4 mb-5" style="background: rgba(59,130,246,0.05); border: 1px solid rgba(59,130,246,0.16);">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-7 h-7 rounded-lg flex items-center justify-center mt-0.5" style="background: rgba(59,130,246,0.15); border: 1px solid rgba(59,130,246,0.28);">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a3 3 0 00-3 3v7a3 3 0 006 0V5a3 3 0 00-3-3z"/><path d="M19 10v2a7 7 0 01-14 0v-2"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-[10px] font-bold text-blue-400 tracking-[0.14em] uppercase mb-1.5">Detected Speech</div>
                                    <div class="text-white text-[18px] font-semibold leading-snug">"Airport to City Center"<span class="cursor-blink text-blue-400 ml-0.5 font-light">|</span></div>
                                    <div class="flex items-center gap-2 mt-2.5">
                                        <span class="text-[11px] text-gray-600 flex-shrink-0">Confidence</span>
                                        <div class="flex-1 h-[3px] rounded-full" style="background: rgba(255,255,255,0.06);"><div class="h-full rounded-full" style="width: 96%; background: linear-gradient(90deg, #3B82F6, #60a5fa);"></div></div>
                                        <span class="text-[11px] text-blue-400 font-bold flex-shrink-0">96%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-2 mb-6">
                            <div class="flex items-center gap-2.5"><div class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background: rgba(59,130,246,0.15);"><svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div><span class="text-[12px] text-gray-500">Route analyzed: <span class="text-gray-300">Airport Terminal &rarr; City Center &middot; 14.2 km</span></span></div>
                            <div class="flex items-center gap-2.5"><div class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background: rgba(59,130,246,0.15);"><svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div><span class="text-[12px] text-gray-500">Fleet queried: <span class="text-gray-300">3 vehicles available nearby</span></span></div>
                            <div class="flex items-center gap-2.5"><div class="flex-shrink-0 w-4 h-4 rounded-full flex items-center justify-center" style="background: rgba(59,130,246,0.15);"><svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div><span class="text-[12px] text-gray-500">Pricing computed: <span class="text-gray-300">Dynamic rates applied</span></span></div>
                        </div>
                        <div>
                            <div class="text-[10.5px] text-gray-600 font-semibold tracking-[0.12em] uppercase mb-2.5">Try saying</div>
                            <div class="flex flex-wrap gap-2">
                                <span class="vs-chip text-[12px] text-gray-400 px-3 py-1.5 rounded-lg select-none" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">"Hotel to Downtown"</span>
                                <span class="vs-chip text-[12px] text-gray-400 px-3 py-1.5 rounded-lg select-none" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">"JFK to Manhattan"</span>
                                <span class="vs-chip text-[12px] text-gray-400 px-3 py-1.5 rounded-lg select-none" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);">"Pick me up at Hilton"</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- RIGHT: Results -->
            <div class="flex flex-col gap-4">
                <div class="flex items-center justify-between mb-1 section-fade" style="transition-delay: 0.1s">
                    <div>
                        <div class="text-white font-bold text-[17px]">Available Now</div>
                        <div class="text-gray-500 text-[12.5px] mt-0.5">3 vehicles &middot; Airport &rarr; City Center &middot; Tonight</div>
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full flex-shrink-0" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.18);">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="#3B82F6" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <span class="text-[10.5px] font-semibold text-blue-400">AI Sorted</span>
                    </div>
                </div>
                <div class="voice-result-card voice-result-reveal p-5" style="transition-delay: 0.25s">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-[58px] h-[58px] rounded-xl flex items-center justify-center" style="background: rgba(59,130,246,0.07); border: 1px solid rgba(59,130,246,0.14);">
                            <svg width="38" height="22" viewBox="0 0 76 40" fill="none"><path d="M8 28 L14 13 Q20 8 38 8 Q56 8 62 13 L68 28 Q72 28 74 31 L74 35 Q74 37 72 37 L62 37 Q60 37 60 35 L60 33 L16 33 L16 35 Q16 37 14 37 L4 37 Q2 37 2 35 L2 31 Q4 28 8 28Z" fill="rgba(59,130,246,0.13)" stroke="#3B82F6" stroke-width="1.2"/><circle cx="18" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/><circle cx="18" cy="34" r="2" fill="#3B82F6"/><circle cx="58" cy="34" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/><circle cx="58" cy="34" r="2" fill="#3B82F6"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2 mb-1.5">
                                <div><h4 class="text-white font-bold text-[14.5px] leading-snug">Executive Sedan</h4><p class="text-gray-500 text-[12px] mt-0.5">Mercedes E-Class &middot; Up to 3 pax</p></div>
                                <div class="text-right flex-shrink-0"><div class="text-white font-black text-[22px] leading-none">$85</div><div class="text-gray-600 text-[10px] mt-0.5">flat rate</div></div>
                            </div>
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>ETA 4 min</span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">0.8 mi away</span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <div class="flex items-center gap-1"><svg width="11" height="11" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><span class="text-[11.5px] text-gray-400">4.9</span></div>
                            </div>
                            <button class="btn-cta w-full flex items-center justify-center gap-2 bg-[#3B82F6] text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl border border-blue-500/30">Book Now &middot; $85</button>
                        </div>
                    </div>
                </div>
                <div class="voice-result-card voice-result-reveal p-5" style="transition-delay: 0.40s; border-color: rgba(59,130,246,0.22); background: rgba(59,130,246,0.035);">
                    <div class="flex items-center justify-between mb-3">
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold tracking-[0.14em] uppercase text-blue-300 px-2.5 py-1 rounded-full" style="background: rgba(59,130,246,0.14); border: 1px solid rgba(59,130,246,0.3);">
                            <svg width="9" height="9" viewBox="0 0 24 24" fill="#60a5fa" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            AI Recommended
                        </span>
                        <span class="text-[10.5px] text-gray-600">Best match for your route</span>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-[58px] h-[58px] rounded-xl flex items-center justify-center" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.26);">
                            <svg width="38" height="24" viewBox="0 0 76 44" fill="none"><path d="M6 30 L11 11 Q18 6 38 6 Q58 6 65 11 L70 30 Q73 30 75 33 L75 38 Q75 40 73 40 L63 40 Q61 40 61 38 L61 34 L15 34 L15 38 Q15 40 13 40 L3 40 Q1 40 1 38 L1 33 Q3 30 6 30Z" fill="rgba(59,130,246,0.16)" stroke="#3B82F6" stroke-width="1.2"/><circle cx="19" cy="36" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/><circle cx="19" cy="36" r="2" fill="#3B82F6"/><circle cx="57" cy="36" r="5" fill="#0d1f3c" stroke="#3B82F6" stroke-width="1.3"/><circle cx="57" cy="36" r="2" fill="#3B82F6"/></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2 mb-1.5">
                                <div><h4 class="text-white font-bold text-[14.5px] leading-snug">Premium SUV</h4><p class="text-gray-500 text-[12px] mt-0.5">Cadillac Escalade &middot; Up to 6 pax</p></div>
                                <div class="text-right flex-shrink-0"><div class="text-white font-black text-[22px] leading-none">$120</div><div class="text-gray-600 text-[10px] mt-0.5">flat rate</div></div>
                            </div>
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400"><svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>ETA 7 min</span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <span class="flex items-center gap-1.5 text-[11.5px] text-gray-400">1.2 mi away</span>
                                <span class="w-px h-3 bg-white/10"></span>
                                <div class="flex items-center gap-1"><svg width="11" height="11" viewBox="0 0 24 24" fill="#f59e0b" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><span class="text-[11.5px] text-gray-400">4.8</span></div>
                            </div>
                            <button class="btn-cta w-full flex items-center justify-center gap-2 bg-[#3B82F6] text-white text-[13px] font-semibold px-4 py-2.5 rounded-xl border border-blue-500/30">Book Now &middot; $120</button>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-2 mt-1 voice-result-reveal" style="transition-delay: 0.66s">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span class="text-[12px] text-gray-600">Secure payment &middot; Free cancellation &middot; Confirmed in seconds</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
