@extends('layouts.admin')
@section('title','Edit Blog Category | Admin')
@section('page_title','Blog Categories — Edit')
@section('content')
<div class="container-fluid">
  <form method="POST" action="{{ route('admin.blog-categories.update',$category) }}" class="card shadow-sm p-3">
    @csrf @method('PUT')
    <div class="row g-3">
      <div class="col-md-6"><label class="form-label">Name</label><input name="name" class="form-control" value="{{ $category->name }}" required></div>
      <div class="col-md-6"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control" value="{{ $category->slug }}"></div>
      <div class="col-12"><label class="form-label">Description</label><input name="description" class="form-control" value="{{ $category->description }}"></div>
      <div class="col-12"><button class="btn btn-primary">Update</button></div>
    </div>
  </form>
</div>
@endsection
