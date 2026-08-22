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
            "@@type": "JobPosting",
            "title": {!! json_encode($job->title) !!},
            "description": {!! json_encode($job->short_description) !!},
            "datePosted": "{{ $job->published_at?->toDateString() }}",
            "employmentType": "{{ $job->schemaEmploymentType() }}",
            "hiringOrganization": { "@@id": "{{ url('/') }}#organization" },
            "jobLocation": {
                "@@type": "Place",
                "address": {
                    "@@type": "PostalAddress",
                    "addressLocality": {!! json_encode($job->location) !!}
                }
            },
            "url": "{{ route('careers.job', $job->slug) }}"
        }
    ]
}
</script>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════════════════════
     HERO / JOB HEADER
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Careers', 'url' => route('careers')],
        ['label' => $job->title, 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 pt-16 pb-16 lg:pt-20 lg:pb-20">
        <a href="{{ route('careers') }}" class="inline-flex items-center gap-1.5 text-gray-500 hover:text-white text-[13px] font-medium transition-colors duration-200 mb-6">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Back to Careers
        </a>

        <h1 class="text-white text-3xl sm:text-4xl lg:text-[42px] font-black tracking-tight leading-[1.12] mb-5">
            {{ $job->title }}
        </h1>

        <div class="flex flex-wrap items-center gap-2.5">
            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[12.5px] font-semibold text-gray-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">{{ $job->department }}</span>
            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[12.5px] font-semibold text-gray-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">{{ $job->location }}</span>
            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[12.5px] font-semibold text-gray-300" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">{{ $job->employment_type }}</span>
            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-[12.5px] font-semibold text-blue-400" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">{{ $job->experience_level }}</span>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     JOB CONTENT
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-16 lg:py-20 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="space-y-10 text-gray-400 text-[15px] leading-relaxed">

            @if($job->about_role)
            <div>
                <h2 class="text-white text-[20px] font-bold mb-3">About the Role</h2>
                <p style="white-space: pre-line;">{{ $job->about_role }}</p>
            </div>
            @endif

            @if(count($job->bullets('responsibilities')))
            <div>
                <h2 class="text-white text-[20px] font-bold mb-3">What You&rsquo;ll Do</h2>
                <ul class="space-y-2.5">
                    @foreach($job->bullets('responsibilities') as $item)
                    <li class="flex items-start gap-2.5">
                        <svg class="flex-shrink-0 mt-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span>{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(count($job->bullets('requirements')))
            <div>
                <h2 class="text-white text-[20px] font-bold mb-3">What We&rsquo;re Looking For</h2>
                <ul class="space-y-2.5">
                    @foreach($job->bullets('requirements') as $item)
                    <li class="flex items-start gap-2.5">
                        <svg class="flex-shrink-0 mt-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span>{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(count($job->bullets('nice_to_have')))
            <div>
                <h2 class="text-white text-[20px] font-bold mb-3">Nice to Have</h2>
                <ul class="space-y-2.5">
                    @foreach($job->bullets('nice_to_have') as $item)
                    <li class="flex items-start gap-2.5">
                        <svg class="flex-shrink-0 mt-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span>{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(count($job->bullets('what_youll_work_on')))
            <div>
                <h2 class="text-white text-[20px] font-bold mb-3">What You&rsquo;ll Work On</h2>
                <ul class="space-y-2.5">
                    @foreach($job->bullets('what_youll_work_on') as $item)
                    <li class="flex items-start gap-2.5">
                        <svg class="flex-shrink-0 mt-1" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                        <span>{{ $item }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>

        <div class="mt-14 pt-10 text-center" style="border-top: 1px solid rgba(255,255,255,0.08);">
            <a href="{{ route('careers') }}?position={{ urlencode($job->title) }}#apply"
               class="btn-cta inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-8 py-4 rounded-xl text-[15px] border border-blue-500/30">
                <span>Apply for this Position</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

    </div>
</section>

@endsection
