<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ContactMoverLead;
use Illuminate\Http\Request;

class ContactMoverController extends Controller
{
    public function show($slug)
    {
        $company = Company::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.contact_mover', compact('company'));
    }

    public function store(Request $request, $slug)
    {
        $company = Company::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $data = $request->validate([
            'zip_from'   => 'required|string|max:120',
            'zip_to'     => 'required|string|max:120',
            'move_date'  => 'nullable|date',
            'move_size'  => 'nullable|string|max:120',
            'name'       => 'required|string|max:120',
            'email'      => 'required|email|max:120',
            'phone'      => 'required|string|max:50',
            'services'   => 'nullable|array',
            'services.*' => 'nullable|string|max:120',
            'message'    => 'nullable|string',
        ]);

        $data['company_id'] = $company->id;
        // Store services as array (casted in model)
        ContactMoverLead::create($data);

        return redirect()->route('front.thankyou')
            ->with('success', 'Thanks! Your request has been sent to the mover. They will contact you soon.');
    }
}
