@extends('layouts.master')
@section('title', 'Professional Moving Services | MoveEase')
@section('meta_description', 'Comprehensive moving services including local, interstate, packing, storage, commercial and specialty moving. Get quotes from verified professional movers.')
@section('meta_keywords', 'moving services, local moving, interstate moving, packing services, storage solutions, commercial moving, specialty moving')
@section('canonical_url', route('front.services'))
@section('og_title', 'Professional Moving Services | MoveEase')
@section('og_description', 'Comprehensive moving services including local, interstate, packing, storage, commercial and specialty moving.')
@section('og_type', 'service')
@section('content')

@push('styles')
<style>
/* Services Page Styles */
.services-hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 100px 0 80px;
    position: relative;
    overflow: hidden;
}

.services-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    opacity: 0.3;
}

.services-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.services-hero h1 {
    font-family: 'Poppins', sans-serif;
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.services-content {
    padding: 80px 0;
}

.service-card {
    background: white;
    border-radius: 15px;
    padding: 40px 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    border-color: var(--primary-color);
}

.service-icon {
    width: 80px;
    height: 80px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    color: white;
    font-size: 2rem;
}

.service-card h4 {
    color: var(--primary-color);
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    margin-bottom: 15px;
}

.service-features {
    list-style: none;
    padding: 0;
    margin: 20px 0;
}

.service-features li {
    padding: 8px 0;
    color: var(--light-text);
    display: flex;
    align-items: center;
    gap: 10px;
}

.service-features li:before {
    content: '✓';
    color: var(--secondary-color);
    font-weight: bold;
}

.pricing-section {
    background: #f8f9fa;
    padding: 80px 0;
}

.pricing-card {
    background: white;
    border-radius: 15px;
    padding: 40px 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
    position: relative;
}

.pricing-card.featured {
    border: 3px solid var(--secondary-color);
    transform: scale(1.05);
}

.pricing-card.featured::before {
    content: 'Most Popular';
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--secondary-color);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
}

.pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.pricing-card.featured:hover {
    transform: scale(1.05) translateY(-5px);
}

.price {
    font-size: 3rem;
    font-weight: 700;
    color: var(--primary-color);
    font-family: 'Poppins', sans-serif;
}

.price-unit {
    font-size: 1rem;
    color: var(--light-text);
    font-weight: normal;
}

.cta-section {
    background: var(--primary-color);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.cta-section h2 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    margin-bottom: 20px;
}

.btn-light {
    background: white;
    color: var(--primary-color);
    border: none;
    font-weight: 600;
    padding: 12px 30px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-light:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
}

/* Movers Section */
.movers-section {
    padding: 80px 0;
}

.mover-card {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    border: 1px solid #e9ecef;
}

.mover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.mover-header {
    display: flex;
    align-items: center;
    margin-bottom: 1.5rem;
}

.mover-logo {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin-right: 1rem;
    flex-shrink: 0;
}

.mover-info h5 {
    margin-bottom: 0.5rem;
    color: var(--dark-text);
    font-weight: 600;
}

