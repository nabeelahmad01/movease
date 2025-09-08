@extends('dashboards.layouts.app')
@section('title','Checklist Item | Create')
<!-- @section('page_title','Checklist Item — Create') -->
@section('content')
<form method="POST" action="{{ route('admin.checklist-items.store') }}" class="card p-3 shadow-sm">
  @csrf
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Category</label>
      <select name="checklist_category_id" class="form-select" required>
        @foreach($categories as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach
      </select>
    </div>
    <div class="col-md-3"><label class="form-label">Position</label><input name="position" type="number" class="form-control" value="0"></div>
    <div class="col-12"><label class="form-label">Heading</label><input name="heading" class="form-control" required></div>
    <div class="col-12"><label class="form-label">Content</label><textarea name="description" class="form-control" rows="6"></textarea></div>
    <div class="col-12"><button class="btn btn-primary">Create</button></div>
  </div>
</form>
@endsection
@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({ selector:'textarea[name=description]', height:250, menubar:false });</script>
@endpush
