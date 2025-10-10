@extends('layouts.master')
@section('title', 'Find Professional Movers | MoveEase')
@section('content')

    <!-- SEO Schema Markup -->
    @php
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => "Find Professional Movers | MoveEase",
        "description" => "Browse our directory of professional, FMCSA verified moving companies. Compare ratings, read reviews, and find the perfect mover for your interstate relocation needs.",
        "url" => route('front.movers'),
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
                        "@id" => route('front.movers'),
                        "name" => "Moving Companies"
                    ]
                ]
            ]
        ],
        "mainEntity" => [
            "@type" => "ItemList",
            "name" => "Moving Companies Directory",
            "description" => "Directory of professional FMCSA verified moving companies for interstate moves"
        ]
    ];
    @endphp

    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    @push('styles')
        <link href="{{ asset('assets/css/movers.css') }}" rel="stylesheet">
        <style>
            /* Movers Page Styles */

/* Hero Section */
.movers-hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 100px 0 80px;
    position: relative;
    overflow: hidden;
}

.movers-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    opacity: 0.3;
}

.movers-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.movers-hero h1 {
    font-family: var(--heading-font);
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.movers-hero p {
    font-size: 1.25rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

/* Search Section */
.movers-search {
    background: white;
    padding: 60px 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.search-form {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: 1px solid #e9ecef;
}

.search-form h3 {
    color: var(--primary-color);
    margin-bottom: 30px;
    font-family: var(--heading-font);
}

.form-group {
    margin-bottom: 25px;
}

.form-label {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 8px;
}

.form-control {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 12px 16px;
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
}

/* Movers Grid */
.movers-content {
    padding: 80px 0;
    background: #f8f9fa;
}

.movers-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.mover-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.mover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.mover-header {
    padding: 25px;
    border-bottom: 1px solid #e9ecef;
}

.mover-logo {
    width: 60px;
    height: 60px;
    background: var(--primary-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 15px;
}

.mover-name {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 8px;
    font-family: var(--heading-font);
}

.mover-rating {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.star-rating {
    color: #ffc107;
}

.rating-score {
    font-weight: 600;
    color: var(--text-dark);
}

.rating-count {
    color: #6c757d;
    font-size: 0.9rem;
}

.mover-badges {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.badge {
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.badge-verified {
    background: #d4edda;
    color: #155724;
}

.badge-licensed {
    background: #cce5ff;
    color: #004085;
}

.mover-body {
    padding: 25px;
}

.mover-services {
    margin-bottom: 20px;
}

.mover-services h6 {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 10px;
}

.service-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.service-tag {
    background: #f8f9fa;
    color: var(--text-dark);
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 0.85rem;
    border: 1px solid #e9ecef;
}

.mover-location {
    color: #6c757d;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.mover-actions {
    display: flex;
    gap: 10px;
}

.btn-outline-primary {
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    font-weight: 600;
    padding: 10px 20px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-outline-primary:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

/* Filters Sidebar */
.filters-sidebar {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    height: fit-content;
    position: sticky;
    top: 100px;
}

.filter-section {
    margin-bottom: 30px;
    padding-bottom: 25px;
    border-bottom: 1px solid #e9ecef;
}

.filter-section:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.filter-title {
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 15px;
    font-family: var(--heading-font);
}

.filter-options {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.form-check {
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-check-input {
    margin: 0;
}

.form-check-label {
    margin: 0;
    cursor: pointer;
}

/* Pagination */
.movers-pagination {
    margin-top: 50px;
    display: flex;
    justify-content: center;
}

.pagination {
    display: flex;
    gap: 10px;
    align-items: center;
}
svg{
    width: 30px !important;
}
.page-link {
    padding: 10px 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.page-link:hover,
.page-link.active {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
}

/* Responsive Design */
@media (max-width: 768px) {
    .movers-hero h1 {
        font-size: 2.5rem;
    }
    
    .search-form {
        padding: 25px;
    }
    
    .movers-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .filters-sidebar {
        position: static;
        margin-bottom: 30px;
    }
    
    .mover-actions {
        flex-direction: column;
    }
}

@media (max-width: 576px) {
    .movers-hero {
        padding: 60px 0 40px;
    }
    
    .movers-hero h1 {
        font-size: 2rem;
    }
    
    .mover-header,
    .mover-body {
        padding: 20px;
    }
}
 .no_logo {
     font-size: 18px;
     text-align: center;
 }
        </style>
    @endpush

    <!-- Hero Section -->
    <section class="movers-hero">
        <div class="container">
            <div class="movers-hero-content">
                <h1>Find Professional Movers</h1>
                <p>Compare verified moving companies and get the best quotes for your move</p>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="movers-search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form class="search-form" method="GET" action="{{ route('front.movers') }}">
                        <h3 class="text-center">Search Moving Companies</h3>
                        <div class="row g-3 align-items-end">
                            <div class="col-md-10">
                                <label for="q" class="form-label">Search by company, city or state</label>
                                <input type="text" name="q" id="q" class="form-control"
                                    placeholder="e.g. Allied, Miami, Texas" value="{{ request('q') }}">
                            </div>
                            <div class="col-md-2 text-md-end text-center">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-search me-2"></i>Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Movers Content -->
    <section class="movers-content">
        <div class="container">
            <div class="row">
                <!-- Filters Sidebar -->
                <div class="col-lg-3">
                    <div class="filters-sidebar">
                        <div class="filter-section">
                            <h5 class="filter-title">Services</h5>
                            <div class="filter-options">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="local-moving">
                                    <label class="form-check-label" for="local-moving">Local Moving</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="long-distance">
                                    <label class="form-check-label" for="long-distance">Long Distance</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="packing">
                                    <label class="form-check-label" for="packing">Packing Services</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="storage">
                                    <label class="form-check-label" for="storage">Storage</label>
                                </div>
                            </div>
                        </div>

                        <div class="filter-section">
                            <h5 class="filter-title">Rating</h5>
                            <div class="filter-options">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rating-5">
                                    <label class="form-check-label" for="rating-5">
                                        <span class="star-rating">★★★★★</span> 5 Stars
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rating-4">
                                    <label class="form-check-label" for="rating-4">
                                        <span class="star-rating">★★★★</span> 4+ Stars
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rating-3">
                                    <label class="form-check-label" for="rating-3">
                                        <span class="star-rating">★★★</span> 3+ Stars
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="filter-section">
                            <h5 class="filter-title">Verification</h5>
                            <div class="filter-options">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="verified">
                                    <label class="form-check-label" for="verified">FMCSA Verified</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="licensed">
                                    <label class="form-check-label" for="licensed">Licensed & Insured</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Movers Grid -->
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Available Moving Companies</h2>
                    </div>

                    <div class="movers-grid">
                        @forelse($companies ?? [] as $company)
                            <div class="mover-card">
                                <div class="mover-header">
                                    <div class="mover-logo">
                                        @if ($company->logo)
                                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo"
                                                style="width:100px; height:auto;">
                                        @else
                                            <span>No Logo</span>
                                        @endif
                                    </div>
                                    <h4 class="mover-name">{{ $company->name ?? 'Professional Moving Company' }}</h4>
                                    <div class="mover-rating">
                                        <div class="star-rating">
                                            @php $avg = (float)($company->reviews_avg_rating ?? 0); @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star{{ $i <= round($avg) ? '' : '-o' }}"></i>
                                            @endfor
                                        </div>
                                        <span class="rating-score">{{ number_format($avg, 1) }}</span>
                                        <span class="rating-count">({{ $company->reviews_count ?? 0 }} reviews)</span>
                                    </div>
                                    <div class="mover-badges">
                                        @if ($company->is_verified ?? true)
                                            <span class="badge badge-verified">
                                                <i class="fas fa-check-circle me-1"></i>FMCSA Verified
                                            </span>
                                        @endif
                                        @if ($company->is_licensed ?? true)
                                            <span class="badge badge-licensed">
                                                <i class="fas fa-shield-alt me-1"></i>Licensed
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mover-body">
                                    <div class="mover-services">
                                        <h6>Services Offered</h6>
                                        <div class="service-list">
                                            <span class="service-tag">Long Distance</span>
                                            <span class="service-tag">Local Moving</span>
                                            <span class="service-tag">Packing</span>
                                            <span class="service-tag">Storage</span>
                                        </div>
                                    </div>
                                    <div class="mover-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>
                                            @if (!empty($company->city) || !empty(optional($company->state)->code))
                                                {{ trim(($company->city ?? '') . (isset($company->state) ? ', ' . $company->state->code : ''), ', ') }}
                                            @else
                                                Nationwide Service
                                            @endif
                                        </span>
                                    </div>
                                    <div class="mover-actions">
                                        <a href="{{ route('front.company.profile', $company->slug) }}"
                                            class="btn btn-outline-primary flex-fill">
                                            View Profile
                                        </a>
                                        <a href="/get-quote?company={{ $company->id ?? 1 }}"
                                            class="btn btn-primary flex-fill">
                                            Get Quote
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <!-- Default Companies -->
                            <div class="mover-card">
                                <div class="mover-header">
                                    <div class="mover-logo">AM</div>
                                    <h4 class="mover-name">Allied Moving Services</h4>
                                    <div class="mover-rating">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-score">4.8</span>
                                        <span class="rating-count">(142 reviews)</span>
                                    </div>
                                    <div class="mover-badges">
                                        <span class="badge badge-verified">
                                            <i class="fas fa-check-circle me-1"></i>FMCSA Verified
                                        </span>
                                        <span class="badge badge-licensed">
                                            <i class="fas fa-shield-alt me-1"></i>Licensed
                                        </span>
                                    </div>
                                </div>
                                <div class="mover-body">
                                    <div class="mover-services">
                                        <h6>Services Offered</h6>
                                        <div class="service-list">
                                            <span class="service-tag">Long Distance</span>
                                            <span class="service-tag">Local Moving</span>
                                            <span class="service-tag">Packing</span>
                                            <span class="service-tag">Storage</span>
                                        </div>
                                    </div>
                                    <div class="mover-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Nationwide Service</span>
                                    </div>
                                    <div class="mover-actions">
                                        <a href="#" class="btn btn-outline-primary flex-fill">View Profile</a>
                                        <a href="/get-quote" class="btn btn-primary flex-fill">Get Quote</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mover-card">
                                <div class="mover-header">
                                    <div class="mover-logo">NV</div>
                                    <h4 class="mover-name">North Van Lines</h4>
                                    <div class="mover-rating">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-o"></i>
                                        </div>
                                        <span class="rating-score">4.6</span>
                                        <span class="rating-count">(89 reviews)</span>
                                    </div>
                                    <div class="mover-badges">
                                        <span class="badge badge-verified">
                                            <i class="fas fa-check-circle me-1"></i>FMCSA Verified
                                        </span>
                                        <span class="badge badge-licensed">
                                            <i class="fas fa-shield-alt me-1"></i>Licensed
                                        </span>
                                    </div>
                                </div>
                                <div class="mover-body">
                                    <div class="mover-services">
                                        <h6>Services Offered</h6>
                                        <div class="service-list">
                                            <span class="service-tag">Interstate</span>
                                            <span class="service-tag">Commercial</span>
                                            <span class="service-tag">Packing</span>
                                        </div>
                                    </div>
                                    <div class="mover-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>East Coast Coverage</span>
                                    </div>
                                    <div class="mover-actions">
                                        <a href="#" class="btn btn-outline-primary flex-fill">View Profile</a>
                                        <a href="/get-quote" class="btn btn-primary flex-fill">Get Quote</a>
                                    </div>
                                </div>
                            </div>

                            <div class="mover-card">
                                <div class="mover-header">
                                    <div class="mover-logo">UM</div>
                                    <h4 class="mover-name">United Moving Express</h4>
                                    <div class="mover-rating">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-score">4.9</span>
                                        <span class="rating-count">(203 reviews)</span>
                                    </div>
                                    <div class="mover-badges">
                                        <span class="badge badge-verified">
                                            <i class="fas fa-check-circle me-1"></i>FMCSA Verified
                                        </span>
                                        <span class="badge badge-licensed">
                                            <i class="fas fa-shield-alt me-1"></i>Licensed
                                        </span>
                                    </div>
                                </div>
                                <div class="mover-body">
                                    <div class="mover-services">
                                        <h6>Services Offered</h6>
                                        <div class="service-list">
                                            <span class="service-tag">Long Distance</span>
                                            <span class="service-tag">Full Service</span>
                                            <span class="service-tag">Storage</span>
                                            <span class="service-tag">Auto Transport</span>
                                        </div>
                                    </div>
                                    <div class="mover-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Nationwide Service</span>
                                    </div>
                                    <div class="mover-actions">
                                        <a href="#" class="btn btn-outline-primary flex-fill">View Profile</a>
                                        <a href="/get-quote" class="btn btn-primary flex-fill">Get Quote</a>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="movers-pagination">
                        @if (isset($companies) && method_exists($companies, 'links'))
                            <div class="d-flex justify-content-center mb-2">
                                {!! $companies->withQueryString()->links() !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
