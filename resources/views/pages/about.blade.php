@extends('layouts.master')
@section('title', 'About Us | MoveEase')
@section('content')

@push('styles')
<style>
/* About Page Styles */
.about-hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 100px 0 80px;
    position: relative;
    overflow: hidden;
}

.about-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
    opacity: 0.3;
}

.about-hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
}

.about-hero h1 {
    font-family: 'Poppins', sans-serif;
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.about-content {
    padding: 80px 0;
}

.feature-card {
    background: white;
    border-radius: 15px;
    padding: 40px 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    text-align: center;
    height: 100%;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.feature-icon {
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

.stats-section {
    background: #f8f9fa;
    padding: 80px 0;
}

.stat-item {
    text-align: center;
    margin-bottom: 30px;
}

.stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: var(--primary-color);
    font-family: 'Poppins', sans-serif;
}

.stat-label {
    font-size: 1.1rem;
    color: var(--light-text);
    font-weight: 500;
}
</style>
@endpush

<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="about-hero-content">
            <h1>About MoveEase</h1>
            <p class="lead">Your trusted partner for stress-free moving experiences</p>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="about-content">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold mb-4">Making Moving Simple</h2>
                <p class="lead">MoveEase connects you with verified, licensed moving companies across the United States. We understand that moving can be stressful, which is why we've created a platform that makes finding reliable movers simple and transparent.</p>
                <p>Our mission is to eliminate the guesswork from your moving experience by providing you with detailed company profiles, genuine customer reviews, and competitive quotes from FMCSA-verified moving professionals.</p>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <i class="fas fa-truck-moving" style="font-size: 8rem; color: var(--primary-color); opacity: 0.1;"></i>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-5">
            <div class="col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-check"></i>
                    </div>
                    <h4>Verified Companies</h4>
                    <p>All moving companies on our platform are FMCSA verified and properly licensed to ensure your peace of mind.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Real Reviews</h4>
                    <p>Read authentic reviews from real customers to make informed decisions about your moving company.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h4>Free Quotes</h4>
                    <p>Get multiple quotes from qualified movers and compare prices to find the best deal for your move.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Our Impact</h2>
            <p class="lead">Helping thousands of families move with confidence</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-number">50,000+</div>
                    <div class="stat-label">Successful Moves</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Verified Companies</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-number">4.8/5</div>
                    <div class="stat-label">Average Rating</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Customer Support</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-4">Ready to Start Your Move?</h2>
                <p class="lead mb-4">Join thousands of satisfied customers who have found their perfect moving company through MoveEase.</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="{{ route('front.get.quote') }}" class="btn btn-primary btn-lg">Get Free Quote</a>
                    <a href="{{ route('front.movers') }}" class="btn btn-outline-primary btn-lg">Browse Companies</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection