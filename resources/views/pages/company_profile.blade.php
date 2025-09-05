@extends('layouts.master')
@section('title', $company->name . ' Reviews & Information | MoveEase')
@section('meta_description', 'Read reviews and get information about ' . $company->name . '. Compare moving services, prices, and customer feedback for your interstate move.')
@section('meta_keywords', $company->name . ', moving company reviews, interstate movers, moving services, ' . ($company->state->name ?? 'nationwide') . ' movers')
@section('canonical_url', route('front.company.profile', $company->slug))
@section('og_title', $company->name . ' Reviews & Information | MoveEase')
@section('og_description', 'Read reviews and get information about ' . $company->name . '. Compare moving services and customer feedback.')
@section('og_type', 'business.business')
@section('content')



@push('styles')
<link href="{{ asset('assets/css/company-profile.css') }}" rel="stylesheet">
<style>
/* Enhanced Company Profile Styles */
.company-profile {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 20px;
    padding: 3rem;
    margin-bottom: 3rem;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    border: 1px solid #dee2e6;
}

.company-logo-large {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: white;
    font-weight: bold;
    margin: 0 auto 1rem;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.rating-large .fa-star {
    font-size: 1.5rem;
    color: #ffc107;
    margin-right: 3px;
}

.action-buttons .btn {
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.action-buttons .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}

.review-filters {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}
svg{
    width: 30px !important;
}
.filter-btn {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    color: var(--dark-text);
    padding: 8px 20px;
    border-radius: 25px;
    margin: 5px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-1px);
}

.review-item {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.review-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    border-color: var(--primary-color);
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
    font-weight: bold;
    margin-right: 1rem;
}

.sidebar {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    border: 1px solid #e9ecef;
}

.company-comparison {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.comparison-table {
    width: 100%;
    border-collapse: collapse;
}

.comparison-table th,
.comparison-table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid #e9ecef;
}

.comparison-table th {
    background: var(--light-bg);
    font-weight: 600;
    color: var(--primary-color);
}

