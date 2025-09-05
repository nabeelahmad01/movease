@extends('layouts.master')
@section('title', 'User Dashboard | MoveEase')
@section('content')
<div class="container py-5">
  <h2>Welcome to Your Dashboard!</h2>
  <p class="lead">Quick links:</p>
  <div class="d-flex gap-3">
    <a href="/listings" class="btn btn-outline-primary">Browse Listings</a>
    <a href="/get-quote" class="btn btn-primary">Get a Quote</a>
    <a href="/blog" class="btn btn-outline-secondary">Read Blog</a>
  </div>
</div>
@endsection
