@extends('layouts.admin')
@section('title','Checklist Category | Edit')
@section('page_title','Checklist Category — Edit')
@section('content')
<form method="POST" action="{{ route('admin.checklist-categories.update',$category) }}" class="card p-3 shadow-sm">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Heading</label><input name="name" class="form-control" value="{{ $category->name }}" required></div>
    <div class="col-md-6"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control" value="{{ $category->slug }}"></div>
    <div class="col-12"><label class="form-label">Description (Paragraph)</label><textarea name="description" class="form-control" rows="4">{{ $category->description }}</textarea></div>
    <div class="col-12"><button class="btn btn-primary">Update</button></div>
  </div>
</form>
@endsection
