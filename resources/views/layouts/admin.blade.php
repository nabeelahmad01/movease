<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title','Admin | MoveEase')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
  @stack('styles')
</head>
<body>
  <div class="admin-root d-flex">
    <aside class="admin-sidebar bg-white border-end d-none d-md-block">
      <div class="p-3 border-bottom d-flex align-items-center gap-2">
        <i class="bi bi-box-seam text-primary fs-4"></i>
        <span class="fw-bold">MoveEase Admin</span>
      </div>
      <nav class="nav flex-column p-2">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.companies.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navCompanies" aria-expanded="{{ request()->routeIs('admin.companies.*') ? 'true' : 'false' }}"><i class="bi bi-buildings me-2"></i>Companies</button>
          <div class="collapse {{ request()->routeIs('admin.companies.*') ? 'show' : '' }}" id="navCompanies">
            <a class="nav-link small ps-4 {{ request()->routeIs('admin.companies.create') ? 'active' : '' }}" href="{{ route('admin.companies.create') }}">Create</a>
            <a class="nav-link small ps-4 {{ request()->routeIs('admin.companies.index') ? 'active' : '' }}" href="{{ route('admin.companies.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navBlogCats" aria-expanded="{{ request()->routeIs('admin.blog-categories.*') ? 'true' : 'false' }}"><i class="bi bi-tags me-2"></i>Blog Categories</button>
          <div class="collapse {{ request()->routeIs('admin.blog-categories.*') ? 'show' : '' }}" id="navBlogCats">
            <a class="nav-link small ps-4 {{ request()->routeIs('admin.blog-categories.create') ? 'active' : '' }}" href="{{ route('admin.blog-categories.create') }}">Create</a>
            <a class="nav-link small ps-4 {{ request()->routeIs('admin.blog-categories.index') ? 'active' : '' }}" href="{{ route('admin.blog-categories.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navBlogs" aria-expanded="{{ request()->routeIs('admin.blogs.*') ? 'true' : 'false' }}"><i class="bi bi-journal-text me-2"></i>Blogs</button>
          <div class="collapse {{ request()->routeIs('admin.blogs.*') ? 'show' : '' }}" id="navBlogs">
            <a class="nav-link small ps-4 {{ request()->routeIs('admin.blogs.create') ? 'active' : '' }}" href="{{ route('admin.blogs.create') }}">Create</a>
            <a class="nav-link small ps-4 {{ request()->routeIs('admin.blogs.index') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navReviews" aria-expanded="{{ request()->routeIs('admin.reviews.*') ? 'true' : 'false' }}"><i class="bi bi-star-half me-2"></i>Reviews</button>
          <div class="collapse {{ request()->routeIs('admin.reviews.*') ? 'show' : '' }}" id="navReviews">
            <a class="nav-link small ps-4 {{ request()->routeIs('admin.reviews.create') ? 'active' : '' }}" href="{{ route('admin.reviews.create') }}">Create</a>
            <a class="nav-link small ps-4 {{ request()->routeIs('admin.reviews.index') ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">List</a>
          </div>
        </div>
        <hr>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.state-routes.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navStateRoutes" aria-expanded="{{ request()->routeIs('admin.state-routes.*') ? 'true' : 'false' }}"><i class="bi bi-signpost-2 me-2"></i>State Routes</button>
          <div class="collapse {{ request()->routeIs('admin.state-routes.*') ? 'show' : '' }}" id="navStateRoutes">
            <a class="nav-link small ps-4" href="{{ route('admin.state-routes.create') }}">Create</a>
            <a class="nav-link small ps-4" href="{{ route('admin.state-routes.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.city-routes.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navCityRoutes" aria-expanded="{{ request()->routeIs('admin.city-routes.*') ? 'true' : 'false' }}"><i class="bi bi-geo-alt me-2"></i>City Routes</button>
          <div class="collapse {{ request()->routeIs('admin.city-routes.*') ? 'show' : '' }}" id="navCityRoutes">
            <a class="nav-link small ps-4" href="{{ route('admin.city-routes.create') }}">Create</a>
            <a class="nav-link small ps-4" href="{{ route('admin.city-routes.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.checklist-categories.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navChecklistCats" aria-expanded="{{ request()->routeIs('admin.checklist-categories.*') ? 'true' : 'false' }}"><i class="bi bi-list-check me-2"></i>Checklist Categories</button>
          <div class="collapse {{ request()->routeIs('admin.checklist-categories.*') ? 'show' : '' }}" id="navChecklistCats">
            <a class="nav-link small ps-4" href="{{ route('admin.checklist-categories.create') }}">Create</a>
            <a class="nav-link small ps-4" href="{{ route('admin.checklist-categories.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.checklist-items.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navChecklistItems" aria-expanded="{{ request()->routeIs('admin.checklist-items.*') ? 'true' : 'false' }}"><i class="bi bi-ui-checks-grid me-2"></i>Checklist Items</button>
          <div class="collapse {{ request()->routeIs('admin.checklist-items.*') ? 'show' : '' }}" id="navChecklistItems">
            <a class="nav-link small ps-4" href="{{ route('admin.checklist-items.create') }}">Create</a>
            <a class="nav-link small ps-4" href="{{ route('admin.checklist-items.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.top-movers.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navTopMovers" aria-expanded="{{ request()->routeIs('admin.top-movers.*') ? 'true' : 'false' }}"><i class="bi bi-award me-2"></i>Top Movers</button>
          <div class="collapse {{ request()->routeIs('admin.top-movers.*') ? 'show' : '' }}" id="navTopMovers">
            <a class="nav-link small ps-4" href="{{ route('admin.top-movers.create') }}">Create</a>
            <a class="nav-link small ps-4" href="{{ route('admin.top-movers.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.bottom-movers.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navBottomMovers" aria-expanded="{{ request()->routeIs('admin.bottom-movers.*') ? 'true' : 'false' }}"><i class="bi bi-arrow-down-square me-2"></i>Bottom Movers</button>
          <div class="collapse {{ request()->routeIs('admin.bottom-movers.*') ? 'show' : '' }}" id="navBottomMovers">
            <a class="nav-link small ps-4" href="{{ route('admin.bottom-movers.create') }}">Create</a>
            <a class="nav-link small ps-4" href="{{ route('admin.bottom-movers.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.best-moving-pages.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#navBestMoving" aria-expanded="{{ request()->routeIs('admin.best-moving-pages.*') ? 'true' : 'false' }}"><i class="bi bi-file-earmark-text me-2"></i>Best Moving Page</button>
          <div class="collapse {{ request()->routeIs('admin.best-moving-pages.*') ? 'show' : '' }}" id="navBestMoving">
            <a class="nav-link small ps-4" href="{{ route('admin.best-moving-pages.create') }}">Create</a>
            <a class="nav-link small ps-4" href="{{ route('admin.best-moving-pages.index') }}">List</a>
          </div>
        </div>
        <div class="nav-group">
          <a class="nav-link {{ request()->routeIs('admin.quotes.index') ? 'active' : '' }}" href="{{ route('admin.quotes.index') }}">
            <i class="bi bi-quote me-2"></i>Quote Requests
          </a>
        </div>
      </nav>
    </aside>

    <!-- Offcanvas Sidebar (Mobile) -->
    <div class="offcanvas offcanvas-start offcanvas-sidebar d-md-none" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
      <div class="offcanvas-header border-bottom">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-box-seam text-primary fs-4"></i>
          <span class="fw-bold" id="sidebarOffcanvasLabel">MoveEase Admin</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body p-2">
        <nav class="nav flex-column">
          <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.companies.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavCompanies" aria-expanded="{{ request()->routeIs('admin.companies.*') ? 'true' : 'false' }}"><i class="bi bi-buildings me-2"></i>Companies</button>
            <div class="collapse {{ request()->routeIs('admin.companies.*') ? 'show' : '' }}" id="mNavCompanies">
              <a class="nav-link small ps-4 {{ request()->routeIs('admin.companies.create') ? 'active' : '' }}" href="{{ route('admin.companies.create') }}">Create</a>
              <a class="nav-link small ps-4 {{ request()->routeIs('admin.companies.index') ? 'active' : '' }}" href="{{ route('admin.companies.index') }}">List</a>
            </div>
          </div>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavBlogCats" aria-expanded="{{ request()->routeIs('admin.blog-categories.*') ? 'true' : 'false' }}"><i class="bi bi-tags me-2"></i>Blog Categories</button>
            <div class="collapse {{ request()->routeIs('admin.blog-categories.*') ? 'show' : '' }}" id="mNavBlogCats">
              <a class="nav-link small ps-4 {{ request()->routeIs('admin.blog-categories.create') ? 'active' : '' }}" href="{{ route('admin.blog-categories.create') }}">Create</a>
              <a class="nav-link small ps-4 {{ request()->routeIs('admin.blog-categories.index') ? 'active' : '' }}" href="{{ route('admin.blog-categories.index') }}">List</a>
            </div>
          </div>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavBlogs" aria-expanded="{{ request()->routeIs('admin.blogs.*') ? 'true' : 'false' }}"><i class="bi bi-journal-text me-2"></i>Blogs</button>
            <div class="collapse {{ request()->routeIs('admin.blogs.*') ? 'show' : '' }}" id="mNavBlogs">
              <a class="nav-link small ps-4 {{ request()->routeIs('admin.blogs.create') ? 'active' : '' }}" href="{{ route('admin.blogs.create') }}">Create</a>
              <a class="nav-link small ps-4 {{ request()->routeIs('admin.blogs.index') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">List</a>
            </div>
          </div>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavReviews" aria-expanded="{{ request()->routeIs('admin.reviews.*') ? 'true' : 'false' }}"><i class="bi bi-star-half me-2"></i>Reviews</button>
            <div class="collapse {{ request()->routeIs('admin.reviews.*') ? 'show' : '' }}" id="mNavReviews">
              <a class="nav-link small ps-4 {{ request()->routeIs('admin.reviews.create') ? 'active' : '' }}" href="{{ route('admin.reviews.create') }}">Create</a>
              <a class="nav-link small ps-4 {{ request()->routeIs('admin.reviews.index') ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">List</a>
            </div>
          </div>
          <hr>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.state-routes.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavStateRoutes" aria-expanded="{{ request()->routeIs('admin.state-routes.*') ? 'true' : 'false' }}"><i class="bi bi-signpost-2 me-2"></i>State Routes</button>
            <div class="collapse {{ request()->routeIs('admin.state-routes.*') ? 'show' : '' }}" id="mNavStateRoutes">
              <a class="nav-link small ps-4" href="{{ route('admin.state-routes.create') }}">Create</a>
              <a class="nav-link small ps-4" href="{{ route('admin.state-routes.index') }}">List</a>
            </div>
          </div>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.city-routes.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavCityRoutes" aria-expanded="{{ request()->routeIs('admin.city-routes.*') ? 'true' : 'false' }}"><i class="bi bi-geo-alt me-2"></i>City Routes</button>
            <div class="collapse {{ request()->routeIs('admin.city-routes.*') ? 'show' : '' }}" id="mNavCityRoutes">
              <a class="nav-link small ps-4" href="{{ route('admin.city-routes.create') }}">Create</a>
              <a class="nav-link small ps-4" href="{{ route('admin.city-routes.index') }}">List</a>
            </div>
          </div>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.checklist-categories.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavChecklistCats" aria-expanded="{{ request()->routeIs('admin.checklist-categories.*') ? 'true' : 'false' }}"><i class="bi bi-list-check me-2"></i>Checklist Categories</button>
            <div class="collapse {{ request()->routeIs('admin.checklist-categories.*') ? 'show' : '' }}" id="mNavChecklistCats">
              <a class="nav-link small ps-4" href="{{ route('admin.checklist-categories.create') }}">Create</a>
              <a class="nav-link small ps-4" href="{{ route('admin.checklist-categories.index') }}">List</a>
            </div>
          </div>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.checklist-items.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavChecklistItems" aria-expanded="{{ request()->routeIs('admin.checklist-items.*') ? 'true' : 'false' }}"><i class="bi bi-ui-checks-grid me-2"></i>Checklist Items</button>
            <div class="collapse {{ request()->routeIs('admin.checklist-items.*') ? 'show' : '' }}" id="mNavChecklistItems">
              <a class="nav-link small ps-4" href="{{ route('admin.checklist-items.create') }}">Create</a>
              <a class="nav-link small ps-4" href="{{ route('admin.checklist-items.index') }}">List</a>
            </div>
          </div>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.top-movers.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavTopMovers" aria-expanded="{{ request()->routeIs('admin.top-movers.*') ? 'true' : 'false' }}"><i class="bi bi-award me-2"></i>Top Movers</button>
            <div class="collapse {{ request()->routeIs('admin.top-movers.*') ? 'show' : '' }}" id="mNavTopMovers">
              <a class="nav-link small ps-4" href="{{ route('admin.top-movers.create') }}">Create</a>
              <a class="nav-link small ps-4" href="{{ route('admin.top-movers.index') }}">List</a>
            </div>
          </div>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.bottom-movers.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavBottomMovers" aria-expanded="{{ request()->routeIs('admin.bottom-movers.*') ? 'true' : 'false' }}"><i class="bi bi-arrow-down-square me-2"></i>Bottom Movers</button>
            <div class="collapse {{ request()->routeIs('admin.bottom-movers.*') ? 'show' : '' }}" id="mNavBottomMovers">
              <a class="nav-link small ps-4" href="{{ route('admin.bottom-movers.create') }}">Create</a>
              <a class="nav-link small ps-4" href="{{ route('admin.bottom-movers.index') }}">List</a>
            </div>
          </div>
          <div class="nav-group">
            <button class="nav-link w-100 text-start btn-toggle {{ request()->routeIs('admin.best-moving-pages.*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#mNavBestMoving" aria-expanded="{{ request()->routeIs('admin.best-moving-pages.*') ? 'true' : 'false' }}"><i class="bi bi-file-earmark-text me-2"></i>Best Moving Page</button>
            <div class="collapse {{ request()->routeIs('admin.best-moving-pages.*') ? 'show' : '' }}" id="mNavBestMoving">
              <a class="nav-link small ps-4" href="{{ route('admin.best-moving-pages.create') }}">Create</a>
              <a class="nav-link small ps-4" href="{{ route('admin.best-moving-pages.index') }}">List</a>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="admin-main flex-grow-1 d-flex flex-column">
      <header class="admin-topbar border-bottom bg-white d-flex align-items-center justify-content-between px-3" style="height:56px;">
        <div class="d-flex align-items-center gap-2">
          <button class="btn btn-sm btn-outline-secondary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas"><i class="bi bi-list"></i></button>
          <span class="fw-semibold">@yield('page_title','Dashboard')</span>
        </div>
        <div class="d-flex align-items-center gap-3">
          <i class="bi bi-bell"></i>
          <form method="POST" action="{{ route('admin.logout') }}">@csrf <button class="btn btn-sm btn-outline-secondary">Logout</button></form>
        </div>
      </header>

      <main class="p-3">
        @yield('content')
      </main>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <?php
    $tinymceKey = config('services.tinymce.key') ?: 'b0vm5x7pbcrlczs8fgqomnp26ddbcjye7i1f8xvfu5oepqyp';
  ?>
  <script id="tinymce-cdn" src="https://cdn.tiny.cloud/1/{{ $tinymceKey }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    (function(){
      const selectors = 'textarea:not(.no-tinymce):not([data-no-editor])';
      function ready(fn){
        if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn); else fn();
      }
      function init(){
        const hasTargets = document.querySelector(selectors);
        if (!hasTargets) return;
        if (!window.tinymce){
          // Try again shortly if script not yet evaluated
          return setTimeout(init, 50);
        }
        if (tinymce.editors && tinymce.editors.length){
          // Remove existing to avoid duplicate toolbars on hot reload
          tinymce.editors.forEach(e=>e.remove());
        }
        tinymce.init({
          selector: selectors,
          menubar: false,
          plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
          toolbar: 'undo redo | blocks | bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image media | table | code | help',
          height: 400,
          branding: false,
          convert_urls: false,
        });
      }
      // Ensure both DOM is ready and script loaded
      const s = document.getElementById('tinymce-cdn');
      if (s && !window.tinymce){ s.addEventListener('load', ()=> ready(init)); }
      ready(init);
    })();
  </script>
  @stack('scripts')
</body>
</html>
