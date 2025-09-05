@extends('layouts.master')
@section('title', 'Moving Tips & Resources Blog | MoveEase')
@section('meta_description', 'Expert moving tips, guides, and resources to make your move stress-free. Read professional advice on packing, planning, and choosing the right movers.')
@section('meta_keywords', 'moving tips, moving guides, packing tips, moving blog, interstate moving advice, moving resources, professional moving tips')
@section('canonical_url', route('front.blog'))
@section('og_title', 'Moving Tips & Resources Blog | MoveEase')
@section('og_description', 'Expert moving tips, guides, and resources to make your move stress-free.')
@section('og_type', 'blog')
@section('content')



@push('styles')
<link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
<style>
    svg{
    width: 30px !important;
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
                        <a href="{{ route('front.blog') }}" class="category-btn {{ !request('category') ? 'active' : '' }}">All Articles</a>
                        @foreach($categories as $category)
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
                            @if($blog->featured_image)
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="img-fluid">
                            @else
                                <i class="fas fa-newspaper"></i>
                            @endif
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="category">{{ $blog->category->name }}</span>
                                <span class="date">{{ $blog->created_at->format('M d, Y') }}</span>
                            </div>
                            <h3><a href="{{ route('front.blog.detail', $blog->slug) }}">{{ $blog->title }}</a></h3>
                            <p>{{ Str::limit($blog->excerpt ?? strip_tags($blog->content), 150) }}</p>
                            <div class="blog-footer">
                                <span class="author">By {{ $blog->user->name ?? 'MoveEase Team' }}</span>
                                <a href="{{ route('front.blog.detail', $blog->slug) }}" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
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
                            <p class="blog-excerpt">Get expert tips on packing, planning, and making your long distance move stress-free. Learn from professional movers about the best practices for interstate relocations.</p>
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
                            <p class="blog-excerpt">Avoid these common mistakes and ensure a smooth moving experience. Learn what to look for in a moving company and red flags to watch out for.</p>
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
                            <p class="blog-excerpt">Discover proven strategies to reduce your moving costs without compromising on quality. Tips from industry experts on budget-friendly moving solutions.</p>
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
                            <p class="blog-excerpt">Master the art of packing with our comprehensive guide. Learn professional techniques to protect your belongings during long-distance transportation.</p>
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
                                <a href="{{ route('front.blog.detail', $recentBlog->slug) }}">{{ $recentBlog->title }}</a>
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
