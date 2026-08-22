@extends('admin.layouts.app')

@section('title', 'Edit Job Opening')

@section('content')

    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.jobs.index') }}" class="text-gray-400 hover:text-gray-600 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Job Opening</h1>
            <p class="text-gray-500 text-sm">{{ $job->title }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.jobs.update', $job) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Main Column -->
            <div class="lg:col-span-2 space-y-5">

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Job Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $job->title) }}"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent @error('title') border-red-400 @enderror">
                    @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Short Description <span class="text-red-500">*</span> <span class="text-gray-400 text-xs">(shown on the job card, max 500 chars)</span></label>
                    <textarea name="short_description" rows="2"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none @error('short_description') border-red-400 @enderror">{{ old('short_description', $job->short_description) }}</textarea>
                    @error('short_description') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">About the Role</label>
                    <textarea name="about_role" rows="4"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none @error('about_role') border-red-400 @enderror">{{ old('about_role', $job->about_role) }}</textarea>
                    @error('about_role') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">What You'll Do <span class="text-gray-400 text-xs">(one item per line)</span></label>
                    <textarea name="responsibilities" rows="5"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none @error('responsibilities') border-red-400 @enderror">{{ old('responsibilities', $job->responsibilities) }}</textarea>
                    @error('responsibilities') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">What We're Looking For <span class="text-gray-400 text-xs">(one item per line)</span></label>
                    <textarea name="requirements" rows="5"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none @error('requirements') border-red-400 @enderror">{{ old('requirements', $job->requirements) }}</textarea>
                    @error('requirements') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nice to Have <span class="text-gray-400 text-xs">(optional, one item per line)</span></label>
                    <textarea name="nice_to_have" rows="4"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none @error('nice_to_have') border-red-400 @enderror">{{ old('nice_to_have', $job->nice_to_have) }}</textarea>
                    @error('nice_to_have') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">What You'll Work On <span class="text-gray-400 text-xs">(optional, one item per line)</span></label>
                    <textarea name="what_youll_work_on" rows="4"
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none @error('what_youll_work_on') border-red-400 @enderror">{{ old('what_youll_work_on', $job->what_youll_work_on) }}</textarea>
                    @error('what_youll_work_on') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

            </div>

            <!-- Sidebar Column -->
            <div class="space-y-5">

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <h3 class="text-sm font-semibold text-gray-700 mb-4">Job Details</h3>

                    <div class="mb-4">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Department <span class="text-red-500">*</span></label>
                        <input type="text" name="department" value="{{ old('department', $job->department) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('department') border-red-400 @enderror">
                        @error('department') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Location <span class="text-red-500">*</span></label>
                        <input type="text" name="location" value="{{ old('location', $job->location) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('location') border-red-400 @enderror">
                        @error('location') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Employment Type <span class="text-red-500">*</span></label>
                        <select name="employment_type" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            @foreach(['Full-time', 'Part-time', 'Contract', 'Internship'] as $type)
                                <option value="{{ $type }}" {{ old('employment_type', $job->employment_type) === $type ? 'selected' : '' }}>{{ $type }}</option>
                            @endforeach
                        </select>
                        @error('employment_type') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Experience Level <span class="text-red-500">*</span></label>
                        <select name="experience_level" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            @foreach(['Entry Level', 'Junior', 'Mid-Level', 'Senior', 'Lead', 'Executive'] as $level)
                                <option value="{{ $level }}" {{ old('experience_level', $job->experience_level) === $level ? 'selected' : '' }}>{{ $level }}</option>
                            @endforeach
                        </select>
                        @error('experience_level') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5">
                        <label class="block text-xs font-medium text-gray-600 mb-1.5">Status</label>
                        <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            <option value="open" {{ old('status', $job->status) === 'open' ? 'selected' : '' }}>Open &mdash; visible on Careers page</option>
                            <option value="closed" {{ old('status', $job->status) === 'closed' ? 'selected' : '' }}>Closed &mdash; hidden from Careers page</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold py-2.5 rounded-lg text-sm transition">
                            Save
                        </button>
                        <a href="{{ route('admin.jobs.index') }}" class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 rounded-lg text-sm transition">
                            Cancel
                        </a>
                    </div>
                </div>

                @if($job->status === 'open')
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <a href="{{ route('careers.job', $job->slug) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center gap-1.5">
                        View live listing
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                </div>
                @endif

            </div>
        </div>
    </form>

@endsection
