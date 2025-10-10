@extends('dashboards.layouts.app')
@section('title','Bottom Movers | Edit')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('admin.bottom-movers.update',$record) }}" class="card p-3 shadow-sm" onsubmit="console.log('Form action URL:', '{{ route('admin.bottom-movers.update',$record) }}'); console.log('Form method check passed'); return true;">
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
    <div class="col-md-6"><label class="form-label">Heading</label><input name="heading" class="form-control" value="{{ $record->heading }}" required></div>
    <div class="col-md-3"><label class="form-label">Badge Heading</label><input name="availability" class="form-control" value="{{ $record->availability }}"></div>
    <div class="col-md-3"><label class="form-label">Position</label><input name="position" class="form-control" value="{{ $record->position }}"></div>
    <div class="col-md-3"><label class="form-label">Point One</label><input name="point_one" class="form-control" value="{{ $record->point_one }}"></div>
    <div class="col-md-3"><label class="form-label">Point Two</label><input name="point_two" class="form-control" value="{{ $record->point_two }}"></div>
    <div class="col-md-3"><label class="form-label">Point Three</label><input name="point_three" class="form-control" value="{{ $record->point_three }}"></div>
    <div class="col-md-3 form-check ms-3 align-self-end"><input class="form-check-input" type="checkbox" name="deposit_required" id="dep" @checked($record->deposit_required)><label class="form-check-label" for="dep">Deposit Required</label></div>
    <div class="col-12"><label class="form-label">Content</label><textarea name="content" class="form-control" rows="6">{{ $record->content }}</textarea></div>
    <div class="col-12"><button type="submit" class="btn btn-primary">Update</button></div>
  </div>
</form>
@endsection

