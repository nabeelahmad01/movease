@extends('layouts.master')
@section('title', 'Write Review for {{ $company->name }} | MoveEase')
@section('content')

    @push('styles')
        <style>
            /* Review Form Styles */
            .review-form-hero {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
                color: white;
                padding: 80px 0 60px;
            }

            .company-info {
                background: white;
                border-radius: 15px;
                padding: 2rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                margin-bottom: 2rem;
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

            .review-form-section {
                padding: 60px 0;
                background: #f8f9fa;
            }

            .review-form {
                background: white;
                border-radius: 15px;
                padding: 3rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-label {
                font-weight: 600;
                color: var(--primary-color);
                margin-bottom: 0.5rem;
            }

            .form-control {
                border: 2px solid #e9ecef;
                border-radius: 10px;
                padding: 12px 15px;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                border-color: var(--primary-color);
                box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
            }

            .rating-input {
                display: flex;
                gap: 10px;
                margin-bottom: 1rem;
            }

            .rating-star {
                font-size: 2rem;
                color: #ddd;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .rating-star:hover,
            .rating-star.active {
                color: #ffc107;
                transform: scale(1.1);
            }

            .btn-submit-review {
                background: var(--secondary-color);
                color: white;
                border: none;
                padding: 15px 40px;
                border-radius: 10px;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
            }

            .btn-submit-review:hover {
                background: #c0392b;
                transform: translateY(-2px);
                color: white;
            }

            .required {
                color: var(--secondary-color);
            }

            .form-check-input:checked {
                background-color: var(--primary-color);
                border-color: var(--primary-color);
            }

            .alert {
                border-radius: 10px;
                border: none;
            }
        </style>
    @endpush

    <!-- Hero Section -->
    <section class="review-form-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1>Write a Review</h1>
                    <p class="lead">Share your experience with {{ $company->name }}</p>
                </div>
                <div class="col-lg-4 text-end">
                    <a href="{{ route('front.review.create') }}" class="btn btn-outline-light">
                        <i class="fas fa-arrow-left"></i> Back to Companies
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Info -->
    <section class="review-form-section">
        <div class="container">
            <div class="company-info">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <div class="company-logo">
                            {{ strtoupper(substr($company->name, 0, 2)) }}
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h4 class="mb-1">{{ $company->name }}</h4>
                        <p class="text-muted mb-1">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $company->city ?? 'N/A' }}, {{ $company->state->name ?? 'N/A' }}
                        </p>
                        <p class="mb-0">{{ Str::limit($company->description ?? 'Professional moving services', 150) }}</p>
                    </div>
                </div>
            </div>

            <!-- Review Form -->
            <div class="review-form">
                <h3 class="mb-4">Share Your Experience</h3>

                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h6>Please fix the following errors:</h6>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('front.review.store', $company->slug) }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Your Name <span class="required">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email Address <span class="required">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Move Date</label>
                                <input type="date" name="move_date" class="form-control movedate"
                                    value="{{ old('move_date') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Move Type</label>
                        <select name="move_type" class="form-control">
                            <option value="">Select move type</option>
                            <option value="local" {{ old('move_type') == 'local' ? 'selected' : '' }}>Local Move</option>
                            <option value="interstate" {{ old('move_type') == 'interstate' ? 'selected' : '' }}>Interstate
                                Move</option>
                            <option value="commercial" {{ old('move_type') == 'commercial' ? 'selected' : '' }}>Commercial
                                Move</option>
                            <option value="specialty" {{ old('move_type') == 'specialty' ? 'selected' : '' }}>Specialty
                                Move</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Overall Rating <span class="required">*</span></label>
                        <div class="rating-input">
                            <input type="hidden" name="rating" id="ratingValue" value="{{ old('rating', 5) }}">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star rating-star" data-rating="{{ $i }}"></i>
                            @endfor
                        </div>
                        <small class="text-muted">Click the stars to rate your experience</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Review Title <span class="required">*</span></label>
                        <input type="text" name="title" class="form-control"
                            placeholder="e.g., Great service, highly recommend!" value="{{ old('title') }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Your Review <span class="required">*</span></label>
                        <textarea name="review" class="form-control" rows="6"
                            placeholder="Share your detailed experience with this moving company..." required>{{ old('review') }}</textarea>
                        <small class="text-muted">Minimum 10 characters required</small>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="hidden" name="would_recommend" value="0">
                            <input type="checkbox" name="would_recommend" value="1" class="form-check-input"
                                id="recommend" {{ old('would_recommend') ? 'checked' : '' }}>
                            <label class="form-check-label" for="recommend">
                                I would recommend this company to others
                            </label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-submit-review">
                            <i class="fas fa-paper-plane"></i> Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const stars = document.querySelectorAll('.rating-star');
                const ratingValue = document.getElementById('ratingValue');

                // Set initial rating
                updateStars(parseInt(ratingValue.value) || 5);

                stars.forEach(star => {
                    star.addEventListener('click', function() {
                        const rating = parseInt(this.dataset.rating);
                        ratingValue.value = rating;
                        updateStars(rating);
                    });

                    star.addEventListener('mouseover', function() {
                        const rating = parseInt(this.dataset.rating);
                        highlightStars(rating);
                    });
                });

                document.querySelector('.rating-input').addEventListener('mouseleave', function() {
                    updateStars(parseInt(ratingValue.value));
                });

                function updateStars(rating) {
                    stars.forEach((star, index) => {
                        if (index < rating) {
                            star.classList.add('active');
                        } else {
                            star.classList.remove('active');
                        }
                    });
                }

                function highlightStars(rating) {
                    stars.forEach((star, index) => {
                        if (index < rating) {
                            star.style.color = '#ffc107';
                        } else {
                            star.style.color = '#ddd';
                        }
                    });
                }
            });
        </script>
    @endpush

@endsection
