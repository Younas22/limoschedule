@extends('admin.layouts.app')

@section('title', 'Job Openings')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Job Openings</h1>
            <p class="text-gray-500 text-sm mt-1">Manage roles shown on the Careers page</p>
        </div>
        <a href="{{ route('admin.jobs.create') }}" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold px-5 py-2.5 rounded-lg text-sm transition inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Job Opening
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-4">
        <form method="GET" action="{{ route('admin.jobs.index') }}" class="flex flex-wrap gap-3">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by job title..."
                class="flex-1 min-w-[200px] px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
            >
            <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" onchange="this.form.submit()">
                <option value="">All Statuses</option>
                <option value="open" {{ request('status') === 'open' ? 'selected' : '' }}>Open</option>
                <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-medium px-5 py-2 rounded-lg text-sm transition">
                Search
            </button>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.jobs.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg text-sm transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        @if($jobs->isEmpty())
            <div class="text-center py-16 text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7h-9m9 4H9m9 4H9m-6 4h.01M4 7h.01M4 11h.01"/>
                </svg>
                <p class="text-sm">No job openings yet — the Careers page shows "No open positions" until you add one.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Title</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Department</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Location</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Type</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Status</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Posted</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($jobs as $job)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-5 py-3 font-medium text-gray-800">{{ $job->title }}</td>
                            <td class="px-5 py-3 text-gray-600">{{ $job->department }}</td>
                            <td class="px-5 py-3 text-gray-600">{{ $job->location }}</td>
                            <td class="px-5 py-3 text-gray-600">{{ $job->employment_type }}</td>
                            <td class="px-5 py-3">
                                <span class="px-2 py-1 rounded-full text-xs font-medium {{ $job->status === 'open' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                    {{ ucfirst($job->status) }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-gray-500 whitespace-nowrap">
                                {{ $job->published_at ? $job->published_at->format('d M Y') : '—' }}
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.jobs.edit', $job) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium transition">Edit</a>
                                    <form method="POST" action="{{ route('admin.jobs.duplicate', $job) }}">
                                        @csrf
                                        <button type="submit" class="text-gray-500 hover:text-gray-700 text-xs font-medium transition">Duplicate</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('Delete this job opening?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($jobs->hasPages())
                <div class="px-5 py-4 border-t border-gray-100">
                    {{ $jobs->links() }}
                </div>
            @endif
        @endif
    </div>

@endsection
