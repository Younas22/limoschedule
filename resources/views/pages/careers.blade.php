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
            "logo": "{{ url('public/logo/logo-white.png') }}",
            "contactPoint": {
                "@@type": "ContactPoint",
                "contactType": "customer service",
                "email": "support@limoschedule.com",
                "telephone": "+923460820722"
            }
        },
        {
            "@@type": "WebSite",
            "@@id": "{{ url('/') }}#website",
            "name": "LimoSchedule",
            "url": "{{ url('/') }}",
            "publisher": { "@@id": "{{ url('/') }}#organization" }
        }
@if($openJobs->count())
        ,
        @foreach($openJobs as $job)
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
        }@if(!$loop->last),@endif
        @endforeach
@endif
        ,{
            "@@type": "FAQPage",
            "mainEntity": [
                { "@@type": "Question", "name": "Can I apply if there's no open position that matches my skills?", "acceptedAnswer": { "@@type": "Answer", "text": "Yes. The application form includes a General Application option, so you can submit your resume even if none of the current openings match exactly." } },
                { "@@type": "Question", "name": "What do I need to submit with my application?", "acceptedAnswer": { "@@type": "Answer", "text": "A resume or CV (PDF or Word document) is required. LinkedIn, portfolio and GitHub links, plus a cover letter, are optional but help your application stand out." } }
            ]
        }
    ]
}
</script>
<style>
    .careers-fieldset { border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; padding: 22px 20px 24px; background: rgba(255,255,255,0.015); }
    .careers-legend { padding: 0 8px; font-size: 12px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #60a5fa; }
    .careers-field-error { display: none; color: #f87171; font-size: 12px; margin-top: 6px; }
    .careers-field-error.is-visible { display: block; }
    .contact-input.field-invalid, .careers-dropzone.field-invalid { border-color: rgba(248,113,113,0.6) !important; }
    .careers-dropzone {
        border: 1.5px dashed rgba(255,255,255,0.16);
        border-radius: 14px;
        padding: 28px 20px;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.2s ease, background 0.2s ease;
        background: rgba(255,255,255,0.02);
    }
    .careers-dropzone:hover, .careers-dropzone.is-dragover { border-color: rgba(59,130,246,0.55); background: rgba(59,130,246,0.05); }
    .careers-dropzone:focus-visible { outline: 2px solid #3B82F6; outline-offset: 3px; }
    .careers-file-row {
        display: none;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 12px 16px;
        border-radius: 12px;
        background: rgba(59,130,246,0.06);
        border: 1px solid rgba(59,130,246,0.25);
    }
    .careers-file-row.is-visible { display: flex; }
    .careers-checkbox-row { display: flex; align-items: flex-start; gap: 10px; }
    .careers-checkbox-row input[type="checkbox"] {
        width: 18px; height: 18px; margin-top: 2px; flex-shrink: 0; accent-color: #3B82F6; cursor: pointer;
    }
    #careersSubmitBtn:disabled { opacity: 0.65; cursor: not-allowed; }
    .contact-input:focus-visible, .careers-checkbox-row input:focus-visible { outline: 2px solid #3B82F6; outline-offset: 2px; }
</style>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303;">
@php
    $breadcrumbs = [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Careers', 'url' => null],
    ];
@endphp
@include('partials._breadcrumbs')

    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.03) 1px, transparent 1px); background-size: 56px 56px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[500px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.12) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-5 sm:px-6 lg:px-8 pt-24 pb-16 lg:pt-32 lg:pb-20 text-center">
        <div class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full" style="background: rgba(59,130,246,0.08); border: 1px solid rgba(59,130,246,0.25);">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.4 6.6L21 10l-5 4.6L17.4 21 12 17.4 6.6 21 8 14.6 3 10l6.6-1.4L12 2z"/></svg>
            <span class="text-blue-400 text-[11px] font-bold tracking-[0.16em] uppercase">Careers</span>
        </div>

        <h1 class="text-white text-4xl sm:text-5xl lg:text-[52px] font-black tracking-tight leading-[1.08] mb-6">
            Build the Future of Transportation Technology
        </h1>

        <p class="text-gray-400 text-[17px] sm:text-[18px] leading-relaxed max-w-2xl mx-auto mb-9">
            We&rsquo;re building technology that helps transportation businesses manage bookings, customers and operations more efficiently.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="#open-positions"
               class="btn-cta w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#3B82F6] text-white font-bold px-8 py-4 rounded-xl text-[15px] border border-blue-500/30">
                <span>View Open Positions</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
            </a>
            <a href="#apply"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-semibold px-7 py-4 rounded-xl text-[15px] text-white transition-all duration-200 hover:bg-white/10"
               style="background: #000; border: 1px solid rgba(255,255,255,0.28);">
                <span>Submit Your Resume</span>
            </a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     WHY JOIN LIMOSCHEDULE
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-5xl mx-auto px-5 sm:px-6 lg:px-8">

        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
                Why Join LimoSchedule?
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <article class="rounded-2xl p-6" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <span class="w-[44px] h-[44px] rounded-xl flex items-center justify-center mb-4" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                </span>
                <h3 class="text-white text-[16px] font-bold mb-2">Build Real Products</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed">Work on software that is used to solve real operational challenges in the transportation industry.</p>
            </article>

            <article class="rounded-2xl p-6" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <span class="w-[44px] h-[44px] rounded-xl flex items-center justify-center mb-4" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
                </span>
                <h3 class="text-white text-[16px] font-bold mb-2">Solve Real Business Problems</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed">Build practical technology that helps transportation companies manage bookings, customers and daily operations.</p>
            </article>

            <article class="rounded-2xl p-6" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <span class="w-[44px] h-[44px] rounded-xl flex items-center justify-center mb-4" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                </span>
                <h3 class="text-white text-[16px] font-bold mb-2">Work With Modern Technology</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed">Contribute to modern web applications, APIs, automation and SaaS products.</p>
            </article>

            <article class="rounded-2xl p-6" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <span class="w-[44px] h-[44px] rounded-xl flex items-center justify-center mb-4" style="background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25);">
                    <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </span>
                <h3 class="text-white text-[16px] font-bold mb-2">Make a Real Impact</h3>
                <p class="text-gray-400 text-[13.5px] leading-relaxed">Your work directly contributes to improving the product and the experience of transportation businesses.</p>
            </article>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     OPEN POSITIONS
═══════════════════════════════════════════════════════════════ -->
<section id="open-positions" class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.025) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.025) 1px, transparent 1px); background-size: 56px 56px;"></div>

    @if($openJobs->count())
    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8">

        <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-10 text-white text-center">
            Open Positions
        </h2>

        <div class="flex flex-col gap-4">
            @foreach($openJobs as $job)
            <article class="rounded-2xl p-6 sm:p-7" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
                <h3 class="text-white text-[18px] font-bold mb-1.5">{{ $job->title }}</h3>
                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-[12.5px] text-gray-500 mb-4">
                    <span>{{ $job->department }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-700"></span>
                    <span>{{ $job->location }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-700"></span>
                    <span>{{ $job->employment_type }}</span>
                    <span class="w-1 h-1 rounded-full bg-gray-700"></span>
                    <span>{{ $job->experience_level }}</span>
                </div>
                <p class="text-gray-400 text-[14px] leading-relaxed mb-5">{{ $job->short_description }}</p>
                <a href="{{ route('careers.job', $job->slug) }}" class="inline-flex items-center gap-1.5 text-blue-400 hover:text-blue-300 font-semibold text-[13.5px] transition-colors duration-200">
                    View Details &amp; Apply
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </article>
            @endforeach
        </div>

        <p class="text-center text-gray-500 text-[13.5px] mt-10">
            Don&rsquo;t see a fit? <a href="#apply" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-200">Send your resume anyway</a> and we&rsquo;ll keep it on file.
        </p>

    </div>
    @else
    <div class="relative z-10 max-w-2xl mx-auto px-5 sm:px-6 lg:px-8 text-center">

        <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-10 text-white">
            Open Positions
        </h2>

        <div class="rounded-2xl p-10 sm:p-12" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08);">
            <span class="w-[56px] h-[56px] mx-auto rounded-2xl flex items-center justify-center mb-6" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1);">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
            </span>
            <h3 class="text-white text-[19px] font-bold mb-3">No open positions at the moment.</h3>
            <p class="text-gray-400 text-[14.5px] leading-relaxed mb-8 max-w-md mx-auto">
                We&rsquo;re always interested in meeting talented people. If you believe you&rsquo;d be a great fit for LimoSchedule, you can still send us your resume and we&rsquo;ll keep your profile in mind for future opportunities.
            </p>
            <a href="#apply"
               class="btn-cta inline-flex items-center justify-center gap-2 bg-[#3B82F6] text-white font-bold px-7 py-3.5 rounded-xl text-[14.5px] border border-blue-500/30">
                <span>Send Your Resume</span>
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

    </div>
    @endif
