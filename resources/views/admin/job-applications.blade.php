@extends('admin.layouts.app')

@section('title', 'Job Applications')

@section('content')

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Job Applications</h1>
        <p class="text-gray-500 text-sm mt-1">Applications submitted through the Careers page</p>
    </div>

    @if(session('success'))
        <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 mb-8 max-w-xs">
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
            <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Applications</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $total }}</p>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-4">
        <form method="GET" action="{{ route('admin.job-applications.index') }}" class="flex gap-3">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by name, email or position..."
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent"
            >
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-medium px-5 py-2 rounded-lg text-sm transition">
                Search
            </button>
            @if(request('search'))
                <a href="{{ route('admin.job-applications.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg text-sm transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        @if($applications->isEmpty())
            <div class="text-center py-16 text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p class="text-sm">No applications found</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">#</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Name</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Email</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Position</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Level</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Country</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Availability</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Resume</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Date</th>
                            <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wide">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($applications as $app)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-5 py-3 text-gray-400">{{ $applications->firstItem() + $loop->index }}</td>
                            <td class="px-5 py-3 font-medium text-gray-800">{{ $app->full_name }}</td>
                            <td class="px-5 py-3 text-gray-600">
                                <a href="mailto:{{ $app->email }}" class="hover:text-yellow-600 transition">{{ $app->email }}</a>
                            </td>
                            <td class="px-5 py-3 text-gray-600">{{ $app->position }}</td>
                            <td class="px-5 py-3 text-gray-600">{{ $app->experience_level }}</td>
                            <td class="px-5 py-3 text-gray-600">{{ $app->country }}</td>
                            <td class="px-5 py-3 text-gray-600">{{ $app->availability }}</td>
                            <td class="px-5 py-3">
                                <a href="{{ route('admin.job-applications.resume', $app->id) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium transition">
                                    Download
                                </a>
                            </td>
                            <td class="px-5 py-3 text-gray-500 whitespace-nowrap">
                                {{ $app->created_at ? $app->created_at->format('d M Y') : '—' }}
                            </td>
                            <td class="px-5 py-3">
                                <form method="POST" action="{{ route('admin.job-applications.destroy', $app->id) }}" onsubmit="return confirm('Delete this application?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($applications->hasPages())
                <div class="px-5 py-4 border-t border-gray-100">
                    {{ $applications->links() }}
                </div>
            @endif
        @endif
    </div>

    @if(!$applications->isEmpty())
        <p class="text-xs text-gray-400 mt-3 text-right">
            Showing {{ $applications->firstItem() }}–{{ $applications->lastItem() }} of {{ $applications->total() }} results
        </p>
    @endif

@endsection
