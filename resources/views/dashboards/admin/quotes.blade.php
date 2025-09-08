@extends('dashboards.layouts.app')
@section('title', 'Admin - Quotes | MoveEase')
@section('page_title','Quotes')
@section('content')
<div class="container py-4">
  <h2 class="mb-4">Manage Quotes</h2>
  <table class="table table-bordered table-hover">
    <thead class="table-primary">
      <tr>
        <th>Name</th>
        <th>From Zip</th>
        <th>To Zip</th>
        <th>Date</th>
        <th>Move Size</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse(($quotes ?? []) as $q)
      <tr>
        <td>{{ $q->name }}</td>
        <td>{{ $q->zip_from }}</td>
        <td>{{ $q->zip_to }}</td>
        <td>{{ $q->move_date }}</td>
        <td>{{ $q->move_size }}</td>
        <td><span class="badge bg-info">{{ $q->status }}</span></td>
      </tr>
      @empty
      <tr><td colspan="6" class="text-center text-muted">No quotes yet.</td></tr>
      @endforelse
    </tbody>
  </table>
  {{ isset($quotes) ? $quotes->links() : '' }}
</div>
@endsection
