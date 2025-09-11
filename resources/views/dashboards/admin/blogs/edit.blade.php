@extends('dashboards.layouts.app')
@section('title','Edit Blog | Admin')
<!-- @section('page_title','Blogs — Edit') -->
@section('content')
<div class="container-fluid">
  <form method="POST" action="{{ route('admin.blogs.update',$blog) }}" enctype="multipart/form-data" class="card shadow-sm p-3">
    @csrf @method('PUT')
    <div class="row g-3">
      <div class="col-md-8"><label class="form-label">Title</label><input name="title" class="form-control" value="{{ $blog->title }}" required></div>
      <div class="col-md-4"><label class="form-label">Slug (optional)</label><input name="slug" class="form-control" value="{{ $blog->slug }}"></div>
      <div class="col-md-4"><label class="form-label">Category</label>
        <select name="category_id" class="form-select">
          <option value="">-</option>
          @foreach($categories as $c)<option value="{{ $c->id }}" @selected($blog->category_id==$c->id)>{{ $c->name }}</option>@endforeach
        </select>
      </div>
      <div class="col-md-4"><label class="form-label">Featured Image</label><input type="file" name="featured_image" class="form-control"></div>
      <div class="col-md-4"><label class="form-label">Publish Date</label><input type="date" name="published_at" class="form-control" value="{{ optional($blog->published_at)->format('Y-m-d') }}"></div>
      <div class="col-md-4"><label class="form-label">Meta Title</label><input name="meta_title" class="form-control" value="{{ $blog->meta_title }}"></div>
      <div class="col-md-4"><label class="form-label">Meta Keywords</label><input name="meta_keywords" class="form-control" value="{{ $blog->meta_keywords }}"></div>
      <div class="col-md-4"><label class="form-label">Meta Description</label><input name="meta_description" class="form-control" value="{{ $blog->meta_description }}"></div>
      <div class="col-12"><label class="form-label">Content</label><textarea name="content" class="form-control" rows="10">{{ $blog->content }}</textarea></div>
      <div class="col-12"><button class="btn btn-primary">Update</button></div>
    </div>
  </form>
</div>
@endsection
