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
      e.preventDefault();
      
      const zipFrom = form.querySelector('.zipfrom');
      const zipTo   = form.querySelector('.zipto');
      const moveDate = form.querySelector('.movedate');
      let isValid = true;
      
      [zipFrom, zipTo].forEach(input => input.classList.remove('is-invalid','is-valid'));
      
      if (!zipFrom.value.trim()) { zipFrom.classList.add('is-invalid'); isValid = false; } 
      else { zipFrom.classList.add('is-valid'); }
      
      if (!zipTo.value.trim()) { zipTo.classList.add('is-invalid'); isValid = false; } 
      else { zipTo.classList.add('is-valid'); }
      
      if (!isValid) { alert('Please fill in all required fields'); return; }
      
      const btn = document.getElementById('getQuoteBtn');
      btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Getting Quotes...';
      btn.disabled = true;
      
      setTimeout(() => {
          const params = new URLSearchParams({
              zip_from: zipFrom.value,
              zip_to: zipTo.value,
              movedate: moveDate.value
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
