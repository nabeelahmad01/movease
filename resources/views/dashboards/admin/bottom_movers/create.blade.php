@extends('dashboards.layouts.app')
@section('title','Bottom Movers | Create')
<!-- @section('page_title','Bottom Movers — Create') -->
@section('content')
<form method="POST" action="{{ route('admin.bottom-movers.store') }}" class="card p-3 shadow-sm">
  @csrf
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Select Company</label>
      <select name="company_id" class="form-select" required>
        @foreach($companies as $cmp)<option value="{{ $cmp->id }}">{{ $cmp->name }}</option>@endforeach
      </select>
    </div>
    <div class="col-md-6"><label class="form-label">Select Page (Best Moving Page)</label>
      <select name="page" class="form-select" required>
        @foreach($pages as $p)<option value="{{ $p->slug }}">{{ $p->page_name }}</option>@endforeach
      </select>
    </div>
    <div class="col-md-6"><label class="form-label">Heading</label><input name="heading" class="form-control" required></div>
    <div class="col-md-3"><label class="form-label">Badge Heading</label><input name="availability" class="form-control"></div>
    <div class="col-md-3"><label class="form-label">Position</label><input name="position" class="form-control"></div>
    <div class="col-md-3"><label class="form-label">Point One</label><input name="point_one" class="form-control"></div>
    <div class="col-md-3"><label class="form-label">Point Two</label><input name="point_two" class="form-control"></div>
    <div class="col-md-3"><label class="form-label">Point Three</label><input name="point_three" class="form-control"></div>
    <div class="col-md-3 form-check ms-3 align-self-end"><input class="form-check-input" type="checkbox" name="deposit_required" id="dep"><label class="form-check-label" for="dep">Deposit Required</label></div>
    <div class="col-12"><label class="form-label">Content</label><textarea name="content" class="form-control" rows="6"></textarea></div>
    <div class="col-12"><button class="btn btn-primary">Submit</button></div>
  </div>
</form>
@endsection
@push('scripts')
<script src="https://cdn.tiny.cloud/1/b0vm5x7pbcrlczs8fgqomnp26ddbcjye7i1f8xvfu5oepqyp/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({ selector:'textarea[name=content]', height:300, menubar:false });</script>
@endpush
