@extends('dashboards.layouts.app')
@section('title','Blog Categories | Admin')
<!-- @section('page_title','Blog Categories') -->
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Blog Categories</h3>
    <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-bordered table-hover">
    <thead class="table-light"><tr><th>Name</th><th>Slug</th><th>Actions</th></tr></thead>
    <tbody>
      @foreach($categories as $cat)
      <tr>
        <td>{{ $cat->name }}</td>
        <td>{{ $cat->slug }}</td>
        <td class="d-flex gap-2">
          <a href="{{ route('admin.blog-categories.edit',['blog_category'=>$cat->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
          <form method="POST" action="{{ route('admin.blog-categories.destroy',['blog_category'=>$cat->id]) }}" onsubmit="return confirm('Delete category?');">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-outline-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $categories->links() }}
</div>
@endsection
