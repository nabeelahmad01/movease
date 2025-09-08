@extends('dashboards.layouts.app')
@section('title','Contact Leads | Admin')
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Contact Mover Leads</h3>
  </div>

  <div class="card p-3 shadow-sm">
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Company</th>
            <th>From</th>
            <th>To</th>
            <th>Move Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Services</th>
            <th>Created</th>
          </tr>
        </thead>
        <tbody>
          @forelse($leads as $lead)
            <tr>
              <td>{{ $lead->id }}</td>
              <td>
                @if($lead->company)
                  <a href="{{ route('front.company.profile', $lead->company->slug) }}" target="_blank">{{ $lead->company->name }}</a>
                @else
                  -
                @endif
              </td>
              <td>{{ $lead->zip_from }}</td>
              <td>{{ $lead->zip_to }}</td>
              <td>{{ optional($lead->move_date)->format('Y-m-d') }}</td>
              <td>{{ $lead->name }}</td>
              <td><a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a></td>
              <td><a href="tel:{{ $lead->phone }}">{{ $lead->phone }}</a></td>
              <td>
                @if(is_array($lead->services))
                  {{ implode(', ', array_map('ucfirst', $lead->services)) }}
                @endif
              </td>
              <td>{{ $lead->created_at->format('Y-m-d H:i') }}</td>
            </tr>
          @empty
            <tr><td colspan="10" class="text-center text-muted">No leads yet</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div>
      {{ $leads->links() }}
    </div>
  </div>
</div>
@endsection
