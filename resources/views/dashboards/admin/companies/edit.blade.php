@extends('layouts.master')
@section('title','Edit Company | Admin')
@section('content')
<div class="container py-4">
  <h3 class="mb-3">Edit Company</h3>
  <form method="POST" action="{{ route('admin.companies.update',$company) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row g-3">
      <div class="col-md-6"><label class="form-label">Name</label><input name="name" class="form-control" value="{{ $company->name }}" required></div>
      <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ $company->email }}"></div>
      <div class="col-md-6"><label class="form-label">Phone</label><input name="phone" class="form-control" value="{{ $company->phone }}"></div>
      <div class="col-md-6"><label class="form-label">Website</label><input name="website" class="form-control" value="{{ $company->website }}"></div>
      <div class="col-md-6"><label class="form-label">Address Line 1</label><input name="address_line1" class="form-control" value="{{ $company->address_line1 }}"></div>
      <div class="col-md-6"><label class="form-label">Address Line 2</label><input name="address_line2" class="form-control" value="{{ $company->address_line2 }}"></div>
      <div class="col-md-4"><label class="form-label">State</label>
        <select name="state_id" id="stateSelect" class="form-select" data-control="select2">
          <option value="">Select state</option>
          @foreach($states as $s)<option value="{{ $s->id }}" @selected($company->state_id==$s->id)>{{ $s->name }}</option>@endforeach
        </select>
      </div>
      <div class="col-md-4"><label class="form-label">City</label>
        <select name="city" id="citySelect" class="form-select" data-control="select2">
          <option value="{{ $company->city }}" selected>{{ $company->city }}</option>
        </select>
      </div>
      <div class="col-md-4"><label class="form-label">Zip</label><input name="zip" class="form-control" value="{{ $company->zip }}"></div>
      <div class="col-12"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="3">{{ $company->description }}</textarea></div>
      <div class="col-md-4"><label class="form-label">DOT #</label><input name="dot_number" class="form-control" value="{{ $company->dot_number }}"></div>
      <div class="col-md-4"><label class="form-label">MC #</label><input name="mc_number" class="form-control" value="{{ $company->mc_number }}"></div>
      <div class="col-md-4"><label class="form-label">License #</label><input name="license_number" class="form-control" value="{{ $company->license_number }}"></div>
      <div class="col-md-4"><label class="form-label">Service Type</label>
        <select name="service_type" class="form-select"><option value="local" @selected($company->service_type=='local')>Local</option><option value="long_distance" @selected($company->service_type=='long_distance')>Long Distance</option></select>
      </div>
      <div class="col-md-4"><label class="form-label">Status</label>
        <select name="status" class="form-select"><option value="active" @selected($company->status=='active')>Active</option><option value="pending" @selected($company->status=='pending')>Pending</option><option value="suspended" @selected($company->status=='suspended')>Suspended</option></select>
      </div>
      <div class="col-md-4"><label class="form-label">Logo</label><input type="file" name="logo" class="form-control"></div>
      <div class="col-12"><button class="btn btn-primary">Update</button></div>
    </div>
  </form>
</div>
@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
(function(){
  const stateEl = document.getElementById('stateSelect');
  const cityEl = document.getElementById('citySelect');
  function initSelect2(){
    window.jQuery && jQuery('[data-control=select2]').select2({width:'100%'});
  }
  document.addEventListener('DOMContentLoaded', initSelect2);
  stateEl.addEventListener('change', async function(){
    const id = this.value; cityEl.innerHTML = '<option value="">Loading...</option>';
    if(!id){ cityEl.innerHTML = '<option value="">Select city</option>'; return; }
    const res = await fetch(`/admin/api/states/${id}/cities`);
    const cities = await res.json();
    cityEl.innerHTML = '<option value="">Select city</option>' + cities.map(c=>`<option value="${c.name}">${c.name}</option>`).join('');
    initSelect2();
  });
})();
</script>
@endpush
