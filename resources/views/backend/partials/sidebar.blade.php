<div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a href="{{ route('dashboard') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('backend') }}/assets/images/logo-light.png" alt="" height="24">
                                </span>
                            </a>
                            <a href="{{ route('dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('backend') }}/assets/images/logo-dark.png" alt="" height="24">
                                </span>
                            </a>
                        </div>

                        <ul id="side-menu">

                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                
                            <!-- <li>
                                <a href="landing.html" target="_blank">
                                    <i data-feather="globe"></i>
                                    <span> Landing </span>
                                </a>
                            </li> -->

                            <li class="menu-title">Pages</li>

                            <li>
                                <a href="#review" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Review </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="review">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.review.index') }}" class="tp-link">All Review</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.review.create') }}" class="tp-link">Review Create</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarAuth" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Authentication </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarAuth">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="auth-login.html" class="tp-link">Log In</a>
                                        </li>
                                        <li>
                                            <a href="auth-register.html" class="tp-link">Register</a>
                                        </li>
                                        <li>
                                            <a href="auth-recoverpw.html" class="tp-link">Recover Password</a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html" class="tp-link">Lock Screen</a>
                                        </li>
                                        <li>
                                            <a href="auth-confirm-mail.html" class="tp-link">Confirm Mail</a>
                                        </li>
                                        <li>
                                            <a href="email-verification.html" class="tp-link">Email Verification</a>
                                        </li>
                                        <li>
                                            <a href="auth-logout.html" class="tp-link">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarError" data-bs-toggle="collapse">
                                    <i data-feather="alert-octagon"></i>
                                    <span> Error Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarError">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="error-404.html" class="tp-link">Error 404</a>
                                        </li>
                                        <li>
                                            <a href="error-500.html" class="tp-link">Error 500</a>
                                        </li>
                                        <li>
                                            <a href="error-503.html" class="tp-link">Error 503</a>
                                        </li>
                                        <li>
                                            <a href="error-429.html" class="tp-link">Error 429</a>
                                        </li>
                                        <li>
                                            <a href="offline-page.html" class="tp-link">Offline Page</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarExpages" data-bs-toggle="collapse">
                                    <i data-feather="file-text"></i>
                                    <span> Utility </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarExpages">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="pages-starter.html" class="tp-link">Starter</a>
                                        </li>
                                        <li>
                                            <a href="pages-profile.html" class="tp-link">Profile</a>
                                        </li>
                                        <li>
                                            <a href="pages-pricing.html" class="tp-link">Pricing</a>
                                        </li>
                                        <li>
                                            <a href="pages-timeline.html" class="tp-link">Timeline</a>
                                        </li>
                                        <li>
                                            <a href="pages-invoice.html" class="tp-link">Invoice</a>
                                        </li>
                                        <li>
                                            <a href="pages-faqs.html" class="tp-link">FAQs</a>
                                        </li>
                                        <li>
                                            <a href="pages-gallery.html" class="tp-link">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="pages-maintenance.html" class="tp-link">Maintenance</a>
                                        </li>
                                        <li>
                                            <a href="pages-coming-soon.html" class="tp-link">Coming Soon</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
            </div>