<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class JobApplicationController extends Controller
{
    /**
     * Public: submit a job application (AJAX).
     */
    public function store(Request $request)
    {
        // Honeypot spam trap — real users never fill this hidden field.
        if ($request->filled('website')) {
            // Pretend success so bots don't learn the field is checked.
            return response()->json(['message' => 'Application received.'], 201);
        }

        try {
            $validated = $request->validate([
                'full_name'            => 'required|string|max:255',
                'email'                 => 'required|email|max:255',
                'phone'                 => 'nullable|string|max:50',
                'country'               => 'required|string|max:100',
                'city'                  => 'nullable|string|max:100',
                'position'              => 'required|string|max:255',
                'experience_level'      => 'required|in:Entry Level,Junior,Mid-Level,Senior,Lead,Executive',
                'years_of_experience'   => 'nullable|integer|min:0|max:60',
                'linkedin'              => 'nullable|url|max:255',
                'portfolio'             => 'nullable|url|max:255',
                'github'                => 'nullable|url|max:255',
                'availability'          => 'required|in:Immediately,Within 2 weeks,Within 1 month,1-3 months,Other',
                'cover_letter'          => 'nullable|string|max:4000',
                'resume'                => 'required|file|mimes:pdf,doc,docx|max:5120',
                'consent'               => 'required|accepted',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Please check the highlighted fields.', 'errors' => $e->errors()], 422);
        }

        // Store the resume outside the public disk with a generated filename —
        // never trust or reuse the original filename/extension.
        $extension = strtolower($request->file('resume')->getClientOriginalExtension());
        $safeExtension = in_array($extension, ['pdf', 'doc', 'docx'], true) ? $extension : 'pdf';
        $storedName = Str::uuid() . '.' . $safeExtension;
        $path = $request->file('resume')->storeAs('resumes', $storedName, 'local');

        JobApplication::create([
            'full_name'            => $validated['full_name'],
            'email'                 => $validated['email'],
            'phone'                 => $validated['phone'] ?? null,
            'country'               => $validated['country'],
            'city'                  => $validated['city'] ?? null,
            'position'              => $validated['position'],
            'experience_level'      => $validated['experience_level'],
            'years_of_experience'   => $validated['years_of_experience'] ?? null,
            'linkedin'              => $validated['linkedin'] ?? null,
            'portfolio'             => $validated['portfolio'] ?? null,
            'github'                => $validated['github'] ?? null,
            'availability'          => $validated['availability'],
            'cover_letter'          => $validated['cover_letter'] ?? null,
            'resume_path'           => $path,
            'resume_original_name'  => $request->file('resume')->getClientOriginalName(),
            'consent'               => true,
        ]);

        return response()->json(['message' => 'Application received.'], 201);
    }

    /**
     * Admin: list applications.
     */
    public function index(Request $request)
    {
        $query = JobApplication::latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('full_name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('position', 'like', "%{$s}%");
            });
        }

        $applications = $query->paginate(15)->withQueryString();
        $total = JobApplication::count();

        return view('admin.job-applications', compact('applications', 'total'));
    }

    /**
     * Admin: securely download a resume (never publicly accessible).
     */
    public function downloadResume($id)
    {
        $application = JobApplication::findOrFail($id);

        if (!Storage::disk('local')->exists($application->resume_path)) {
            abort(404);
        }

        return Storage::disk('local')->download(
            $application->resume_path,
            $application->resume_original_name
        );
    }

    /**
     * Admin: delete an application and its stored resume.
     */
    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);

        if (Storage::disk('local')->exists($application->resume_path)) {
            Storage::disk('local')->delete($application->resume_path);
        }

        $application->delete();

        return back()->with('success', 'Application deleted.');
    }
}
