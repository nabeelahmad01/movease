<!--begin::Aside-->
<div id="kt_aside" class="aside aside-default  aside-hoverable " data-kt-drawer="true"
    data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">

    <div class="aside-logo flex-column-auto px-10 pt-9 pb-5" id="kt_aside_logo">
        <a href="{{ route('admin.dashboard') }}">
            <img alt="Logo" src="{{ asset('backend_assets/media/logos/logo-default.svg') }}" class="max-h-50px logo-default theme-light-show" />
        </a>
    </div>

    <div class="aside-menu flex-column-fluid ps-3 pe-1">
        <div class="menu menu-sub-indention menu-column menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-active-bg menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 my-5 mt-lg-2 mb-lg-0"
            id="kt_aside_menu" data-kt-menu="true">

            <div class="hover-scroll-y mx-4" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="20px"
                data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer">

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <a href="{{ route('admin.dashboard') }}" class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-speedometer2 me-2"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-buildings me-2"></i>
                        </span>
                        <span class="menu-title">Companies</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.companies.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.companies.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-tags me-2"></i>
                        </span>
                        <span class="menu-title">Blog Categories</span>
                        <span class="menu-arrow"></span>
                    </span>     
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.blog-categories.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.blog-categories.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                           <i class="bi bi-journal-text me-2"></i>
                        </span>
                        <span class="menu-title">Blogs</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.blogs.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.blogs.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-star-half me-2"></i>
                        </span>
                        <span class="menu-title">Reviews</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.reviews.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.reviews.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-signpost-2 me-2"></i>
                        </span>
                        <span class="menu-title">State Routes</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.state-routes.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.state-routes.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-geo-alt me-2"></i>
                        </span>
                        <span class="menu-title">City Routes</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.city-routes.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.city-routes.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-list-check me-2"></i>
                        </span>
                        <span class="menu-title">Checklist Categories</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.checklist-categories.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.checklist-categories.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-ui-checks-grid me-2"></i>
                        </span>
                        <span class="menu-title">Checklist Items</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.checklist-items.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.checklist-items.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-award me-2"></i>
                        </span>
                        <span class="menu-title">Top Movers</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.top-movers.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.top-movers.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-arrow-down-square me-2"></i>
                        </span>
                        <span class="menu-title">Bottom Movers</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.bottom-movers.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.bottom-movers.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        </span>
                        <span class="menu-title">Best Moving Page</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.best-moving-pages.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.best-moving-pages.create') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus me-2"></i>
                                </span>
                                <span class="menu-title">Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-quote me-2"></i>
                        </span>
                        <span class="menu-title">Quote Requests</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.quotes.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        </span>
                        <span class="menu-title">Contact Leads</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('admin.contact-leads.index') }}">
                                <span class="menu-bullet">
                                    <i class="bi bi-list me-2"></i>
                                </span>
                                <span class="menu-title">List</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="aside-footer flex-column-auto pb-5 d-none" id="kt_aside_footer">
        <a href="../index-2.html" class="btn btn-light-primary w-100">
            Button
        </a>
    </div>
</div>
<!--end::Aside-->
