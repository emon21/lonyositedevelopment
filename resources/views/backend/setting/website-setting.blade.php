@extends('backend/layouts/admin-master', ['title' => 'Website Setting'])
@section('admin')
    <!-- Start Content-->
    <div class="content">

        <!-- Start breadcrumb -->
        <div class="container-fluid">
            <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="m-0 fs-18 fw-semibold">All Team</h4>
                </div>
                <div class="text-end">
                    <ol class="py-0 m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Team</li>
                    </ol>
                </div>
            </div>
        </div> <!-- End breadcrumb -->

        <!-- page content -->
        <div class="container-fluid">

            <div class="gap-3 d-flex justify-content-between align-items-top">
                <!-- Sidebar -->
                <div class="bg-white col-md-3 col-lg-2 border-end" style="min-height: 100vh;">
                    <div class="p-4">
                        <h4 class="mb-4 text-center">Site Settings</h4>
                        <div class="nav nav-pills flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active text-start" id="v-pills-logo-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-logo" type="button" role="tab">
                                <i class="bi bi-image me-2"></i> Logo & Favicon
                            </button>
                            <button class="nav-link text-start" id="v-pills-admin-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-admin" type="button" role="tab">
                                <i class="bi bi-person-gear me-2"></i> Admin Logo
                            </button>
                            <button class="nav-link text-start" id="v-pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-contact" type="button" role="tab">
                                <i class="bi bi-building me-2"></i> Contact Info
                            </button>
                            <button class="nav-link text-start" id="v-pills-page-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-page" type="button" role="tab">
                                <i class="bi bi-file-text me-2"></i> Page Title
                            </button>
                            <button class="nav-link text-start" id="v-pills-social-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-social" type="button" role="tab">
                                <i class="bi bi-share-fill me-2"></i> Social Links
                            </button>
                            <button class="nav-link text-start" id="v-pills-seo-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-seo" type="button" role="tab">
                                <i class="bi bi-search me-2"></i> SEO Settings
                            </button>
                            <button class="nav-link text-start" id="v-pills-other-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-other" type="button" role="tab">
                                <i class="bi bi-gear me-2"></i> Other Settings
                            </button>
                            <button class="nav-link text-start" id="v-pills-mail-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-mail" type="button" role="tab">
                                <i class="bi bi-envelope me-2"></i> Mail Settings
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9 col-lg-10 bg-light">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-lg text-success text-bold">Website Settings</h2>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Tab Content -->
                                <div class="tab-content" id="v-pills-tabContent">

                                    <!-- Logo & Favicon -->
                                    <div class="tab-pane fade show active" id="v-pills-logo" role="tabpanel">
                                        <h4>Site Logo & Favicon</h4>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Site Logo</label>
                                                <input type="file" name="site_logo" class="form-control" accept="image/*">
                                                {{-- <small class="text-muted">Current: uploads/settings/site_logo.png</small> --}}
                                                <img src="{{ asset('uploads/no_image.jpg') }}" alt="Current Logo"
                                                    class="preview-img">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Site Favicon</label>
                                                <input type="file" name="site_favicon" class="form-control"
                                                    accept="image/*">
                                                {{-- <small class="text-muted">Current: uploads/settings/site_favicon.png</small> --}}
                                                <img src="{{ asset('uploads/no_image.jpg') }}" alt="Current Logo" class="preview-img">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Admin Logo -->
                                    <div class="tab-pane fade" id="v-pills-admin" role="tabpanel">
                                        <h4>Admin Panel Logo</h4>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Admin Logo</label>
                                                <input type="file" name="admin_logo" class="form-control" accept="image/*">
                                                {{-- <small class="text-muted">Current: uploads/settings/admin_logo.png</small> --}}
                                                <img src="{{ asset('uploads/no_image.jpg') }}" alt="Current Logo" class="preview-img">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Admin Favicon</label>
                                                <input type="file" name="admin_logo_favicon" class="form-control"
                                                    accept="image/*">
                                                <small class="text-muted">Current:
                                                    {{-- uploads/settings/admin_logo_favicon.png</small> --}}
                                                <img src="{{ asset('uploads/no_image.jpg') }}" alt="Current Logo" class="preview-img">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Contact Info -->
                                    <div class="tab-pane fade" id="v-pills-contact" role="tabpanel">
                                        <h4>Contact Information</h4>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Site Name</label>
                                                <input type="text" name="site_name" class="form-control"
                                                    value="{{ old('site_name', $webSiteSetting->site_name) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Site Email</label>
                                                <input type="email" name="site_email" class="form-control"
                                                    value="{{ old('site_email', $webSiteSetting->site_email) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Site Phone</label>
                                                <input type="text" name="site_phone" class="form-control"
                                                    value="{{ old('site_phone', $webSiteSetting->site_phone) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Site Address</label>
                                                <input type="text" name="site_address" class="form-control"
                                                    value="{{ old('site_address', $webSiteSetting->site_address) }}">
                                            </div>
                                            <div class="mb-3 col-12">
                                                <label class="form-label">Copyright Text</label>
                                                <input type="text" name="site_copyright" class="form-control"
                                                    value="{{ old('site_copyright', $webSiteSetting->site_copyright) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Page Title -->
                                    <div class="tab-pane fade" id="v-pills-page" role="tabpanel">
                                        <h4>Page Title & Image</h4>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Site Title</label>
                                                <input type="text" name="site_title" class="form-control"
                                                    value="{{ old('site_title', $webSiteSetting->site_title) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Site Image (OG Image)</label>
                                                <input type="file" name="site_image" class="form-control" accept="image/*">
                                                {{-- <small class="text-muted">Current: uploads/settings/site_image.jpg</small> --}}
                                                <img src="uploads/settings/site_image.jpg" alt="Current Site Image"
                                                    class="preview-img">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Social Links -->
                                    <div class="tab-pane fade" id="v-pills-social" role="tabpanel">
                                        <h4>Social Media Links</h4>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Facebook</label>
                                                <input type="url" name="site_facebook" class="form-control"
                                                    value="{{ old('site_facebook', $webSiteSetting->site_facebook) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Twitter (X)</label>
                                                <input type="url" name="site_twitter" class="form-control"
                                                    value="{{ old('site_twitter', $webSiteSetting->site_twitter) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Instagram</label>
                                                <input type="url" name="site_instagram" class="form-control"
                                                    value="{{ old('site_instagram', $webSiteSetting->site_instagram) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">LinkedIn</label>
                                                <input type="url" name="site_linkedin" class="form-control"
                                                    value="{{ old('site_linkedin', $webSiteSetting->site_linkedin) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">YouTube</label>
                                                <input type="url" name="site_youtube" class="form-control"
                                                    value="{{ old('site_youtube', $webSiteSetting->site_youtube) }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <h5>Social JSON (Auto-generated)</h5>
                                        <textarea name="site_social" class="form-control" rows="6"
                                            readonly>{"facebook":"https:\/\/facebook.com\/mywebsite","twitter":"https:\/\/twitter.com\/mywebsite","instagram":"https:\/\/instagram.com\/mywebsite","linkedin":"https:\/\/linkedin.com\/company\/mywebsite","youtube":"https:\/\/youtube.com\/mywebsite"}</textarea>
                                        <small class="text-muted">This field is automatically updated from the links
                                            above.</small>
                                    </div>

                                    <!-- SEO Settings -->
                                    <div class="tab-pane fade" id="v-pills-seo" role="tabpanel">
                                        <h4>SEO Settings</h4>
                                        <div class="mb-3">
                                            <label class="form-label">Site Description (Meta)</label>
                                            <textarea name="site_description" class="form-control"
                                                rows="3">{{  $webSiteSetting->site_description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Site Keywords</label>
                                            <input type="text" name="site_keywords" class="form-control"
                                                value="{{ old('site_keywords', $webSiteSetting->site_keywords) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Site Author</label>
                                            <input type="text" name="site_author" class="form-control" value="{{ old('site_author', $webSiteSetting->site_author) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Site Content (Optional)</label>
                                            <textarea name="site_content" class="form-control"
                                                rows="4">{{ $webSiteSetting->site_content }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Other Settings -->
                                    <div class="tab-pane fade" id="v-pills-other" role="tabpanel">
                                        <h4>Other Settings</h4>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Google Map Embed URL</label>
                                                <input type="url" name="site_map" class="form-control"
                                                    value="{{ old('site_map', $webSiteSetting->site_map) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Primary Color</label>
                                                <input type="color" name="site_color"
                                                    class="form-control form-control-color" value="{{ $webSiteSetting->site_color }}">
                                                <span class="color-preview" style="background-color: #ff5722;"></span>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Theme</label>
                                                <select name="site_theme" class="form-select">
                                                    <option value="light" selected>Light</option>
                                                    <option value="dark">Dark</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Language</label>
                                                <select name="site_language" class="form-select">
                                                    <option value="en" selected>English</option>
                                                    <option value="bn">Bangla</option>
                                                    <!-- Add more languages as needed -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Mail Settings -->
                                    <div class="tab-pane fade" id="v-pills-mail" role="tabpanel">
                                        <h4>Mail Configuration</h4>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Mail Driver</label>
                                                <input type="text" name="mail_driver" class="form-control" value="{{ old('mail_driver', $webSiteSetting->mail_driver) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Mail Host</label>
                                                <input type="text" name="mail_host" class="form-control"
                                                    value="{{ old('mail_host', $webSiteSetting->mail_host) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Mail Port</label>
                                                <input type="text" name="mail_port" class="form-control" value="{{ old('mail_port', $webSiteSetting->mail_port) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Mail Username</label>
                                                <input type="text" name="mail_username" class="form-control"
                                                    value="{{ old('mail_username', $webSiteSetting->mail_username) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Mail Password</label>
                                                <input type="password" name="mail_password" class="form-control"
                                                    value="{{ old('mail_password', $webSiteSetting->mail_password) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Mail Encryption</label>
                                                <input type="text" name="mail_encryption" class="form-control" value="{{ old('mail_encryption', $webSiteSetting->mail_encryption) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">From Address</label>
                                                <input type="email" name="mail_from_address" class="form-control"
                                                    value="{{ old('mail_from_address', $webSiteSetting->mail_from_address) }}">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">From Name</label>
                                                <input type="text" name="mail_from_name" class="form-control"
                                                    value="{{ old('mail_from_name', $webSiteSetting->mail_from_name) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                                    <button type="reset" class="btn btn-secondary btn-lg ms-3">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- End Main Content -->
            </div>
        </div>
        <!-- End page content -->
    </div>
    <!-- Ent content -->
@endsection