@extends('layouts.master')
@section('title', ($route->title ?? 'City Route').' | MoveEase')
@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-3">{{ $route->title ?? 'Moving Route' }}</h1>
  <div class="row g-3">
    <div class="col-md-4">
      <div class="card"><div class="card-body">
        <div class="text-muted">From City</div>
        <div class="fw-semibold">{{ $route->fromCity->name ?? '-' }}</div>
      </div></div>
    </div>
    <div class="col-md-4">
      <div class="card"><div class="card-body">
        <div class="text-muted">To City</div>
        <div class="fw-semibold">{{ $route->toCity->name ?? '-' }}</div>
      </div></div>
    </div>
    <div class="col-md-4">
      <div class="card"><div class="card-body">
        <div class="text-muted">Miles</div>
        <div class="fw-semibold">{{ $route->miles ?? '—' }}</div>
      </div></div>
    </div>
  </div>
  <div class="mt-4">
    <span class="badge bg-success me-2">Min Cost: {{ $route->min_cost ?? '—' }}</span>
    <span class="badge bg-warning text-dark">Max Cost: {{ $route->max_cost ?? '—' }}</span>
  </div>
</div>
@endsection
