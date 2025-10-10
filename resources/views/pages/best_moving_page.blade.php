@extends('layouts.master')
@section('title', $page->meta_title ?? $page->page_name . ' | MoveEase')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/resource.css') }}">
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
/* Company Box */
.company-box {
    background: white;
    border-radius: 18px;
    overflow: hidden;
    border: 2px solid #e6ecec;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    z-index: 1;
    margin-right: 5px !important;
    height: 460px !important;
}

.company-box:hover {
    transform: translateY(-8px);
}

/* Decorative Shape 1 */
.company-box .bg-shape {
    position: absolute;
    top: -40px;
    right: -40px;
    width: 485px;
    height: 110px;
    background: #25718012;
    border-radius: 50%;
    z-index: -1;
}



/* Ribbon only for first card */
.ribbon {
    position: absolute;
    top: 20px;
    left: -45px;
    transform: rotate(-45deg);
    background: linear-gradient(135deg, #257180, #2c8d9f);
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    padding: 5px 45px;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.25);
    letter-spacing: 0.5px;
}

/* Badge style for other cards */
.badge {
    font-size: 12px;
    padding: 5px 12px;
    border-radius: 6px;
    font-weight: 500;
}


/* Stars */
.stars {
    font-size: 14px;
    color: #f5a623;
}

.company_logo {
    width: 175px;
    background-color: #f0f5f6;
    padding: 15px;
    border-radius: 0px 0px 10px 10px;
}

.company_logo img {
    border-radius: 10px;
}

.company_details .card-li {
    margin: 10px auto;
    min-height: 80px !important;
    max-width: 270px;
}

.card-li li {

    font-family: var(---heding);
    font-weight: 400;
    color: var(--secondary-color);
    padding-block: 1px;
    font-size: 16px;
    line-height: 21px !important;
}

.card-li li img {
    margin-right: 6px;
    width: 13px;
}

.stars_list li i {
    color: #ff8d3d;
    font-size: 22px;
    padding: 0 2px;
}

.company_details h5 {
    font-size: 16px;
    font-weight: 600;
    font-family: var(---heding);
}

.get-btn a {
    background-color: #257180;
    text-decoration: none;
    font-family: var(---heding);
    font-size: 16px;
    font-weight: 500;
    color: white;
    display: block;
    padding: 10px;
    border-radius: 10px;
}
.mover-card {
    background: #fff;
    border: 1px solid #e5e5e5;
}

.mover-card h4 {
    color: #257180;
}

.mover-card button {
    background: #257180;
    border: none;
}

.mover-card button:hover {
    background: #1c5c66;
}

.toggle-details {
    color: #257180;
    cursor: pointer;
}

.toggle-icon {
    font-size: 1.2rem;
    color: #257180;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.toggle-icon.rotate {
    transform: rotate(180deg);
}

.corner-ribbon {
    position: absolute;
    top: -3px;
    /* card ke upar uthaya */
    left: 20px;
    /* ya right:20px; kar sakte ho */
    background: #f15a24;
    /* orange */
    color: #fff;
    font-weight: bold;
    font-size: 14px;
    padding: 10px 12px;
    text-align: center;
    z-index: 2;

    /* pointed tail shape */
    clip-path: polygon(0 0, 100% 0, 100% 70%, 50% 100%, 0 70%);

    /* thoda shadow dene ke liye */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}



.packing-calculator .card {
    background: #fff;
    box-shadow: 0 0px 5px rgba(0, 0, 0, 0.12);
    border: 2px solid #25718021;
}

.packing-calculator button {
    background: #257180;
    border: none;
}

.packing-calculator button:hover {
    background: #1d5d68;
}
    </style>
