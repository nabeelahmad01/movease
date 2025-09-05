<?php

namespace App\Http\Controllers;

use App\Models\BottomMover;
use App\Models\Company;
use App\Models\BestMovingPage;
use Illuminate\Http\Request;

class BottomMoverController extends Controller
{
    public function index(){
        $records = BottomMover::with('company')->latest()->paginate(20);
        return view('dashboards.admin.bottom_movers.index', compact('records'));
    }
    public function create(){
        $companies = Company::orderBy('name')->get();
        $pages = BestMovingPage::orderBy('page_name')->get();
        return view('dashboards.admin.bottom_movers.create', compact('companies','pages'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'page' => 'required|string',
            'heading' => 'required|string|max:255',
            'availability' => 'nullable|string|max:120',
            'position' => 'nullable|string|max:120',
            'deposit_required' => 'nullable|boolean',
            'point_one' => 'nullable|string|max:255',
            'point_two' => 'nullable|string|max:255',
            'point_three' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);
        $data['deposit_required'] = (bool)($request->input('deposit_required'));
        BottomMover::create($data);
        return redirect()->route('admin.bottom-movers.index')->with('success','Bottom mover created');
    }
    public function edit(BottomMover $bottom_mover){
        $companies = Company::orderBy('name')->get();
        $pages = BestMovingPage::orderBy('page_name')->get();
        return view('dashboards.admin.bottom_movers.edit', ['record'=>$bottom_mover,'companies'=>$companies,'pages'=>$pages]);
    }
    public function update(Request $request, BottomMover $bottom_mover){
        $data = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'page' => 'required|string',
            'heading' => 'required|string|max:255',
            'availability' => 'nullable|string|max:120',
            'position' => 'nullable|string|max:120',
            'deposit_required' => 'nullable|boolean',
            'point_one' => 'nullable|string|max:255',
            'point_two' => 'nullable|string|max:255',
            'point_three' => 'nullable|string|max:255',
            'content' => 'nullable|string',
        ]);
        $data['deposit_required'] = (bool)($request->input('deposit_required'));
        $bottom_mover->update($data);
        return redirect()->route('admin.bottom-movers.index')->with('success','Bottom mover updated');
    }
    public function destroy(BottomMover $bottom_mover){
        $bottom_mover->delete();
        return redirect()->route('admin.bottom-movers.index')->with('success','Bottom mover deleted');
    }
}
