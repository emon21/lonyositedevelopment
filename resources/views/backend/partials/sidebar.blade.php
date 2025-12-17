<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

       

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <div class="logo-box">
                {{-- <a href="{{ route('dashboard') }}" class="gap-2 d-flex align-items-center">
                    <span class="logo-lg">
                        <img src="{{ !empty($settings['admin_logo']) && file_exists(public_path($settings['admin_logo']))
    ? asset($settings['admin_logo'])
    : asset('uploads/no_image.jpg') }}" alt="Site Logo" height="40">
                    </span>

                    <h4 class="mb-0">
                        {{ $settings['site_name'] ?? 'Admin Dashboard' }}
                    </h4>

                </a> --}}
                 <a href="{{ route('dashboard') }}" class="gap-2 d-flex align-items-center text-decoration-none">
    <div class="logo-circle d-flex justify-content-center align-items-center">
        AD
    </div>
    <h4 class="mb-0">{{ $settings['site_name'] ?? 'Admin Dashboard' }}</h4>
</a>

                {{-- <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend') }}/assets/images/logo-dark.png" alt="" height="24">
                    </span>
                </a> --}}
            </div>

            {{-- <div class="logo-box">
                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">

                        {{-- <img src="{{ 
                            !empty($settings['site_logo']) && file_exists(public_path($settings['site_logo'])) 
                            ? asset($settings['site_logo']) 
                            : asset('uploads/default/logo.png') 
                        }}" alt="Site Logo"> --}}


                        {{-- <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22"> -
                    </span>
                    {{-- <span class="logo-lg">
                        <img src="{{ asset('backend') }}/assets/images/logo-light.png" alt="" height="24">
                    </span> -
                </a>
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend') }}/assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend') }}/assets/images/logo-dark.png" alt="" height="24">
                    </span>
                </a>
            </div> --}}

            <ul id="side-menu">

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{url('/')}}" target="_blank">
                        <i data-feather="globe"></i>
                        <span> Website </span>
                    </a>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="#slider" data-bs-toggle="collapse">
                        <i data-feather="image"></i>
                        <span> Slider </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="slider">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.slider.index') }}" class="tp-link">
                                    <i data-feather="list"></i> All Slider
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.slider.create') }}" class="tp-link">
                                    <i data-feather="plus-circle"></i> Slider Create
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#feature" data-bs-toggle="collapse">
                        <i data-feather="zap"></i>
                        <span> Feature Setup</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="feature">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.feature.index') }}" class="tp-link">
                                    <i data-feather="list"></i> All Feature
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.feature.create') }}" class="tp-link">
                                    <i data-feather="plus-circle"></i> Feature Create
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#clarifi" data-bs-toggle="collapse">
                        <i data-feather="check-square"></i>
                        <span> Clarifi Setup</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="clarifi">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.clarifi.index') }}" class="tp-link">
                                    <i data-feather="settings"></i> Get Clarifi
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#financial" data-bs-toggle="collapse">
                        <i data-feather="dollar-sign"></i>
                        <span> Financial Setup</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="financial">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.financial') }}" class="tp-link">
                                    <i data-feather="settings"></i> Get Financial
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#usability" data-bs-toggle="collapse">
                        <i data-feather="sliders"></i>
                        <span> Usability Setup</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="usability">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.get.usability') }}" class="tp-link">
                                    <i data-feather="settings"></i> Get Usability
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#usability_connect" data-bs-toggle="collapse">
                        <i data-feather="link-2"></i>
                        <span> Usability Connect Setup</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="usability_connect">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.usability-connect') }}" class="tp-link">
                                    <i data-feather="list"></i> All Usability Connect
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.usability-connect.create') }}" class="tp-link">
                                    <i data-feather="plus-circle"></i> Add Usability Connect
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#answer" data-bs-toggle="collapse">
                        <i data-feather="message-circle"></i>
                        <span> Answer Setup</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="answer">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.answer') }}" class="tp-link">
                                    <i data-feather="list"></i> All Answer
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.answer.create') }}" class="tp-link">
                                    <i data-feather="plus-circle"></i> Add Answer
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#apps" data-bs-toggle="collapse">
                        <i data-feather="smartphone"></i>
                        <span> Apps Setup</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="apps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.apps') }}" class="tp-link">
                                    <i data-feather="list"></i> All Apps
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#review" data-bs-toggle="collapse">
                        <i data-feather="star"></i>
                        <span> Review </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="review">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.review.index') }}" class="tp-link">
                                    <i data-feather="list"></i> All Review
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.review.create') }}" class="tp-link">
                                    <i data-feather="plus-circle"></i> Review Create
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#team" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Our Team </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="team">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.team') }}" class="tp-link">
                                    <i data-feather="list"></i> All Team
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.team.create') }}" class="tp-link">
                                    <i data-feather="plus-circle"></i> Add Team
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#about" data-bs-toggle="collapse">
                        <i data-feather="info"></i>
                        <span> About </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="about">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.get.about') }}" class="tp-link">
                                    <i data-feather="file-text"></i> About Page
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#category" data-bs-toggle="collapse">
                        <i data-feather="folder"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.category')}}" class="tp-link">
                                    <i data-feather="folder-open"></i> Category
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#blog" data-bs-toggle="collapse">
                        <i data-feather="edit-3"></i>
                        <span> Blog Page</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="blog">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.blog') }}" class="tp-link">
                                    <i data-feather="list"></i> All Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#contacts" data-bs-toggle="collapse">
                        <i data-feather="mail"></i>
                        <span> Contact Page</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="contacts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('contact.all.message') }}" class="tp-link">
                                    <i data-feather="inbox"></i> All Contacts
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#websiteSetting" data-bs-toggle="collapse">
                        {{-- <i data-feather="settings"></i> --}}
                        <i class="bi bi-gear me-3"></i>
                        <span> Web Site Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="websiteSetting">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.website.settings')}}" class="tp-link">
                                    <i data-feather="tool"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.settings.index')}}" class="tp-link">
                                    <i data-feather="list"></i> All Settings
                                </a>
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