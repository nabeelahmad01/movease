@extends('dashboards.layouts.app')
@section('title','Companies | Admin')
<!-- @section('page_title','Companies') -->
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Companies</h3>
    <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">Create</a>
  </div>
  <table class="table table-bordered table-hover">
    <thead class="table-light"><tr><th>Name</th><th>Email</th><th>Status</th><th>Service</th><th>Actions</th></tr></thead>
    <tbody>
      @foreach($companies as $c)
      <tr>
        <td>{{ $c->name }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->status }}</td>
        <td>{{ $c->service_type }}</td>
        <td class="d-flex gap-2">
          <a href="{{ route('admin.companies.edit',['company'=>$c->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
          <form method="POST" action="{{ route('admin.companies.destroy',['company'=>$c->id]) }}" onsubmit="return confirm('Delete company?');">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-outline-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $companies->links() }}
</div>
@endsection
