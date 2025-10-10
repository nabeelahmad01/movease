@extends('layouts.master')
@section('title', 'Contact ' . $company->name . ' | MoveEase')
@section('canonical_url', route('front.contact.mover.show', $company->slug))

@push('styles')
<link href="{{ asset('/get-quote.css') }}" rel="stylesheet">
<style>
  .contact-hero{background:linear-gradient(135deg,#eef2ff 0,#f8f9ff 100%);padding:40px 0;border-bottom:1px solid #eee}
  .contact-card{background:#fff;border:1px solid #eee;border-radius:16px;box-shadow:0 8px 24px rgba(0,0,0,.06);padding:24px}
  .company-mini{display:flex;align-items:center;gap:12px}
  .company-badge{width:56px;height:56px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,var(--primary-color),var(--secondary-color));color:#fff;font-weight:700;font-size:18px}
  .submit-row{display:flex;gap:10px;flex-wrap:wrap;align-items:center}
  .btn-submit{background:var(--primary-color);color:#fff;border:none;border-radius:10px;padding:10px 18px}
  .service-chip{display:flex;gap:10px;align-items:center;border:1px solid #e7e7e7;padding:10px;border-radius:10px;cursor:pointer}
  .service-chip input{margin-right:6px}
  
h1, h2, h3, h4, h5, h6 {
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-weight: 600;
}

/* Hero Section */
.quote-hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 80px 0 60px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.quote-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="1000,100 1000,0 0,100"/></svg>');
    background-size: cover;
}

.quote-hero-content {
    position: relative;
    z-index: 2;
}

.quote-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.quote-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
    margin-bottom: 0;
}

/* Quote Form Container */
.quote-container {
    margin-top: -40px;
    position: relative;
    z-index: 3;
    padding-bottom: 80px;
}

.quote-form-card {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.quote-form-card:hover {
    box-shadow: 0 25px 50px rgba(0,0,0,0.2);
}

/* Form Sections */
.form-section {
    margin-bottom: 2.5rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid var(--light-bg);
}

.form-section:last-child {
    margin-bottom: 0;
    border-bottom: none;
    padding-bottom: 0;
}

.form-section h3 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    font-size: 1.5rem;
}

.form-section h3 i {
    margin-right: 0.75rem;
    color: var(--secondary-color);
    font-size: 1.25rem;
}

/* Form Controls */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: var(--dark-text);
    margin-bottom: 0.5rem;
    display: block;
}

.form-control,
.form-select {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    font-size: 1rem;
    transition: all 0.3s ease;
    width: 100%;
}

.form-control:focus,
.form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
    outline: none;
}

.form-control::placeholder {
    color: var(--light-text);
}

/* Input Groups */
.input-group {
    display: flex;
    gap: 1rem;
}

.input-group .form-control,
.input-group .form-select {
    flex: 1;
}

/* Move Size Options */
.move-size-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 0.5rem;
}

.size-option {
    background: var(--light-bg);
    border: 2px solid transparent;
    border-radius: 10px;
    padding: 1rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.size-option:hover {
    background: white;
    border-color: var(--primary-color);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.size-option.active {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

.size-option input[type="radio"] {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}

.size-option .icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    color: var(--secondary-color);
}

.size-option.active .icon {
    color: white;
}

.size-option h5 {
    margin-bottom: 0.25rem;
    font-size: 1.1rem;
}

.size-option p {
    font-size: 0.9rem;
    margin: 0;
    opacity: 0.8;
}

/* Additional Services */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    margin-top: 0.5rem;
}

.service-option {
    background: var(--light-bg);
    border: 2px solid transparent;
    border-radius: 10px;
    padding: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.service-option:hover {
    background: white;
    border-color: var(--primary-color);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.service-option.active {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

.service-option input[type="checkbox"] {
    margin-right: 0.75rem;
    width: 18px;
    height: 18px;
    accent-color: var(--secondary-color);
}

.service-option .service-info h6 {
    margin-bottom: 0.25rem;
    font-size: 1rem;
}

.service-option .service-info p {
    font-size: 0.85rem;
    margin: 0;
    opacity: 0.8;
}

/* Quote Summary */
.quote-summary {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-radius: 15px;
    padding: 2rem;
    margin-top: 2rem;
}

.quote-summary h4 {
    margin-bottom: 1.5rem;
    font-size: 1.5rem;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.summary-item:last-child {
    border-bottom: none;
    font-weight: 600;
    font-size: 1.1rem;
    margin-top: 0.5rem;
    padding-top: 1rem;
    border-top: 2px solid rgba(255,255,255,0.3);
}

/* Submit Button */
.submit-section {
    text-align: center;
    margin-top: 2rem;
}

.btn-submit {
    background: linear-gradient(135deg, var(--secondary-color), #c0392b);
    border: none;
    color: white;
    padding: 15px 40px;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(231, 76, 60, 0.4);
}

.btn-submit:active {
    transform: translateY(0);
}

/* Progress Indicator */
.progress-indicator {
    display: flex;
    justify-content: center;
    margin-bottom: 2rem;
}

.progress-step {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--light-bg);
    color: var(--light-text);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin: 0 0.5rem;
    position: relative;
}

.progress-step.active {
    background: var(--primary-color);
    color: white;
}

.progress-step.completed {
    background: var(--accent-color);
    color: white;
}

.progress-step:not(:last-child)::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 100%;
    width: 20px;
    height: 2px;
    background: var(--light-bg);
    transform: translateY(-50%);
}

.progress-step.completed:not(:last-child)::after {
    background: var(--accent-color);
}

/* Responsive Design */
@media (max-width: 768px) {
    .quote-hero h1 {
        font-size: 2.5rem;
    }
    
    .quote-form-card {
        padding: 2rem;
        margin: 0 1rem;
    }
    
    .input-group {
        flex-direction: column;
        gap: 1rem;
    }
    
    .move-size-options {
        grid-template-columns: 1fr;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
    
    .progress-indicator {
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    
    .progress-step:not(:last-child)::after {
        display: none;
    }
}

</style>
@endpush

@section('content')

    <!-- SEO Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Contact {{ $company->name }} | MoveEase",
        "description": "Contact {{ $company->name }} directly through MoveEase. Get in touch for moving quotes, services, and inquiries for your interstate relocation needs.",
        "url": "{{ route('front.contact.mover.show', $company->slug) }}",
        "isPartOf": {
            "@type": "WebSite",
            "name": "MoveEase",
            "url": "{{ url('/') }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "MoveEase",
            "url": "{{ url('/') }}",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('assets/images/logo.png') }}"
            },
            "contactPoint": {
                "@type": "ContactPoint",
                "contactType": "customer service",
                "availableLanguage": "English"
            }
        },
        "breadcrumb": {
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item": {
                        "@id": "{{ url('/') }}",
                        "name": "Home"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "item": {
                        "@id": "{{ route('front.company.profile', $company->slug) }}",
                        "name": "{{ $company->name }}"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "item": {
                        "@id": "{{ route('front.contact.mover.show', $company->slug) }}",
                        "name": "Contact"
                    }
                }
            ]
        },
        "mainEntity": {
            "@type": "ContactPage",
            "name": "Contact {{ $company->name }}",
            "description": "Contact page for {{ $company->name }} moving company"
        }
    }
    </script>
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
