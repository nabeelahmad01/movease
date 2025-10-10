@extends('layouts.master')
@section('title', 'Contact Us | MoveEase')
@section('content')

    <!-- SEO Schema Markup -->
    @php
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => "Contact Us | MoveEase",
        "description" => "Get in touch with MoveEase for all your interstate moving questions. Contact our customer service team for support, quotes, and moving assistance.",
        "url" => route('front.contact'),
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
                        "@id" => route('front.contact'),
                        "name" => "Contact Us"
                    ]
                ]
            ]
        ],
        "mainEntity" => [
            "@type" => "ContactPage",
            "name" => "Contact MoveEase",
            "description" => "Contact MoveEase for interstate moving company information, quotes, and customer support."
        ]
    ];
    @endphp

    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    @push('styles')
        <link href="{{ asset('/contact.css') }}" rel="stylesheet">
        <style>
            

h1, h2, h3, h4, h5, h6 {
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-weight: 600;
}

/* Hero Section */
.contact-hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 80px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.contact-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="1000,100 1000,0 0,100"/></svg>');
    background-size: cover;
}

.contact-hero-content {
    position: relative;
    z-index: 2;
}

.contact-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.contact-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
}

/* Contact Content */
.contact-content {
    padding: 80px 0;
}

.contact-form-card {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.contact-info-card {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    height: fit-content;
}

/* Form Styles */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: var(--dark-text);
    margin-bottom: 0.5rem;
    display: block;
}

.form-control,
.form-select {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 12px 15px;
    font-size: 1rem;
    transition: all 0.3s ease;
    width: 100%;
}

.form-control:focus,
.form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
    outline: none;
}

.form-control.textarea {
    min-height: 120px;
    resize: vertical;
}

.btn-submit {
    background: linear-gradient(135deg, var(--secondary-color), #c0392b);
    border: none;
    color: white;
    padding: 15px 40px;
    border-radius: 50px;
    font-size: 1.1rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    width: 100%;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(231, 76, 60, 0.4);
}

/* Contact Info */
.contact-info h3 {
    color: var(--primary-color);
    margin-bottom: 2rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--light-bg);
}

.contact-item:last-child {
    margin-bottom: 0;
    border-bottom: none;
    padding-bottom: 0;
}

.contact-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
    margin-right: 1rem;
    flex-shrink: 0;
}

.contact-details h5 {
    color: var(--primary-color);
    margin-bottom: 0.5rem;
}

.contact-details p {
    color: var(--light-text);
    margin: 0;
    line-height: 1.5;
}

/* Map Section */
.map-section {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    margin-top: 2rem;
}

.map-placeholder {
    height: 300px;
    background: var(--light-bg);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--light-text);
    font-size: 1.1rem;
}

/* FAQ Section */
.faq-section {
    background: white;
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    margin-top: 2rem;
}

.faq-section h3 {
    color: var(--primary-color);
    margin-bottom: 2rem;
    text-align: center;
}

.faq-item {
    margin-bottom: 1rem;
    border: 2px solid var(--light-bg);
    border-radius: 10px;
    overflow: hidden;
}

.faq-question {
    background: var(--light-bg);
    padding: 1rem 1.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 600;
    color: var(--dark-text);
}

.faq-question:hover {
    background: var(--primary-color);
    color: white;
}

.faq-question.active {
    background: var(--primary-color);
    color: white;
}

.faq-answer {
    padding: 0 1.5rem;
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
}

.faq-answer.active {
    padding: 1.5rem;
    max-height: 200px;
}

.faq-answer p {
    color: var(--light-text);
    line-height: 1.6;
    margin: 0;
}

.faq-icon {
    transition: transform 0.3s ease;
}

.faq-question.active .faq-icon {
    transform: rotate(180deg);
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-hero h1 {
        font-size: 2.5rem;
    }
    
    .contact-form-card,
    .contact-info-card {
        padding: 2rem;
    }
    
    .contact-item {
        flex-direction: column;
        text-align: center;
    }
    
    .contact-icon {
        margin: 0 auto 1rem auto;
    }
}

        </style>
    @endpush

    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="contact-hero-content">
                <h1>Contact Us</h1>
                <p>Get in touch with our moving experts for personalized assistance</p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="contact-content">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="contact-form-wrapper">
                        <h2>Send Us a Message</h2>
                        <p class="text-muted mb-4">Have questions about your move? Our team is here to help you every step
                            of the way.</p>

                        <form class="contact-form" method="POST" action="/contact">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Full Name *</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject" class="form-label">Subject</label>
                                        <select class="form-control" id="subject" name="subject">
                                            <option value="">Select a subject</option>
                                            <option value="quote">Get a Quote</option>
                                            <option value="support">Customer Support</option>
                                            <option value="partnership">Partnership Inquiry</option>
                                            <option value="feedback">Feedback</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message" class="form-label">Message *</label>
                                        <textarea class="form-control" id="message" name="message" rows="6"
                                            placeholder="Tell us about your moving needs or questions..." required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="contact-info">
                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4>Call Us</h4>
                            <p>Speak with our moving experts</p>
                            <a href="tel:+15551234567" class="contact-link">(555) 123-4567</a>
                            <div class="contact-hours">
                                <small class="text-muted">Mon-Fri: 8AM-8PM EST<br>Sat-Sun: 9AM-5PM EST</small>
                            </div>
                        </div>

                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4>Email Us</h4>
                            <p>Get detailed responses to your questions</p>
                            <a href="mailto:info@moveease.com" class="contact-link">info@moveease.com</a>
                            <div class="contact-hours">
                                <small class="text-muted">Response within 24 hours</small>
                            </div>
                        </div>

                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h4>Visit Us</h4>
                            <p>Our headquarters location</p>
                            <address class="contact-address">
                                123 Business Plaza<br>
                                Suite 400<br>
                                New York, NY 10001
                            </address>
                        </div>

                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h4>Quick Quote</h4>
                            <p>Get instant moving estimates</p>
                            <a href="/get-quote" class="btn btn-outline-primary">Get Free Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="contact-faq">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Frequently Asked Questions</h2>
                <p class="text-muted">Quick answers to common questions about our moving services</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="contactFAQ">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    How do I get a moving quote?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    You can get a free moving quote by filling out our online form, calling us directly, or
                                    using our instant quote calculator. We'll provide you with accurate estimates from
                                    verified moving companies.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    What information do I need for a quote?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    We'll need your current location, destination, moving date, home size, and any special
                                    requirements. The more details you provide, the more accurate your quote will be.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3">
                                    How far in advance should I book my move?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    We recommend booking your move at least 4-6 weeks in advance, especially during peak
                                    moving season (summer months). This ensures better availability and pricing.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq4">
                                    Do you provide packing services?
                                </button>
                            </h3>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Yes, many of our partner moving companies offer full-service packing, partial packing,
                                    and packing supplies. You can specify your packing needs when requesting a quote.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="contact-map">
        <div class="container-fluid p-0">
            <div class="map-wrapper">
                <div class="map-placeholder">
                    <div class="map-content">
                        <i class="fas fa-map-marked-alt"></i>
                        <h4>Find Us Here</h4>
                        <p>123 Business Plaza, Suite 400<br>New York, NY 10001</p>
                        <a href="https://maps.google.com/?q=123+Business+Plaza+New+York+NY" target="_blank"
                            class="btn btn-primary">
                            <i class="fas fa-directions me-2"></i>Get Directions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
