@extends('backend/layouts/admin-master', ['title' => 'Website Setting'])

@section('admin')
      <!-- Custom CSS (তোমার main CSS ফাইলে বা <style> ট্যাগে যোগ করো) -->
      <style>
         .nav-tabs .nav-link {
            color: #495057;
            padding: 10px 20px;
            transition: all 0.3s ease;
            border: 1px solid #dee2e6 !important;
         }

         .nav-tabs .nav-link:hover {
            background-color: #e9f7ef;
            color: #198754;
            border-color: #198754;
         }

         .nav-tabs .nav-link.active {
            background-color: #198754 !important;
            /* Success green */
            color: white !important;
            border-color: #198754 !important;
         }

         .nav-tabs .nav-link.active i {
            color: white;
         }

         .tab-content {
            min-height: 300px;
            /* ঐচ্ছিক */
         }

         /* Language css code*/
         .page-transition {
            transition: opacity 0.3s ease;
         }

         .fading {
            opacity: 0;
         }
      </style>
      <div class="container-fluid">
         <!-- Start breadcrumb -->
         <div class="container-fluid">
            <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
               <div class="flex-grow-1">
                  <h4 class="m-0 fs-18 fw-semibold">Website Settings</h4>
               </div>
               <div class="text-end">
                  <ol class="py-0 m-0 breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                     <li class="breadcrumb-item active">Update Settings</li>
                  </ol>
               </div>
            </div>
         </div> <!-- End breadcrumb -->
         {{--
         <h4 class="py-4">
            <label>{{ __('Language') }}</label>
         </h4>

         <p>Current Locale: {{ app()->getLocale() }}</p>
         <p>Session Locale: {{ session('locale') }}</p>

      </div>



      <div class="mb-3 col-md-6">
         <label class="form-label">{{ __('Language') }}</label>

         <select id="languageSwitcher" class="form-select">
            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
               {{ __('English') }}
            </option>
            <option value="bn" {{ app()->getLocale() == 'bn' ? 'selected' : '' }}>
               {{ __('Bangla') }}
            </option>
         </select>
      </div> --}}

      <div class="card">
         <div class="text-center card-body">

            @if(app()->isDownForMaintenance())
               <form method="POST" action="{{ route('admin.maintenance.toggle') }}">
                  @csrf
                  <input type="hidden" name="maintenance_mode" value="off">
                  <button class="btn btn-success">
                     <i class="bi bi-toggle-on"></i> Maintenance OFF
                  </button>
               </form>
            @else
               <form method="POST" action="{{ route('admin.maintenance.toggle') }}">
                  @csrf
                  <input type="hidden" name="maintenance_mode" value="on">
                  <button class="btn btn-danger">
                     <i class="bi bi-toggle-off"></i> Maintenance ON
                  </button>
               </form>
            @endif


            {{-- @if($settings['maintenance_mode'] == 'on')

               <form method="POST" action="{{ route('admin.maintenance.toggle') }}">
                  @csrf
                  <input type="hidden" name="maintenance_mode" value="off">
                  <button class="btn btn-success">
                     <i class="bi bi-toggle-on"></i> Maintenance OFF
                  </button>
               </form>

            @else

               <form method="POST" action="{{ route('admin.maintenance.toggle') }}">
                  @csrf
                  <input type="hidden" name="maintenance_mode" value="on">
                  <button class="btn btn-danger">
                     <i class="bi bi-toggle-off"></i> Maintenance ON
                  </button>
               </form>

            @endif --}}

         </div>
      </div>

   {{-- 
      @php
       $maintenance = setting('maintenance_mode', 0);
   @endphp --}}
   {{-- 
   <div class="form-check form-switch">
       <input class="form-check-input"
              type="checkbox"
              id="maintenanceSwitch"
              {{ $maintenance == 1 ? 'checked' : '' }}>

       <label class="form-check-label fw-bold">
           Maintenance Mode
       </label>
   </div>

   <span id="statusMsg" class="text-success"></span> --}}

      {{-- <div class="form-check form-switch">
       <input class="form-check-input"
              type="checkbox"
              id="maintenanceSwitch"
              {{ $settings['maintenance_mode'] ? 'checked' : '' }}>
       <label class="form-check-label fw-bold">
           Maintenance Mode
       </label>
   </div> --}}



      <form action="{{ route('admin.mail.settings.test') }}" method="POST" class="mt-3">
         @csrf

         <div class="input-group">
            <input type="email" name="test_email" class="form-control" placeholder="Enter test email" required>
            <button class="btn btn-success">
               <i class="bi bi-envelope-check"></i> Send Test Mail
            </button>
         </div>
      </form>


      @if(session('success'))
         <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if(session('error'))
         <div class="alert alert-danger">{{ session('error') }}</div>
      @endif

      <div class="gap-3 d-flex justify-content-between align-item-center"> <!-- g-0 দিয়ে সব স্পেস রিমুভ করা হয়েছে -->

         <!-- Sidebar -->
         <div class="bg-white col-md-3 col-lg-2" style="min-height: 100vh;">
            <div class="py-3 border-bottom border-dark">
               <h4 class="px-2 mb-0 fw-bold">
                  <i class="bi bi-gear-wide-connected me-2"></i>Site Settings
               </h4>
            </div>

            <div class="pt-2 nav nav-pills flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
               <button class="px-2 nav-link active rounded-0 text-start" id="v-pills-logo-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-logo" type="button" role="tab">
                  <i class="bi bi-image me-2"></i>Logo & Favicon
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-contact-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-contact" type="button" role="tab">
                  <i class="bi bi-telephone me-2"></i>Contact Info
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-page-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-page" type="button" role="tab">
                  <i class="bi bi-file-earmark-text me-2"></i>Page Setting
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-social-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-social" type="button" role="tab">
                  <i class="bi bi-share-fill me-2"></i>Social Links
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-seo-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-seo" type="button" role="tab">
                  <i class="bi bi-graph-up me-2"></i>SEO Settings
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-other-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-other" type="button" role="tab">
                  <i class="bi bi-sliders me-2"></i>Other Settings
               </button>
               {{-- <button class="px-2 nav-link rounded-0 text-start" id="v-pills-other-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-other" type="button" role="tab">
                  <i class="bi bi-gear me-3"></i>Other Settings
               </button> --}}
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-mail-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-mail" type="button" role="tab">
                  <i class="bi bi-envelope me-2"></i>Mail Settings
               </button>


               {{-- <a href="{{ route('admin.site.file.clear') }}"  class="px-2 py-2 my-2 btn btn-danger btn-sm d-flex align-items-center"
                     style="width:180px" type="button">
                     <i class="bi bi-arrow-counterclockwise me-1"></i>
                      Site Upload File Reset
            </a> --}}

               <div class="d-flex justify-content-center border-top ">
                  <button onclick="resetSettings()" class="px-2 py-2 my-2 btn btn-danger btn-sm d-flex align-items-center"
                     style="width:180px" type="button">
                     <i class="bi bi-arrow-counterclockwise me-1"></i>
                     Reset Website Setting
                  </button>
               </div>
               
            </div>
         </div>

         <!-- Sidebar -->
         {{-- <div class="bg-white col-md-3 col-lg-2" style="min-height: 100vh;">
            <div class="py-3 border-bottom border-dark">
               <h4 class="mb-0 fw-bold">
                  <i class="bi bi-gear-wide-connected me-2"></i>Site Settings
               </h4>
            </div>

            <div class="pt-2 nav nav-pills flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
               <button class="px-2 nav-link active rounded-0 text-start" id="v-pills-logo-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-logo" type="button" role="tab">
                  <i class="bi bi-image me-3"></i>Logo & Favicon
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-admin-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-admin" type="button" role="tab">
                  <i class="bi bi-person-gear me-3"></i>Admin Logo
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-contact-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-contact" type="button" role="tab">
                  <i class="bi bi-telephone me-3"></i>Contact Info
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-page-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-page" type="button" role="tab">
                  <i class="bi bi-file-earmark-text me-3"></i>Page Title
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-social-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-social" type="button" role="tab">
                  <i class="bi bi-share-fill me-3"></i>Social Links
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-seo-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-seo" type="button" role="tab">
                  <i class="bi bi-graph-up me-3"></i>SEO Settings
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-other-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-other" type="button" role="tab">
                  <i class="bi bi-sliders me-3"></i>Other Settings
               </button>
               <button class="px-2 nav-link rounded-0 text-start" id="v-pills-mail-tab" data-bs-toggle="pill"
                  data-bs-target="#v-pills-mail" type="button" role="tab">
                  <i class="bi bi-envelope-gear me-3"></i>Mail Settings
               </button>
            </div>
         </div> --}}

         <!-- Tab Content -->
         <div class="bg-white rounded col-md-9 col-lg-10">
            <div class="tab-content" id="v-pills-tabContent">

               <!-- Logo & Favicon -->
               <div class="tab-pane fade show active" id="v-pills-logo" role="tabpanel">
                  <h4 class="px-3 py-3 mb-0 text-white fw-bold bg-success rounded-top">
                     <i class="bi bi-image me-2"></i>Logo & Favicon Settings
                  </h4>

                  <div class="bg-white border rounded-bottom">
                     <!-- Sub Tabs -->
                     <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                           <a class="nav-link active" data-bs-toggle="tab" href="#frontend" role="tab" aria-selected="true">
                              <i class="bi bi-code-slash me-2"></i>Frontend Panel Logo
                           </a>
                        </li>
                        <li class="nav-item" role="presentation">
                           <a class="nav-link" data-bs-toggle="tab" href="#backend" role="tab" aria-selected="false">
                              <i class="bi bi-server me-2"></i>Admin Panel Logo
                           </a>
                        </li>
                     </ul>

                     <!-- Tab Content -->
                     <div class="p-3 tab-content">
                        {{-- 🔹 Frontend --}}
                        <div class="tab-pane fade show active" id="frontend" role="tabpanel">
                           <!-- form field here -->
                           <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-2 row">
                                 <!-- Site Logo -->
                                 <div class="col-md-6">
                                    <label class="form-label">Site Logo</label>
                                    <input type="file" id="site_logo" name="site_logo" class="form-control" accept="image/*">
                                    <!-- Preview Image -->
                                    <div class="mt-2">

                                       <img id="logo-preview" src="{{ !empty($settings['site_logo']) && file_exists(public_path($settings['site_logo']))
      ? asset($settings['site_logo'])
      : asset('uploads/no_image.jpg') }}" alt="Logo Preview" class="mt-2 rounded img-fluid"
                                          style="width:220px;height:150px;object-fit:contain;border:1px dashed #000fff;">

                                    </div>
                                    <!-- End Preview Image -->
                                 </div>
                                 <!-- End Site Logo -->

                                 <!-- Favicon -->
                                 <div class="col-md-6">
                                    <label class="form-label">Site Favicon</label>
                                    <input type="file" name="site_favicon" class="form-control" accept="image/*">
                                    <!-- Preview Image -->
                                    <div class="mt-2">
                                       <img id="logo-preview" src="{{ !empty($settings['site_favicon']) && file_exists(public_path($settings['site_favicon']))
      ? asset($settings['site_favicon'])
      : asset('uploads/no_image.jpg') }}" alt="Logo Preview" class="mt-2 rounded img-fluid"
                                          style="width:220px;height:150px;object-fit:contain;border:1px dashed #000fff;">
                                    </div>
                                    <!-- End Preview Image -->
                                 </div>
                                 <!-- End Favicon -->
                              </div>
                              <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                           </form>
                           <!-- তোমার ফর্ম/কনটেন্ট এখানে -->
                        </div>
                        {{-- 🔹 Backend --}}
                        <div class="tab-pane fade" id="backend" role="tabpanel">
                           <!-- form field here -->
                           <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                 <!-- Admin Logo -->
                                 <div class="mb-3 col-md-6">
                                    <label class="form-label fw-bold">Admin Logo (Recommended: 150x50 px)</label>
                                    <input type="file" name="admin_logo" class="form-control" accept="image/*">
                                    <img id="logo-preview" src="{{ !empty($settings['admin_logo']) && file_exists(public_path($settings['admin_logo']))
      ? asset($settings['admin_logo'])
      : asset('uploads/no_image.jpg') }}" alt="Logo Preview" class="mt-2 rounded img-fluid"
                                       style="width:220px;height:150px;object-fit:contain;border:1px dashed #000fff;">
                                 </div>

                                 <!-- Admin Favicon -->
                                 <div class="mb-3 col-md-6">
                                    <label class="form-label">Admin Favicon</label>
                                    <input type="file" name="admin_favicon" class="form-control" accept="image/*">
                                    <img id="logo-preview" src="{{ !empty($settings['admin_favicon']) && file_exists(public_path($settings['admin_favicon']))
      ? asset($settings['admin_favicon'])
      : asset('uploads/no_image.jpg') }}" alt="Logo Preview" class="mt-2 rounded img-fluid"
                                       style="width:220px;height:150px;object-fit:contain;border:1px dashed #000fff;">
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                           </form>
                           <!-- তোমার ফর্ম/কনটেন্ট এখানে -->
                        </div>
                     </div>
                  </div>
               </div>

               <!-- End Logo & Favicon -->


               <!-- Contact Info Tab -->
               <div class="tab-pane fade" id="v-pills-contact" role="tabpanel">
                  <h4 class="px-2 py-3 mb-0 text-white fw-bold bg-success rounded-top">
                     <i class="bi bi-telephone me-2"></i>Contact Information
                  </h4>
                  <div class="p-3 border shadow-sm">
                     <!-- form field here -->
                     <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Site Name</label>
                              <input type="text" name="site_name" class="form-control"
                                 value="{{ old('site_name', $settings['site_name'] ?? 'My Website') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Site Email</label>
                              <input type="email" name="site_email" class="form-control"
                                 value="{{ old('site_email', $settings['site_email'] ?? 'info@example.com') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Site Phone</label>
                              <input type="text" name="site_phone" class="form-control"
                                 value="{{ old('site_phone', $settings['site_phone'] ?? '+8801700000000') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Site Address</label>
                              <input type="text" name="site_address" class="form-control"
                                 value="{{ old('site_address', $settings['site_address'] ?? 'Dhaka, Bangladesh') }}">
                           </div>

                           <div class="mb-3 col-12">
                              <label class="form-label">Copyright Text</label>
                              <input type="text" name="site_copyright" class="form-control"
                                 value="{{ old('site_copyright', $settings['site_copyright'] ?? '© 2025 My Website. All Rights Reserved.') }}">
                           </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                     </form>
                  </div>

               </div>
               <!-- End Contact Info Tab -->


               <!-- Page Setting Tab -->
               <div class="tab-pane fade" id="v-pills-page" role="tabpanel">
                  <h4 class="px-2 py-3 mb-0 text-white fw-bold bg-success rounded-top">
                     <i class="bi bi-file-earmark-text me-2"></i>Page Information
                  </h4>
                  <div class="p-3 border shadow-sm">
                     <!-- form field here -->
                     <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Page Title</label>
                              <input type="text" name="page_title" class="form-control"
                                 value="{{ old('page_title', $settings['page_title'] ?? 'Quick, Effective, and Productive With Admin Dashboard') }}">
                           </div>

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Page Image (OG Image)</label>
                              <input type="file" name="page_image" class="form-control" accept="image/*">

                              <img id="logo-preview" src="{{ !empty($settings['page_image']) && file_exists(public_path($settings['page_image']))
      ? asset($settings['page_image'])
      : asset('uploads/no_image.jpg') }}" alt="Logo Preview" class="mt-2 rounded img-fluid"
                                 style="width:220px;height:150px;object-fit:contain;border:1px dashed #000fff;">
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                     </form>
                  </div>

               </div>
               <!-- End Page Setting Tab -->

               <!-- Social Links tab -->
               <div class="tab-pane fade" id="v-pills-social" role="tabpanel">
                  <h4 class="px-2 py-3 mb-0 text-white fw-bold bg-success rounded-top">
                     <i class="bi bi-share-fill me-3"></i>Social Media Links
                  </h4>
                  <!-- form field here -->
                  <div class="p-3 mt-1">
                     <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Facebook</label>
                              <input type="url" name="site_facebook" class="form-control"
                                 value="{{ old('site_facebook', $settings['site_facebook'] ?? 'https://facebook.com/mywebsite') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Twitter (X)</label>
                              <input type="url" name="site_twitter" class="form-control"
                                 value="{{ old('site_twitter', $settings['site_twitter'] ?? 'https://twitter.com/mywebsite') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Instagram</label>
                              <input type="url" name="site_instagram" class="form-control"
                                 value="{{ old('site_instagram', $settings['site_instagram'] ?? 'https://instagram.com/mywebsite') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">LinkedIn</label>
                              <input type="url" name="site_linkedin" class="form-control"
                                 value="{{ old('site_linkedin', $settings['site_linkedin'] ?? 'https://linkedin.com/company/mywebsite') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">YouTube</label>
                              <input type="url" name="site_youtube" class="form-control"
                                 value="{{ old('site_youtube', $settings['site_youtube'] ?? 'https://youtube.com/mywebsite') }}">
                           </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                     </form>
                  </div>

               </div>
               <!-- End Social Links Tab -->

               <!-- SEO Settings -->
               <div class="tab-pane fade" id="v-pills-seo" role="tabpanel">
                  <h4 class="px-2 py-3 mb-0 text-white fw-bold bg-success rounded-top">
                     <i class="bi bi-graph-up me-2"></i>SEO Settings
                  </h4>
                  <!-- form field here -->
                  <div class="p-3 mt-1">
                     <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="gap-2 d-flex justify-content-between align-item-center">
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Site Keywords</label>
                              <input type="text" name="site_keywords" class="form-control"
                                 value="{{ old('site_keywords', $settings['site_keywords'] ?? 'laravel, website, demo, seo') }}">
                           </div>

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Site Author</label>
                              <input type="text" name="site_author" class="form-control"
                                 value="{{ old('site_author', $settings['site_author'] ?? 'Dev Hasib') }}">
                           </div>
                        </div>

                        <div class="gap-2 d-flex justify-content-between align-item-center">
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Site Description (Meta)</label>
                              <textarea name="site_description" class="form-control" rows="4" cols="10"
                                 value="{{ old('site_description', $settings['site_description'] ?? 'This is a demo website description.') }}">{{ $settings['site_description'] ?? ''}}</textarea>
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Site Content (Optional)</label>
                              <textarea name="site_content" class="form-control"
                                 value="{{ old('site_content', $settings['site_content'] ?? 'This is demo website content.') }}"
                                 rows="4">{{ old('site_content', $settings['site_content'] ?? '') }}</textarea>
                           </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                     </form>
                  </div>
               </div>
               <!-- End SEO Settings -->

               <!-- Other Settings tab -->
               <div class="tab-pane fade" id="v-pills-other" role="tabpanel">
                  <h4 class="px-2 py-3 mb-0 text-white fw-bold bg-success rounded-top">
                     <i class="bi bi-gear me-3"></i>Other Settings
                  </h4>
                  <!-- form field here -->
                  <div class="p-3 mt-1">
                     <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Google Map Embed URL</label>
                              <textarea name="site_map" class="form-control" rows="3"
                                 placeholder="Paste Google Map Embed URL here">{{ old('site_map', $settings['site_map'] ?? '') }}</textarea>
                           </div>

                           <div class="map-area col-sm-12">
                              {{-- <iframe src="{{ $settings['site_map'] }}" width="100%" height="400" style="border:0;"
                                 allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                              </iframe> --}}

                              <iframe src="{{ $settings['site_map'] ?? 'https://www.google.com/maps/embed?pb=default' }}"
                                 width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                 referrerpolicy="no-referrer-when-downgrade"></iframe>
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Primary Color</label>
                              <input type="color" name="site_color" class="form-control form-control-color"
                                 value="{{ old('site_color', $settings['site_color'] ?? '#ff5722') }}">
                              <span class="color-preview" style="background-color: #ff5722;"></span>
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Theme</label>
                              <select name="site_theme" class="form-select">
                                 <option value="light" selected>Light</option>
                                 <option value="dark">Dark</option>
                              </select>
                           </div>
                           {{-- <div class="mb-3 col-md-6">
                              <label class="form-label">Language</label>
                              <select name="site_language" class="form-select">
                                 <option value="en" selected>English</option>
                                 <option value="bn">Bangla</option>
                                 <!-- Add more languages as needed -->
                              </select>
                           </div> --}}

                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                     </form>
                  </div>

                  {{-- <div class="mb-3 col-md-6">
                     <label class="form-label">{{ __(key: 'Language') }}</label>
                     <form action="{{ route('language.switch') }}" method="POST" id="languageForm">
                        @csrf
                        <select name="site_language" class="form-select"
                           onchange="document.getElementById('languageForm').submit()">
                           <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>{{ __('English') }}</option>
                           <option value="bn" {{ app()->getLocale() == 'bn' ? 'selected' : '' }}>{{ __('Bangla') }}</option>
                           <!-- আরও ভাষা যোগ করুন -->
                        </select>
                     </form>
                  </div> --}}

                  {{-- <div class="mb-3 col-md-6">
                     <label class="form-label">{{ __('Language') }}</label>
                     <select id="languageSwitcher" class="form-select">
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>{{ __('English') }}</option>
                        <option value="bn" {{ app()->getLocale() == 'bn' ? 'selected' : '' }}>{{ __('Bangla') }}</option>
                        <!-- আরও ভাষা যোগ করুন -->
                     </select>
                  </div> --}}

                  {{-- <div class="mb-3 col-md-6">
                     <label class="form-label">{{ __('Language') }}</label>

                     <select id="languageSwitcher" class="form-select">
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                           {{ __('English') }}
                        </option>
                        <option value="bn" {{ app()->getLocale() == 'bn' ? 'selected' : '' }}>
                           {{ __('Bangla') }}
                        </option>
                        <!-- আরও ভাষা যোগ করুন, যেমন: -->
                        <!-- <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option> -->
                     </select>
                  </div> --}}

               </div>
               <!-- End   Other Settings Tab -->

               <!-- 🔹 Mail Settings -->
               <div class="tab-pane fade" id="v-pills-mail" role="tabpanel">
                  <h4 class="px-2 py-3 mb-0 text-white fw-bold bg-success rounded-top">
                     <i class="bi bi-envelope me-3"></i>Mail Configuration
                  </h4>

                  <!-- form field here -->

                  <div class="p-3 mt-1">
                     <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           {{-- <div class="mb-3 col-md-6">
                              <label class="form-label">Mail Driver</label>
                              <input type="text" name="mail_driver" class="form-control" value="{{ env('MAIL_MAILER') }}">
                           </div> --}}

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Mail Driver</label>
                              <input type="text"
                              name="mail_driver" class="form-control"
                              value="{{ old('mail_driver', $settings['mail_driver'] ?? 'N/A') }}">
                           </div>

                           <div class="mb-3 col-md-6">
                              <label class="form-label">Mail Host</label>
                              <input type="text" name="mail_host" class="form-control"
                                 value="{{ old('mail_host', $settings['mail_host'] ?? 'N/A') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Mail Port</label>
                              <input type="text" name="mail_port" class="form-control"
                                 value="{{ old('mail_port', $settings['mail_port'] ?? 'N/A') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Mail Username</label>
                              <input type="text" name="mail_username" class="form-control"
                                 value="{{ old('mail_username', $settings['mail_username'] ?? 'N/A') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Mail Password</label>
                              <input type="password" name="mail_password" class="form-control"
                                 value="{{ old('mail_password', $settings['mail_password'] ?? 'N/A') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">Mail Encryption</label>
                              <input type="text" name="mail_encryption" class="form-control"
                                 value="{{ old('mail_encryption', $settings['mail_encryption'] ?? 'N/A') }}">
                           </div>
                           <div class="mb-3 col-md-6">
                              <label class="form-label">From Address</label>
                              <input type="email" name="mail_from_address" class="form-control"
                                 value="{{ old('mail_from_address', $settings['mail_from_address'] ?? 'N/A') }}">
                           </div>
                           <div class="col-md-6">
                              <label class="form-label">From Name</label>
                              <input type="text" name="mail_from_name" class="form-control"
                                 value="{{ old('mail_from_name', $settings['mail_from_name'] ?? 'N/A') }}">
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                     </form>
                  </div>
               </div>
               <!-- End Mail Configuration Tab -->

            </div>
         </div>



      </div>
      </div>

      <!-- Axios Language Switch Script -->
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script>
         // Site Logo Preview
         document.getElementById('site_logo').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
               const reader = new FileReader();
               reader.onload = function (event) {
                  document.getElementById('logo-preview').src = event.target.result;
               }
               reader.readAsDataURL(file);
            }
         });
         mail_username
         // Favicon Preview
         document.getElementById('favicon-upload').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
               const reader = new FileReader();
               reader.onload = function (event) {
                  document.getElementById('favicon-preview').src = event.target.result;
               }
               reader.readAsDataURL(file);
            }
         });

         // Admin Logo Preview
         document.getElementById('admin-upload').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
               const reader = new FileReader();
               reader.onload = function (event) {
                  document.getElementById('admin-preview').src = event.target.result;
               }
               reader.readAsDataURL(file);
            }
         });

         // Image Preview

         function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
               const reader = new FileReader();

               reader.onload = function (event) {
                  document.getElementById(previewId).src = event.target.result;
               };

               reader.readAsDataURL(input.files[0]);
            }
         }

         // const resetSettingsUrl = "{{ route('admin.settings.reset') }}";
         
         function resetSettings() {
            Swal.fire({
               title: 'Are you sure?',
               text: "All website settings will be reset!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#d33',
               cancelButtonColor: '#3085d6',
               confirmButtonText: 'Yes, Reset'
            }).then((result) => {
               if (result.isConfirmed) {
                  axios.get("{{ route('admin.settings.reset') }}")
                     .then(res => {
                        Swal.fire(
                           'Reset Done!',
                           res.data.message,
                           'success'
                        );

                        // window reload
                        location.reload();
                     })
                     .catch(err => {
                        Swal.fire('Error!', 'Something went wrong', 'error');
                     });
               }
            });
         }

         // Language Change Code



         // axios use

         document.addEventListener('DOMContentLoaded', function () {
            const switcher = document.getElementById('languageSwitcher');
            if (!switcher) return;

            switcher.addEventListener('change', function () {
               const locale = this.value;
               const url = '{{ route('admin.language.switch', ':locale') }}'.replace(':locale', locale);

               // Fade out effect
               document.body.classList.add('fading');

               // Axios দিয়ে GET request
               axios.get(url, {

                  //  headers: {
                  //      'X-Requested-With': 'XMLHttpRequest',
                  //      'Accept': 'application/json'
                  //  }
               })
                  .then(response => {
                     // Success হলে reload (session-এ locale save হয়ে গেছে)
                     setTimeout(() => location.reload(), 300);
                  })
                  .catch(error => {
                     console.error('Language switch error:', error);
                     // Error হলেও reload করুন (session হয়তো save হয়েছে)
                     setTimeout(() => location.reload(), 300);
                  });
            });

            // Page load হলে fade in
            window.addEventListener('load', () => {
               document.body.classList.remove('fading');
            });
         });
      </script>
@endsection