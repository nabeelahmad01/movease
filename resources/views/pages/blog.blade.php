@extends('layouts.master')
@section('title', 'Moving Tips & Resources Blog | MoveEase')
@section('meta_description', 'Expert moving tips, guides, and resources to make your move stress-free. Read professional
    advice on packing, planning, and choosing the right movers.')
@section('meta_keywords', 'moving tips, moving guides, packing tips, moving blog, interstate moving advice, moving
    resources, professional moving tips')
@section('canonical_url', route('front.blog'))
@section('og_description', 'Expert moving tips, guides, and resources to make your move stress-free.')
@section('og_type', 'blog')
@section('content')

    <!-- SEO Schema Markup -->
    @php
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "WebPage",
        "name" => "Moving Tips & Resources Blog | MoveEase",
        "description" => "Expert moving tips, guides, and resources to make your move stress-free. Read professional advice on packing, planning, and choosing the right movers.",
        "url" => route('front.blog'),
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
                        "@id" => route('front.blog'),
                        "name" => "Blog"
                    ]
                ]
            ]
        ],
        "mainEntity" => [
            "@type" => "Blog",
            "name" => "MoveEase Moving Blog",
            "description" => "Expert moving tips, guides, and resources for stress-free relocations",
            "url" => route('front.blog'),
            "publisher" => [
                "@type" => "Organization",
                "name" => "MoveEase"
            ]
        ]
    ];
    @endphp

    <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    @push('styles')
        <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
        <style>
            svg {
                width: 30px !important;
            }
            
h1, h2, h3, h4, h5, h6 {
    font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-weight: 600;
}

/* Hero Section */
.blog-hero {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    padding: 80px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.blog-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="1000,100 1000,0 0,100"/></svg>');
    background-size: cover;
}

.blog-hero-content {
    position: relative;
    z-index: 2;
}

.blog-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.blog-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
}

/* Blog Content */
.blog-content {
    padding: 20px;
}

/* Category Filter */
.category-filter {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.category-filter h4 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.category-buttons {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.category-btn {
    background: var(--light-bg);
    border: 2px solid transparent;
    color: var(--dark-text);
    padding: 8px 20px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
    font-size: 0.9rem;
}

.category-btn:hover,
.category-btn.active {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
    transform: translateY(-1px);
}

/* Blog Grid */
.blog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.blog-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.blog-image {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 3rem;
    position: relative;
    overflow: hidden;
}

.blog-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.blog-content-card {
    padding: 1.5rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.blog-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    font-size: 0.9rem;
    color: var(--light-text);
}

.blog-category {
    background: var(--accent-color);
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-weight: 500;
    font-size: 0.8rem;
}

.blog-date {
    display: flex;
    align-items: center;
}

.blog-date i {
    margin-right: 0.5rem;
}

.blog-card h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    font-size: 1.3rem;
    line-height: 1.4;
}

.blog-card h3 a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.blog-card h3 a:hover {
    color: var(--secondary-color);
}

.blog-excerpt {
    color: var(--light-text);
    line-height: 1.6;
    margin-bottom: 1.5rem;
    flex-grow: 1;
}

.blog-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid var(--light-bg);
}

.read-more {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.read-more:hover {
    color: var(--secondary-color);
    transform: translateX(5px);
}

.read-more i {
    margin-left: 0.5rem;
    transition: transform 0.3s ease;
}

.read-more:hover i {
    transform: translateX(3px);
}

.blog-stats {
    display: flex;
    gap: 1rem;
    color: var(--light-text);
    font-size: 0.9rem;
}

.blog-stat {
    display: flex;
    align-items: center;
}

.blog-stat i {
    margin-right: 0.25rem;
}

/* Pagination */
.blog-pagination {
    display: flex;
    justify-content: center;
    margin-top: 3rem;
}

.pagination {
    display: flex;
    gap: 0.5rem;
}
svg{
    width: 30px !important;
}

.page-link {
    color: var(--primary-color);
    background: white;
    border: 2px solid var(--light-bg);
    padding: 10px 15px;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
}
.page-link svg{
    width: 30px !important;
}

.page-link:hover,
.page-link.active {
    background: var(--primary-color);
    color: white;
    border-color: var(--primary-color);
    transform: translateY(-1px);
}

/* Sidebar */
.blog-sidebar {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    height: fit-content;
    position: sticky;
    top: 100px;
}

.sidebar-section {
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid var(--light-bg);
}

.sidebar-section:last-child {
    margin-bottom: 0;
    border-bottom: none;
    padding-bottom: 0;
}

.sidebar-section h4 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.recent-posts {
    list-style: none;
    padding: 0;
    margin: 0;
}

.recent-posts li {
    margin-bottom: 1rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--light-bg);
}

