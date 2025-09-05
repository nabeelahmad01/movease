@extends('layouts.admin')
@section('title','Edit State Route | Admin')
@section('page_title','State To State Route — Edit')
@section('content')
<form method="POST" action="{{ route('admin.state-routes.update',$route) }}" class="card p-3 shadow-sm">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-4"><label class="form-label">Moving From State</label>
      <select name="from_state_id" class="form-select" required>
        @foreach($states as $s)<option value="{{ $s->id }}" @selected($route->from_state_id==$s->id)>{{ $s->name }}</option>@endforeach
      </select>
    </div>
    <div class="col-md-4"><label class="form-label">Moving To State</label>
      <select name="to_state_id" class="form-select" required>
        @foreach($states as $s)<option value="{{ $s->id }}" @selected($route->to_state_id==$s->id)>{{ $s->name }}</option>@endforeach
      </select>
    </div>
    <div class="col-md-4"><label class="form-label">Title</label><input name="title" class="form-control" value="{{ $route->title }}"></div>
    <div class="col-md-4"><label class="form-label">Slug</label><input name="slug" class="form-control" value="{{ $route->slug }}"></div>
    <div class="col-md-4"><label class="form-label">Minimum Cost</label><input name="min_cost" class="form-control" type="number" step="0.01" value="{{ $route->min_cost }}"></div>
    <div class="col-md-4"><label class="form-label">Maximum Cost</label><input name="max_cost" class="form-control" type="number" step="0.01" value="{{ $route->max_cost }}"></div>
    <div class="col-md-4"><label class="form-label">Miles</label><input name="miles" class="form-control" type="number" value="{{ $route->miles }}"></div>
    <div class="col-12"><button class="btn btn-primary">Update</button></div>
  </div>
</form>
@endsection
