@extends('layouts.master')
@section('title', 'Get Quote | MoveEase')
@section('canonical_url', route('front.get.quote'))
@if(request()->has('zip_from') || request()->has('zip_to'))
    @push('head')
    <meta name="robots" content="noindex,follow">
    @endpush
@endif
@section('content')

@push('styles')
<link href="{{ asset('assets/css/get-quote.css') }}" rel="stylesheet">
@endpush

<!-- Hero Section -->
<section class="quote-hero">
    <div class="container">
        <div class="quote-hero-content">
            <h1>Get Your Moving Quote</h1>
            <p>Compare quotes from licensed and insured moving companies</p>
        </div>
    </div>
</section>

<!-- Quote Form Container -->
<section class="quote-container">
    <div class="container">
        <div class="quote-form-card">
            <!-- Progress Indicator -->
            <div class="progress-indicator">
                <div class="progress-step active">1</div>
                <div class="progress-step">2</div>
                <div class="progress-step">3</div>
                <div class="progress-step">4</div>
            </div>

            <form id="quoteForm" method="POST" action="{{ route('front.quote.submit') }}">
                @csrf
                
                <!-- Step 1: Moving Locations -->
                <div class="form-section" id="step-1">
                    <h3><i class="fas fa-map-marker-alt"></i>Moving Locations</h3>
                    <div class="input-group">
                        <div class="form-group">
                            <label for="zip_from" class="form-label">Moving From*</label>
                            <input type="text" class="form-control" id="zip_from" name="zip_from" value="{{ old('zip_from', request('zip_from')) }}" placeholder="Enter ZIP or City" autocomplete="off">
                            <div class="form-text" id="zip_from_suggestion"></div>
                        </div>
                        <div class="form-group">
                            <label for="zip_to" class="form-label">Moving To*</label>
                            <input type="text" class="form-control" id="zip_to" name="zip_to" value="{{ old('zip_to', request('zip_to')) }}" placeholder="Enter ZIP or City" autocomplete="off">
                            <div class="form-text" id="zip_to_suggestion"></div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div id="routeMap" style="width:100%; height:280px; border-radius:10px; border:1px solid #eee;"></div>
                    </div>
                    <button type="button" class="btn btn-primary next-step">Continue</button>
                </div>

                <!-- Step 2: Move Details -->
                <div class="form-section" id="step-2">
                    <h3><i class="fas fa-calendar-alt"></i>Move Details</h3>
                    <div class="input-group">
                        <div class="form-group">
                            <label for="move_date" class="form-label">Preferred Moving Date</label>
                            <input type="text" class="form-control" id="move_date" name="move_date" value="{{ old('move_date', request('move_date')) }}" placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Home Size</label>
                        <div class="move-size-options">
                            <div class="size-option">
                                <input type="radio" name="move_size" value="Studio" id="studio">
                                <div class="icon"><i class="fas fa-home"></i></div>
                                <h5>Studio</h5>
                                <p>Small apartment</p>
                            </div>
                            <div class="size-option">
                                <input type="radio" name="move_size" value="1 Bedroom" id="1bed">
                                <div class="icon"><i class="fas fa-bed"></i></div>
                                <h5>1 Bedroom</h5>
                                <p>1-2 rooms</p>
                            </div>
                            <div class="size-option">
                                <input type="radio" name="move_size" value="2 Bedroom" id="2bed">
                                <div class="icon"><i class="fas fa-home"></i></div>
                                <h5>2 Bedroom</h5>
                                <p>2-3 rooms</p>
                            </div>
                            <div class="size-option">
                                <input type="radio" name="move_size" value="3+ Bedroom" id="3bed">
                                <div class="icon"><i class="fas fa-building"></i></div>
                                <h5>3+ Bedroom</h5>
                                <p>Large home</p>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-secondary prev-step">Back</button>
                    <button type="button" class="btn btn-primary next-step">Continue</button>
                </div>

                <!-- Step 3: Contact Information -->
                <div class="form-section" id="step-3">
                    <h3><i class="fas fa-user"></i>Contact Information</h3>
                    <div class="input-group">
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name*</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your full name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address*</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="your@email.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number*</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="(555) 123-4567">
                    </div>
                    
                    <button type="button" class="btn btn-secondary prev-step">Back</button>
                    <button type="button" class="btn btn-primary next-step">Continue</button>
                </div>

                <!-- Step 4: Additional Services -->
                <div class="form-section" id="step-4">
                    <h3><i class="fas fa-plus-circle"></i>Additional Services</h3>
                    <div class="services-grid">
                        <div class="service-option">
                            <input type="checkbox" name="services[]" value="packing" id="packing">
                            <div class="service-info">
                                <h6>Packing Services</h6>
                                <p>Professional packing and unpacking</p>
                            </div>
                        </div>
                        <div class="service-option">
                            <input type="checkbox" name="services[]" value="storage" id="storage">
                            <div class="service-info">
                                <h6>Storage</h6>
                                <p>Short or long-term storage solutions</p>
                            </div>
                        </div>
                        <div class="service-option">
                            <input type="checkbox" name="services[]" value="insurance" id="insurance">
                            <div class="service-info">
                                <h6>Full Coverage Insurance</h6>
                                <p>Comprehensive protection for belongings</p>
                            </div>
                        </div>
                        <div class="service-option">
                            <input type="checkbox" name="services[]" value="specialty" id="specialty">
                            <div class="service-info">
                                <h6>Specialty Items</h6>
                                <p>Piano, artwork, antiques handling</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="submit-section">
                        <button type="button" class="btn btn-secondary prev-step">Back</button>
                        <button type="submit" class="btn-submit">Get My Free Quotes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@push('scripts')
