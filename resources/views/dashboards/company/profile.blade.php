@extends('layouts.master')
@section('title', 'Company Profile | MoveEase')
@section('content')
<div class="container py-5">
  <h2 class="mb-4">Edit Company Profile</h2>
  <form>
    <div class="mb-3">
      <label class="form-label">Company Name</label>
      <input type="text" class="form-control" value="FastMove Inc.">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" value="info@fastmove.com">
    </div>
    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input type="text" class="form-control" value="(555) 123-4567">
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <input type="text" class="form-control" value="123 Main St, New York, NY">
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control" rows="3">Reliable and affordable moving services nationwide.</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
</div>
@endsection
