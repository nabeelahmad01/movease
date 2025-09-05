@extends('layouts.admin')
@section('title','Create Review | Admin')
@section('page_title','Reviews — Create')
@section('content')
<div class="container-fluid">
  <form method="POST" action="{{ route('admin.reviews.store') }}" enctype="multipart/form-data" class="card shadow-sm p-3">
    @csrf
    <div class="row g-3">
      <div class="col-md-6"><label class="form-label">Company</label>
        <select name="company_id" class="form-select" required>
          @foreach($companies as $c)<option value="{{ $c->id }}">{{ $c->name }}</option>@endforeach
        </select>
      </div>
      <div class="col-md-3"><label class="form-label">Rating</label>
        <select name="rating" class="form-select">@for($i=1;$i<=5;$i++)<option>{{ $i }}</option>@endfor</select>
      </div>
      <div class="col-md-3"><label class="form-label">Move Size</label><input name="move_size" class="form-control"></div>
      <div class="col-md-4"><label class="form-label">Move Date</label><input type="date" name="move_date" class="form-control"></div>
      <div class="col-md-4"><label class="form-label">Pickup State</label>
        <select name="pickup_state_id" class="form-select"><option value="">-</option>@foreach($states as $s)<option value="{{ $s->id }}">{{ $s->name }}</option>@endforeach</select>
      </div>
      <div class="col-md-4"><label class="form-label">Pickup City</label><input name="pickup_city" class="form-control"></div>
      <div class="col-md-4"><label class="form-label">Delivery State</label>
        <select name="delivery_state_id" class="form-select"><option value="">-</option>@foreach($states as $s)<option value="{{ $s->id }}">{{ $s->name }}</option>@endforeach</select>
      </div>
      <div class="col-md-4"><label class="form-label">Delivery City</label><input name="delivery_city" class="form-control"></div>
      <div class="col-md-4"><label class="form-label">Images</label><input type="file" name="image1" class="form-control mb-2"><input type="file" name="image2" class="form-control mb-2"><input type="file" name="image3" class="form-control"></div>
      <div class="col-12"><label class="form-label">Comment</label><textarea name="comment" class="form-control" rows="4"></textarea></div>
      <div class="col-12"><button class="btn btn-primary">Save</button></div>
    </div>
  </form>
</div>
@endsection
