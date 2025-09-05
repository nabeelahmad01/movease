@extends('layouts.master')
@section('title', 'Admin - Blogs | MoveEase')
@section('content')
<div class="container py-5">
  <h2 class="mb-4">Manage Blogs</h2>
  <table class="table table-bordered table-hover">
    <thead class="table-primary">
      <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>How to Prepare for a Long Distance Move</td>
        <td>2024-07-01</td>
        <td><span class="badge bg-success">Published</span></td>
        <td>
          <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
          <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
        </td>
      </tr>
      <tr>
        <td>Top 5 Mistakes to Avoid When Hiring Movers</td>
        <td>2024-06-15</td>
        <td><span class="badge bg-warning text-dark">Draft</span></td>
        <td>
          <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
          <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
