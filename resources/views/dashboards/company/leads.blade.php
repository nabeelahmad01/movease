@extends('layouts.master')
@section('title', 'Company - Leads | MoveEase')
@section('content')
<div class="container py-5">
  <h2 class="mb-4">Leads</h2>
  <table class="table table-bordered table-hover">
    <thead class="table-primary">
      <tr>
        <th>Name</th>
        <th>From Zip</th>
        <th>To Zip</th>
        <th>Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ali Raza</td>
        <td>10001</td>
        <td>90001</td>
        <td>2024-08-10</td>
        <td><span class="badge bg-info">New</span></td>
        <td>
          <a href="#" class="btn btn-sm btn-outline-primary">View</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
