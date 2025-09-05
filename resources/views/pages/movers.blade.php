@extends('layouts.master')
@section('title', 'Find Professional Movers | MoveEase')
@section('content')

@push('styles')
<link href="{{ asset('assets/css/movers.css') }}" rel="stylesheet">
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
                <form class="search-form">
                    <h3 class="text-center">Search Moving Companies</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="origin" class="form-label">Moving From</label>
                                <input type="text" class="form-control zipfrom" id="origin" placeholder="Enter city or ZIP code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="destination" class="form-label">Moving To</label>
                                <input type="text" class="form-control zipto" id="destination" placeholder="Enter city or ZIP code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="move_date" class="form-label">Move Date</label>
                                <input type="date" class="form-control movedate" id="move_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="home_size" class="form-label">Home Size</label>
                                <select class="form-control" id="home_size">
                                    <option value="">Select home size</option>
                                    <option value="studio">Studio</option>
                                    <option value="1-bedroom">1 Bedroom</option>
                                    <option value="2-bedroom">2 Bedroom</option>
                                    <option value="3-bedroom">3 Bedroom</option>
                                    <option value="4-bedroom">4+ Bedroom</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-search me-2"></i>Search Movers
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
                    <div class="results-count text-muted">
                        Showing {{ $companies->count() ?? 12 }} of {{ $companies->total() ?? 156 }} companies
                    </div>
                </div>

                <div class="movers-grid">
                    @forelse($companies ?? [] as $company)
                    <div class="mover-card">
                        <div class="mover-header">
                            <div class="mover-logo">{{ substr($company->name ?? 'MC', 0, 2) }}</div>
                            <h4 class="mover-name">{{ $company->name ?? 'Professional Moving Company' }}</h4>
                            <div class="mover-rating">
                                <div class="star-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star{{ $i <= ($company->average_rating ?? 4.5) ? '' : '-o' }}"></i>
                                    @endfor
                                </div>
                                <span class="rating-score">{{ number_format($company->average_rating ?? 4.5, 1) }}</span>
                                <span class="rating-count">({{ $company->reviews_count ?? rand(50, 200) }} reviews)</span>
                            </div>
                            <div class="mover-badges">
                                @if($company->is_verified ?? true)
                                <span class="badge badge-verified">
                                    <i class="fas fa-check-circle me-1"></i>FMCSA Verified
                                </span>
                                @endif
                                @if($company->is_licensed ?? true)
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
                                <span>{{ $company->location ?? 'Nationwide Service' }}</span>
                            </div>
                            <div class="mover-actions">
                                <a href="/company/{{ $company->slug ?? strtolower(str_replace(' ', '-', $company->name ?? 'company')) }}" class="btn btn-outline-primary flex-fill">
                                    View Profile
                                </a>
                                <a href="/get-quote?company={{ $company->id ?? 1 }}" class="btn btn-primary flex-fill">
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
                    <div class="pagination">
                        <a href="#" class="page-link">Previous</a>
                        <a href="#" class="page-link active">1</a>
                        <a href="#" class="page-link">2</a>
                        <a href="#" class="page-link">3</a>
                        <a href="#" class="page-link">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
