<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;
use Illuminate\Http\Request;

class JobOpeningController extends Controller
{
    public function index(Request $request)
    {
        $query = JobOpening::latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('title', 'like', "%{$s}%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $jobs = $query->paginate(15)->withQueryString();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'               => 'required|max:255',
            'department'          => 'required|max:120',
            'location'            => 'required|max:120',
            'employment_type'     => 'required|in:Full-time,Part-time,Contract,Internship',
            'experience_level'    => 'required|in:Entry Level,Junior,Mid-Level,Senior,Lead,Executive',
            'short_description'   => 'required|string|max:500',
            'about_role'          => 'nullable|string',
            'responsibilities'    => 'nullable|string',
            'requirements'        => 'nullable|string',
            'nice_to_have'        => 'nullable|string',
            'what_youll_work_on'  => 'nullable|string',
            'status'              => 'required|in:open,closed',
        ]);

        $data['slug'] = JobOpening::generateSlug($data['title']);

        if ($data['status'] === 'open') {
            $data['published_at'] = now();
        }

        JobOpening::create($data);

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening create ho gaya!');
    }

    public function edit(JobOpening $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, JobOpening $job)
    {
        $data = $request->validate([
            'title'               => 'required|max:255',
            'department'          => 'required|max:120',
            'location'            => 'required|max:120',
            'employment_type'     => 'required|in:Full-time,Part-time,Contract,Internship',
            'experience_level'    => 'required|in:Entry Level,Junior,Mid-Level,Senior,Lead,Executive',
            'short_description'   => 'required|string|max:500',
            'about_role'          => 'nullable|string',
            'responsibilities'    => 'nullable|string',
            'requirements'        => 'nullable|string',
            'nice_to_have'        => 'nullable|string',
            'what_youll_work_on'  => 'nullable|string',
            'status'              => 'required|in:open,closed',
        ]);

        $data['slug'] = JobOpening::generateSlug($data['title'], $job->id);

        if ($data['status'] === 'open' && !$job->published_at) {
            $data['published_at'] = now();
        }

        $job->update($data);

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening update ho gaya!');
    }

    public function destroy(JobOpening $job)
    {
        $job->delete();
        return back()->with('success', 'Job opening delete ho gaya.');
    }
}
