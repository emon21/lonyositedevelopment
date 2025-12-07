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
                
                          <li>
                                <a href="landing.html" target="_blank">
                                    <i data-feather="globe"></i>
                                    <span> Landing </span>
                                </a>
                            </li> 
                            
                            

                            <li class="menu-title">Pages</li>

                            <li>
                                <a href="#slider" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Slider </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="slider">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.slider.index') }}" class="tp-link">All Slider</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.slider.create') }}" class="tp-link">Slider Create</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li>
                                <a href="#feature" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Feature Setup</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="feature">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.feature.index') }}" class="tp-link">All Feature</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.feature.create') }}" class="tp-link">Feature Create</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li>
                                <a href="#clarifi" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Clarifi Setup</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="clarifi">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.clarifi.index') }}" class="tp-link">Get Clarifi</a>
                                        </li>  
                                    </ul>
                                </div>
                            </li>
                            
                            <li>
                                <a href="#financial" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Financial Setup</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="financial">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.financial') }}" class="tp-link">Get Financial</a>
                                        </li> 
                                    </ul>
                                </div>
                            </li>


                            <li>
                                <a href="#usability" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Usability Setup</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="usability">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.get.usability') }}" class="tp-link">Get Usability</a>
                                        </li>  
                                    </ul>
                                </div>
                            </li>

                             <li>
                                <a href="#usability_connect" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Usability Connect Setup</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="usability_connect">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.usability-connect') }}" class="tp-link">
                                                All Usability Connect</a>
                                        </li>
                                           <li>
                                            <a href="{{ route('admin.usability-connect.create') }}" class="tp-link">
                                                Add Usability Connect</a>
                                        </li>  
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#answer" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Answer Setup</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="answer">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.answer') }}" class="tp-link">
                                                All Answer</a>
                                        </li>
                                           <li>
                                            <a href="{{ route('admin.answer.create') }}" class="tp-link">
                                                Add Answer</a>
                                        </li>  
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#apps" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Apps Setup</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="apps">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.apps') }}" class="tp-link">
                                                All Apps</a>
                                        </li>
                                           {{-- <li>
                                            <a href="{{ route('admin.apps.create') }}" class="tp-link">
                                                Add Apps</a>
                                        </li>   --}}
                                    </ul>
                                </div>
                            </li>
                            
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
                                <a href="#team" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> Our Team </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="team">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.team') }}" class="tp-link">All Team</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.team.create') }}" class="tp-link">Add Team</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#about" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span> About </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="about">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.get.about') }}" class="tp-link">About Page</a>
                                        </li>
                                       
                                        
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#category" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                    <span> Category </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="category" style="">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{route('admin.category')}}" class="tp-link">Category</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#blog" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span>Blog Page</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="blog">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ route('admin.blog') }}" class="tp-link">All Blog</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarExpages" data-bs-toggle="collapse">
                                    <i data-feather="file-text"></i>
                                    <span> Web Site Settings </span>
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