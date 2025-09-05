@extends('layouts.admin')
@section('title','Edit Review | Admin')
@section('page_title','Reviews — Edit')
@section('content')
<div class="container-fluid">
  <form method="POST" action="{{ route('admin.reviews.update',$review) }}" enctype="multipart/form-data" class="card shadow-sm p-3">
    @csrf @method('PUT')
    <div class="row g-3">
      <div class="col-md-6"><label class="form-label">Company</label>
        <select name="company_id" class="form-select" required>
          @foreach($companies as $c)<option value="{{ $c->id }}" @selected($review->company_id==$c->id)>{{ $c->name }}</option>@endforeach
        </select>
      </div>
      <div class="col-md-3"><label class="form-label">Rating</label>
        <select name="rating" class="form-select">@for($i=1;$i<=5;$i++)<option @selected($review->rating==$i)>{{ $i }}</option>@endfor</select>
      </div>
      <div class="col-md-3"><label class="form-label">Move Size</label><input name="move_size" class="form-control" value="{{ $review->move_size }}"></div>
      <div class="col-md-4"><label class="form-label">Move Date</label><input type="date" name="move_date" class="form-control" value="{{ optional($review->move_date)->format('Y-m-d') }}"></div>
      <div class="col-md-4"><label class="form-label">Pickup State</label>
        <select name="pickup_state_id" class="form-select"><option value="">-</option>@foreach($states as $s)<option value="{{ $s->id }}" @selected($review->pickup_state_id==$s->id)>{{ $s->name }}</option>@endforeach</select>
      </div>
      <div class="col-md-4"><label class="form-label">Pickup City</label><input name="pickup_city" class="form-control" value="{{ $review->pickup_city }}"></div>
      <div class="col-md-4"><label class="form-label">Delivery State</label>
        <select name="delivery_state_id" class="form-select"><option value="">-</option>@foreach($states as $s)<option value="{{ $s->id }}" @selected($review->delivery_state_id==$s->id)>{{ $s->name }}</option>@endforeach</select>
      </div>
      <div class="col-md-4"><label class="form-label">Delivery City</label><input name="delivery_city" class="form-control" value="{{ $review->delivery_city }}"></div>
      <div class="col-md-4"><label class="form-label">Images</label><input type="file" name="image1" class="form-control mb-2"><input type="file" name="image2" class="form-control mb-2"><input type="file" name="image3" class="form-control"></div>
      <div class="col-12"><label class="form-label">Comment</label><textarea name="comment" class="form-control" rows="4">{{ $review->comment }}</textarea></div>
      <div class="col-12"><button class="btn btn-primary">Update</button></div>
    </div>
  </form>
</div>
@endsection
