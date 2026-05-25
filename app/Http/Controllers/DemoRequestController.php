<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\DemoRequest;
use Illuminate\Http\Request;

class DemoRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'company'         => 'nullable|string|max:255',
            'email'           => 'required|email|max:255',
            'whatsapp'        => 'nullable|string|max:50',
            'country'         => 'required|string|max:100',
            'total_employees' => 'required|string|max:50',
            'budget'          => 'required|string|max:50',
            'message'         => 'nullable|string|max:2000',
        ]);

        DemoRequest::create($validated);

        return redirect()->route('demo.thankyou');
    }
}
