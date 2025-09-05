<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="/">
            <i class="fas fa-truck me-2"></i>MoveEase
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        href="{{ route('front.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('movers*') ? 'active' : '' }}"
                        href="{{ route('front.movers') }}">Companies</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('best-moving/*') ? 'active' : '' }}"
                        href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Resources
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="resourcesDropdown">
                        @if (!empty($headerBestPages) && $headerBestPages->count())
                            @foreach ($headerBestPages as $hp)
                                <li><a class="dropdown-item"
                                        href="{{ route('front.best.moving', $hp->slug) }}">{{ $hp->page_name }}</a></li>
                            @endforeach
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('front.checklist') }}">Moving Checklist</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('blog*') ? 'active' : '' }}" href="#"
                        id="blogsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Blogs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="blogsDropdown">
                        <li><a class="dropdown-item" href="{{ route('front.blog') }}">All Articles</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if (!empty($headerBlogCategories) && $headerBlogCategories->count())
                            @foreach ($headerBlogCategories as $cat)
                                <li><a class="dropdown-item"
                                        href="{{ route('front.blog.category', $cat->slug) }}">{{ $cat->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('reviews*') ? 'active' : '' }}"
                        href="{{ route('front.review.create') }}">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('get-quote*') ? 'active' : '' }}"
                        href="{{ route('front.get.quote') }}">Get Quote</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}"
                        href="{{ route('front.about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}"
                        href="{{ route('front.contact') }}">Contact</a>
                </li>
            </ul>
            <div class="d-flex gap-2 ms-3">
                <a href="{{ route('front.add-business') }}" class="btn btn-outline-primary btn-sm">Add Listing</a>
                <a href="/admin/login" class="btn btn-primary btn-sm">Login</a>
            </div>
        </div>
    </div>
</nav>

@push('styles')
    <style>
        .navbar {
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #2c3e50 !important;
            transition: all 0.3s ease;
            padding: 0.75rem 1rem !important;
            border-radius: 6px;
            margin: 0 2px;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #e74c3c !important;
            background-color: rgba(231, 76, 60, 0.1);
            transform: translateY(-1px);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 10px 0;
        }

        .dropdown-item {
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }

        .btn-outline-primary {
            border: 2px solid #2c3e50;
            color: #2c3e50;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: #2c3e50;
            border-color: #2c3e50;
            transform: translateY(-1px);
        }

        .btn-primary {
            background: #e74c3c;
            border-color: #e74c3c;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #c0392b;
            border-color: #c0392b;
            transform: translateY(-1px);
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.style.background = 'white';
                navbar.style.backdropFilter = 'none';
            }
        });

        // Simple search suggestions placeholder
        document.getElementById('companySearch')?.addEventListener('input', function() {
            // fetch('/api/companies/suggest?q='+this.value) 
        });
    </script>
@endpush
