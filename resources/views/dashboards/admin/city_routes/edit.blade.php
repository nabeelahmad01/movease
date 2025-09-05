@extends('layouts.admin')
@section('title','City Route | Edit')
@section('page_title','Moving Route — Edit')
@section('content')
<form method="POST" action="{{ route('admin.city-routes.update',$route) }}" class="card p-3 shadow-sm">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Moving From City</label>
      <select name="from_city_id" id="fromCity" class="form-select" required>
        <option value="{{ $route->from_city_id }}" selected>{{ $route->fromCity->name ?? 'Current' }}</option>
      </select>
    </div>
    <div class="col-md-6"><label class="form-label">Moving To City</label>
      <select name="to_city_id" id="toCity" class="form-select" required>
        <option value="{{ $route->to_city_id }}" selected>{{ $route->toCity->name ?? 'Current' }}</option>
      </select>
    </div>
    <div class="col-md-6"><label class="form-label">Title</label><input name="title" class="form-control" value="{{ $route->title }}"></div>
    <div class="col-md-6"><label class="form-label">Slug</label><input name="slug" class="form-control" value="{{ $route->slug }}"></div>
    <div class="col-md-4"><label class="form-label">Minimum Cost</label><input name="min_cost" class="form-control" type="number" step="0.01" value="{{ $route->min_cost }}"></div>
    <div class="col-md-4"><label class="form-label">Maximum Cost</label><input name="max_cost" class="form-control" type="number" step="0.01" value="{{ $route->max_cost }}"></div>
    <div class="col-md-4"><label class="form-label">Mile</label><input name="miles" class="form-control" type="number" value="{{ $route->miles }}"></div>
    <div class="col-12"><button class="btn btn-primary">Update</button></div>
  </div>
</form>
@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
(function(){
  function initCity(elId){
    const $el = window.jQuery(`#${elId}`);
    $el.select2({
      width:'100%',
      ajax: {
        url: '{{ route('admin.api.cities.suggest') }}',
        dataType: 'json',
        delay: 250,
        data: params => ({ q: params.term }),
        processResults: data => ({ results: data.map(c=>({ id:c.id, text:c.name })) }),
        cache: true
      },
      placeholder: 'Search for a City',
      minimumInputLength: 1
    });
  }
  initCity('fromCity');
  initCity('toCity');
})();
</script>
@endpush
