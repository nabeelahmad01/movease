@extends('layouts.master')
@section('title', 'Write a Review for Moving Companies | MoveEase')
@section('meta_description', 'Share your moving experience and help others find the best moving companies. Write honest
    reviews for moving companies you have used.')
@section('meta_keywords', 'moving company reviews, write review, moving experience, rate movers, moving company
    feedback')
@section('canonical_url', route('front.review.create'))
@section('og_title', 'Write a Review for Moving Companies | MoveEase')
@section('og_description', 'Share your moving experience and help others find the best moving companies.')
@section('og_type', 'website')
@section('content')

    @push('styles')
        <style>
            /* Review Create Page Styles */
            .review-hero {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
                color: white;
                padding: 80px 0 60px;
                text-align: center;
            }

            .review-hero h1 {
                font-family: 'Poppins', sans-serif;
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .companies-section {
                padding: 80px 0;
                background: #f8f9fa;
            }

            .search-box {
                background: white;
                border-radius: 15px;
                padding: 2rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                margin-bottom: 3rem;
            }

            .search-input {
                border: 2px solid #e9ecef;
                border-radius: 10px;
                padding: 15px 20px;
                font-size: 1.1rem;
                transition: all 0.3s ease;
            }

            .search-input:focus {
                border-color: var(--primary-color);
                box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
            }

            .company-card {
                background: white;
                border-radius: 15px;
                padding: 2rem;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
                height: 100%;
                border: 1px solid #e9ecef;
            }

            .company-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
                border-color: var(--primary-color);
            }

            .company-logo {
                width: 80px;
                height: 80px;
                background: var(--light-bg);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                color: var(--primary-color);
                margin: 0 auto 1rem;
            }

            .company-name {
                color: var(--primary-color);
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .company-location {
                color: var(--light-text);
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }

            .rating-display {
                margin-bottom: 1rem;
            }

            .rating-display .fa-star {
                color: #ffc107;
                margin-right: 2px;
            }

            .review-count {
                color: var(--light-text);
                font-size: 0.9rem;
            }

            .btn-write-review {
                background: var(--secondary-color);
                color: white;
                border: none;
                padding: 10px 25px;
                border-radius: 25px;
                font-weight: 600;
                transition: all 0.3s ease;
                width: 100%;
            }

            .btn-write-review:hover {
                background: #c0392b;
                transform: translateY(-1px);
                color: white;
            }

            .no-companies {
                text-align: center;
                padding: 3rem;
                color: var(--light-text);
            }

            .pagination {
                justify-content: center;
                margin-top: 2rem;
            }

            .page-link {
                color: var(--primary-color);
                border-color: #dee2e6;
            }

            .page-link:hover {
                color: var(--secondary-color);
                background-color: #e9ecef;
                border-color: #dee2e6;
            }

            .page-item.active .page-link {
                background-color: var(--primary-color);
                border-color: var(--primary-color);
            }

            svg {
                width: 30px !important;
            }
        </style>
    @endpush

    <!-- Hero Section -->
    <section class="review-hero">
        <div class="container">
            <h1>Write a Review</h1>
            <p class="lead">Share your moving experience and help others make informed decisions</p>
        </div>
    </section>

    <!-- Companies Section -->
    <section class="companies-section">
        <div class="container">
            <!-- Search Box -->
            <div class="search-box">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control search-input" id="companySearch"
                                placeholder="Search for a moving company..." value="{{ request('search') }}">
                            <button class="btn btn-primary" type="button" onclick="searchCompanies()">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>

                        <!-- Advanced Filters -->
                        <div class="row g-3">
                            <div class="col-md-3">
                                <select class="form-select" id="stateFilter">
                                    <option value="">All States</option>
                                    @foreach ($companies->unique('state_id')->pluck('state')->filter() as $state)
                                        <option value="{{ $state->name }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="ratingFilter">
                                    <option value="">All Ratings</option>
                                    <option value="5">5 Stars</option>
                                    <option value="4">4+ Stars</option>
                                    <option value="3">3+ Stars</option>
                                    <option value="2">2+ Stars</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="sortFilter">
                                    <option value="name">Sort by Name</option>
                                    <option value="rating">Sort by Rating</option>
                                    <option value="reviews">Sort by Reviews</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-outline-secondary w-100" onclick="clearFilters()">
                                    <i class="fas fa-times"></i> Clear Filters
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Companies Grid -->
            <div class="row g-4" id="companiesGrid">
                @forelse($companies as $company)
                    <div class="col-lg-4 col-md-6 company-item" data-name="{{ strtolower($company->name) }}"
                        data-location="{{ strtolower($company->city ?? '') }} {{ strtolower($company->state->name ?? '') }}"
                        data-rating="{{ $company->reviews->avg('rating') ?? 0 }}"
                        data-review-count="{{ $company->reviews->count() }}">
                        <div class="company-card">
                            <div class="company-logo">
                                {{ strtoupper(substr($company->name, 0, 2)) }}
                            </div>

                            <h5 class="company-name">{{ $company->name }}</h5>

                            <div class="company-location">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $company->city ?? 'N/A' }}, {{ $company->state->name ?? 'N/A' }}
                            </div>

                            <div class="rating-display">
                                @php
                                    $avgRating = $company->reviews->avg('rating') ?? 0;
                                    $reviewCount = $company->reviews->count();
                                @endphp

                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $avgRating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor

                                <span class="review-count">({{ $reviewCount }} reviews)</span>
                            </div>

                            <p class="text-muted small">
                                {{ Str::limit($company->description ?? 'Professional moving services', 100) }}</p>

                            <a href="{{ route('front.review.form', $company->slug) }}" class="btn btn-write-review">
                                <i class="fas fa-pen"></i> Write Review
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-companies">
                            <i class="fas fa-search fa-3x mb-3"></i>
                            <h4>No companies found</h4>
                            <p>Try adjusting your search criteria</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($companies->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $companies->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </section>

    @push('scripts')
        <script>
            function searchCompanies() {
                const searchTerm = document.getElementById('companySearch').value.toLowerCase();
                const companies = document.querySelectorAll('.company-item');
                let visibleCount = 0;

                companies.forEach(company => {
                    const name = company.dataset.name;
                    const location = company.dataset.location;

                    if (name.includes(searchTerm) || location.includes(searchTerm) || searchTerm === '') {
                        company.style.display = 'block';
                        visibleCount++;
                    } else {
                        company.style.display = 'none';
                    }
                });

                // Show/hide no results message
                const noResults = document.querySelector('.no-companies');
                if (visibleCount === 0 && searchTerm !== '') {
                    if (!noResults) {
                        const noResultsHtml = `
                <div class="col-12">
                    <div class="no-companies">
                        <i class="fas fa-search fa-3x mb-3"></i>
                        <h4>No companies found</h4>
                        <p>Try adjusting your search criteria</p>
                    </div>
                </div>
            `;
                        document.getElementById('companiesGrid').insertAdjacentHTML('beforeend', noResultsHtml);
                    }
                } else if (noResults && visibleCount > 0) {
                    noResults.parentElement.remove();
                }
            }

            // Search on Enter key
            document.getElementById('companySearch').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchCompanies();
                }
            });

            // Real-time search
            document.getElementById('companySearch').addEventListener('input', function() {
                searchCompanies();
            });

            // Filter functionality
            document.getElementById('stateFilter').addEventListener('change', applyFilters);
            document.getElementById('ratingFilter').addEventListener('change', applyFilters);
            document.getElementById('sortFilter').addEventListener('change', applyFilters);

            function applyFilters() {
                const stateFilter = document.getElementById('stateFilter').value.toLowerCase();
                const ratingFilter = document.getElementById('ratingFilter').value;
                const sortFilter = document.getElementById('sortFilter').value;
                const companies = Array.from(document.querySelectorAll('.company-item'));

                // Filter companies
                let filteredCompanies = companies.filter(company => {
                    const location = company.dataset.location;
                    const rating = parseFloat(company.dataset.rating);

                    // State filter
                    if (stateFilter && !location.includes(stateFilter)) {
                        return false;
                    }

                    // Rating filter
                    if (ratingFilter && rating < parseFloat(ratingFilter)) {
                        return false;
                    }

                    return true;
                });

                // Hide all companies first
                companies.forEach(company => company.style.display = 'none');

                // Sort filtered companies
                filteredCompanies.sort((a, b) => {
                    switch (sortFilter) {
                        case 'rating':
                            return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
                        case 'reviews':
                            return parseInt(b.dataset.reviewCount) - parseInt(a.dataset.reviewCount);
                        case 'name':
                        default:
                            return a.dataset.name.localeCompare(b.dataset.name);
                    }
                });

                // Show filtered and sorted companies
                filteredCompanies.forEach((company, index) => {
                    company.style.display = 'block';
                    company.style.order = index;
                });
            }

            function clearFilters() {
                document.getElementById('companySearch').value = '';
                document.getElementById('stateFilter').value = '';
                document.getElementById('ratingFilter').value = '';
                document.getElementById('sortFilter').value = 'name';

                const companies = document.querySelectorAll('.company-item');
                companies.forEach(company => {
                    company.style.display = 'block';
                    company.style.order = '';
                });
            }
        </script>
    @endpush

@endsection
