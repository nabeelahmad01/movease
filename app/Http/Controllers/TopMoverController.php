<?php

namespace App\Http\Controllers;

use App\Models\TopMover;
use App\Models\Company;
use App\Models\BestMovingPage;
use Illuminate\Http\Request;

class TopMoverController extends Controller
{
    public function index(){
        $records = TopMover::with('company')->latest()->paginate(20);
        return view('dashboards.admin.top_movers.index', compact('records'));
    }
    public function create(){
        $companies = Company::orderBy('name')->get();
        $pages = BestMovingPage::orderBy('page_name')->get();
        return view('dashboards.admin.top_movers.create', compact('companies','pages'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'page' => 'required|string',
            'heading' => 'required|string|max:255',
            'position' => 'required|integer',
            'phone' => 'nullable|string|max:50',
            'point_one' => 'nullable|string|max:255',
            'point_two' => 'nullable|string|max:255',
            'point_three' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'expires_at' => 'nullable|date',
        ]);
        TopMover::create($data);
        return redirect()->route('admin.top-movers.index')->with('success','Top mover created');
    }
    public function edit(TopMover $top_mover){
        $companies = Company::orderBy('name')->get();
        $pages = BestMovingPage::orderBy('page_name')->get();
        return view('dashboards.admin.top_movers.edit', ['record'=>$top_mover,'companies'=>$companies,'pages'=>$pages]);
    }
    public function update(Request $request, TopMover $top_mover){
        $data = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'page' => 'required|string',
            'heading' => 'required|string|max:255',
            'position' => 'required|integer',
            'phone' => 'nullable|string|max:50',
            'point_one' => 'nullable|string|max:255',
            'point_two' => 'nullable|string|max:255',
            'point_three' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'expires_at' => 'nullable|date',
        ]);
        $top_mover->update($data);
        return redirect()->route('admin.top-movers.index')->with('success','Top mover updated');
    }
    public function destroy(TopMover $top_mover){
        $top_mover->delete();
        return redirect()->route('admin.top-movers.index')->with('success','Top mover deleted');
    }
}
