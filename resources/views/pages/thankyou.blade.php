@extends('layouts.master')
@section('title', 'Thank You | MoveEase')
@section('content')

    <!-- SEO Schema Markup -->
    @php
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => "Thank You | MoveEase",
        "description" => "Thank you for your inquiry. Our team will contact you soon regarding your moving needs and quotes from verified interstate moving companies.",
        "url" => route('front.thankyou'),
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
                        "@id" => route('front.thankyou'),
                        "name" => "Thank You"
                    ]
                ]
            ]
        ],
        "mainEntity" => [
            "@type" => "WebPage",
            "name" => "Thank You Page",
            "description" => "Confirmation page for MoveEase quote requests and inquiries"
        ]
    ];
    @endphp

    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <div class="container py-5 text-center">
        <h1 class="fw-bold">Thank you!</h1>
        <p class="lead">Your request has been received. Our team will contact you soon.</p>
        <a class="btn btn-primary" href="/">Back to Home</a>
    </div>
@endsection
