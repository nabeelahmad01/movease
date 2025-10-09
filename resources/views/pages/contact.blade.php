@extends('layouts.master')
@section('title', 'Contact Us | MoveEase')
@section('content')

    @push('styles')
        <link href="{{ asset('/contact.css') }}" rel="stylesheet">
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
