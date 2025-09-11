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
                    <form class="search-form" method="GET" action="{{ route('front.movers') }}">
                        <h3 class="text-center">Search Moving Companies</h3>
                        <div class="row g-3 align-items-end">
                            <div class="col-md-10">
                                <label for="q" class="form-label">Search by company, city or state</label>
                                <input type="text" name="q" id="q" class="form-control" placeholder="e.g. Allied, Miami, Texas" value="{{ request('q') }}">
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
                                    <div class="mover-logo">{{ strtoupper(substr($company->name ?? 'MC', 0, 2)) }}</div>
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
                                            @if(!empty($company->city) || !empty(optional($company->state)->code))
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
                        @if(isset($companies) && method_exists($companies, 'links'))
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