.mover-description {
    color: var(--light-text);
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.mover-features {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    margin-bottom: 1rem;
}

.mover-features .badge {
    font-size: 0.75rem;
    padding: 0.4rem 0.8rem;
}
</style>
@endpush

<!-- Hero Section -->
<section class="services-hero">
    <div class="container">
        <div class="services-hero-content">
            <h1>Moving Services</h1>
            <p class="lead">Comprehensive moving solutions for every need</p>
        </div>
    </div>
</section>

<!-- Services Content -->
<section class="services-content">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Our Moving Services</h2>
            <p class="lead">Professional moving services tailored to your specific needs</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h4>Local Moving</h4>
                    <p>Professional local moving services within your city or metropolitan area.</p>
                    <ul class="service-features">
                        <li>Same-day service available</li>
                        <li>Experienced local movers</li>
                        <li>Competitive hourly rates</li>
                        <li>Full insurance coverage</li>
                    </ul>
                    <a href="{{ route('front.get.quote') }}?type=local" class="btn btn-outline-primary">Get Quote</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-truck-moving"></i>
                    </div>
                    <h4>Interstate Moving</h4>
                    <p>Long-distance moving services across state lines with FMCSA-licensed carriers.</p>
                    <ul class="service-features">
                        <li>FMCSA licensed & insured</li>
                        <li>GPS tracking available</li>
                        <li>Flexible delivery windows</li>
                        <li>Professional packing</li>
                    </ul>
                    <a href="{{ route('front.get.quote') }}?type=interstate" class="btn btn-outline-primary">Get Quote</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h4>Packing Services</h4>
                    <p>Professional packing and unpacking services to protect your belongings.</p>
                    <ul class="service-features">
                        <li>Professional packing materials</li>
                        <li>Fragile item specialists</li>
                        <li>Full or partial packing</li>
                        <li>Unpacking services</li>
                    </ul>
                    <a href="{{ route('front.get.quote') }}?type=packing" class="btn btn-outline-primary">Get Quote</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <h4>Storage Solutions</h4>
                    <p>Secure storage facilities for short-term and long-term storage needs.</p>
                    <ul class="service-features">
                        <li>Climate-controlled units</li>
                        <li>24/7 security monitoring</li>
                        <li>Flexible rental terms</li>
                        <li>Easy access scheduling</li>
                    </ul>
                    <a href="{{ route('front.get.quote') }}?type=storage" class="btn btn-outline-primary">Get Quote</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Commercial Moving</h4>
                    <p>Specialized commercial and office moving services for businesses.</p>
                    <ul class="service-features">
                        <li>Minimal business disruption</li>
                        <li>IT equipment handling</li>
                        <li>Weekend/after-hours service</li>
                        <li>Project management</li>
                    </ul>
                    <a href="{{ route('front.get.quote') }}?type=commercial" class="btn btn-outline-primary">Get Quote</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-piano"></i>
                    </div>
                    <h4>Specialty Moving</h4>
                    <p>Expert handling of pianos, artwork, antiques, and other valuable items.</p>
                    <ul class="service-features">
                        <li>Piano moving specialists</li>
                        <li>Fine art handling</li>
                        <li>Antique transportation</li>
                        <li>Custom crating services</li>
                    </ul>
                    <a href="{{ route('front.get.quote') }}?type=specialty" class="btn btn-outline-primary">Get Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Movers Section -->
<section class="movers-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Top Rated Moving Companies</h2>
            <p class="lead">Highly recommended movers for your service needs</p>
        </div>
        
        <div class="row g-4">
            @php
                $topMovers = \App\Models\TopMover::where('page', 'services')
                                                ->with('company')
                                                ->orderBy('id')
                                                ->take(6)
                                                ->get();
            @endphp
            
            @forelse($topMovers as $mover)
            <div class="col-lg-4 col-md-6">
                <div class="mover-card">
                    <div class="mover-header">
                        <div class="mover-logo">
                            <i class="fas fa-truck-moving"></i>
                        </div>
                        <div class="mover-info">
                            <h5>{{ $mover->company->name ?? $mover->company_name }}</h5>
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= ($mover->company->average_rating ?? 4.5) ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                                <span class="ms-2">{{ number_format($mover->company->average_rating ?? 4.5, 1) }}</span>
                            </div>
                        </div>
                    </div>
                    <p class="mover-description">{{ $mover->description ?? 'Professional moving services with excellent customer satisfaction.' }}</p>
                    <div class="mover-features">
                        <span class="badge bg-primary">Licensed</span>
                        <span class="badge bg-success">Insured</span>
                        <span class="badge bg-info">FMCSA Verified</span>
                    </div>
                    <a href="{{ $mover->company ? route('front.company.profile', $mover->company->slug) : '#' }}" class="btn btn-outline-primary w-100 mt-3">View Company</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No top movers configured for this page.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Bottom Movers Section -->
<section class="movers-section bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">More Moving Companies</h2>
            <p class="lead">Additional trusted moving companies to consider</p>
        </div>
        
        <div class="row g-4">
            @php
                $bottomMovers = \App\Models\BottomMover::where('page', 'services')
                                                      ->with('company')
                                                      ->orderBy('id')
                                                      ->take(6)
                                                      ->get();
            @endphp
            
            @forelse($bottomMovers as $mover)
            <div class="col-lg-4 col-md-6">
                <div class="mover-card">
                    <div class="mover-header">
                        <div class="mover-logo">
                            <i class="fas fa-truck-moving"></i>
                        </div>
                        <div class="mover-info">
                            <h5>{{ $mover->company->name ?? $mover->company_name }}</h5>
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= ($mover->company->average_rating ?? 4.2) ? 'text-warning' : 'text-muted' }}"></i>
                                @endfor
                                <span class="ms-2">{{ number_format($mover->company->average_rating ?? 4.2, 1) }}</span>
                            </div>
                        </div>
                    </div>
                    <p class="mover-description">{{ $mover->description ?? 'Reliable moving services with competitive pricing.' }}</p>
                    <div class="mover-features">
                        <span class="badge bg-secondary">Licensed</span>
                        <span class="badge bg-success">Insured</span>
                    </div>
                    <a href="{{ $mover->company ? route('front.company.profile', $mover->company->slug) : '#' }}" class="btn btn-outline-secondary w-100 mt-3">View Company</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No additional movers configured for this page.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Moving Packages</h2>
            <p class="lead">Choose the package that best fits your moving needs</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <h4>Basic Package</h4>
                    <div class="price">$99<span class="price-unit">/hour</span></div>
                    <ul class="service-features">
                        <li>2 professional movers</li>
                        <li>Moving truck included</li>
                        <li>Basic equipment</li>
                        <li>Local moves only</li>
                    </ul>
                    <a href="{{ route('front.get.quote') }}" class="btn btn-primary w-100">Choose Basic</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card featured">
                    <h4>Premium Package</h4>
                    <div class="price">$149<span class="price-unit">/hour</span></div>
                    <ul class="service-features">
                        <li>3 professional movers</li>
                        <li>Larger moving truck</li>
                        <li>Packing materials included</li>
                        <li>Basic packing service</li>
                        <li>Insurance coverage</li>
                    </ul>
                    <a href="{{ route('front.get.quote') }}" class="btn btn-primary w-100">Choose Premium</a>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <h4>Full Service</h4>
                    <div class="price">$199<span class="price-unit">/hour</span></div>
                    <ul class="service-features">
                        <li>4+ professional movers</li>
                        <li>Full packing service</li>
                        <li>Premium materials</li>
                        <li>Unpacking service</li>
                        <li>Full insurance coverage</li>
                        <li>Storage options</li>
                    </ul>
                    <a href="{{ route('front.get.quote') }}" class="btn btn-primary w-100">Choose Full Service</a>
                </div>
            </div>
        </div>
    </div>
