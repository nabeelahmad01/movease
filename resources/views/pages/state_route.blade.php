@extends('layouts.master')
@section('title', ($route->title ?? 'State Route') . ' | MoveEase')
@section('content')

    <!-- SEO Schema Markup -->
    @php
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => $route->title ?? 'State Route' . ' | MoveEase',
        "description" => "Moving route information for " . $route->title ?? 'state-to-state move' . ". Find costs, distance, and verified moving companies for this interstate route.",
        "url" => request()->url(),
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
                        "@id" => route('front.routes.index'),
                        "name" => "Moving Routes"
                    ]
                ],
                [
                    "@type" => "ListItem",
                    "position" => 3,
                    "item" => [
                        "@id" => request()->url(),
                        "name" => $route->title ?? 'Route'
                    ]
                ]
            ]
        ],
        "mainEntity" => [
            "@type" => "Trip",
            "name" => $route->title ?? 'Moving Route',
            "description" => "Moving route details including distance, estimated costs, and moving company information"
        ]
    ];
    @endphp

    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    <div class="container py-5">
        <h1 class="fw-bold mb-3">{{ $route->title ?? 'State To State Route' }}</h1>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted">From State</div>
                        <div class="fw-semibold">{{ $route->fromState->name ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted">To State</div>
                        <div class="fw-semibold">{{ $route->toState->name ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted">Miles</div>
                        <div class="fw-semibold">{{ $route->miles ?? '—' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <span class="badge bg-success me-2">Min Cost: {{ $route->min_cost ?? '—' }}</span>
            <span class="badge bg-warning text-dark">Max Cost: {{ $route->max_cost ?? '—' }}</span>
        </div>
    </div>
@endsection
