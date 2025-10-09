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
    <!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="{{ asset('assets/css/global.css') }}" rel="stylesheet">
    <style>
      /* Global Styles for MoveEase */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

:root {
  --primary-color: #154D71;
  --secondary-color: #1C6EA4;
  /* --primary-color: #555879;
  --secondary-color: #98A1BC; */
  --accent-color: #1C6EA4;
  --success-color: #27ae60;
  --warning-color: #f39c12;
  --danger-color: #e74c3c;
  --light-bg: #ecf0f1;
  --dark-text: #2c3e50;
  --light-text: #7f8c8d;
  --border-color: #bdc3c7;
}

/* Typography */
body {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  line-height: 1.6;
  color: var(--dark-text);
}
a {
  color: var(--primary-color);
  text-decoration: underline;
}

.fixed-top {
  position: sticky !important;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
}
h1, h2, h3, h4, h5, h6 {
  font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  font-weight: 600;
}

/* Custom Button Styles */
.btn-primary {
  background-color: var(--primary-color);
  border-color: var(--primary-color);
}

.btn-primary:hover {
  background-color: #0b5ed7;
  border-color: #0a58ca;
}

.btn-warning {
  background-color: var(--secondary-color);
  border-color: var(--secondary-color);
  color: white;
}

.btn-warning:hover {
  background-color: #e55a00;
  border-color: #d95000;
  color: white;
}
.btn-outline-primary {
  border: 2px solid var(--primary-color);
  color: var(--primary-color);
  font-weight: 600;
  padding: 10px 20px;
  border-radius: 8px;
  transition: all 0.3s ease;
}
.btn-outline-warning {
  color: var(--secondary-color);
  border-color: var(--secondary-color);
}

.btn-outline-warning:hover {
  background-color: var(--secondary-color);
  border-color: var(--secondary-color);
  color: white;
}

/* Card Styles */
.card {
  border: none;
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
  transition: all 0.3s ease;
}

.card:hover {
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  transform: translateY(-2px);
}

.hover-lift:hover {
  transform: translateY(-5px);
  box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
}

/* Hero Section */
.hero-section {
  background: linear-gradient(135deg, var(--primary-color) 0%, #0056b3 100%);
  position: relative;
  overflow: hidden;
}

.hero-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
  opacity: 0.1;
}

/* Section Styling */
.bg-light {
  background-color: #f8f9fa !important;
}

/* Badge Styles */
.badge {
  font-weight: 500;
  padding: 0.5em 0.75em;
}

.badge.bg-warning {
  background-color: var(--secondary-color) !important;
  color: white !important;
}

