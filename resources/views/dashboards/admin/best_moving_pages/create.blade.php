@extends('dashboards.layouts.app')
@section('title','Best Moving Page | Create')
<!-- @section('page_title','Best Moving Page — Create') -->
@section('content')
<form method="POST" action="{{ route('admin.best-moving-pages.store') }}" class="card p-3 shadow-sm">
  @csrf
  <h5 class="mb-3">Seo Tags</h5>
  <div class="row g-3">
    <div class="col-md-4"><label class="form-label">Meta Title</label><input name="meta_title" class="form-control"></div>
    <div class="col-md-4"><label class="form-label">Meta Description</label><input name="meta_description" class="form-control"></div>
    <div class="col-md-4"><label class="form-label">Meta Keywords</label><input name="meta_keywords" class="form-control"></div>
  </div>
  <hr>
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Page Name</label><input name="page_name" class="form-control" required></div>
    <div class="col-md-3"><label class="form-label">Slug</label><input name="slug" class="form-control"></div>
    <div class="col-md-3"><label class="form-label">Date</label><input type="date" name="published_at" class="form-control"></div>
    <div class="col-12"><label class="form-label">Navbar Content</label><textarea name="navbar_content" class="form-control" rows="6"></textarea></div>
    <div class="col-12"><label class="form-label">Upper Content</label><textarea name="upper_content" class="form-control" rows="6"></textarea></div>
    <div class="col-12"><label class="form-label">Review & Rating Content</label><textarea name="review_content" class="form-control" rows="6"></textarea></div>
    <div class="col-12"><label class="form-label">Lower Content</label><textarea name="lower_content" class="form-control" rows="6"></textarea></div>
    <div class="col-12"><button class="btn btn-primary">Submit</button></div>
  </div>
</form>
@endsection
@push('scripts')
<script src="https://cdn.tiny.cloud/1/b0vm5x7pbcrlczs8fgqomnp26ddbcjye7i1f8xvfu5oepqyp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({ selector:'textarea', height:300, menubar:false });</script>
@endpush