.faq-section {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.faq-item {
    border-bottom: 1px solid #e9ecef;
    margin-bottom: 1rem;
}

.faq-question {
    padding: 1rem 0;
    cursor: pointer;
    font-weight: 600;
    color: var(--primary-color);
    display: flex;
    justify-content: between;
    align-items: center;
    transition: all 0.3s ease;
}

.faq-question:hover {
    color: var(--secondary-color);
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    padding: 0 1rem;
    color: var(--light-text);
    line-height: 1.6;
}

.faq-answer.show {
    max-height: 200px;
    padding: 1rem;
}

.footer-info {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}
</style>
@endpush

<!-- Breadcrumb -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/movers">Moving Companies</a></li>
            <li class="breadcrumb-item active">{{ $company->name }} Reviews</li>
        </ol>
    </nav>
</div>

<div class="container main-content">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Company Profile -->
            <div class="company-profile">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <div class="company-logo-large">
                            {{ substr($company->name, 0, 2) }}
                        </div>
                        <div class="rating-large">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $i <= $company->averageRating() ? '' : '-o' }}"></i>
                            @endfor
                        </div>
                        <div class="rating-count mt-2">
                            {{ number_format($company->averageRating(), 1) }}/5 ({{ $company->reviews()->count() }} reviews)
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="mb-2">{{ $company->name }} 
                            @if($company->is_claimed)
                                <i class="fas fa-check-circle text-primary"></i>
                            @endif
                        </h1>
                        <p class="text-muted mb-3">{{ $company->description ?: 'Professional moving services with years of experience. FMCSA licensed and fully insured.' }}</p>
                        <div class="d-flex flex-wrap gap-2">
                            @if($company->is_claimed)
                                <span class="badge bg-success">Verified</span>
                            @endif
                            @if($company->license_number)
                                <span class="badge bg-primary">Licensed</span>
                            @endif
                            <span class="badge bg-info">Insured</span>
                            @if($company->averageRating() >= 4.5)
                                <span class="badge bg-warning text-dark">Top Rated</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="action-buttons text-center">
                            <a href="/get-quote?company={{ $company->id }}" class="btn btn-primary btn-lg w-100 mb-2">
                                <i class="fas fa-quote-left me-2"></i>Get Free Quote
                            </a>
                            @if($company->phone)
                                <a href="tel:{{ $company->phone }}" class="btn btn-outline-primary w-100 mb-2">
                                    <i class="fas fa-phone me-2"></i>Call Now
                                </a>
                            @endif
                            @if($company->website)
                                <a href="{{ $company->website }}" target="_blank" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-external-link-alt me-2"></i>Visit Website
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review Filters -->
            <div class="review-filters">
                <h5 class="mb-3">Filter Reviews</h5>
                <div class="d-flex flex-wrap">
                    <button class="filter-btn active" data-filter="all">All Reviews</button>
                    <button class="filter-btn" data-filter="5">5 Stars</button>
                    <button class="filter-btn" data-filter="4">4 Stars</button>
                    <button class="filter-btn" data-filter="3">3 Stars</button>
                    <button class="filter-btn" data-filter="recent">Recent</button>
                    <button class="filter-btn" data-filter="long-distance">Long Distance</button>
                    <button class="filter-btn" data-filter="local">Local</button>
                </div>
            </div>

            <!-- Reviews List -->
            <div class="reviews-list">
                @forelse($company->reviews()->latest()->paginate(10) as $review)
                <div class="review-item" data-rating="{{ $review->rating }}" data-type="{{ $review->move_size }}">
                    <div class="reviewer-info">
                        <div class="reviewer-avatar">
                            {{ substr($review->user->name ?? 'Anonymous', 0, 2) }}
                        </div>
                        <div>
                            <h6 class="mb-0">{{ $review->user->name ?? 'Anonymous' }}</h6>
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <div class="ms-auto text-muted small">
                            <i class="fas fa-calendar me-1"></i>{{ $review->created_at->format('M d, Y') }}
                        </div>
                    </div>
                    <div class="review-content">
                        <h6>{{ Str::limit($review->comment, 60) }}</h6>
                        <p>{{ $review->comment }}</p>
                    </div>
                    <div class="review-meta">
                        <div>
                            @if($review->move_size)
                                <span class="me-3"><strong>Move Type:</strong> {{ $review->move_size }}</span>
                            @endif
                            @if($review->pickup_city && $review->delivery_city)
                                <span class="me-3"><strong>Route:</strong> {{ $review->pickup_city }} to {{ $review->delivery_city }}</span>
                            @endif
                            @if($review->move_date)
                                <span><strong>Date:</strong> {{ \Carbon\Carbon::parse($review->move_date)->format('M Y') }}</span>
                            @endif
                        </div>
                        <div class="helpful-votes">
                            <button class="vote-btn" data-review="{{ $review->id }}" data-type="helpful">
                                <i class="fas fa-thumbs-up me-1"></i>Helpful ({{ rand(5, 20) }})
                            </button>
                            <button class="vote-btn" data-review="{{ $review->id }}" data-type="not-helpful">
                                <i class="fas fa-thumbs-down me-1"></i>Not Helpful ({{ rand(0, 5) }})
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5">
                    <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                    <h5>No reviews yet</h5>
                    <p class="text-muted">Be the first to review this company!</p>
                    <a href="{{route('front.review.form', $company->slug)}}" class="btn btn-primary">Write a Review</a>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($company->reviews()->count() > 10)
            <nav aria-label="Reviews pagination">
                <ul class="pagination pagination-custom">
                    {{ $company->reviews()->latest()->paginate(10)->links() }}
                </ul>
            </nav>
            @endif

            <!-- Company Comparison -->
            <div class="company-comparison">
                <h4 class="mb-4">Compare with Similar Companies</h4>
                <div class="table-responsive">
                    <table class="comparison-table">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Rating</th>
                                <th>Reviews</th>
                                <th>Starting Price</th>
                                <th>License Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>{{ $company->name }}</strong></td>
                                <td>{{ number_format($company->averageRating(), 1) }}/5</td>
                                <td>{{ $company->reviews()->count() }}</td>
                                <td>${{ number_format(rand(2000, 5000)) }}</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            @foreach(\App\Models\Company::where('id', '!=', $company->id)->where('is_active', 1)->inRandomOrder()->limit(3)->get() as $relatedCompany)
                            <tr>
                                <td>{{ $relatedCompany->name }}</td>
                                <td>{{ number_format($relatedCompany->averageRating(), 1) }}/5</td>
                                <td>{{ $relatedCompany->reviews()->count() }}</td>
                                <td>${{ number_format(rand(2000, 5000)) }}</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="faq-section">
                <h4 class="mb-4">Frequently Asked Questions</h4>
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq('faq1')">
                        What services does {{ $company->name }} offer?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer" id="faq1">
                        {{ $company->name }} offers comprehensive moving services including long-distance interstate moves, local moves, packing services, storage solutions, and specialty item handling for pianos, artwork, and antiques.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq('faq2')">
                        How does {{ $company->name }} determine moving costs?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer" id="faq2">
                        Moving costs are calculated based on distance, weight of belongings, additional services requested, and seasonal factors. They provide free in-home estimates for accurate pricing.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq('faq3')">
                        Is {{ $company->name }} licensed and insured?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer" id="faq3">
                        @if($company->license_number)
                            Yes, {{ $company->name }} is fully licensed by the FMCSA for interstate moves and carries comprehensive liability and cargo insurance to protect your belongings during transit.
                        @else
                            {{ $company->name }} carries comprehensive liability and cargo insurance to protect your belongings during transit. Please contact them directly for licensing information.
                        @endif
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq('faq4')">
                        What is their typical delivery timeframe?
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer" id="faq4">
                        Delivery timeframes vary by distance but typically range from 1-14 business days for long-distance moves. They provide estimated delivery windows during booking.
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar-sticky">
                <div class="sidebar">
                    <h5 class="mb-3">Quick Company Info</h5>
                    <div class="quick-info">
                        @if($company->created_at)
                        <div class="info-item">
                            <span>Founded</span>
                            <span>{{ $company->created_at->format('Y') }}</span>
                        </div>
                        @endif
                        @if($company->city && $company->state)
                        <div class="info-item">
                            <span>Headquarters</span>
                            <span>{{ $company->city }}, {{ $company->state->code ?? $company->state }}</span>
                        </div>
                        @endif
                        @if($company->license_number)
                        <div class="info-item">
                            <span>FMCSA License</span>
                            <span>Active</span>
                        </div>
                        @endif
                        @if($company->dot_number)
                        <div class="info-item">
                            <span>DOT Number</span>
                            <span>{{ $company->dot_number }}</span>
                        </div>
                        @endif
                        <div class="info-item">
                            <span>Service Areas</span>
                            <span>All 50 States</span>
                        </div>
                        <div class="info-item">
                            <span>Rating</span>
                            <span>{{ number_format($company->averageRating(), 1) }}/5</span>
                        </div>
                    </div>
                    
                    <h6 class="mb-3">Get Free Quote</h6>
                    <form class="quote-form mb-4" action="/get-quote" method="GET">
                        <input type="hidden" name="company" value="{{ $company->id }}">
                        <div class="mb-3">
                            <input type="text" class="form-control zipfrom" id="cp_zip_from" name="zip_from" placeholder="Moving From" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control zipto" id="cp_zip_to" name="zip_to" placeholder="Moving To" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control movedate" id="cp_move_date" name="move_date" placeholder="YYYY-MM-DD">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Get My Quote</button>
                    </form>
                </div>

                <div class="sidebar">
                    <h5 class="mb-3">Related Companies</h5>
                    <ul class="related-companies">
                        @foreach(\App\Models\Company::where('id', '!=', $company->id)->where('is_active', 1)->inRandomOrder()->limit(4)->get() as $relatedCompany)
                        <li onclick="window.location.href='/company/{{ $relatedCompany->slug }}'">
                            <div class="company-mini-logo">{{ substr($relatedCompany->name, 0, 2) }}</div>
                            <div>
                                <div class="fw-bold">{{ $relatedCompany->name }}</div>
                                <div class="small text-muted">{{ number_format($relatedCompany->averageRating(), 1) }}★ ({{ $relatedCompany->reviews()->count() }} reviews)</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar">
                    <h5 class="mb-3">Popular Routes</h5>
                    <ul class="info-links">
                        @if($company->state)
                        <li><a href="/movers/{{ strtolower(str_replace(' ', '-', $company->state->name ?? $company->state)) }}">{{ $company->state->name ?? $company->state }} Movers</a></li>
                        @endif
                        <li><a href="/movers/california">California Movers</a></li>
                        <li><a href="/movers/texas">Texas Movers</a></li>
                        <li><a href="/movers/florida">Florida Movers</a></li>
                        <li><a href="/movers/new-york">New York Movers</a></li>
                    </ul>
                </div>

                <div class="sidebar">
                    <h5 class="mb-3">Moving Resources</h5>
                    <ul class="info-links">
                        <li><a href="/get-quote">Moving Cost Calculator</a></li>
                        <li><a href="/checklist">Moving Checklist</a></li>
                        <li><a href="/blog">Packing Tips</a></li>
                        <li><a href="/blog">Moving Insurance Guide</a></li>
                        <li><a href="/blog">Interstate Moving Laws</a></li>
                    </ul>
                </div>

                <div class="sidebar">
                    <h5 class="mb-3">Why Choose {{ $company->name }}?</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Professional Service</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Licensed & Insured</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Free Estimates</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Customer Support</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>No Hidden Fees</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Full Protection</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Information Sections -->
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="footer-info">
                <h5 class="mb-3">About {{ $company->name }}</h5>
                <p>{{ $company->description ?: $company->name . ' has been serving customers across the United States for many years. We specialize in long-distance interstate moves and pride ourselves on providing reliable, professional moving services at competitive prices.' }}</p>
                <p>Our team of experienced movers is trained to handle all types of relocations, from small apartments to large family homes. We use modern equipment and techniques to ensure your belongings arrive safely at their destination.</p>
                
                <h6 class="mt-4 mb-3">Services Offered:</h6>
                <ul class="info-links">
                    <li><a href="#">Long-Distance Interstate Moving</a></li>
                    <li><a href="#">Local Moving Services</a></li>
                    <li><a href="#">Residential Moving</a></li>
                    <li><a href="#">Commercial & Office Moving</a></li>
                    <li><a href="#">Packing & Unpacking Services</a></li>
                    <li><a href="#">Storage Solutions</a></li>
                    <li><a href="#">Piano & Specialty Item Moving</a></li>
                    <li><a href="#">Moving Supplies</a></li>
                </ul>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="footer-info">
                <h5 class="mb-3">Contact Information</h5>
                <div class="mb-4">
                    <h6>Customer Service</h6>
                    @if($company->phone)
                        <p><i class="fas fa-phone text-primary me-2"></i>{{ $company->phone }}</p>
                    @endif
                    @if($company->email)
                        <p><i class="fas fa-envelope text-primary me-2"></i>{{ $company->email }}</p>
                    @endif
                    <p><i class="fas fa-clock text-primary me-2"></i>Mon-Fri: 8AM-6PM, Sat: 9AM-4PM</p>
                </div>
                
                @if($company->address_line1)
                <h6 class="mb-3">Address</h6>
                <p><i class="fas fa-map-marker-alt text-primary me-2"></i>
                    {{ $company->address_line1 }}
                    @if($company->address_line2), {{ $company->address_line2 }}@endif
                    @if($company->city), {{ $company->city }}@endif
                    @if($company->state), {{ $company->state->name ?? $company->state }}@endif
                    @if($company->zip), {{ $company->zip }}@endif
                </p>
                @endif
                
                <h6 class="mb-3">Service Areas</h6>
                <div class="row">
                    <div class="col-6">
                        <ul class="info-links">
                            <li><a href="/movers/california">California</a></li>
                            <li><a href="/movers/texas">Texas</a></li>
                            <li><a href="/movers/florida">Florida</a></li>
                            <li><a href="/movers/new-york">New York</a></li>
                            <li><a href="/movers/illinois">Illinois</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="info-links">
                            <li><a href="/movers/pennsylvania">Pennsylvania</a></li>
                            <li><a href="/movers/ohio">Ohio</a></li>
                            <li><a href="/movers/georgia">Georgia</a></li>
                            <li><a href="/movers/north-carolina">North Carolina</a></li>
                            <li><a href="/movers/michigan">Michigan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Final CTA -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="company-profile text-center">
                <h3 class="mb-3">Plan Your Long-Distance Move with Confidence</h3>
                <p class="mb-4">Get free quotes from {{ $company->name }} and other top-rated interstate movers. Compare prices, services, and reviews to make the best choice for your move.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="/get-quote?company={{ $company->id }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-quote-left me-2"></i>Get Free Quotes
                    </a>
                    <a href="/get-quote" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-calculator me-2"></i>Cost Calculator
                    </a>
                    @if($company->phone)
                        <a href="tel:{{ $company->phone }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-phone me-2"></i>Call {{ $company->phone }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            const reviews = document.querySelectorAll('.review-item');
            
            reviews.forEach(review => {
                const rating = review.getAttribute('data-rating');
                const type = review.getAttribute('data-type');
                
                if (filter === 'all' || 
                    (filter === rating) || 
                    (filter === 'recent' && review.querySelector('.text-muted').textContent.includes('2024')) ||
                    (filter === 'long-distance' && type && type.includes('Bedroom')) ||
                    (filter === 'local' && type && type.includes('Studio'))) {
                    review.style.display = 'block';
                    review.style.opacity = '1';
                    review.style.transform = 'translateY(0)';
                } else {
                    review.style.display = 'none';
                }
            });
        });
    });

    // Voting functionality
    document.querySelectorAll('.vote-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const icon = this.querySelector('i');
            const text = this.textContent;
            const reviewId = this.getAttribute('data-review');
            const voteType = this.getAttribute('data-type');
            
            if (icon.classList.contains('fa-thumbs-up')) {
                const currentCount = parseInt(text.match(/\d+/)[0]);
                this.innerHTML = `<i class="fas fa-thumbs-up me-1"></i>Helpful (${currentCount + 1})`;
                this.style.background = 'var(--primary-color)';
                this.style.color = 'white';
            } else {
                const currentCount = parseInt(text.match(/\d+/)[0]);
                this.innerHTML = `<i class="fas fa-thumbs-down me-1"></i>Not Helpful (${currentCount + 1})`;
                this.style.background = 'var(--secondary-color)';
                this.style.color = 'white';
            }
            
            // Here you would send the vote to your backend
            console.log('Vote:', voteType, 'for review:', reviewId);
        });
    });

    // FAQ Toggle
    function toggleFaq(id) {
        const answer = document.getElementById(id);
        const question = answer.previousElementSibling;
        const icon = question.querySelector('i');
        
        if (answer.classList.contains('show')) {
            answer.classList.remove('show');
            icon.style.transform = 'rotate(0deg)';
        } else {
            // Close all other FAQs
            document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('show'));
            document.querySelectorAll('.faq-question i').forEach(i => i.style.transform = 'rotate(0deg)');
            
            answer.classList.add('show');
            icon.style.transform = 'rotate(180deg)';
        }
    }

    // Quote form submission
    document.querySelector('.quote-form').addEventListener('submit', function(e) {
        const inputs = this.querySelectorAll('input[required]');
        let isValid = true;
        
        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.style.borderColor = '#e74c3c';
                isValid = false;
            } else {
                input.style.borderColor = '#28a745';
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields');
        }
    });

    // Animate review items on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.review-item, .sidebar, .company-profile, .company-comparison, .faq-section, .footer-info').forEach(item => {
        item.style.transition = 'all 0.6s ease';
        observer.observe(item);
    });

    // Add loading states to action buttons
    document.querySelectorAll('.action-buttons .btn, .btn-primary, .btn-outline-primary').forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.closest('.quote-form') && !this.closest('.pagination')) {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1500);
            }
        });
    });

    // Smooth scroll behavior
    document.documentElement.style.scrollBehavior = 'smooth';

    // Add hover effects to related companies
    document.querySelectorAll('.related-companies li').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });

    // Responsive sidebar behavior
    function handleSidebarSticky() {
        const sidebar = document.querySelector('.sidebar-sticky');
        const isMobile = window.innerWidth <= 991;
        
        if (isMobile) {
            sidebar.style.position = 'static';
            sidebar.style.top = 'auto';
        } else {
            sidebar.style.position = 'sticky';
            sidebar.style.top = '2rem';
        }
    }
    
    // Initial call and resize listener
    handleSidebarSticky();
    window.addEventListener('resize', handleSidebarSticky);
</script>
@endpush
