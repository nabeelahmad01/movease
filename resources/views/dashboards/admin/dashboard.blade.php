@extends('dashboards.layouts.app')
@section('title', 'Admin Dashboard | MoveEase')
{{-- @section('page_title','Dashboard') --}}
@section('content')
<div class="toolbar" id="kt_toolbar">
    <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">

            <h1 class="text-dark fw-bold my-1 fs-2">
                Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <ul class="breadcrumb fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                        Dashboard </a>
                </li>
                {{-- <li class="breadcrumb-item text-muted">Admins </li> --}}
            </ul>
        </div>
    </div>
</div>
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="row g-3">
  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card shadow-sm metric-card">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div>
          <div class="text-muted-2 mb-1">Companies</div>
          <div class="value fw-bold">{{ number_format($companiesCount ?? 0) }}</div>
          <div class="sub">Total</div>
        </div>
        <div class="icon bg-gradient-blue"><i class="bi bi-buildings"></i></div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card shadow-sm metric-card">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div>
          <div class="text-muted-2 mb-1">User Reviews</div>
          <div class="value fw-bold">{{ number_format($reviewsCount ?? 0) }}</div>
          <div class="sub">This month: {{ number_format($reviewsThisMonth ?? 0) }}</div>
        </div>
        <div class="icon bg-gradient-amber"><i class="bi bi-star-half"></i></div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card shadow-sm metric-card">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div>
          <div class="text-muted-2 mb-1">Quotes</div>
          <div class="value fw-bold">{{ number_format($pendingQuotesCount ?? 0) }}</div>
          <div class="sub">Total: {{ number_format($quotesCount ?? 0) }}</div>
        </div>
        <div class="icon bg-gradient-emerald"><i class="bi bi-quote"></i></div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-lg-3">
    <div class="card shadow-sm metric-card">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div>
          <div class="text-muted-2 mb-1">Blogs</div>
          <div class="value fw-bold">{{ number_format($blogsCount ?? 0) }}</div>
          <div class="sub">Total</div>
        </div>
        <div class="icon bg-gradient-rose"><i class="bi bi-journal-text"></i></div>
      </div>
    </div>
  </div>
</div>

<div class="row g-3 mt-1">
  <div class="col-12">
    <div class="card shadow-sm">
      <div class="card-header bg-white border-0 pt-3 pb-0">
        <h6 class="mb-2">Recent Quotes</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>From ZIP</th>
                <th>To ZIP</th>
                <th>Move Date</th>
                <th>Size</th>
                <th>Status</th>
                <th>Requested At</th>
              </tr>
            </thead>
            <tbody>
              @forelse(($recentQuotes ?? []) as $q)
                <tr>
                  <td class="text-muted-2">{{ $q->name ?? '—' }}</td>
                  <td class="text-muted-2">{{ $q->email ?? '—' }}</td>
                  <td class="text-muted-2">{{ $q->phone ?? '—' }}</td>
                  <td class="text-muted-2">{{ $q->zip_from ?? '—' }}</td>
                  <td class="text-muted-2">{{ $q->zip_to ?? '—' }}</td>
                  <td class="text-muted-2">{{ $q->move_date ?? '—' }}</td>
                  <td class="text-muted-2">{{ $q->move_size ?? '—' }}</td>
                  <td>
                    @php $status = strtolower($q->status ?? ''); @endphp
                    <span class="badge {{ $status === 'pending' ? 'text-bg-warning' : ($status === 'approved' ? 'text-bg-success' : 'text-bg-secondary') }}">{{ ucfirst($q->status ?? 'Unknown') }}</span>
                  </td>
                  <td class="text-muted-2">{{ optional($q->created_at)->format('Y-m-d H:i') }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="9" class="text-center text-muted-2">No quotes yet.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
