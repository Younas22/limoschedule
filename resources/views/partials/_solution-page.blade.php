{{--
    Shared body for all 12 "Solutions" pages (see app/Support/solutions.php
    for the content and PublicController's solutionPage() for how it's wired
    up). Keeping the markup in one partial keeps every solution page short
    and visually consistent — edit the layout here once, not 12 times.
--}}
@php $s = $solution; @endphp

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Solutions', 'url' => route('solutions')],
        ['label' => $s['name'], 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 pt-16 pb-14 lg:pt-20 lg:pb-16 text-center">
        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">{{ $s['eyebrow'] }}</span>
        </div>

        <h1 class="text-white text-3xl sm:text-4xl lg:text-[44px] font-black tracking-tight leading-[1.1] mb-5">
            {{ $s['heading'] }}
        </h1>

        <p class="text-gray-400 text-[15.5px] leading-relaxed max-w-xl mx-auto">
            {{ $s['helps'] }}
        </p>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     CONTENT — challenge / how it helps / features / CTA
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 lg:py-20 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_1fr] gap-12 lg:gap-16 items-center">

            <div class="text-center lg:text-left">
                <div class="mb-5 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-gray-500 mb-1.5">The Challenge</div>
                    <p class="text-gray-400 text-[15px] leading-relaxed">{{ $s['challenge'] }}</p>
                </div>
                <div class="mb-7 max-w-lg mx-auto lg:mx-0">
                    <div class="text-[11px] font-bold uppercase tracking-wide text-blue-400 mb-1.5">How LimoSchedule Helps</div>
                    <p class="text-gray-300 text-[15px] leading-relaxed">{{ $s['helps'] }}</p>
                </div>

                <ul class="grid grid-cols-2 gap-3 max-w-md mx-auto lg:mx-0 text-left mb-8">
                    @foreach($s['bullets'] as $bullet)
                    <li class="flex items-center gap-2">
                        <svg class="flex-shrink-0" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span class="text-[13.5px] text-gray-300">{{ $bullet }}</span>
                    </li>
                    @endforeach
                </ul>

                <div class="flex flex-col sm:flex-row items-center lg:items-start justify-center lg:justify-start gap-3">
                    <a href="{{ route('contact') }}" class="btn-cta btn-primary" style="padding: 13px 24px; font-size: 14px;">
                        <span>{{ $s['cta_label'] }}</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <div class="max-w-md mx-auto lg:max-w-none">
                @if($s['image'])
                    <div class="rounded-2xl overflow-hidden aspect-[4/3]" style="border: 1px solid rgba(59,130,246,0.2); box-shadow: 0 24px 70px rgba(0,0,0,0.5);">
                        <img src="{{ asset($s['image']) }}" alt="{{ $s['image_alt'] }}" width="1448" height="1086" class="w-full h-full object-cover" loading="lazy" decoding="async">
                    </div>
                @else
                    <div class="rounded-2xl aspect-[4/3] flex items-center justify-center" style="background: rgba(59,130,246,0.04); border: 1px solid rgba(59,130,246,0.15);">
                        <div class="flex items-center justify-center" style="width: 96px; height: 96px; border-radius: 24px; background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                            <svg width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">{!! $s['icon_svg'] !!}</svg>
                        </div>
                    </div>
                @endif
            </div>

        </div>

        <div class="text-center mt-14 pt-10" style="border-top: 1px solid rgba(255,255,255,0.07);">
            <span class="text-gray-500 text-[13px]">Not quite your business?</span>
            <a href="{{ route('solutions') }}" class="inline-flex items-center gap-1 font-semibold text-blue-400 hover:text-blue-300 transition-colors duration-200 text-[13px] ml-1">
                See all solutions
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>