@endpush
@section('content')

    <!-- SEO Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "{{ $page->meta_title ?? $page->page_name . ' | MoveEase' }}",
        "description": "{{ $page->meta_description ?? strip_tags($page->content ?? '') }}",
        "url": "{{ request()->url() }}",
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
                        "@id": "{{ request()->url() }}",
                        "name": "{{ $page->page_name }}"
                    }
                }
            ]
        },
        "mainEntity": {
            "@type": "Article",
            "headline": "{{ $page->page_name }}",
            "description": "{{ $page->meta_description ?? strip_tags($page->content ?? '') }}",
            "author": {
                "@type": "Organization",
                "name": "MoveEase"
            },
            "publisher": {
                "@type": "Organization",
                "name": "MoveEase",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('assets/images/logo.png') }}"
                }
            }
        }
    }
    </script>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="fw-bold mb-2">{{ $page->page_name }}</h1>
                        @if ($page->meta_description)
                            <p class="text-muted mb-4">{{ $page->meta_description }}</p>
                        @endif

                        @if ($page->navbar_content)
                            <div class="mb-4">{!! $page->navbar_content !!}</div>
                        @endif
                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>

                @if ($topMovers->count())
                    <!-- Featured Companies -->
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-xl-10 mx-auto">
                                <h2 class="fw-bold text-center text-primary mb-5">
                                    Best Long Distance Moving Companies 2025
                                </h2>
                                <div class=" top-company-card border-0">
                                    <div class="row g-4 row g-4 justify-content-center">

                                        @foreach ($topMovers as $tm)
                                            <div class="col-lg-4 col-md-6 col-12 mt-4 ">
                                                <div class="company-box position-relative p-4 text-center h-100">

                                                    <!-- Ribbon only on first card -->
                                                    <span class="ribbon">{{ $tm->heading }}</span>
                                                    <div class="bg-shape"></div>

                                                    <div class="company_logo mx-auto">
                                                        <img src="https://mygoodmovers.com/public/companies/logo/distance-movers.jpg"
                                                            alt="Company Logo" class="w-100">
                                                    </div>
                                                    <div class="company_details px-3 mt-4">
                                                        <h5 class="mb-2">{{ $tm->company->name }}</h5>

                                                        <!-- Stars -->
                                                        <div class="stars mb-3">
                                                            <ul
                                                                class="list-unstyled stars_list m-0 mb-2 d-flex align-items-center justify-content-center">
                                                                <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star-half-stroke"
                                                                        aria-hidden="true"></i>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <ul class="list-unstyled card-li text-start">
                                                            @if ($tm->point_one)
                                                                <li><img src="https://mygoodmovers.com/assets/image/check-mark.png"
                                                                        alt="check-mark" width="13"
                                                                        height="13">{{ $tm->point_one }}</li>
                                                            @endif
                                                            @if ($tm->point_two)
                                                                <li><img src="https://mygoodmovers.com/assets/image/check-mark.png"
                                                                        alt="check-mark" width="13"
                                                                        height="13">{{ $tm->point_two }}</li>
                                                            @endif
                                                            @if ($tm->point_three)
                                                                <li><img src="https://mygoodmovers.com/assets/image/check-mark.png"
                                                                        alt="check-mark" width="13"
                                                                        height="13">{{ $tm->point_three }}</li>
                                                            @endif
                                                        </ul>
                                                        @if ($tm->phone)
                                                            <a href="tel:{{ $tm->phone }}"
                                                                class="btn btn-primary btn-sm">Call
                                                                {{ $tm->phone }}</a>
                                                        @endif
                                                        <div class="get-btn mt-3">
                                                            <a href="#">Get Quote</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <h3 class="mt-4 mb-3">Recomended Movers</h3>
                    <div class="row g-3">
                        @foreach ($topMovers as $tm)
                            <div class="col-md-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">{{ $tm->company->name }}</h5>
                                        <div class="text-muted small mb-2">Position: {{ $tm->position }}</div>
                                        @if ($tm->heading)
                                            <p class="fw-semibold">{{ $tm->heading }}</p>
                                        @endif
                                        <ul class="mb-3">
                                            @if ($tm->point_one)
                                                <li>{{ $tm->point_one }}</li>
                                            @endif
                                            @if ($tm->point_two)
                                                <li>{{ $tm->point_two }}</li>
                                            @endif
                                            @if ($tm->point_three)
                                                <li>{{ $tm->point_three }}</li>
                                            @endif
                                        </ul>
                                        @if ($tm->phone)
                                            <a href="tel:{{ $tm->phone }}" class="btn btn-primary btn-sm">Call
                                                {{ $tm->phone }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                @endif

                @if ($page->upper_content)
                    <div class="mt-5">{!! $page->upper_content !!}</div>
                @endif

                @if ($page->review_content)
                    <div class="mt-5">{!! $page->review_content !!}</div>
                @endif

                @if ($bottomMovers->count())
                    <h3 class="mt-5 mb-3">More Movers</h3>
                    <div class="row g-3">
                        {{-- <div class="col-md-6">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="card-title mb-0">{{ $bm->company->name }}</h5>
                                            @if ($bm->availability)
                                                <span class="badge bg-info text-dark">{{ $bm->availability }}</span>
                                            @endif
                                        </div>
                                        @if ($bm->heading)
                                            <p class="fw-semibold">{{ $bm->heading }}</p>
                                        @endif
                                        <ul>
                                            @if ($bm->point_one)
                                                <li>{{ $bm->point_one }}</li>
                                            @endif
                                            @if ($bm->point_two)
                                                <li>{{ $bm->point_two }}</li>
                                            @endif
                                            @if ($bm->point_three)
                                                <li>{{ $bm->point_three }}</li>
                                            @endif
                                        </ul>
                                        @if ($bm->content)
                                            <div class="mt-2">{!! $bm->content !!}</div>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}
                    </div>
                    @foreach ($bottomMovers as $bm)
                        <div class="card mb-4 rounded-3 position-relative mover-card">
                            <!-- Corner Ribbon Badge -->
                            <div class="corner-ribbon">{{ $bm->position }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-4 border-end text-center">
                                        <img src="https://mygoodmovers.com/public/companies/logo/distance-movers.jpg"
                                            alt="United Van Lines" class="mb-3" style="max-height:50px;">
                                        <h5 class="fw-bold" style="color: #122b2e;">{{ $bm->company->name }}</h5>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $bm->company->averageRating())
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                        <p class="mb-1 text-success fw-semibold">
                                            {{ number_format($bm->company->averageRating(), 1) }}/5
                                            ({{ $bm->company->reviews()->count() }}
                                            reviews)
                                        </p>
                                        <button class="btn w-100 text-white fw-semibold" style="background:#257180;">Get
                                            Started</button>

                                        <div class="d-flex align-items-center justify-content-center">
                                            <a class="text-decoration-none fw-semibold toggle-details"
                                                data-bs-toggle="collapse" href="#moverDetails" role="button"
                                                aria-expanded="false" aria-controls="moverDetails">
                                                Show details
                                            </a>
                                            <i class="bi bi-chevron-down toggle-icon ms-2" data-bs-toggle="collapse"
                                                href="#moverDetails"></i>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <p class="fw-bold mb-1">Services offered</p>
                                                <p class="small text-muted">Packing, car shipping, unpacking, storage and
                                                    debris removal.</p>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <p class="fw-bold mb-1">Deposit required?</p>
                                                <p class="small text-muted">{{ $bm->deposit_required }}</p>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <p class="fw-bold mb-1">Customer ratings</p>
                                                <p class="small text-muted">Better than most<br>
                                                    <span class="small">Based on BBB rating and complaints per 100
                                                        vehicles</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Collapsible Content -->
                                <div class="collapse mt-3" id="moverDetails">
                                    <div class="mb-3">
                                        <h6 class="fw-bold">Key facts</h6>
                                        <p class="small text-muted mb-0">
                                            United Van Lines combines virtual walkthroughs, a digital move portal, and
                                            full-service options.
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-bold text-success">Pros</h6>
                                            <ul class="list-unstyled small">
                                                <li>✅ Does virtual walkthroughs for quotes</li>
                                                <li>✅ Full-service mover</li>
                                                <li>✅ Has online move portal</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bold text-danger">Cons</h6>
                                            <ul class="list-unstyled small">
                                                <li>❌ Only offers day-certain deliveries with Snapmoves Priority service
                                                </li>
                                                <li>❌ Website’s chatbot is relatively limited</li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- @if ($bm->content)
                                            <div class="mt-2">{!! $bm->content !!}</div>
                                        @endif --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif

                @if ($page->lower_content)
                    <div class="mt-5">{!! $page->lower_content !!}</div>
                @endif
            </div>
        </div>
    </section>
    <script>
        const toggleLink = document.querySelector('.toggle-details');
        const toggleIcon = document.querySelector('.toggle-icon');
        const collapseEl = document.getElementById('moverDetails');

        collapseEl.addEventListener('show.bs.collapse', () => {
            toggleIcon.classList.add('rotate');
            toggleLink.innerText = "Close details";
        });

        collapseEl.addEventListener('hide.bs.collapse', () => {
            toggleIcon.classList.remove('rotate');
            toggleLink.innerText = "Show details";
        });
    </script>
@endsection
