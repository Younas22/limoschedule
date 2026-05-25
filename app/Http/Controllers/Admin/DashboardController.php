<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemoRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = DemoRequest::latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('company', 'like', "%{$s}%");
            });
        }

        $requests = $query->paginate(15)->withQueryString();
        $total    = DemoRequest::count();
        $today    = DemoRequest::whereDate('created_at', today())->count();
        $thisWeek = DemoRequest::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();

        return view('admin.dashboard', compact('requests', 'total', 'today', 'thisWeek'));
    }

    public function destroy($id)
    {
        DemoRequest::findOrFail($id)->delete();
        return back()->with('success', 'Record delete ho gaya.');
    }
}
