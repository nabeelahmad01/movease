@extends('layouts.master')
@section('title', 'Admin - Companies | MoveEase')
@section('content')
<div class="container py-5">
  <h2 class="mb-4">Manage Companies</h2>
  <table class="table table-bordered table-hover">
    <thead class="table-primary">
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>FastMove Inc.</td>
        <td>info@fastmove.com</td>
        <td><span class="badge bg-success">Active</span></td>
        <td>
          <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
          <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
        </td>
      </tr>
      <tr>
        <td>SafeHands Movers</td>
        <td>contact@safehands.com</td>
        <td><span class="badge bg-warning text-dark">Pending</span></td>
        <td>
          <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
          <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
