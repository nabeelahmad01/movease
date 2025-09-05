<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MoveEase - Professional Moving Services')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Find trusted moving companies, get free quotes, and read reviews. MoveEase connects you with professional movers for local and interstate moves.')">
    <meta name="keywords" content="@yield('meta_keywords', 'moving companies, movers, interstate moving, local moving, moving quotes, professional movers, moving services')">
    <meta name="author" content="MoveEase">
    <meta name="robots" content="index, follow">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="@yield('canonical_url', url()->current())">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'MoveEase - Professional Moving Services')">
    <meta property="og:description" content="@yield('og_description', 'Find trusted moving companies, get free quotes, and read reviews. MoveEase connects you with professional movers for local and interstate moves.')">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:image" content="@yield('og_image', asset('assets/images/moveease-logo.png'))">
    <meta property="og:site_name" content="MoveEase">
    <meta property="og:locale" content="en_US">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'MoveEase - Professional Moving Services')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Find trusted moving companies, get free quotes, and read reviews.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('assets/images/moveease-logo.png'))">
    
    <!-- Schema.org JSON-LD -->
    @stack('schema')
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    @include('layouts.header')
    <main class="min-vh-100">
        @yield('content')
    </main>
    @include('layouts.footer')
    <!-- jQuery (needed for Select2 and other plugins) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
