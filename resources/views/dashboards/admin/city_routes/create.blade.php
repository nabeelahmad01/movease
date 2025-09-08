@extends('dashboards.layouts.app')
@section('title','City Route | Create')
<!-- @section('page_title','Moving Route — Create') -->
@section('content')
<form method="POST" action="{{ route('admin.city-routes.store') }}" class="card p-3 shadow-sm">
  @csrf
  <div class="row g-3">
    <div class="col-md-6"><label class="form-label">Moving From City</label>
      <select name="from_city_id" id="fromCity" class="form-select" required></select>
    </div>
    <div class="col-md-6"><label class="form-label">Moving To City</label>
      <select name="to_city_id" id="toCity" class="form-select" required></select>
    </div>
    <div class="col-md-6"><label class="form-label">Title</label><input name="title" class="form-control"></div>
    <div class="col-md-6"><label class="form-label">Slug</label><input name="slug" class="form-control"></div>
    <div class="col-md-4"><label class="form-label">Minimum Cost</label><input name="min_cost" class="form-control" type="number" step="0.01"></div>
    <div class="col-md-4"><label class="form-label">Maximum Cost</label><input name="max_cost" class="form-control" type="number" step="0.01"></div>
    <div class="col-md-4"><label class="form-label">Mile</label><input name="miles" class="form-control" type="number"></div>
    <div class="col-12"><button class="btn btn-primary">Submit</button></div>
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
