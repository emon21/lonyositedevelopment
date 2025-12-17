<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Log In | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend')}}/assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('backend')}}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-white">
    <!-- Begin page -->
    <div class="account-page">
        <div class="p-0 container-fluid">
            <div class="row align-items-center g-0">
                <div class="col-xl-5">
                    <div class="row">
                        <div class="mx-auto col-md-7">
                            <div class="p-4 mb-0 border-0 p-md-5 p-lg-0">
                                <div class="p-0 mb-4">
                                    <a href="index.html" class="auth-logo">
                                        <img src="{{asset('backend')}}/assets/images/logo-dark.png" alt="logo-dark"
                                            class="mx-auto" height="28" />
                                    </a>
                                </div>

                                <div class="pt-0">
                                    <!-- Two Factor Authentication -->
                                    <h4 class="mt-0 mb-3">Sign In</h4>
                                    <p class="mb-4 text-muted">Enter your email address and password to access admin panel.</p>
                                    
                                    {{-- <form class="my-4" method="POST" action="{{ route('admin.login') }}"> --}}
                                    <form class="my-4" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        @if(session('error'))
                                            <div class="alert alert-danger"><{{ session('error') }}</div>
                                        @endif

                                        <div class="mb-3 form-group">
                                            <label for="email" class="form-label">Email address</label>
                                            <input class="form-control" type="text" id="email" name="email"
                                                :value="old('email')" autofocus autocomplete="username"
                                                placeholder="Enter your email">
                                            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}

                                                @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>

                                        <div class="mb-3 form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input class="form-control" type="password" id="password"
                                                name="password" autofocus autocomplete="current-password"
                                                placeholder="Enter your password">
                                            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                                                @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>


                                        <!-- Remember Me -->
                                        {{-- <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox"
                                                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                                                    name="remember">
                                                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                            @endif

                                            <x-primary-button class="ms-3">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                        </div> --}}

                                        <div class="mb-3 form-group d-flex">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkbox-signin"
                                                        checked>
                                                    <label class="form-check-label" for="checkbox-signin">Remember
                                                        me</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <a class='text-muted fs-14' href='auth-recoverpw.html'>Forgot
                                                    password?</a>
                                            </div>
                                        </div>

                                        <div class="mb-0 form-group row">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="my-4 saprator"><span>or sign up with</span></div>

                                    <div class="mb-4 text-center text-muted">
                                        <p class="mb-0">Don't have an account ?<a class='text-primary ms-2 fw-medium'
                                                href='{{ route('register') }}'>Sing up</a></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="p-4 account-page-bg p-md-5">
                        <div class="text-center">
                            <h3 class="mb-3 text-dark pera-title">
                            {{ $settings['page_title'] ?? 'Quick, Effective, and Productive With Admin Dashboard' }}</h3>
                            <div class="auth-image">
                                
                                {{-- <img src="{{asset('backend')}}/assets/images/authentication.svg"
                                    class="mx-auto img-fluid" alt="images"> --}}

                                    <img id="logo-preview" src="{{ !empty($settings['page_image']) && file_exists(public_path($settings['page_image']))
    ? asset($settings['page_image'])
    : asset('uploads/no_image.jpg') }}" alt="Logo Preview" class="mt-2 rounded img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{asset('backend')}}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.js"></script>

</body>

</html>