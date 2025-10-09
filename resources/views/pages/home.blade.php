@extends('layouts.master')
@section('title', 'Best Interstate Moving Companies - MoveEase')
@section('meta_description', 'Find trusted FMCSA verified interstate moving companies. Compare quotes, read reviews, and
    book the best long-distance movers for your relocation needs.')
@section('meta_keywords', 'interstate moving companies, long distance movers, FMCSA verified movers, moving quotes,
    professional movers, cross country moving')
@section('canonical_url', route('front.home'))
@section('og_title', 'Best Interstate Moving Companies - MoveEase')
@section('og_description', 'Find trusted FMCSA verified interstate moving companies. Compare quotes, read reviews, and
    book the best long-distance movers.')
@section('og_type', 'website')
@section('content')



    @push('styles')
        <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
        <style>
            
body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
    color: var(--dark-text);
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-weight: 600;
}

/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 120px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.05"><polygon points="1000,100 1000,0 0,100"/></svg>');
    background-size: cover;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-section h1 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.hero-section p {
    font-size: 1.3rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.hero-section .btn {
    padding: 15px 30px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 50px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.hero-section .btn-warning {
    background: var(--accent-color);
    border: none;
    box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
}

.hero-section .btn-warning:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(16, 185, 129, 0.6);
    background: #059669;
}

/* Search Form */
.search-form {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    margin-top: 3rem;
    position: relative;
    z-index: 3;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Quote Form */
.quote-form {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    margin-top: -50px;
    position: relative;
    z-index: 3;
}

.search-form .form-control,
.search-form .form-select,
.quote-form .form-control,
.quote-form .form-select {
    border-radius: 12px;
    border: 2px solid #e2e8f0;
    padding: 14px 18px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.9);
}

.search-form .form-control:focus,
.search-form .form-select:focus,
.quote-form .form-control:focus,
.quote-form .form-select:focus {
    border-color: var(--secondary-color);
    box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.15);
    background: white;
}

.search-form .btn-primary,
.quote-form .btn-primary {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    border: none;
    padding: 14px 32px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
}

.search-form .btn-primary:hover,
.quote-form .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(30, 58, 138, 0.4);
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
}

/* Features Section */
.features-section {
    padding: 80px 0;
    background: var(--light-bg);
}

.feature-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.feature-card .icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2rem;
    color: white;
}

.feature-card h4 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.feature-card p {
    color: var(--light-text);
    line-height: 1.6;
}

/* Companies Section */
.companies-section {
    padding: 80px 0;
}

.company-card {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    height: 100%;
    cursor: pointer;
}

.company-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
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
}

.company-card h5 {
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.rating {
    margin-bottom: 1rem;
}

.rating .fa-star {
    color: var(--accent-color);
    margin-right: 2px;
}

.company-card .btn-outline-primary {
    border-color: var(--primary-color);
    color: var(--primary-color);
    border-radius: 25px;
    padding: 8px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.company-card .btn-outline-primary:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
    transform: translateY(-1px);
}

/* Reviews Section */
.reviews-section {
    padding: 80px 0;
    background: var(--light-bg);
}

.review-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    height: 100%;
}

