<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::orderBy('name')->paginate(20);
        return view('dashboards.admin.blog_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboards.admin.blog_categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'slug' => 'nullable|string|max:160|unique:blog_categories,slug',
            'description' => 'nullable|string|max:255',
        ]);
        if (empty($data['slug'])) { $data['slug'] = Str::slug($data['name']); }
        BlogCategory::create($data);
        return redirect()->route('admin.blog-categories.create')->with('success','Blog Category create ho gayi hai! ✅');
    }

    public function edit(BlogCategory $blog_category)
    {
        return view('dashboards.admin.blog_categories.edit', ['category' => $blog_category]);
    }

    public function update(Request $request, BlogCategory $blog_category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'slug' => 'nullable|string|max:160|unique:blog_categories,slug,'.$blog_category->id,
            'description' => 'nullable|string|max:255',
        ]);
        if (empty($data['slug'])) { $data['slug'] = Str::slug($data['name']); }
        $blog_category->update($data);
        return redirect()->route('admin.blog-categories.index', $blog_category)->with('success','Blog Category update ho gayi hai! ✅');
    }

    public function destroy(BlogCategory $blog_category)
    {
        $blog_category->delete();
        return redirect()->route('admin.blog-categories.index')->with('success','Blog Category delete ho gayi hai! 🗑️');
    }
}
