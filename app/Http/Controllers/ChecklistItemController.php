<?php

namespace App\Http\Controllers;

use App\Models\ChecklistItem;
use App\Models\ChecklistCategory;
use Illuminate\Http\Request;

class ChecklistItemController extends Controller
{
    public function index(){
        $items = ChecklistItem::with('category')->orderByDesc('id')->paginate(20);
        return view('dashboards.admin.checklists.items_index', compact('items'));
    }
    public function create(){
        $categories = ChecklistCategory::orderBy('name')->get();
        return view('dashboards.admin.checklists.items_create', compact('categories'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'checklist_category_id' => 'required|exists:checklist_categories,id',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'position' => 'nullable|integer',
        ]);
        ChecklistItem::create($data);
        return redirect()->route('admin.checklist-items.index')->with('success','Item created');
    }
    public function edit(ChecklistItem $checklist_item){
        $categories = ChecklistCategory::orderBy('name')->get();
        return view('dashboards.admin.checklists.items_edit', ['item'=>$checklist_item,'categories'=>$categories]);
    }
    public function update(Request $request, ChecklistItem $checklist_item){
        $data = $request->validate([
            'checklist_category_id' => 'required|exists:checklist_categories,id',
            'heading' => 'required|string|max:255',
            'description' => 'nullable|string',
            'position' => 'nullable|integer',
        ]);
        $checklist_item->update($data);
        return redirect()->route('admin.checklist-items.index')->with('success','Item updated');
    }
    public function destroy(ChecklistItem $checklist_item){
        $checklist_item->delete();
        return redirect()->route('admin.checklist-items.index')->with('success','Item deleted');
    }
}
