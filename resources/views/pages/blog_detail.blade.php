@extends('layouts.master')
@section('title', '{{ $blog->title }} | MoveEase')
@section('content')

    @push('styles')
        <style>
            /* Blog Detail Styles */
            .blog-detail-hero {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
                color: white;
                padding: 80px 0 60px;
            }

            .blog-detail-content {
                padding: 80px 0;
            }

            .blog-article {
                background: white;
                border-radius: 15px;
                padding: 3rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                margin-bottom: 3rem;
            }

            .blog-meta {
                display: flex;
                align-items: center;
                gap: 20px;
                margin-bottom: 2rem;
                padding-bottom: 1rem;
                border-bottom: 1px solid #e9ecef;
            }

            .blog-category {
                background: var(--secondary-color);
                color: white;
                padding: 5px 15px;
                border-radius: 20px;
                font-size: 0.9rem;
                font-weight: 600;
            }

            .blog-date {
                color: var(--light-text);
                font-size: 0.9rem;
            }

            .blog-author {
                color: var(--light-text);
                font-size: 0.9rem;
            }

            .blog-content {
                font-size: 1.1rem;
                line-height: 1.8;
                color: var(--dark-text);
            }

            .blog-content h2,
            .blog-content h3,
            .blog-content h4 {
                color: var(--primary-color);
                margin-top: 2rem;
                margin-bottom: 1rem;
            }

            .blog-content p {
                margin-bottom: 1.5rem;
            }

            .blog-content ul,
            .blog-content ol {
                margin-bottom: 1.5rem;
                padding-left: 2rem;
            }

            .blog-content li {
                margin-bottom: 0.5rem;
            }

            .related-blogs {
                background: #f8f9fa;
                padding: 3rem 0;
            }

            .related-blog-card {
                background: white;
                border-radius: 15px;
                padding: 1.5rem;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
                height: 100%;
            }

            .related-blog-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            }

            .related-blog-card h5 {
                color: var(--primary-color);
                margin-bottom: 1rem;
            }

            .related-blog-card .btn {
                background: var(--primary-color);
                color: white;
                border: none;
                padding: 8px 20px;
                border-radius: 20px;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .related-blog-card .btn:hover {
                background: var(--secondary-color);
                transform: translateY(-1px);
            }

            .back-to-blog {
                color: white;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .back-to-blog:hover {
                color: #f8f9fa;
                text-decoration: none;
            }
        </style>
    @endpush

    <!-- Hero Section -->
    <section class="blog-detail-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1>{{ $blog->title }}</h1>
                    <p class="lead">{{ $blog->excerpt ?? 'Expert moving advice and tips' }}</p>
                </div>
                <div class="col-lg-4 text-end">
                    <a href="{{ route('front.blog') }}" class="back-to-blog">
                        <i class="fas fa-arrow-left"></i> Back to Blog
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="blog-detail-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <article class="blog-article">
                        <div class="blog-meta">
                            <span class="blog-category">{{ $blog->category->name ?? 'Moving Tips' }}</span>
                            <span class="blog-date">
                                <i class="fas fa-calendar-alt"></i>
                                {{ $blog->created_at->format('M d, Y') }}
                            </span>
                            <span class="blog-author">
                                <i class="fas fa-user"></i>
                                By {{ $blog->user->name ?? 'MoveEase Team' }}
                            </span>
                        </div>

                        <div class="blog-content">
                            {!! $blog->content !!}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Blogs -->
    @if ($relatedBlogs->count() > 0)
        <section class="related-blogs">
            <div class="container">
                <div class="text-center mb-5">
                    <h2>Related Articles</h2>
                    <p class="lead">More helpful moving tips and guides</p>
                </div>

                <div class="row g-4">
                    @foreach ($relatedBlogs as $relatedBlog)
                        <div class="col-lg-4">
                            <div class="related-blog-card">
                                <h5>{{ $relatedBlog->title }}</h5>
                                <p class="text-muted">{{ Str::limit($relatedBlog->excerpt ?? 'Expert moving advice', 100) }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">{{ $relatedBlog->created_at->format('M d, Y') }}</small>
                                    <a href="{{ route('front.blog.detail', $relatedBlog->slug) }}" class="btn btn-sm">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
