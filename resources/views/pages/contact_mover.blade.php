@extends('layouts.master')
@section('title', 'Contact ' . $company->name . ' | MoveEase')
@section('canonical_url', route('front.contact.mover.show', $company->slug))

@push('styles')
<link href="{{ asset('assets/css/get-quote.css') }}" rel="stylesheet">
<style>
  .contact-hero{background:linear-gradient(135deg,#eef2ff 0,#f8f9ff 100%);padding:40px 0;border-bottom:1px solid #eee}
  .contact-card{background:#fff;border:1px solid #eee;border-radius:16px;box-shadow:0 8px 24px rgba(0,0,0,.06);padding:24px}
  .company-mini{display:flex;align-items:center;gap:12px}
  .company-badge{width:56px;height:56px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--primary-color),var(--secondary-color));color:#fff;font-weight:700;font-size:18px}
  .submit-row{display:flex;gap:10px;flex-wrap:wrap;align-items:center}
  .btn-submit{background:var(--primary-color);color:#fff;border:none;border-radius:10px;padding:10px 18px}
  .service-chip{display:flex;gap:10px;align-items:center;border:1px solid #e7e7e7;padding:10px;border-radius:10px;cursor:pointer}
  .service-chip input{margin-right:6px}
</style>
@endpush

@section('content')
<section class="contact-hero">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between flex-wrap">
      <div class="company-mini">
        <div class="company-badge">{{ substr($company->name,0,2) }}</div>
        <div>
          <h1 class="h4 mb-1">Contact {{ $company->name }}</h1>
          <div class="text-muted">Request a quote directly from this mover</div>
        </div>
      </div>
      <div class="mt-3 mt-md-0">
        <a href="{{ route('front.company.profile', $company->slug) }}" class="btn btn-outline-secondary btn-sm">Back to Profile</a>
      </div>
    </div>
  </div>
</section>

<section class="py-4">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="contact-card">
          <form method="POST" action="{{ route('front.contact.mover.store', $company->slug) }}" id="contactMoverForm">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Moving From*</label>
                <input type="text" class="form-control zipfrom" name="zip_from" placeholder="Enter ZIP or City" required autocomplete="off">
                <div class="form-text zip-suggestion"></div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Moving To*</label>
                <input type="text" class="form-control zipto" name="zip_to" placeholder="Enter ZIP or City" required autocomplete="off">
                <div class="form-text zip-suggestion"></div>
              </div>

              <div class="col-md-4">
                <label class="form-label">Move Date</label>
                <input type="text" class="form-control movedate" name="move_date" placeholder="YYYY-MM-DD">
              </div>
              <div class="col-md-8">
                <label class="form-label">Home Size</label>
                <div class="d-flex gap-2 flex-wrap">
                  @foreach(['Studio','1 Bedroom','2 Bedroom','3+ Bedroom'] as $size)
                  <label class="service-chip mb-0"><input type="radio" name="move_size" value="{{ $size }}"> {{ $size }}</label>
                  @endforeach
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label">Full Name*</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email*</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone*</label>
                <input type="tel" class="form-control" name="phone" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Additional Services</label>
                <div class="d-flex gap-2 flex-wrap">
                  @foreach(['packing','storage','insurance','specialty'] as $svc)
                  <label class="service-chip mb-0"><input type="checkbox" name="services[]" value="{{ $svc }}"> {{ ucfirst($svc) }}</label>
                  @endforeach
                </div>
              </div>

              <div class="col-12">
                <label class="form-label">Message (optional)</label>
                <textarea class="form-control" rows="4" name="message" placeholder="Any specific details about your move..."></textarea>
              </div>

              <div class="col-12 submit-row">
                <button type="submit" class="btn-submit" id="contactSubmitBtn"><i class="fas fa-paper-plane me-2"></i>Send Request</button>
                <div class="text-muted small">By submitting, you agree to be contacted by {{ $company->name }} about your move.</div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="contact-card">
          <h5 class="mb-3">Company Info</h5>
          <div class="mb-2"><strong>{{ $company->name }}</strong></div>
          @if($company->phone)
            <div class="mb-1"><i class="fas fa-phone me-2 text-primary"></i>{{ $company->phone }}</div>
          @endif
          @if($company->email)
            <div class="mb-1"><i class="fas fa-envelope me-2 text-primary"></i>{{ $company->email }}</div>
          @endif
          @if($company->city || $company->state)
            <div class="mb-1"><i class="fas fa-map-marker-alt me-2 text-primary"></i>{{ $company->city }}, {{ $company->state->code ?? $company->state }}</div>
          @endif
          <hr>
          <div class="small text-muted">We’ll send your request directly to the mover so they can provide an accurate quote.</div>
        </div>
      </div>
    </div>
  </div>
</section>

@push('scripts')
<script>
  const cmForm = document.getElementById('contactMoverForm');
  if (cmForm) {
    cmForm.addEventListener('submit', function(e){
      const btn = document.getElementById('contactSubmitBtn');
      if(btn){ btn.disabled = true; btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...'; }
    });
  }
</script>
@endpush
@endsection
