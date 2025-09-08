@extends('dashboards.layouts.app')
@section('title','Reviews | Admin')
<!-- @section('page_title','Reviews') -->
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Reviews</h3>
    <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-bordered table-hover">
    <thead class="table-light"><tr><th>Company</th><th>Rating</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
      @foreach($reviews as $r)
      <tr>
        <td>{{ $r->company->name ?? '-' }}</td>
        <td>{{ $r->rating }}</td>
        <td>{{ $r->status }}</td>
        <td class="d-flex gap-2">
          <a href="{{ route('admin.reviews.edit',['review'=>$r->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
          <form method="POST" action="{{ route('admin.reviews.destroy',['review'=>$r->id]) }}" onsubmit="return confirm('Delete review?');">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-outline-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $reviews->links() }}
</div>
@endsection
