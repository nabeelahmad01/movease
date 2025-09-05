@extends('layouts.admin')
@section('title','Best Moving Page | Edit')
@section('page_title','Best Moving Page — Edit')
@section('content')
<form method="POST" action="{{ route('admin.best-moving-pages.update',$page) }}" class="card p-3 shadow-sm">
  @csrf @method('PUT')
  <h5 class="mb-3">Seo Tags</h5>
  <div class="row g-3">
    <div class="col-md-4"><label class="form-label">Meta Title</label><input name="meta_title" class="form-control" value="{{ $page->meta_title }}"></div>
    <div class="col-md-4"><label class="form-label">Meta Description</label><input name="meta_description" class="form-control" value="{{ $page->meta_description }}"></div>
    <div class="col-md-4"><label class="form-label">Meta Keywords</label><input name="meta_keywords" class="form-control" value="{{ $page->meta_keywords }}"></div>
  </div>
  <hr>
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Page Name</label><input name="page_name" class="form-control" value="{{ $page->page_name }}" required></div>
    <div class="col-md-3"><label class="form-label">Slug</label><input name="slug" class="form-control" value="{{ $page->slug }}"></div>
    <div class="col-md-3"><label class="form-label">Date</label><input type="date" name="published_at" class="form-control" value="{{ optional($page->published_at)->format('Y-m-d') }}"></div>
    <div class="col-12"><label class="form-label">Navbar Content</label><textarea name="navbar_content" class="form-control" rows="6">{{ $page->navbar_content }}</textarea></div>
    <div class="col-12"><label class="form-label">Upper Content</label><textarea name="upper_content" class="form-control" rows="6">{{ $page->upper_content }}</textarea></div>
    <div class="col-12"><label class="form-label">Review & Rating Content</label><textarea name="review_content" class="form-control" rows="6">{{ $page->review_content }}</textarea></div>
    <div class="col-12"><label class="form-label">Lower Content</label><textarea name="lower_content" class="form-control" rows="6">{{ $page->lower_content }}</textarea></div>
    <div class="col-12"><button class="btn btn-primary">Update</button></div>
  </div>
</form>
@endsection
@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({ selector:'textarea', height:300, menubar:false });</script>
@endpush
