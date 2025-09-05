<?php

namespace App\Http\Controllers;

use App\Models\BestMovingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BestMovingPageController extends Controller
{
    public function index()
    {
        $pages = BestMovingPage::latest()->paginate(20);
        return view('dashboards.admin.best_moving_pages.index', compact('pages'));
    }

    public function create()
    {
        return view('dashboards.admin.best_moving_pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'page_name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:best_moving_pages,slug',
            'published_at' => 'nullable|date',
            'navbar_content' => 'nullable|string',
            'upper_content' => 'nullable|string',
            'review_content' => 'nullable|string',
            'lower_content' => 'nullable|string',
        ]);
        if (empty($data['slug'])) { $data['slug'] = Str::slug($data['page_name']); }
        BestMovingPage::create($data);
        return redirect()->route('admin.best-moving-pages.index')->with('success','Page created');
    }

    public function edit(BestMovingPage $best_moving_page)
    {
        return view('dashboards.admin.best_moving_pages.edit', ['page'=>$best_moving_page]);
    }

    public function update(Request $request, BestMovingPage $best_moving_page)
    {
        $data = $request->validate([
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'page_name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:best_moving_pages,slug,'.$best_moving_page->id,
            'published_at' => 'nullable|date',
            'navbar_content' => 'nullable|string',
            'upper_content' => 'nullable|string',
            'review_content' => 'nullable|string',
            'lower_content' => 'nullable|string',
        ]);
        $best_moving_page->update($data);
        return redirect()->route('admin.best-moving-pages.index')->with('success','Page updated');
    }

    public function destroy(BestMovingPage $best_moving_page)
    {
        $best_moving_page->delete();
        return redirect()->route('admin.best-moving-pages.index')->with('success','Page deleted');
    }
}
