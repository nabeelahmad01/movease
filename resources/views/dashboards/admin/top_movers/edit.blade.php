@extends('dashboards.layouts.app')
@section('title','Top Movers | Edit')
<!-- @section('page_title','Top Movers — Edit') -->
@section('content')
<form method="POST" action="{{ route('admin.top-movers.update',$record) }}" class="card p-3 shadow-sm">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Select Company</label>
      <select name="company_id" class="form-select" required>
        @foreach($companies as $cmp)<option value="{{ $cmp->id }}" @selected($record->company_id==$cmp->id)>{{ $cmp->name }}</option>@endforeach
      </select>
    </div>
    <div class="col-md-6"><label class="form-label">Select Page (Best Moving Page)</label>
      <select name="page" class="form-select" required>
        @foreach($pages as $p)<option value="{{ $p->slug }}" @selected($record->page==$p->slug)>{{ $p->page_name }}</option>@endforeach
      </select>
    </div>
    <div class="col-md-4"><label class="form-label">Heading</label><input name="heading" class="form-control" value="{{ $record->heading }}" required></div>
    <div class="col-md-4"><label class="form-label">Position</label><input name="position" class="form-control" type="number" value="{{ $record->position }}" required></div>
    <div class="col-md-4"><label class="form-label">Phone No.</label><input name="phone" class="form-control" value="{{ $record->phone }}"></div>
    <div class="col-md-4"><label class="form-label">Point One</label><input name="point_one" class="form-control" value="{{ $record->point_one }}"></div>
    <div class="col-md-4"><label class="form-label">Point Two</label><input name="point_two" class="form-control" value="{{ $record->point_two }}"></div>
    <div class="col-md-4"><label class="form-label">Point Three</label><input name="point_three" class="form-control" value="{{ $record->point_three }}"></div>
    <div class="col-md-4"><label class="form-label">Status</label>
      <select name="status" class="form-select"><option value="active" @selected($record->status=='active')>Active</option><option value="inactive" @selected($record->status=='inactive')>Inactive</option></select>
    </div>
    <div class="col-md-4"><label class="form-label">Expiration Date (optional)</label><input type="datetime-local" name="expires_at" class="form-control" value="{{ optional($record->expires_at)->format('Y-m-d\TH:i') }}"></div>
    <div class="col-12"><button class="btn btn-primary">Update</button></div>
  </div>
</form>
@endsection