<script>
// Multi-step form functionality
let currentStep = 1;
const totalSteps = 4;

function showStep(step) {
    // Hide all steps
    document.querySelectorAll('.form-section').forEach(section => {
        section.style.display = 'none';
    });
    // Show current
    const currentSection = document.getElementById(`step-${step}`);
    if (currentSection) {
        currentSection.style.display = 'block';
    }
    // Update progress steps: completed for past, active for current
    const steps = document.querySelectorAll('.progress-step');
    steps.forEach((indicator, index) => {
        const idx = index + 1;
        indicator.classList.toggle('active', idx === step);
        indicator.classList.toggle('completed', idx < step);
        if (idx > step) indicator.classList.remove('completed');
    });
}

// Form validation
function validateStep(step) {
    let valid = true;
    
    if (step === 1) {
        const zipFrom = document.getElementById('zip_from');
        const zipTo = document.getElementById('zip_to');
        if (!zipFrom.value.trim()) { zipFrom.classList.add('is-invalid'); valid = false; } else { zipFrom.classList.remove('is-invalid'); }
        if (!zipTo.value.trim()) { zipTo.classList.add('is-invalid'); valid = false; } else { zipTo.classList.remove('is-invalid'); }
    }
    
    if (step === 2) {
        const sizeSelected = document.querySelector('input[name="move_size"]:checked');
        if (!sizeSelected) {
            document.querySelectorAll('.size-option').forEach(opt => opt.classList.add('error'));
            valid = false;
        } else {
            document.querySelectorAll('.size-option').forEach(opt => opt.classList.remove('error'));
        }
    }
    
    if (step === 3) {
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const phone = document.getElementById('phone');
        if (!name.value.trim()) { name.classList.add('is-invalid'); valid = false; } else { name.classList.remove('is-invalid'); }
        if (!email.value.trim() || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email.value)) { email.classList.add('is-invalid'); valid = false; } else { email.classList.remove('is-invalid'); }
        if (!phone.value.trim()) { phone.classList.add('is-invalid'); valid = false; } else { phone.classList.remove('is-invalid'); }
    }
    
    return valid;
}

