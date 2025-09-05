@extends('layouts.master')
@section('title', 'Company Dashboard | MoveEase')
@section('content')
<div class="container-fluid">
  <div class="row min-vh-100">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar py-4">
      <div class="position-sticky">
        <ul class="nav flex-column">
          <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Leads</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Reviews</a></li>
        </ul>
      </div>
    </nav>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
      <h2>Welcome, Company!</h2>
      <p class="lead">Manage your profile, leads, and reviews from your dashboard.</p>
    </main>
  </div>
</div>
@endsection