</section>

<!-- ═══════════════════════════════════════════════════════════════
     APPLICATION FORM
═══════════════════════════════════════════════════════════════ -->
<section id="apply" class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-2xl mx-auto px-5 sm:px-6 lg:px-8">

        <div id="careersFormWrap">

            <div class="text-center mb-10">
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-4 text-white">
                    Apply to LimoSchedule
                </h2>
                <p class="text-gray-400 text-[15px] leading-relaxed max-w-lg mx-auto">
                    Tell us a little about yourself and your experience. We&rsquo;ll review your application and contact you if there&rsquo;s a suitable opportunity.
                </p>
            </div>

            <div id="careersErrorBanner" class="hidden mb-6 px-4 py-3 rounded-xl text-[13.5px]" style="background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.3); color: #fca5a5;" role="alert"></div>

            <form id="careersForm" action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data" class="space-y-6" novalidate>
                @csrf

                <!-- Honeypot — hidden from real users, catches simple bots -->
                <div class="absolute -left-[9999px] top-auto" aria-hidden="true">
                    <label for="cr_website">Website</label>
                    <input type="text" id="cr_website" name="website" tabindex="-1" autocomplete="off">
                </div>

                <!-- Personal Information -->
                <fieldset class="careers-fieldset">
                    <legend class="careers-legend">Personal Information</legend>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                        <div>
                            <label class="contact-label" for="cr_full_name">Full Name <span class="text-blue-500 ml-0.5">*</span></label>
                            <input type="text" id="cr_full_name" name="full_name" class="contact-input" placeholder="Enter your full name" autocomplete="name" required aria-describedby="err_full_name">
                            <p class="careers-field-error" id="err_full_name" role="alert"></p>
                        </div>
                        <div>
                            <label class="contact-label" for="cr_email">Email Address <span class="text-blue-500 ml-0.5">*</span></label>
                            <input type="email" id="cr_email" name="email" class="contact-input" placeholder="you@example.com" autocomplete="email" required aria-describedby="err_email">
                            <p class="careers-field-error" id="err_email" role="alert"></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="contact-label" for="cr_phone">Phone Number</label>
                            <input type="tel" id="cr_phone" name="phone" class="contact-input" placeholder="Enter your phone number" autocomplete="tel" aria-describedby="err_phone">
                            <p class="careers-field-error" id="err_phone" role="alert"></p>
                        </div>
                        <div>
                            <label class="contact-label" for="cr_country">Country <span class="text-blue-500 ml-0.5">*</span></label>
                            <select id="cr_country" name="country" class="contact-input contact-select" required aria-describedby="err_country">
                                <option value="" disabled selected style="background:#111111;">Select your country&hellip;</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->name }}" style="background:#111111;">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <p class="careers-field-error" id="err_country" role="alert"></p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="contact-label" for="cr_city">City</label>
                        <input type="text" id="cr_city" name="city" class="contact-input" placeholder="Enter your city" autocomplete="address-level2" aria-describedby="err_city">
                        <p class="careers-field-error" id="err_city" role="alert"></p>
                    </div>
                </fieldset>

                <!-- Professional Information -->
                <fieldset class="careers-fieldset">
                    <legend class="careers-legend">Professional Information</legend>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                        <div>
                            <label class="contact-label" for="cr_position">Position Applying For <span class="text-blue-500 ml-0.5">*</span></label>
                            <select id="cr_position" name="position" class="contact-input contact-select" required aria-describedby="err_position">
                                @foreach($openJobs as $job)
                                    <option value="{{ $job->title }}" {{ request('position') === $job->title ? 'selected' : '' }} style="background:#111111;">{{ $job->title }}</option>
                                @endforeach
                                <option value="General Application" {{ !request('position') || request('position') === 'General Application' ? 'selected' : '' }} style="background:#111111;">General Application</option>
                            </select>
                            <p class="careers-field-error" id="err_position" role="alert"></p>
                        </div>
                        <div>
                            <label class="contact-label" for="cr_experience_level">Experience Level <span class="text-blue-500 ml-0.5">*</span></label>
                            <select id="cr_experience_level" name="experience_level" class="contact-input contact-select" required aria-describedby="err_experience_level">
                                <option value="" disabled selected style="background:#111111;">Select your level&hellip;</option>
                                <option value="Entry Level" style="background:#111111;">Entry Level</option>
                                <option value="Junior" style="background:#111111;">Junior</option>
                                <option value="Mid-Level" style="background:#111111;">Mid-Level</option>
                                <option value="Senior" style="background:#111111;">Senior</option>
                                <option value="Lead" style="background:#111111;">Lead</option>
                                <option value="Executive" style="background:#111111;">Executive</option>
                            </select>
                            <p class="careers-field-error" id="err_experience_level" role="alert"></p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="contact-label" for="cr_years">Years of Experience</label>
                        <input type="number" id="cr_years" name="years_of_experience" class="contact-input" placeholder="e.g. 3" min="0" max="60" step="1" style="max-width: 160px;" aria-describedby="err_years">
                        <p class="careers-field-error" id="err_years" role="alert"></p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="contact-label" for="cr_linkedin">LinkedIn Profile</label>
                            <input type="url" id="cr_linkedin" name="linkedin" class="contact-input" placeholder="https://linkedin.com/in/yourname" autocomplete="url" aria-describedby="err_linkedin">
                            <p class="careers-field-error" id="err_linkedin" role="alert"></p>
                        </div>
                        <div>
                            <label class="contact-label" for="cr_portfolio">Portfolio / Website</label>
                            <input type="url" id="cr_portfolio" name="portfolio" class="contact-input" placeholder="https://yourwebsite.com" autocomplete="url" aria-describedby="err_portfolio">
                            <p class="careers-field-error" id="err_portfolio" role="alert"></p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="contact-label" for="cr_github">GitHub Profile</label>
                        <input type="url" id="cr_github" name="github" class="contact-input" placeholder="https://github.com/yourname" autocomplete="url" aria-describedby="err_github">
                        <p class="careers-field-error" id="err_github" role="alert"></p>
                    </div>
                </fieldset>

                <!-- Resume Upload -->
                <fieldset class="careers-fieldset">
                    <legend class="careers-legend">Resume / CV</legend>
                    <div class="mt-3">
                        <label class="contact-label" id="cr_resume_label">Upload Your Resume / CV <span class="text-blue-500 ml-0.5">*</span></label>

                        <div id="careersDropzone" class="careers-dropzone" tabindex="0" role="button" aria-labelledby="cr_resume_label" aria-describedby="err_resume">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-3"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                            <p class="text-gray-300 text-[14px] font-semibold mb-1">Drag &amp; drop your resume here</p>
                            <p class="text-gray-500 text-[13px] mb-3">or <span class="text-blue-400 font-semibold">Browse Files</span></p>
                            <p class="text-gray-600 text-[12px]">PDF, DOC or DOCX &middot; max 5MB</p>
                        </div>
                        <input type="file" id="cr_resume" name="resume" class="hidden" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>

                        <div id="careersFileRow" class="careers-file-row mt-3">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <svg class="flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                <span id="careersFileName" class="text-gray-200 text-[13px] truncate"></span>
                            </div>
                            <button type="button" id="careersFileRemove" class="text-red-400 hover:text-red-300 text-[12.5px] font-semibold flex-shrink-0">Remove</button>
                        </div>

                        <p class="careers-field-error" id="err_resume" role="alert"></p>
                    </div>
                </fieldset>

                <!-- Cover Letter -->
                <fieldset class="careers-fieldset">
                    <legend class="careers-legend">Cover Letter</legend>
                    <div class="mt-3">
                        <label class="contact-label" for="cr_cover_letter">Cover Letter / Message</label>
                        <textarea id="cr_cover_letter" name="cover_letter" class="contact-input" rows="5" style="resize: vertical; min-height: 120px;" placeholder="Tell us why you'd like to work with LimoSchedule and what you could bring to the team." aria-describedby="err_cover_letter"></textarea>
                        <p class="careers-field-error" id="err_cover_letter" role="alert"></p>
                    </div>
                </fieldset>

                <!-- Availability -->
                <fieldset class="careers-fieldset">
                    <legend class="careers-legend">Availability</legend>
                    <div class="mt-3">
                        <label class="contact-label" for="cr_availability">When can you start? <span class="text-blue-500 ml-0.5">*</span></label>
                        <select id="cr_availability" name="availability" class="contact-input contact-select" required aria-describedby="err_availability">
                            <option value="" disabled selected style="background:#111111;">Select an option&hellip;</option>
                            <option value="Immediately" style="background:#111111;">Immediately</option>
                            <option value="Within 2 weeks" style="background:#111111;">Within 2 weeks</option>
                            <option value="Within 1 month" style="background:#111111;">Within 1 month</option>
                            <option value="1-3 months" style="background:#111111;">1&ndash;3 months</option>
                            <option value="Other" style="background:#111111;">Other</option>
                        </select>
                        <p class="careers-field-error" id="err_availability" role="alert"></p>
                    </div>
                </fieldset>

                <!-- Consent -->
                <div>
                    <div class="careers-checkbox-row">
                        <input type="checkbox" id="cr_consent" name="consent" value="1" required aria-describedby="err_consent">
                        <label for="cr_consent" class="text-gray-400 text-[13px] leading-relaxed">
                            I confirm that the information provided is accurate and I agree that LimoSchedule may use my information to evaluate my application and contact me regarding relevant opportunities. Read our <a href="{{ route('privacy-policy') }}" target="_blank" class="text-blue-400 hover:text-blue-300 font-semibold">Privacy Policy</a>.
                        </label>
                    </div>
                    <p class="careers-field-error" id="err_consent" role="alert"></p>
                </div>

                <div class="pt-1">
                    <button type="submit" id="careersSubmitBtn" class="btn-cta w-full inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-7 py-4 rounded-xl text-[15px] border border-blue-500/30">
                        <span id="careersSubmitLabel">Submit Application</span>
                    </button>
                </div>
            </form>

        </div>

        <!-- Success state -->
        <div id="careersSuccess" class="hidden text-center py-10">
            <div class="w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6" style="background: rgba(59,130,246,0.12); border: 1px solid rgba(59,130,246,0.3);">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#3B82F6" stroke-width="2" stroke-linecap="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <h2 class="text-white text-[22px] font-bold mb-3">Application Received</h2>
            <p class="text-gray-400 text-[14.5px] leading-relaxed max-w-md mx-auto mb-8">
                Thank you for your application. We&rsquo;ve received your information and will review it. If your experience matches a suitable opportunity, we&rsquo;ll be in touch.
            </p>
            <a href="#open-positions" id="careersBackLink" class="inline-flex items-center gap-1.5 text-blue-400 hover:text-blue-300 font-semibold text-[13.5px] transition-colors duration-200">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Back to Careers
            </a>
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     APPLICATION FAQ
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #060606;">
    <div class="relative z-10 max-w-2xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-8 text-white text-center">
            Application Questions
        </h2>
        <div class="flex flex-col gap-3">
            <div class="rounded-2xl p-5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[15px] mb-1.5">Can I apply if there's no open position that matches my skills?</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed">Yes. The application form includes a General Application option, so you can submit your resume even if none of the current openings match exactly.</p>
            </div>
            <div class="rounded-2xl p-5" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.07);">
                <h3 class="text-white font-semibold text-[15px] mb-1.5">What do I need to submit with my application?</h3>
                <p class="text-gray-400 text-[14px] leading-relaxed">A resume or CV (PDF or Word document) is required. LinkedIn, portfolio and GitHub links, plus a cover letter, are optional but help your application stand out.</p>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     TRUST SECTION