// Initialize form when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Next step functionality
    document.querySelectorAll('.next-step').forEach(button => {
        button.addEventListener('click', function() {
            if (validateStep(currentStep) && currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    // Previous step functionality
    document.querySelectorAll('.prev-step').forEach(button => {
        button.addEventListener('click', function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    // Size option selection
    document.querySelectorAll('.size-option').forEach(option => {
        option.addEventListener('click', function() {
            const radio = this.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
                document.querySelectorAll('.size-option').forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });

    // Service option selection
    document.querySelectorAll('.service-option').forEach(option => {
        option.addEventListener('click', function() {
            const checkbox = this.querySelector('input[type="checkbox"]');
            if (checkbox) {
                checkbox.checked = !checkbox.checked;
                this.classList.toggle('active', checkbox.checked);
            }
        });
    });

    // Remove validation errors on input
    document.querySelectorAll('input').forEach(field => {
        field.addEventListener('input', function() {
            this.classList.remove('is-invalid');
        });
    });

    // Initialize visibility: hide all but step-1
    document.querySelectorAll('.form-section').forEach((section, idx) => {
        section.style.display = (idx === 0) ? 'block' : 'none';
    });
    showStep(1);
});
</script>
@if(config('services.google.maps_key'))
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places"></script>
<script>
(function(){
  function attachAutocomplete(inputId, hintId){
    const input = document.getElementById(inputId);
    const hint = document.getElementById(hintId);
    if(!input || !window.google) return;
    const options = { componentRestrictions: { country: 'us' }, fields: ['address_components','formatted_address','geometry'], types: ['(regions)'] };
    const ac = new google.maps.places.Autocomplete(input, options);
    ac.addListener('place_changed', function(){
      const place = ac.getPlace();
      const postal = (place.address_components||[]).find(c=>c.types.includes('postal_code'));
      const city = (place.address_components||[]).find(c=>c.types.includes('locality'));
      const state = (place.address_components||[]).find(c=>c.types.includes('administrative_area_level_1'));
      const full = place.formatted_address || [postal?.long_name, city?.long_name, state?.short_name,'USA'].filter(Boolean).join(', ');
      if(postal){ input.dataset.postal = postal.long_name; input.value = postal.long_name; hint.textContent = full; input.classList.remove('is-invalid'); }
      else { delete input.dataset.postal; input.classList.add('is-invalid'); hint.textContent=''; }
    });
  }
  attachAutocomplete('zip_from','zip_from_suggestion');
  attachAutocomplete('zip_to','zip_to_suggestion');
})();
</script>
<script>
(function(){
  if(!window.google) return;
  const mapEl = document.getElementById('routeMap');
  if(!mapEl) return;

  const map = new google.maps.Map(mapEl, {
    center: { lat: 39.8283, lng: -98.5795 },
    zoom: 4,
    disableDefaultUI: true,
    draggable: false,
    scrollwheel: false,
    disableDoubleClickZoom: true,
    keyboardShortcuts: false,
    gestureHandling: 'none'
  });

  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer({ map, draggable: false, suppressMarkers: false });

  const zipFrom = document.getElementById('zip_from');
  const zipTo = document.getElementById('zip_to');

  let timer;
  function debounced(fn, wait=350){ clearTimeout(timer); timer = setTimeout(fn, wait); }

  function updateRoute(){
    const a = (zipFrom?.dataset.postal || zipFrom?.value || '').trim();
    const b = (zipTo?.dataset.postal || zipTo?.value || '').trim();
    if(!a || !b) return;
    directionsService.route({
      origin: a,
      destination: b,
      travelMode: google.maps.TravelMode.DRIVING
    }, (res, status) => {
      if(status === 'OK'){
        directionsRenderer.setDirections(res);
        const route = res.routes?.[0];
        if(route?.bounds) map.fitBounds(route.bounds);
      }
    });
  }

  ['input','change','blur'].forEach(evt => {
    zipFrom?.addEventListener(evt, () => debounced(updateRoute));
    zipTo?.addEventListener(evt, () => debounced(updateRoute));
  });

  // initial draw if values present
  updateRoute();
})();
</script>
@endif
@endpush
@endsection