.recent-posts li:last-child {
    margin-bottom: 0;
    border-bottom: none;
    padding-bottom: 0;
}

.recent-posts a {
    color: var(--dark-text);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
    display: block;
    margin-bottom: 0.25rem;
}

.recent-posts a:hover {
    color: var(--secondary-color);
}

.recent-posts .post-date {
    color: var(--light-text);
    font-size: 0.85rem;
}

.tag-cloud {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.tag {
    background: var(--light-bg);
    color: var(--dark-text);
    padding: 6px 12px;
    border-radius: 15px;
    text-decoration: none;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.tag:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-1px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .blog-hero h1 {
        font-size: 2.5rem;
    }
    
    .blog-grid {
        grid-template-columns: 1fr;
    }
    
    .category-buttons {
        justify-content: center;
    }
    
    .blog-meta {
        flex-direction: column;
        gap: 0.5rem;
        align-items: flex-start;
    }
    
    .blog-footer {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }
    
    .blog-sidebar {
        position: static;
        margin-top: 2rem;
    }
}

        </style>
    @endpush

    <!-- Hero Section -->
    <section class="blog-hero">
        <div class="container">
            <div class="blog-hero-content">
                <h1>Moving Tips & Resources</h1>
                <p>Expert advice and guides to make your move stress-free</p>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="blog-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Category Filter -->
                    <div class="category-filter">
                        <h4>Browse by Category</h4>
                        <div class="category-buttons">
                            <a href="{{ route('front.blog') }}"
                                class="category-btn {{ !request('category') ? 'active' : '' }}">All Articles</a>
                            @foreach ($categories as $category)
                                <a href="{{ route('front.blog.category', $category->slug) }}"
                                    class="category-btn {{ request('category') == $category->slug ? 'active' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Blog Grid -->
                    <div class="blog-grid">
                        @forelse($blogs as $blog)
                            <article class="blog-card">
                                <div class="blog-image">
                                    @if ($blog->featured_image)
                                        <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                                            class="img-fluid">
                                    @else
                                        <i class="fas fa-newspaper"></i>
                                    @endif
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="category">{{ $blog->category->name }}</span>
                                        <span class="date">{{ $blog->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <h3><a href="{{ route('front.blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p>{{ Str::limit($blog->excerpt ?? strip_tags($blog->content), 150) }}</p>
                                    <div class="blog-footer">
                                        <span class="author">By {{ $blog->user->name ?? 'MoveEase Team' }}</span>
                                        <a href="{{ route('front.blog.detail', $blog->slug) }}" class="read-more">Read More
                                            <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <!-- Default Articles -->
                            <article class="blog-card">
                                <div class="blog-image">
                                    <i class="fas fa-truck-moving"></i>
                                </div>
                                <div class="blog-content-card">
                                    <div class="blog-meta">
                                        <span class="blog-category">Moving Tips</span>
                                        <div class="blog-date">
                                            <i class="fas fa-calendar-alt"></i>
                                            Dec 15, 2024
                                        </div>
                                    </div>
                                    <h3><a href="#">How to Prepare for a Long Distance Move</a></h3>
                                    <p class="blog-excerpt">Get expert tips on packing, planning, and making your long
                                        distance move stress-free. Learn from professional movers about the best practices
                                        for interstate relocations.</p>
                                    <div class="blog-footer">
                                        <a href="#" class="read-more">
                                            Read More <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <div class="blog-stats">
                                            <span class="blog-stat">
                                                <i class="fas fa-eye"></i>
                                                1,245
                                            </span>
                                            <span class="blog-stat">
                                                <i class="fas fa-clock"></i>
                                                5 min read
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="blog-card">
                                <div class="blog-image">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="blog-content-card">
                                    <div class="blog-meta">
                                        <span class="blog-category">Moving Guides</span>
                                        <div class="blog-date">
                                            <i class="fas fa-calendar-alt"></i>
                                            Dec 12, 2024
                                        </div>
                                    </div>
                                    <h3><a href="#">Top 5 Mistakes to Avoid When Hiring Movers</a></h3>
                                    <p class="blog-excerpt">Avoid these common mistakes and ensure a smooth moving
                                        experience. Learn what to look for in a moving company and red flags to watch out
                                        for.</p>
                                    <div class="blog-footer">
                                        <a href="#" class="read-more">
                                            Read More <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <div class="blog-stats">
                                            <span class="blog-stat">
                                                <i class="fas fa-eye"></i>
                                                892
                                            </span>
                                            <span class="blog-stat">
                                                <i class="fas fa-clock"></i>
                                                4 min read
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="blog-card">
                                <div class="blog-image">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="blog-content-card">
                                    <div class="blog-meta">
                                        <span class="blog-category">Cost Saving</span>
                                        <div class="blog-date">
                                            <i class="fas fa-calendar-alt"></i>
                                            Dec 10, 2024
                                        </div>
                                    </div>
                                    <h3><a href="#">How to Save Money on Your Interstate Move</a></h3>
                                    <p class="blog-excerpt">Discover proven strategies to reduce your moving costs without
                                        compromising on quality. Tips from industry experts on budget-friendly moving
                                        solutions.</p>
                                    <div class="blog-footer">
                                        <a href="#" class="read-more">
                                            Read More <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <div class="blog-stats">
                                            <span class="blog-stat">
                                                <i class="fas fa-eye"></i>
                                                1,567
                                            </span>
                                            <span class="blog-stat">
                                                <i class="fas fa-clock"></i>
                                                6 min read
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                            <article class="blog-card">
                                <div class="blog-image">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <div class="blog-content-card">
                                    <div class="blog-meta">
                                        <span class="blog-category">Packing Tips</span>
                                        <div class="blog-date">
                                            <i class="fas fa-calendar-alt"></i>
                                            Dec 8, 2024
                                        </div>
                                    </div>
                                    <h3><a href="#">Ultimate Packing Guide for Long Distance Moves</a></h3>
                                    <p class="blog-excerpt">Master the art of packing with our comprehensive guide. Learn
                                        professional techniques to protect your belongings during long-distance
                                        transportation.</p>
                                    <div class="blog-footer">
                                        <a href="#" class="read-more">
                                            Read More <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <div class="blog-stats">
                                            <span class="blog-stat">
                                                <i class="fas fa-eye"></i>
                                                2,134
                                            </span>
                                            <span class="blog-stat">
                                                <i class="fas fa-clock"></i>
                                                8 min read
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="blog-pagination">
                        <div class="pagination">
                            <a href="#" class="page-link">1</a>
                            <a href="#" class="page-link active">2</a>
                            <a href="#" class="page-link">3</a>
                            <a href="#" class="page-link">Next</a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-section">
                            <h4>Recent Posts</h4>
                            <ul class="recent-posts">
                                @forelse($recentBlogs as $recentBlog)
                                    <li>
                                        <a
                                            href="{{ route('front.blog.detail', $recentBlog->slug) }}">{{ $recentBlog->title }}</a>
                                        <div class="post-date">{{ $recentBlog->created_at->format('M d, Y') }}</div>
                                    </li>
                                @empty
                                    <li>
                                        <a href="#">Moving Insurance: What You Need to Know</a>
                                        <div class="post-date">Dec 14, 2024</div>
                                    </li>
                                    <li>
                                        <a href="#">Best Time of Year to Move Interstate</a>
                                        <div class="post-date">Dec 11, 2024</div>
                                    </li>
                                    <li>
                                        <a href="#">How to Handle Fragile Items During a Move</a>
                                        <div class="post-date">Dec 9, 2024</div>
                                    </li>
                                    <li>
                                        <a href="#">Moving with Pets: A Complete Guide</a>
                                        <div class="post-date">Dec 7, 2024</div>
                                    </li>
                                @endforelse
                            </ul>
                        </div>

                        <div class="sidebar-section">
                            <h4>Popular Tags</h4>
                            <div class="tag-cloud">
                                <a href="#" class="tag">Long Distance</a>
                                <a href="#" class="tag">Packing</a>
                                <a href="#" class="tag">Interstate</a>
                                <a href="#" class="tag">Moving Tips</a>
                                <a href="#" class="tag">Cost Saving</a>
                                <a href="#" class="tag">Insurance</a>
                                <a href="#" class="tag">Planning</a>
                                <a href="#" class="tag">Storage</a>
                            </div>
                        </div>

                        <div class="sidebar-section">
                            <h4>Get Free Quote</h4>
                            <p>Ready to move? Get quotes from verified moving companies.</p>
                            <a href="/get-quote" class="btn btn-primary w-100">Get My Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
