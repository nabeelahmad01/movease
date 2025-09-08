<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactMoverLead;
use Illuminate\Http\Request;

class ContactMoverLeadController extends Controller
{
    public function index()
    {
        $leads = ContactMoverLead::with('company')->latest()->paginate(20);
        return view('dashboards.admin.contact_mover_leads.index', compact('leads'));
    }
}
