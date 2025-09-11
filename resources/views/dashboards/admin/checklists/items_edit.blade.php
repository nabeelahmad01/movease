@extends('dashboards.layouts.app')
@section('title','Checklist Item | Edit')
<!-- @section('page_title','Checklist Item — Edit') -->
@section('content')
<form method="POST" action="{{ route('admin.checklist-items.update',$item) }}" class="card p-3 shadow-sm">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Category</label>
      <select name="checklist_category_id" class="form-select" required>
        @foreach($categories as $c)<option value="{{ $c->id }}" @selected($item->checklist_category_id==$c->id)>{{ $c->name }}</option>@endforeach
      </select>
    </div>
    <div class="col-md-3"><label class="form-label">Position</label><input name="position" type="number" class="form-control" value="{{ $item->position }}"></div>
    <div class="col-12"><label class="form-label">Heading</label><input name="heading" class="form-control" value="{{ $item->heading }}" required></div>
    <div class="col-12"><label class="form-label">Content</label><textarea name="description" class="form-control" rows="6">{{ $item->description }}</textarea></div>
    <div class="col-12"><button class="btn btn-primary">Update</button></div>
  </div>
</form>
@endsection