</section>

@php
$servicesFaqs = [
    [
        'question' => 'What moving services do you offer?',
        'answer' => 'We offer comprehensive moving services including local moving, interstate moving, packing services, storage solutions, commercial moving, and specialty item transportation. All services are provided by licensed and insured moving companies.'
    ],
    [
        'question' => 'How much do moving services cost?',
        'answer' => 'Moving costs depend on several factors: distance, size of move, services needed, and timing. Local moves typically range from $80-150/hour, while long-distance moves are priced by weight and distance. Get free quotes for accurate pricing.'
    ],
    [
        'question' => 'Do you provide packing materials?',
        'answer' => 'Yes, our partner moving companies provide professional packing materials including boxes, bubble wrap, packing paper, tape, and specialty containers for fragile items. Full packing services are also available.'
    ],
    [
        'question' => 'Are your movers licensed and insured?',
        'answer' => 'Absolutely. All moving companies in our network are properly licensed, bonded, and insured. Interstate movers hold FMCSA licenses, and we verify all credentials before partnering with any company.'
    ],
    [
        'question' => 'How far in advance should I book?',
        'answer' => 'We recommend booking 4-8 weeks in advance, especially during peak moving season (May-September). However, we can often accommodate last-minute moves with 24-48 hours notice, subject to availability.'
    ],
    [
        'question' => 'What if my items are damaged during the move?',
        'answer' => 'All our partner movers carry insurance coverage. Basic liability coverage is included, and full-value protection is available for additional peace of mind. File claims directly with the moving company for prompt resolution.'
    ]
];
@endphp

@include('components.faq-section', ['faqs' => $servicesFaqs, 'title' => 'Moving Services FAQ'])

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2>Ready to Get Started?</h2>
                <p class="lead mb-4">Get free quotes from verified moving companies in your area</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('front.get.quote') }}" class="btn btn-light btn-lg">Get Free Quote</a>
                    <a href="{{ route('front.movers') }}" class="btn btn-outline-light btn-lg">Browse Companies</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
