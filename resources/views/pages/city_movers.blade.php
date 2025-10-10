@extends('layouts.master')
@section('title', $cityName . ' Movers - ' . $stateName . ' Moving Services | MoveEase')
@section('meta_description', 'Find reliable movers in ' . $cityName . ', ' . $stateName . '. Get free quotes from local
    moving companies. Professional ' . $cityName . ' moving services with competitive pricing.')
    moving services, local movers ' . $cityName)

@section('content')

    <!-- SEO Schema Markup -->
    @php
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => $cityName . ' Movers - ' . $stateName . ' Moving Services | MoveEase',
        "description" => "Find reliable movers in " . $cityName . ', ' . $stateName . '. Get free quotes from local moving companies. Professional ' . $cityName . ' moving services with competitive pricing.',
        "url" => request()->url(),
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
                        "@id" => request()->url(),
                        "name" => $cityName . " Movers"
                    ]
                ]
            ]
        ],
        "mainEntity" => [
            "@type" => "Place",
            "name" => $cityName . ', ' . $stateName,
            "address" => [
                "@type" => "PostalAddress",
                "addressLocality" => $cityName,
                "addressRegion" => $stateName,
                "addressCountry" => "US"
            ]
        ]
    ];
    @endphp

    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}" class="text-white">Home</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('front.state.movers', ['state' => strtolower(str_replace(' ', '-', $stateName))]) }}"
                                    class="text-white">{{ $stateName }} Movers</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{ $cityName }} Movers
                            </li>
                        </ol>
                    </nav>
                    <h1 class="display-4 fw-bold mb-3">{{ $cityName }} Moving Routes</h1>
                    <p class="lead mb-4">Find reliable and professional moving services in {{ $cityName }},
                        {{ $stateName }}. Get free quotes from local movers and save money on your move.</p>
                    <div class="d-flex gap-3">
                        <a href="#cost-calculator" class="btn btn-warning btn-lg">Calculate Moving Cost</a>
                        <a href="#companies" class="btn btn-outline-light btn-lg">View Local Companies</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-city fa-6x text-warning"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Moving Cost Calculator -->
    <section id="cost-calculator" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary">{{ $cityName }} Moving Cost Calculator</h2>
                    <p class="lead text-muted">Get an estimate for your {{ $cityName }} move</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">
                            <form id="costCalculator">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Moving From</label>
                                        <input type="text" class="form-control zipfrom" id="calc_from"
                                            placeholder="Enter zip code">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Moving To</label>
                                        <input type="text" class="form-control zipto" id="calc_to"
                                            placeholder="Enter zip code" value="{{ $cityZip ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Home Size</label>
                                        <select class="form-select" id="calc_size">
                                            <option value="">Select size</option>
                                            <option value="studio">Studio (1-2 rooms)</option>
                                            <option value="1br">1 Bedroom</option>
                                            <option value="2br">2 Bedroom</option>
                                            <option value="3br">3 Bedroom</option>
                                            <option value="4br">4+ Bedroom</option>
                                            <option value="office">Office/Commercial</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Moving Date</label>
                                        <input type="date" class="form-control movedate" id="calc_date">
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary btn-lg w-100"
                                            onclick="calculateCost()">Calculate Cost</button>
                                    </div>
                                </div>
                            </form>
                            <div id="costResult" class="mt-4 d-none">
                                <div class="alert alert-success">
                                    <h5 class="alert-heading">Estimated Moving Cost</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 class="text-primary" id="estimatedCost">$0</h3>
                                            <small class="text-muted">Estimated Total</small>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="text-warning" id="distance">0 miles</h5>
                                            <small class="text-muted">Distance</small>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="text-info" id="duration">0 days</h5>
                                            <small class="text-muted">Estimated Time</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Local Companies -->
    <section id="companies" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary">{{ $cityName }} Moving Companies</h2>
                    <p class="lead text-muted">Local movers serving {{ $cityName }} and surrounding areas</p>
                </div>
            </div>
            <div class="row g-4">
                @forelse($companies ?? [] as $company)
                    <div class="col-lg-6 col-md-12">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 60px; height: 60px;">
                                        <i class="fas fa-truck fa-2x text-white"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fw-bold text-primary mb-1">{{ $company->name }}</h5>
                                        <p class="text-muted small mb-2">{{ $cityName }}, {{ $stateName }}</p>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="text-warning me-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="fas fa-star{{ $i <= ($company->rating ?? 4) ? '' : '-o' }}"></i>
                                                @endfor
                                            </div>
                                            <span class="text-muted small">({{ $company->reviews_count ?? 0 }}
                                                reviews)</span>
                                        </div>
                                        <p class="text-muted small mb-3">
                                            {{ Str::limit($company->description ?? 'Professional moving services', 120) }}
                                        </p>
                                        <div class="d-flex gap-2">
                                            <a href="#" class="btn btn-outline-primary btn-sm">View Profile</a>
                                            <a href="#" class="btn btn-warning btn-sm">Get Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle fa-2x text-info mb-3"></i>
                            <h5>No companies found in {{ $cityName }}</h5>
                            <p class="mb-0">Check back soon for new moving companies in your area.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if (isset($companies) && $companies->hasPages())
                <div class="row mt-5">
                    <div class="col-12">
                        <nav aria-label="Companies pagination">
                            {{ $companies->links() }}
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Local Moving Services -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary">Local Moving Services in {{ $cityName }}</h2>
                    <p class="lead text-muted">Comprehensive moving solutions for {{ $cityName }} residents</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-home fa-2x text-white"></i>
                            </div>
                            <h5 class="fw-bold text-primary">Local Moves</h5>
                            <p class="text-muted small">Same-day and next-day moving services within {{ $cityName }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-box fa-2x text-white"></i>
                            </div>
                            <h5 class="fw-bold text-primary">Packing Services</h5>
                            <p class="text-muted small">Professional packing and unpacking services</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-warehouse fa-2x text-white"></i>
                            </div>
                            <h5 class="fw-bold text-primary">Storage Solutions</h5>
                            <p class="text-muted small">Secure storage facilities in {{ $cityName }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-tools fa-2x text-white"></i>
                            </div>
                            <h5 class="fw-bold text-primary">Furniture Assembly</h5>
                            <p class="text-muted small">Professional furniture disassembly and reassembly</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEO Content Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold text-primary mb-4">Moving Services in {{ $cityName }}, {{ $stateName }}
                    </h2>
                    <div class="content-section">
                        <p class="lead">Looking for reliable moving companies in {{ $cityName }},
                            {{ $stateName }}? Our platform connects you with local movers who understand the unique
                            challenges of moving in the {{ $cityName }} area.</p>

                        <h3 class="h4 fw-bold text-primary mt-4 mb-3">Why Choose {{ $cityName }} Movers?</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>Local
                                    Expertise:</strong> Movers familiar with {{ $cityName }} neighborhoods and
                                regulations</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>Quick
                                    Response:</strong> Fast service for local moves within {{ $cityName }}</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>Competitive
                                    Pricing:</strong> Local rates without long-distance charges</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>Community
                                    Trust:</strong> Established movers with local reputation</li>
                        </ul>

                        <h3 class="h4 fw-bold text-primary mt-4 mb-3">Popular Moving Routes from {{ $cityName }}</h3>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-primary">{{ $cityName }} → Downtown</h6>
                                        <p class="small text-muted">Local moves within city limits</p>
                                        <span class="badge bg-warning text-dark">$200-500</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-primary">{{ $cityName }} → Suburbs</h6>
                                        <p class="small text-muted">Moves to surrounding areas</p>
                                        <span class="badge bg-warning text-dark">$300-800</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h4 fw-bold text-primary mt-4 mb-3">Tips for Moving in {{ $cityName }}</h3>
                        <div class="alert alert-info">
                            <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Local Moving Tips</h5>
                            <ul class="mb-0">
                                <li>Check {{ $cityName }} parking regulations for moving trucks</li>
                                <li>Schedule moves during off-peak hours to avoid traffic</li>
                                <li>Verify building access requirements for your new location</li>
                                <li>Consider weather conditions when planning your move</li>
                            </ul>
                        </div>

                        <h3 class="h4 fw-bold text-primary mt-4 mb-3">Frequently Asked Questions</h3>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq1">
                                        How much does it cost to move within {{ $cityName }}?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Local moves in {{ $cityName }} typically cost between $200-$800 depending on
                                        the size of your home and distance. Use our cost calculator above for a more
                                        accurate estimate.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq2">
                                        How far in advance should I book a {{ $cityName }} mover?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        For local moves in {{ $cityName }}, we recommend booking 2-4 weeks in advance.
                                        During peak season (May-September), book 4-6 weeks ahead.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq3">
                                        Do {{ $cityName }} movers provide packing services?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Yes, most {{ $cityName }} moving companies offer professional packing services.
                                        This includes packing materials, labor, and unpacking at your new location.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        function calculateCost() {
            const from = document.getElementById('calc_from').value;
            const to = document.getElementById('calc_to').value;
            const size = document.getElementById('calc_size').value;
            const date = document.getElementById('calc_date').value;

            if (!from || !to || !size || !date) {
                alert('Please fill in all fields');
                return;
            }

            // Local move cost calculation
            const baseCosts = {
                'studio': 200,
                '1br': 300,
                '2br': 450,
                '3br': 600,
                '4br': 800,
                'office': 500
            };

            const baseCost = baseCosts[size] || 400;
            const distance = Math.floor(Math.random() * 50) + 5; // Local distance
            const costPerMile = 1.5;
            const totalCost = baseCost + (distance * costPerMile);
            const duration = 1; // Local moves typically same day

            document.getElementById('estimatedCost').textContent = '$' + totalCost.toLocaleString();
            document.getElementById('distance').textContent = distance + ' miles';
            document.getElementById('duration').textContent = duration + ' day';
            document.getElementById('costResult').classList.remove('d-none');
        }
    </script>
@endpush
