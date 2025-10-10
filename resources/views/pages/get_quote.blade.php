@extends('layouts.master')
@section('title', 'Get Quote | MoveEase')
@section('canonical_url', route('front.get.quote'))
@if (request()->has('zip_from') || request()->has('zip_to'))
    @push('head')
        <meta name="robots" content="noindex,follow">
    @endpush
@endif
@extends('layouts.master')
@section('title', 'Get Quote | MoveEase')
@section('canonical_url', route('front.get.quote'))
@if (request()->has('zip_from') || request()->has('zip_to'))
    @push('head')
        <meta name="robots" content="noindex,follow">
    @endpush
@endif
@section('content')

    <!-- SEO Schema Markup -->
    @php
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => "Get Quote | MoveEase",
        "description" => "Get instant moving quotes from FMCSA verified interstate moving companies. Compare prices and services for your long-distance relocation needs.",
        "url" => route('front.get.quote'),
        "isPartOf" => [
            "@type" => "WebSite",
            "name" => "MoveEase",
            "url" => url('/')
        ],
        "publisher" => [
            "@type" => "Organization",
            "name" => "MoveEase",
            "url" => url('/'),
            "logo" => [
                "@type" => "ImageObject",
                "url" => asset('assets/images/logo.png')
            ],
            "contactPoint" => [
                "@type" => "ContactPoint",
                "contactType" => "customer service",
                "availableLanguage" => "English"
            ]
        ],
        "breadcrumb" => [
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "item" => [
                        "@id" => url('/'),
                        "name" => "Home"
                    ]
                ],
                [
                    "@type" => "ListItem",
                    "position" => 2,
                    "item" => [
                        "@id" => route('front.get.quote'),
                        "name" => "Get Quote"
                    ]
                ]
            ]
        ],
        "mainEntity" => [
            "@type" => "Service",
            "name" => "Moving Quote Service",
            "description" => "Get instant quotes from verified moving companies for interstate relocations",
            "provider" => [
                "@type" => "Organization",
                "name" => "MoveEase"
            ]
        ]
    ];
    @endphp

    @if (request()->has('zip_from') || request()->has('zip_to'))
        @push('head')
            <meta name="robots" content="noindex,follow">
        @endpush
    @endif

    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    @push('styles')
        <link href="{{ asset('/get-quote.css') }}" rel="stylesheet">
        <style>
            
h1, h2, h3, h4, h5, h6 {
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-weight: 600;
}
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
                                <input type="text" class="form-control zipfrom" id="zip_from" name="zip_from"
                                    value="{{ old('zip_from', request('zip_from')) }}" placeholder="Enter ZIP or City"
                                    autocomplete="off">
                                <div class="form-text" id="zip_from_suggestion"></div>
                            </div>
                            <div class="form-group">
                                <label for="zip_to" class="form-label">Moving To*</label>
                                <input type="text" class="form-control zipto" id="zip_to" name="zip_to"
                                    value="{{ old('zip_to', request('zip_to')) }}" placeholder="Enter ZIP or City"
                                    autocomplete="off">
                                <div class="form-text" id="zip_to_suggestion"></div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div id="routeMap"
                                style="width:100%; height:280px; border-radius:10px; border:1px solid #eee;"></div>
                        </div>
                        <button type="button" class="btn btn-primary next-step">Continue</button>
                    </div>

                    <!-- Step 2: Move Details -->
                    <div class="form-section" id="step-2">
                        <h3><i class="fas fa-calendar-alt"></i>Move Details</h3>
                        <div class="input-group">
                            <div class="form-group">
                                <label for="move_date" class="form-label">Preferred Moving Date</label>
                                <input type="text" class="form-control movedate" id="move_date" name="move_date"
                                    value="{{ old('move_date', request('move_date')) }}" placeholder="YYYY-MM-DD">
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
                        <button type="button" class="btn btn-primary next-step mt-4">Continue</button>
                    </div>

                    <!-- Step 3: Contact Information -->
                    <div class="form-section" id="step-3">
                        <h3><i class="fas fa-user"></i>Contact Information</h3>
                        <div class="input-group">
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name*</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Your full name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address*</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="your@email.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number*</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="(555) 123-4567">
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
                    if (!zipFrom.value.trim()) {
                        zipFrom.classList.add('is-invalid');
                        valid = false;
                    } else {
                        zipFrom.classList.remove('is-invalid');
                    }
                    if (!zipTo.value.trim()) {
                        zipTo.classList.add('is-invalid');
                        valid = false;
                    } else {
                        zipTo.classList.remove('is-invalid');
                    }
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
                    if (!name.value.trim()) {
                        name.classList.add('is-invalid');
                        valid = false;
                    } else {
                        name.classList.remove('is-invalid');
                    }
                    if (!email.value.trim() || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email.value)) {
                        email.classList.add('is-invalid');
                        valid = false;
                    } else {
                        email.classList.remove('is-invalid');
                    }
                    if (!phone.value.trim()) {
                        phone.classList.add('is-invalid');
                        valid = false;
                    } else {
                        phone.classList.remove('is-invalid');
                    }
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
                            document.querySelectorAll('.size-option').forEach(opt => opt.classList
                                .remove('active'));
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
        @if (config('services.google.maps_key'))
            <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places">
            </script>
            <script>
                (function() {
                    function attachAutocomplete(inputId, hintId) {
                        const input = document.getElementById(inputId);
                        const hint = document.getElementById(hintId);
                        if (!input || !window.google) return;
                        const options = {
                            componentRestrictions: {
                                country: 'us'
                            },
                            fields: ['address_components', 'formatted_address', 'geometry'],
                            types: ['(regions)']
                        };
                        const ac = new google.maps.places.Autocomplete(input, options);
                        ac.addListener('place_changed', function() {
                            const place = ac.getPlace();
                            const postal = (place.address_components || []).find(c => c.types.includes('postal_code'));
                            const city = (place.address_components || []).find(c => c.types.includes('locality'));
                            const state = (place.address_components || []).find(c => c.types.includes(
                                'administrative_area_level_1'));
                            const full = place.formatted_address || [postal?.long_name, city?.long_name, state
                                ?.short_name, 'USA'
                            ].filter(Boolean).join(', ');
                            if (postal) {
                                input.dataset.postal = postal.long_name;
                                input.value = postal.long_name;
                                hint.textContent = full;
                                input.classList.remove('is-invalid');
                            }
                        });
                    });
                        timer = setTimeout(fn, wait);
                    }

                    function updateRoute() {
                        const a = (zipFrom?.dataset.postal || zipFrom?.value || '').trim();
                        const b = (zipTo?.dataset.postal || zipTo?.value || '').trim();
                        if (!a || !b) return;
                        directionsService.route({
                            origin: a,
                            destination: b,
                            travelMode: google.maps.TravelMode.DRIVING
                        }, (res, status) => {
                            if (status === 'OK') {
                                directionsRenderer.setDirections(res);
                                const route = res.routes?.[0];
                                if (route?.bounds) map.fitBounds(route.bounds);
                            }
                        });
                    }

                    ['input', 'change', 'blur'].forEach(evt => {
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
