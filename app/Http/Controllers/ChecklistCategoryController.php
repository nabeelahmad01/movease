<?php

namespace App\Http\Controllers;

use App\Models\ChecklistCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChecklistCategoryController extends Controller
{
    public function index(){
        $categories = ChecklistCategory::orderBy('name')->paginate(20);
        return view('dashboards.admin.checklists.index', compact('categories'));
    }
    public function create(){ return view('dashboards.admin.checklists.create'); }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:checklist_categories,slug',
            'description' => 'nullable|string',
        ]);
        if (empty($data['slug'])) { $data['slug'] = Str::slug($data['name']); }
        ChecklistCategory::create($data);
        return redirect()->route('admin.checklist-categories.index')->with('success','Category created');
    }
    public function edit(ChecklistCategory $checklist_category){
        return view('dashboards.admin.checklists.edit', ['category'=>$checklist_category]);
    }
    public function update(Request $request, ChecklistCategory $checklist_category){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:checklist_categories,slug,'.$checklist_category->id,
            'description' => 'nullable|string',
        ]);
        if (empty($data['slug'])) { $data['slug'] = Str::slug($data['name']); }
        $checklist_category->update($data);
        return redirect()->route('admin.checklist-categories.index')->with('success','Category updated');
    }
    public function destroy(ChecklistCategory $checklist_category){
        $checklist_category->delete();
        return redirect()->route('admin.checklist-categories.index')->with('success','Category deleted');
    }
}
