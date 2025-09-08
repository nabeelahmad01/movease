@extends('dashboards.layouts.app')
@section('title','Blogs | Admin')
<!-- @section('page_title','Blogs') -->
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Blogs</h3>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-bordered table-hover">
    <thead class="table-light"><tr><th>Title</th><th>Category</th><th>Published</th><th>Actions</th></tr></thead>
    <tbody>
      @foreach($blogs as $b)
      <tr>
        <td>{{ $b->title }}</td>
        <td>{{ $b->category->name ?? '-' }}</td>
        <td>{{ $b->published_at ?? '-' }}</td>
        <td class="d-flex gap-2">
          <a href="{{ route('admin.blogs.edit',['blog'=>$b->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
          <form method="POST" action="{{ route('admin.blogs.destroy',['blog'=>$b->id]) }}" onsubmit="return confirm('Delete blog?');">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-outline-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $blogs->links() }}
</div>
@endsection
