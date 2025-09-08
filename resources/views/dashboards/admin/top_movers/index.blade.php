@extends('dashboards.layouts.app')
@section('title','Top Movers | Admin')
<!-- @section('page_title','Top Movers') -->
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Top Movers</h3>
  <a href="{{ route('admin.top-movers.create') }}" class="btn btn-primary">Create</a>
</div>
<table class="table table-bordered table-hover">
  <thead class="table-light"><tr><th>Company</th><th>Page</th><th>Position</th><th>Status</th><th>Expires</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($records as $r)
    <tr>
      <td>{{ $r->company->name ?? '-' }}</td>
      <td>{{ $r->page }}</td>
      <td>{{ $r->position }}</td>
      <td>{{ $r->status }}</td>
      <td>{{ optional($r->expires_at)->format('Y-m-d H:i') }}</td>
      <td class="d-flex gap-2">
        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.top-movers.edit',['top_mover'=>$r->id]) }}">Edit</a>
        <form method="POST" action="{{ route('admin.top-movers.destroy',['top_mover'=>$r->id]) }}" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $records->links() }}
@endsection
