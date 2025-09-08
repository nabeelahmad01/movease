@extends('dashboards.layouts.app')
@section('title','City Routes | Admin')
<!-- @section('page_title','State To State Route') -->
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>City To City Route</h3>
  <a href="{{ route('admin.city-routes.create') }}" class="btn btn-primary">Create</a>
</div>
<table class="table table-bordered table-hover">
  <thead class="table-light"><tr><th>From</th><th>To</th><th>Title</th><th>Miles</th><th>Min Cost</th><th>Max Cost</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($routes as $r)
    <tr>
      <td>{{ $r->fromCity->name ?? '-' }}</td>
      <td>{{ $r->toCity->name ?? '-' }}</td>
      <td>{{ $r->title }}</td>
      <td>{{ $r->miles }}</td>
      <td>{{ $r->min_cost }}</td>
      <td>{{ $r->max_cost }}</td>
      <td class="d-flex gap-2">
        <a href="{{ route('admin.city-routes.edit',['city_route'=>$r->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
        <form method="POST" action="{{ route('admin.city-routes.destroy',['city_route'=>$r->id]) }}" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $routes->links() }}
@endsection
