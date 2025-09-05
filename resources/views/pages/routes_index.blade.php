@extends('layouts.master')
@section('title', 'Routes | State-to-State & City-to-City | MoveEase')
@section('canonical_url', route('front.routes.index'))

@push('styles')
<style>
  .routes-hero { background: linear-gradient(135deg,var(--accent-color),#6c5ce7); color:#fff; padding:60px 0; }
  .routes-hero h1 { font-weight:800; }
  .form-card { background:#fff; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,.06); padding:18px; }
  .state-grid .state { display:block; background:#fff; border:1px solid #eee; border-radius:10px; padding:14px 16px; color:#333; text-decoration:none; transition:all .2s; }
  .state-grid .state:hover { transform: translateY(-2px); box-shadow:0 10px 20px rgba(0,0,0,.06); }
</style>
@endpush

@push('scripts')
@if(config('services.google.maps_key'))
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places"></script>
@endif
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
(function(){
  function attachAutocomplete(inputId){
    const input = document.getElementById(inputId);
    if(!input || !window.google) return;
    const options = { componentRestrictions: { country: 'us' }, fields: ['address_components','formatted_address'], types: ['(regions)'] };
    const ac = new google.maps.places.Autocomplete(input, options);
    ac.addListener('place_changed', function(){
      const place = ac.getPlace();
      const postal = (place.address_components||[]).find(c=>c.types.includes('postal_code'));
      const city = (place.address_components||[]).find(c=>c.types.includes('locality'));
      const state = (place.address_components||[]).find(c=>c.types.includes('administrative_area_level_1'));
      const full = place.formatted_address || [postal?.long_name, city?.long_name, state?.short_name,'USA'].filter(Boolean).join(', ');
      if(postal){ input.dataset.postal = postal.long_name; input.value = postal.long_name; input.classList.remove('is-invalid'); input.title = full; }
    });
  }
  attachAutocomplete('ri_zip_from');
  attachAutocomplete('ri_zip_to');
  if(window.flatpickr){ flatpickr('#ri_move_date', { dateFormat: 'Y-m-d', allowInput: true }); }
})();
</script>
@endpush

@section('content')
<section class="routes-hero">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6">
        <h1>State-to-State & City-to-City Routes</h1>
        <p class="lead mb-4">Explore popular moving routes or get a fast moving cost estimate.</p>
      </div>
      <div class="col-lg-6">
        <div class="form-card">
          <form method="GET" action="{{ route('front.get.quote') }}">
            <div class="row g-2">
              <div class="col-md-4">
                <label class="form-label text-muted">Moving From*</label>
                <input type="text" id="ri_zip_from" name="zip_from" class="form-control" placeholder="ZIP or City" required autocomplete="off">
              </div>
              <div class="col-md-4">
                <label class="form-label text-muted">Moving To*</label>
                <input type="text" id="ri_zip_to" name="zip_to" class="form-control" placeholder="ZIP or City" required autocomplete="off">
              </div>
              <div class="col-md-4">
                <label class="form-label text-muted">Moving Date</label>
                <input type="text" id="ri_move_date" name="move_date" class="form-control" placeholder="YYYY-MM-DD">
              </div>
              <div class="col-12">
                <button class="btn btn-primary w-100"><i class="fas fa-calculator me-2"></i>Get Quote</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="mb-0">Browse by State</h2>
      <a href="{{ route('front.get.quote') }}" class="btn btn-outline-primary"><i class="fas fa-quote-left me-2"></i>Get Free Quotes</a>
    </div>

    <div class="row state-grid g-3">
      @foreach($states as $s)
        @php $slug = Str::slug($s->name); @endphp
        <div class="col-6 col-md-4 col-lg-3">
          <a class="state" href="{{ route('front.routes.state', $slug) }}">
            <div class="fw-bold">{{ $s->name }}</div>
            <small class="text-muted">Routes • Movers • Cities</small>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