═══════════════════════════════════════════════════════════════ -->
<section class="relative py-20 lg:py-24 overflow-hidden" style="background: #0A0A0A;">
    <div class="relative z-10 max-w-2xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black tracking-tight leading-[1.15] mb-5 text-white">
            Build Something That Matters
        </h2>
        <p class="text-gray-400 text-[16px] leading-relaxed mb-8">
            At LimoSchedule, we&rsquo;re focused on making transportation operations simpler through practical technology.
        </p>
        <a href="{{ route('about') }}" class="inline-flex items-center gap-1.5 text-blue-400 hover:text-blue-300 font-semibold text-[14px] transition-colors duration-200">
            Learn More About LimoSchedule
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     FINAL CTA
═══════════════════════════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #030303; padding: 100px 0 110px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: linear-gradient(rgba(59,130,246,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(59,130,246,0.02) 1px, transparent 1px); background-size: 64px 64px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[450px] pointer-events-none" style="background: radial-gradient(ellipse at 50% 0%, rgba(59,130,246,0.14) 0%, transparent 70%);"></div>

    <div class="relative z-10 max-w-3xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <h2 class="font-black text-white leading-[1.1] tracking-tight mb-5" style="font-size: clamp(2.2rem, 5vw, 3.5rem);">
            Want to Work With LimoSchedule?
        </h2>
        <p class="text-gray-400 text-[15px] leading-relaxed mb-9 max-w-lg mx-auto">
            We&rsquo;re always interested in connecting with talented people who want to build useful technology and solve real-world business problems.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="#apply"
               class="btn-cta w-full sm:w-auto inline-flex items-center justify-center gap-2.5 bg-[#3B82F6] text-white font-bold px-9 py-4 rounded-xl text-[15.5px] border border-blue-500/30">
                <span>Submit Your Resume</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ url('/') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 font-semibold px-7 py-4 rounded-xl text-[15px] text-white transition-all duration-200 hover:bg-white/10"
               style="background: #000; border: 1px solid rgba(255,255,255,0.28);">
                <span>Explore LimoSchedule</span>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    'use strict';

    var form          = document.getElementById('careersForm');
    var formWrap       = document.getElementById('careersFormWrap');
    var successBlock    = document.getElementById('careersSuccess');
    var errorBanner      = document.getElementById('careersErrorBanner');
    var submitBtn         = document.getElementById('careersSubmitBtn');
    var submitLabel        = document.getElementById('careersSubmitLabel');
    var dropzone             = document.getElementById('careersDropzone');
    var fileInput              = document.getElementById('cr_resume');
    var fileRow                  = document.getElementById('careersFileRow');
    var fileNameEl                 = document.getElementById('careersFileName');
    var fileRemoveBtn                = document.getElementById('careersFileRemove');
    var resumeError                    = document.getElementById('err_resume');
    var backLink                         = document.getElementById('careersBackLink');
    if (!form) return;

    var MAX_BYTES = 5 * 1024 * 1024; // 5MB — matches server-side "max:5120" validation
    var ALLOWED_EXT = ['pdf', 'doc', 'docx'];
    var isSubmitting = false;

    function fieldError(name) {
        return document.getElementById('err_' + name);
    }

    function clearAllErrors() {
        form.querySelectorAll('.careers-field-error').forEach(function (el) {
            el.textContent = '';
            el.classList.remove('is-visible');
        });
        form.querySelectorAll('.field-invalid').forEach(function (el) {
            el.classList.remove('field-invalid');
        });
        errorBanner.classList.add('hidden');
        errorBanner.textContent = '';
    }

    function showFieldError(name, message) {
        var el = fieldError(name);
        var input = document.getElementById('cr_' + name) || (name === 'resume' ? dropzone : null);
        if (el) { el.textContent = message; el.classList.add('is-visible'); }
        if (input) { input.classList.add('field-invalid'); }
    }

    function formatBytes(bytes) {
        return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
    }

    function extOf(filename) {
        var parts = filename.split('.');
        return parts.length > 1 ? parts.pop().toLowerCase() : '';
    }

    function setFile(file) {
        if (!file) return;

        var ext = extOf(file.name);
        if (ALLOWED_EXT.indexOf(ext) === -1) {
            showFieldError('resume', 'Please upload a PDF, DOC or DOCX file.');
            resetFileUI();
            return;
        }
        if (file.size > MAX_BYTES) {
            showFieldError('resume', 'That file is too large. Maximum size is 5MB.');
            resetFileUI();
            return;
        }

        resumeError.textContent = '';
        resumeError.classList.remove('is-visible');
        dropzone.classList.remove('field-invalid');

        var dt = new DataTransfer();
        dt.items.add(file);
        fileInput.files = dt.files;

        fileNameEl.textContent = file.name + ' (' + formatBytes(file.size) + ')';
        fileRow.classList.add('is-visible');
        dropzone.style.display = 'none';
    }

    function resetFileUI() {
        fileInput.value = '';
        fileRow.classList.remove('is-visible');
        dropzone.style.display = '';
    }

    // Click / keyboard to browse
    dropzone.addEventListener('click', function () { fileInput.click(); });
    dropzone.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); fileInput.click(); }
    });
    fileInput.addEventListener('change', function () {
        if (fileInput.files && fileInput.files[0]) { setFile(fileInput.files[0]); }
    });

    // Drag & drop
    ['dragenter', 'dragover'].forEach(function (evt) {
        dropzone.addEventListener(evt, function (e) {
            e.preventDefault(); e.stopPropagation();
            dropzone.classList.add('is-dragover');
        });
    });
    ['dragleave', 'drop'].forEach(function (evt) {
        dropzone.addEventListener(evt, function (e) {
            e.preventDefault(); e.stopPropagation();
            dropzone.classList.remove('is-dragover');
        });
    });
    dropzone.addEventListener('drop', function (e) {
        var files = e.dataTransfer.files;
        if (files && files[0]) { setFile(files[0]); }
    });

    fileRemoveBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        resetFileUI();
    });

    // Field-level URL sanity (native type="url" already validates on submit;
    // this just clears a shown error as soon as the user fixes it)
    form.querySelectorAll('input, select, textarea').forEach(function (el) {
        el.addEventListener('input', function () {
            var name = el.name;
            var err = fieldError(name);
            if (err && err.classList.contains('is-visible')) {
                err.textContent = '';
                err.classList.remove('is-visible');
                el.classList.remove('field-invalid');
            }
        });
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        if (isSubmitting) return;

        clearAllErrors();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        if (!fileInput.files.length) {
            showFieldError('resume', 'Please attach your resume.');
            return;
        }

        isSubmitting = true;
        submitBtn.disabled = true;
        submitLabel.textContent = 'Submitting Application…';

        var formData = new FormData(form);
        var tokenMeta = document.querySelector('meta[name="csrf-token"]');

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': tokenMeta ? tokenMeta.getAttribute('content') : '',
                'Accept': 'application/json'
            }
        })
        .then(function (response) {
            return response.json().then(function (data) {
                return { status: response.status, data: data };
            });
        })
        .then(function (result) {
            if (result.status === 201) {
                formWrap.classList.add('hidden');
                successBlock.classList.remove('hidden');
                successBlock.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else if (result.status === 422 && result.data.errors) {
                var errors = result.data.errors;
                var firstField = null;
                Object.keys(errors).forEach(function (key) {
                    var fieldName = key === 'full_name' ? 'full_name' : key;
                    showFieldError(fieldName, errors[key][0]);
                    if (!firstField) firstField = fieldName;
                });
                errorBanner.textContent = result.data.message || 'Please check the highlighted fields.';
                errorBanner.classList.remove('hidden');
                errorBanner.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                errorBanner.textContent = 'Something went wrong. Please try again in a moment.';
                errorBanner.classList.remove('hidden');
                errorBanner.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        })
        .catch(function () {
            errorBanner.textContent = 'We could not reach the server. Please check your connection and try again.';
            errorBanner.classList.remove('hidden');
            errorBanner.scrollIntoView({ behavior: 'smooth', block: 'center' });
        })
        .finally(function () {
            isSubmitting = false;
            submitBtn.disabled = false;
            submitLabel.textContent = 'Submit Application';
        });
    });

    if (backLink) {
        backLink.addEventListener('click', function (e) {
            e.preventDefault();
            successBlock.classList.add('hidden');
            formWrap.classList.remove('hidden');
            form.reset();
            resetFileUI();
            clearAllErrors();
            document.getElementById('open-positions').scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    }
})();
</script>
@endpush
