@extends('layouts.admin')
@section('title','Bottom Movers | Admin')
@section('page_title','Bottom Movers')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Bottom Movers</h3>
  <a href="{{ route('admin.bottom-movers.create') }}" class="btn btn-primary">Create</a>
</div>
<table class="table table-bordered table-hover">
  <thead class="table-light"><tr><th>Company</th><th>Page</th><th>Heading</th><th>Position</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($records as $r)
    <tr>
      <td>{{ $r->company->name ?? '-' }}</td>
      <td>{{ $r->page }}</td>
      <td>{{ $r->heading }}</td>
      <td>{{ $r->position }}</td>
      <td class="d-flex gap-2">
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.bottom-movers.edit',['bottom_mover'=>$r->id]) }}">Edit</a>
        <form method="POST" action="{{ route('admin.bottom-movers.destroy',['bottom_mover'=>$r->id]) }}" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $records->links() }}
@endsection
