@extends('layouts.admin')
@section('title','Best Moving Pages | Admin')
@section('page_title','Best Moving Pages')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Best Moving Pages</h3>
  <a href="{{ route('admin.best-moving-pages.create') }}" class="btn btn-primary">Create</a>
</div>
<table class="table table-bordered table-hover">
  <thead class="table-light"><tr><th>Page</th><th>Slug</th><th>Date</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($pages as $p)
    <tr>
      <td>{{ $p->page_name }}</td>
      <td>{{ $p->slug }}</td>
      <td>{{ $p->published_at }}</td>
      <td class="d-flex gap-2">
        <a href="{{ route('admin.best-moving-pages.edit',['best_moving_page'=>$p->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
        <form method="POST" action="{{ route('admin.best-moving-pages.destroy',['best_moving_page'=>$p->id]) }}" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $pages->links() }}
@endsection
