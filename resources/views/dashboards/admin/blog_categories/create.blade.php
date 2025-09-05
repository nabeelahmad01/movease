@extends('layouts.admin')
@section('title','Create Blog Category | Admin')
@section('page_title','Blog Categories — Create')
@section('content')
<div class="container-fluid">
  <form method="POST" action="{{ route('admin.blog-categories.store') }}" class="card shadow-sm p-3">
    @csrf
    <div class="row g-3">
      <div class="col-md-6"><label class="form-label">Name</label><input name="name" class="form-control" required></div>
      <div class="col-md-6"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control"></div>
      <div class="col-12"><label class="form-label">Description</label><input name="description" class="form-control"></div>
      <div class="col-12"><button class="btn btn-primary">Save</button></div>
    </div>
  </form>
</div>
@endsection
