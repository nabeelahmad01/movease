<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->with('category')->paginate(15);
        return view('dashboards.admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::orderBy('name')->get();
        return view('dashboards.admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'category_id' => 'nullable|exists:blog_categories,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ]);
        if (empty($data['slug'])) { $data['slug'] = Str::slug($data['title']); }
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blogs','public');
        }
        $data['user_id'] = $request->user()->id ?? 1;
        $blog = Blog::create($data);
        return redirect()->route('admin.blogs.index')->with('success','Blog created');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::orderBy('name')->get();
        return view('dashboards.admin.blogs_edit', compact('blog','categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,'.$blog->id,
            'category_id' => 'nullable|exists:blog_categories,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
        ]);
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blogs','public');
        }
        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success','Blog updated');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success','Blog deleted');
    }
}
