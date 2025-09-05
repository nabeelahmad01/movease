@extends('layouts.admin')
@section('title','Checklist Category | Create')
@section('page_title','Checklist Category — Create')
@section('content')
<form method="POST" action="{{ route('admin.checklist-categories.store') }}" class="card p-3 shadow-sm">
  @csrf
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Heading</label><input name="name" class="form-control" required></div>
    <div class="col-md-6"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control"></div>
    <div class="col-12"><label class="form-label">Description (Paragraph)</label><textarea name="description" class="form-control" rows="4"></textarea></div>
    <div class="col-12"><button class="btn btn-primary">Create</button></div>
  </div>
</form>
@endsection