.review-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.reviewer-info {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.reviewer-avatar {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    margin-right: 1rem;
}

.reviewer-name {
    font-weight: 600;
    color: var(--primary-color);
}

.review-text {
    color: var(--light-text);
    font-style: italic;
    line-height: 1.6;
}

/* CTA Section */
.cta-section {
    padding: 80px 0;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    text-align: center;
}

.cta-section h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.cta-section p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.cta-section .btn {
    padding: 15px 40px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 50px;
    transition: all 0.3s ease;
}

/* Media Logos */
.media-logos {
    margin-top: 3rem;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2rem;
    flex-wrap: wrap;
}

.media-logo {
    font-size: 2rem;
    color: rgba(255, 255, 255, 0.6);
    transition: all 0.3s ease;
}

.media-logo:hover {
    color: rgba(255, 255, 255, 0.9);
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-section h1 {
        font-size: 2.5rem;
    }
    
    .hero-section p {
        font-size: 1.1rem;
    }
    
    .search-form,
    .quote-form {
        margin-top: 2rem;
        padding: 1.5rem;
    }
    
    .feature-card,
    .company-card,
    .review-card {
        margin-bottom: 2rem;
    }
    
    .media-logos {
        gap: 1rem;
        margin-top: 2rem;
    }
    
    .media-logo {
        font-size: 1.5rem;
    }
}

        </style>
    @endpush

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Top Interstate Moving Companies</h1>
                <p class="lead">Compare FMCSA Verified Movers (2025)</p>
                {{-- <p class="mb-4">Looking for trusted long-distance movers? MoveEase helps you compare and book the best long-distance and interstate moving companies in the USA. All movers are FMCSA verified, reviewed by real customers, and rated to make your move stress-free and affordable.</p> --}}

                <div class="search-form">
                    <form id="quoteForm">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label text-muted">Moving From*</label>
                                <input type="text" class="form-control zipfrom" id="zip_from"
                                    placeholder="Enter ZIP or City" autocomplete="off">
                                <div class="form-text" id="zip_from_suggestion"></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">Moving To*</label>
                                <input type="text" class="form-control zipto" id="zip_to"
                                    placeholder="Enter ZIP or City" autocomplete="off">
                                <div class="form-text" id="zip_to_suggestion"></div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label text-muted">Moving Date</label>
                                <input type="text" class="form-control movedate" id="move_date" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100" id="getQuoteBtn">
                                    <i class="fas fa-calculator me-2"></i>Get Moving Cost Calculator
                                </button>
                            </div>
                        </div>
                    </form>
                    <p class="text-muted mt-3 mb-0">
                        <i class="fas fa-shield-alt me-1"></i>
                        All movers are licensed & insured for long-distance moves
                    </p>
                </div>

                <div class="media-logos">
                    <i class="fab fa-google media-logo"></i>
                    <i class="fab fa-microsoft media-logo"></i>
                    <i class="fab fa-amazon media-logo"></i>
                    <i class="fab fa-apple media-logo"></i>
                    <i class="fab fa-yahoo media-logo"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Routes CTA Section -->
    <section class="cta-section mt-5">
        <div class="container text-center">
            <h3 class="mb-3">Plan State-to-State or City-to-City</h3>
            <p class="mb-4">Browse routes with costs, distance, and movers. Start with your state.</p>
            <a href="{{ route('front.routes.index') }}" class="btn btn-outline-light btn-lg">
                <i class="fas fa-route me-2"></i>Explore Routes
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-5 fw-bold mb-3">Why People Trust Us With Their Long-Distance Moves</h2>
                    <p class="lead">When you're planning a local or state move, you want movers you can trust. That's why
                        MoveEase is built on real reviews, up-to-date ratings, and accurate nationwide moving data.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-star-of-life"></i>
                        </div>
                        <h5>Verified Reviews</h5>
                        <p>Every review comes from real customers who've completed a long-distance move – no fake feedback.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h5>Always Fresh Info</h5>
                        <p>Our database and prices are updated often, so you see the latest data every time.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5>Your Moving Companion</h5>
                        <p>We guide you with tools, tips, and checklists to make your move smooth and successful.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h5>Compare with Confidence</h5>
                        <p>Line up all your options side by side and pick the best licensed mover for your needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container text-center">
            <h3 class="mb-3">Ready to get your quotes?</h3>
            <p class="mb-4">Compare trusted long-distance movers now.</p>
            <a href="{{ route('front.get.quote') ?? '/get-quote' }}" class="btn btn-outline-light btn-lg">Compare & Get Free
                Quotes</a>
        </div>
    </div>

    <!-- Reviews Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 display-5 fw-bold">Latest Interstate Movers' Reviews</h2>

            <div class="row g-4">
                @forelse($reviews as $review)
                    <div class="col-lg-6">
                        <div class="review-card"
                            onclick="window.location.href='/company/{{ $review->company->slug ?? strtolower(str_replace(' ', '-', $review->company->name ?? 'company')) }}'">
                            <div class="d-flex align-items-center mb-3">
                                <div class="company-logo me-3">{{ substr($review->company->name ?? 'Company', 0, 2) }}</div>
                                <div>
                                    <h6 class="mb-1">{{ $review->company->name ?? 'Moving Company' }} <i
                                            class="fas fa-check-circle text-primary"></i></h6>
                                    <div class="star-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                        @endfor
                                        <span class="ms-2">{{ number_format($review->rating, 1) }}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-3">
                                "{{ Str::limit($review->review ?? ($review->comment ?? 'Excellent service! Professional movers with great customer satisfaction.'), 200) }}"
                            </p>
                            <div class="d-flex justify-content-between text-muted small">
                                <span><i
                                        class="fas fa-user me-1"></i>{{ $review->name ?? ($review->user_name ?? 'Anonymous') }}</span>
                                <span><i class="fas fa-calendar me-1"></i>{{ $review->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-6">
                        <div class="review-card">
                            <div class="d-flex align-items-center mb-3">
                                <div class="company-logo me-3">BR</div>
                                <div>
                                    <h6 class="mb-1">Budget Relocators <i class="fas fa-check-circle text-primary"></i>
                                    </h6>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="ms-2">4.8</span>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-3">"Excellent service! The company handled my family move and was ready to move
                                our things on time without damage. Highly recommend!"</p>
                            <div class="d-flex justify-content-between text-muted small">
                                <span><i class="fas fa-user me-1"></i>Sarah Johnson</span>
                                <span><i class="fas fa-calendar me-1"></i>2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="review-card">
                            <div class="d-flex align-items-center mb-3">
                                <div class="company-logo me-3">SM</div>
                                <div>
                                    <h6 class="mb-1">Swift Movers & Storage <i
                                            class="fas fa-check-circle text-primary"></i></h6>
                                    <div class="star-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="ms-2">4.2</span>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-3">"Professional team that handled our cross-country move from Chicago to
                                Dallas. They were efficient, careful, and kept me informed throughout."</p>
                            <div class="d-flex justify-content-between text-muted small">
                                <span><i class="fas fa-user me-1"></i>Mike Davis</span>
                                <span><i class="fas fa-calendar me-1"></i>1 week ago</span>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('front.review.create') }}" class="btn btn-primary">Read All Reviews</a>
            </div>
        </div>
    </section>

    <!-- Featured Companies Section -->
    @if ($featuredCompanies->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5 display-5 fw-bold">Featured Moving Companies</h2>

                <div class="row g-4">
                    @foreach ($featuredCompanies as $company)
                        <div class="col-lg-4 col-md-6">
                            <div class="company-card h-100">
                                <div class="company-header">
                                    <div class="company-logo">
                                        {{ substr($company->name, 0, 2) }}
                                    </div>
                                    <div class="company-info">
                                        <h5>{{ $company->name }}</h5>
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fas fa-star {{ $i <= ($company->reviews_avg_rating ?? 4.5) ? 'text-warning' : 'text-muted' }}"></i>
                                            @endfor
                                            <span
                                                class="ms-2">{{ number_format($company->reviews_avg_rating ?? 4.5, 1) }}</span>
                                            <small class="text-muted">({{ $company->reviews_count ?? 0 }} reviews)</small>
                                        </div>
                                    </div>
                                </div>
                                <p class="company-description">
                                    {{ Str::limit($company->description ?? 'Professional moving services with excellent customer satisfaction.', 120) }}
                                </p>
                                <div class="company-badges">
                                    @if ($company->is_verified)
                                        <span class="badge bg-success">Verified</span>
                                    @endif
                                    @if ($company->license_number)
                                        <span class="badge bg-primary">Licensed</span>
                                    @endif
                                    <span class="badge bg-info">Insured</span>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('front.company.profile', $company->slug) }}"
                                        class="btn btn-outline-primary w-100">View Company</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Top Movers Section -->
    @if ($topMovers->count() > 0)
        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 display-5 fw-bold">Top Rated Movers</h2>

                <div class="row g-4">
                    @foreach ($topMovers as $mover)
                        <div class="col-lg-4 col-md-6">
                            <div class="mover-card h-100">
                                <div class="mover-header">
                                    <div class="mover-logo">
                                        <i class="fas fa-truck-moving"></i>
                                    </div>
                                    <div class="mover-info">
                                        <h5>{{ $mover->company->name ?? $mover->company_name }}</h5>
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fas fa-star {{ $i <= ($mover->company->reviews_avg_rating ?? 4.5) ? 'text-warning' : 'text-muted' }}"></i>
                                            @endfor
                                            <span
                                                class="ms-2">{{ number_format($mover->company->reviews_avg_rating ?? 4.5, 1) }}</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="mover-description">
                                    {{ $mover->description ?? 'Professional moving services with excellent customer satisfaction.' }}
                                </p>
                                <div class="mover-features">
                                    <span class="badge bg-primary">Licensed</span>
                                    <span class="badge bg-success">Insured</span>
                                    <span class="badge bg-info">FMCSA Verified</span>
                                </div>
                                <a href="{{ $mover->company ? route('front.company.profile', $mover->company->slug) : '#' }}"
                                    class="btn btn-outline-primary w-100 mt-3">View Company</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Review CTA Section -->
    <section class="cta-section" style="background: linear-gradient(135deg, var(--accent-color) 0%, #e67e22 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3>Write A Review. Share Your Long-Distance Moving Story.</h3>
                    <p class="mb-0">Your honest review helps future thousands of people choosing the best licensed
                        long-distance and interstate movers, qualified companies.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="/reviews/create" class="btn btn-outline-light">Share a Review</a>
                </div>
            </div>
        </div>
    </section>

    @php
        $homeFaqs = [
            [
                'question' => 'How do I find reliable moving companies?',
                'answer' =>
                    'Use MoveEase to compare FMCSA-verified moving companies. Check their ratings, read real customer reviews, and get multiple quotes to find the best fit for your needs and budget.',
            ],
            [
                'question' => 'How much does it cost to hire movers?',
                'answer' =>
                    'Moving costs vary based on distance, size of move, services needed, and time of year. Local moves typically cost $80-120/hour, while long-distance moves are priced by weight and distance. Get free quotes for accurate pricing.',
            ],
            [
                'question' => 'When should I book my moving company?',
                'answer' =>
                    'Book your movers 4-8 weeks in advance, especially during peak season (May-September). For last-minute moves, some companies offer same-day or next-day service, though options may be limited.',
            ],
            [
                'question' => 'What should I look for in a moving company?',
                'answer' =>
                    'Verify FMCSA licensing, check insurance coverage, read customer reviews, get written estimates, and ensure they conduct in-home surveys for accurate quotes. Avoid companies that demand large upfront payments.',
            ],
            [
                'question' => 'Do I need to tip my movers?',
                'answer' =>
                    'Tipping is customary but not required. A typical tip is $20-40 per mover for local moves, or 5-10% of the total cost for long-distance moves, depending on service quality.',
            ],
            [
                'question' => 'What items will not movers transport?',
                'answer' =>
                    'Movers typically will not transport hazardous materials, perishables, plants, pets, important documents, jewelry, or items of sentimental value. Check with your mover for their specific prohibited items list.',
            ],
        ];
    @endphp

    @include('components.faq-section', ['faqs' => $homeFaqs, 'title' => 'Moving Questions & Answers'])

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2>Ready to Start Your Move?</h2>
                    <p class="lead mb-4">Get free quotes from verified moving companies in your area</p>
                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                        <a href="{{ route('front.get.quote') }}" class="btn btn-warning btn-lg">Get Free Quote</a>
                        <a href="{{ route('front.movers') }}" class="btn btn-outline-light btn-lg">Browse Companies</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- States Section -->
    <section class="states-section">
        <div class="container">
            <h2 class="text-center mb-5 display-5 fw-bold">Explore Cross-Country Movers</h2>

            <div class="row">
                @php
                    $statesData = [
                        'arizona' => [
                            'name' => 'Arizona',
                            'routes' => [
                                'Movers Phoenix to Tucson',
                                'Movers Mesa to Long Beach',
                                'Movers Mesa to Riverside',
                                'Movers Tempe to Ontario',
                                'Movers Phoenix to Los Angeles',
                                'Movers Tucson to Moreno Valley',
                            ],
                        ],
                        'california' => [
                            'name' => 'California',
                            'routes' => [
                                'Movers Los Angeles to San Francisco',
                                'Movers San Diego to Sacramento',
                                'Movers Oakland to San Jose',
                                'Movers Fresno to Long Beach',
                            ],
                        ],
                        'illinois' => [
                            'name' => 'Illinois',
                            'routes' => [
                                'Movers Chicago to Springfield',
                                'Movers Aurora to Rockford',
                                'Movers Joliet to Naperville',
                                'Movers Peoria to Elgin',
                            ],
                        ],
                        'massachusetts' => [
                            'name' => 'Massachusetts',
                            'routes' => [
                                'Movers Boston to Worcester',
                                'Movers Springfield to Cambridge',
                                'Movers Lowell to Brockton',
                                'Movers New Bedford to Quincy',
                            ],
                        ],
                        'florida' => [
                            'name' => 'Florida',
                            'routes' => [
                                'Movers Miami to Tampa',
                                'Movers Orlando to Jacksonville',
                                'Movers Fort Lauderdale to Tallahassee',
                                'Movers St. Petersburg to Hialeah',
                            ],
                        ],
                        'michigan' => [
                            'name' => 'Michigan',
                            'routes' => [
                                'Movers Detroit to Grand Rapids',
                                'Movers Warren to Sterling Heights',
                                'Movers Lansing to Ann Arbor',
                                'Movers Flint to Dearborn',
                            ],
                        ],
                        'nevada' => [
                            'name' => 'Nevada',
                            'routes' => [
                                'Movers Las Vegas to Reno',
                                'Movers Henderson to North Las Vegas',
                                'Movers Sparks to Carson City',
                            ],
                        ],
                        'texas' => [
                            'name' => 'Texas',
                            'routes' => [
                                'Movers Houston to Dallas',
                                'Movers Austin to San Antonio',
                                'Movers Fort Worth to El Paso',
                                'Movers Arlington to Corpus Christi',
                            ],
                        ],
                    ];
                @endphp

                @foreach ($statesData as $stateKey => $stateInfo)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="state-dropdown">
                            <div class="state-header" data-state="{{ $stateKey }}">
                                <h6 class="fw-bold mb-0">{{ $stateInfo['name'] }} <i
                                        class="fas fa-chevron-down float-end"></i></h6>
                                <small class="text-muted">movers | cost | routes</small>
                            </div>
                            <div class="state-content" id="{{ $stateKey }}-content">
                                @foreach ($stateInfo['routes'] as $route)
                                    <a href="/movers/{{ strtolower(str_replace(' ', '-', $stateInfo['name'])) }}"
                                        class="state-link">{{ $route }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Guides -->
    <section class="py-5">
        <div class="container">
            <h3 class="mb-4 text-center fw-bold">Popular Guides</h3>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/movers" class="text-decoration-none"><i
                                    class="fas fa-arrow-right text-primary me-2"></i>Best Moving Companies</a></li>
                        <li class="mb-2"><a href="/movers" class="text-decoration-none"><i
                                    class="fas fa-arrow-right text-primary me-2"></i>Best Long Distance Moving
                                Companies</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/blog" class="text-decoration-none"><i
                                    class="fas fa-arrow-right text-primary me-2"></i>Expert State-to-State Guide</a></li>
                        <li class="mb-2"><a href="/checklist" class="text-decoration-none"><i
                                    class="fas fa-arrow-right text-primary me-2"></i>Ultimate Long Distance Moving
                                Checklist</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="cta-section">
        <div class="container text-center">
            <h3 class="mb-3">Plan Your Long-Distance Move with Confidence</h3>
            <p class="mb-4">Need help? Get free quotes from licensed interstate movers or call our support team anytime.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="tel:2377994077" class="btn btn-outline-light">
                    <i class="fas fa-phone me-2"></i>(237) 799-4077
                </a>
                <a href="/get-quote" class="btn btn-outline-light">
                    <i class="fas fa-quote-left me-2"></i>Get Free Quotes
                </a>
                <a href="/get-quote" class="btn btn-outline-light">
                    <i class="fas fa-calculator me-2"></i>Cost Calculator
                </a>
            </div>
        </div>
    </section>

@endsection
