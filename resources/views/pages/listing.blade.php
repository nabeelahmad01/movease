@extends('layouts.master')
@section('title', 'Company Listings | MoveEase')
@section('content')

    <!-- SEO Schema Markup -->
    @php
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => "Company Listings | MoveEase",
        "description" => "Browse all verified moving companies in our directory. Find FMCSA certified interstate movers with ratings, reviews, and contact information.",
        "url" => route('front.listing'),
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
                        "@id" => route('front.listing'),
                        "name" => "Company Listings"
                    ]
                ]
            ]
        ],
        "mainEntity" => [
            "@type" => "ItemList",
            "name" => "Moving Companies Directory",
            "description" => "Complete directory of FMCSA verified moving companies for interstate moves"
        ]
    ];
    @endphp

    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <div class="container py-5">
        <h2 class="mb-4 text-center">All Moving Companies</h2>
        <form class="row mb-4 justify-content-center">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search by company name, city, or zip...">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Search</button>
            </div>
        </form>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">FastMove Inc.</h5>
                        <p class="card-text">Nationwide moving services. 4.8 ★</p>
                        <a href="/companies/1" class="btn btn-outline-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">SafeHands Movers</h5>
                        <p class="card-text">Trusted by thousands. 4.7 ★</p>
                        <a href="/companies/2" class="btn btn-outline-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Express Relocation</h5>
                        <p class="card-text">Quick and professional. 4.9 ★</p>
                        <a href="/companies/3" class="btn btn-outline-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