/* Form Styles */
.form-control:focus {
  border-color: var(--primary-color);
  box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.form-select:focus {
  border-color: var(--primary-color);
  box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

/* Breadcrumb */
.breadcrumb-item + .breadcrumb-item::before {
  color: rgba(255, 255, 255, 0.7);
}

/* Alert Styles */
.alert-success {
  background-color: #d1e7dd;
  border-color: #badbcc;
  color: #0f5132;
}

.alert-info {
  background-color: #cff4fc;
  border-color: #b6effb;
  color: #055160;
}

.alert-warning {
  background-color: #fff3cd;
  border-color: #ffecb5;
  color: #664d03;
}

/* Accordion */
.accordion-button:not(.collapsed) {
  background-color: var(--primary-color);
  color: white;
}

.accordion-button:focus {
  box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

/* Pagination */
.page-link {
  color: var(--primary-color);
}


.page-link:hover {
  color: #0a58ca;
}

.page-item.active .page-link {
  background-color: var(--primary-color);
  border-color: var(--primary-color);
}

/* Text Colors */
.text-primary {
  color: var(--primary-color) !important;
}

.text-warning {
  color: var(--secondary-color) !important;
}

/* Background Colors */
.bg-primary {
  background-color: var(--primary-color) !important;
}

.bg-warning {
  background-color: var(--secondary-color) !important;
}

/* Icon Styles */
.fa-star {
  color: var(--secondary-color);
}

.fa-star-o {
  color: #dee2e6;
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-section {
    text-align: center;
  }
  
  .hero-section .btn {
    margin-bottom: 1rem;
  }
  
  .display-4 {
    font-size: 2.5rem;
  }
  
  .display-5 {
    font-size: 2rem;
  }
}

/* Animation Classes */
.fade-in {
  animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Custom Scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: var(--primary-color);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #0b5ed7;
}

/* Loading States */
.loading {
  opacity: 0.6;
  pointer-events: none;
}

.spinner-border-sm {
  width: 1rem;
  height: 1rem;
}

/* Utility Classes */
.shadow-sm {
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

.shadow-lg {
  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
}

.rounded-circle {
  border-radius: 50% !important;
}

/* Print Styles */
@media print {
  .btn, .hero-section, .bg-light {
    display: none !important;
  }
}

    </style>
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
    @if(config('services.google.maps_key'))
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places"></script>
@endif
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@if(config('services.google.maps_key'))
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places"></script>
@endif
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
(function(){
  function attachAutocomplete(input) {
    if (!input || !window.google) return;
    const options = { 
      componentRestrictions: { country: 'us' }, 
      fields: ['address_components','formatted_address'], 
      types: ['(regions)'] 
    };
    const ac = new google.maps.places.Autocomplete(input, options);
    ac.addListener('place_changed', function(){
      const place = ac.getPlace();
      const postal = (place.address_components||[]).find(c=>c.types.includes('postal_code'));
      const city   = (place.address_components||[]).find(c=>c.types.includes('locality'));
      const state  = (place.address_components||[]).find(c=>c.types.includes('administrative_area_level_1'));

      // 👇 Full formatted value
      const full = [postal?.long_name, city?.long_name, state?.short_name, 'USA']
        .filter(Boolean)
        .join(', ');

      if(postal){
        // Input me full value show karo
        input.value = full;

        // Hidden fields (agar hain to fill kar do)
        const wrapper = input.closest('div');
        if(wrapper){
          const zipEl   = wrapper.querySelector('.hidden-zip');
          const cityEl  = wrapper.querySelector('.hidden-city');
          const stateEl = wrapper.querySelector('.hidden-state');
          if(zipEl)   zipEl.value   = postal?.long_name || '';
          if(cityEl)  cityEl.value  = city?.long_name   || '';
          if(stateEl) stateEl.value = state?.short_name || '';
        }

        // Optional suggestion span
        const hint = input.closest('div')?.querySelector('.zip-suggestion');
        if(hint) hint.textContent = full;
      } else {
        const wrapper = input.closest('div');
        if(wrapper){
          const zipEl   = wrapper.querySelector('.hidden-zip');
          const cityEl  = wrapper.querySelector('.hidden-city');
          const stateEl = wrapper.querySelector('.hidden-state');
          if(zipEl)   zipEl.value   = '';
          if(cityEl)  cityEl.value  = '';
          if(stateEl) stateEl.value = '';
        }
        const hint = input.closest('div')?.querySelector('.zip-suggestion');
        if(hint) hint.textContent = '';
      }
    });
  }

  // Apply autocomplete globally
  document.querySelectorAll('.zipfrom, .zipto').forEach(input => {
    attachAutocomplete(input);
  });
})();
</script>

<script>
// Initialize date picker
if (window.flatpickr) { 
  flatpickr('.movedate', { dateFormat: 'Y-m-d', allowInput: true }); 
}

// Animate feature cards on scroll
const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.feature-card, .review-card').forEach(card => {
    card.style.transition = 'all 0.6s ease';
    observer.observe(card);
});

// Form validation and submission
const form = document.getElementById('quoteForm');
if(form){
  form.addEventListener('submit', function(e) {
      // Only intercept when quick-redirect button exists (home/hero mini form)
      const btn = document.getElementById('getQuoteBtn');
      if (!btn) {
        // No special redirect button present; allow normal submission (e.g., Get Quote page)
        return;
      }

      e.preventDefault();

      const zipFrom = form.querySelector('.zipfrom');
      const zipTo   = form.querySelector('.zipto');
      const moveDate = form.querySelector('.movedate');
      let isValid = true;

      [zipFrom, zipTo].forEach(input => input && input.classList.remove('is-invalid','is-valid'));

      if (!zipFrom || !zipFrom.value.trim()) { if (zipFrom) zipFrom.classList.add('is-invalid'); isValid = false; } 
      else { zipFrom.classList.add('is-valid'); }

      if (!zipTo || !zipTo.value.trim()) { if (zipTo) zipTo.classList.add('is-invalid'); isValid = false; } 
      else { zipTo.classList.add('is-valid'); }

      if (!isValid) { alert('Please fill in all required fields'); return; }

      btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Getting Quotes...';
      btn.disabled = true;

      setTimeout(() => {
          const params = new URLSearchParams({
              zip_from: zipFrom ? zipFrom.value : '',
              zip_to: zipTo ? zipTo.value : '',
              movedate: moveDate ? moveDate.value : ''
          });
          window.location.href = "/get-quote?" + params.toString();
      }, 1500);
  });
}

// State dropdown toggle
document.querySelectorAll('.state-header').forEach(header => {
    header.addEventListener('click', function() {
        const state = this.getAttribute('data-state');
        const content = document.getElementById(state + '-content');
        
        document.querySelectorAll('.state-content').forEach(c => { if(c !== content) c.classList.remove('show'); });
        document.querySelectorAll('.state-header').forEach(h => { if(h !== this) h.classList.remove('active'); });
        
        content.classList.toggle('show');
        this.classList.toggle('active');
    });
});

// Bounce animation on feature icons
document.querySelectorAll('.feature-icon').forEach(icon => {
    icon.addEventListener('mouseenter', function() { this.style.animation = 'bounce 0.6s ease-in-out'; });
    icon.addEventListener('animationend', function() { this.style.animation = ''; });
});
</script>


</body>
</html>
