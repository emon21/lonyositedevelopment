<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | Admin Dashboard</title>
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
                                    <form class="my-4" method="POST" action="{{ route('register') }}">
                                        @csrf
                                            <!-- Name -->
                                            <div class="mb-2 form-group">
                                                <label for="name" class="form-label">Name</label>
                                                <input class="form-control" name="name" type="text" id="name" required="" placeholder="Enter your Name" :value="old('name')">
                                            </div>

                                            <!-- Email Address -->
                                            <div class="mb-2 form-group">
                                                <label for="email" class="form-label">Email address</label>
                                                <input class="form-control" type="email" id="email" name="email" required="" placeholder="Enter your email" :value="old('email')">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <!-- Password -->
                                            <div class="mb-2 form-group">
                                                <label for="password" class="form-label" :value="__('Password')">Password</label>
                                                <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                            </div>

                                             <!-- Confirm Password -->
                                            <div class="mb-2">
                                                <x-input-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />

                                                <x-text-input id="password_confirmation" class="form-control"
                                                                type="password"
                                                                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />

                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                
                                            <div class="mb-2 form-group d-flex">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                                        <label class="form-check-label" for="checkbox-signin">I agree to the <a href="#" class="text-primary fw-medium"> Terms and Conditions</a></label>
                                                    </div>
                                                </div><!--end col-->
                                            </div>
                                            
                                            <div class="mb-0 form-group row">
                                                <div class="col-12">
                                                    <div class="d-grid"> 
                                                        <button class="btn btn-primary" type="submit"> Register</button>
                                                        </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="my-4 saprator">
                                            <span>or sign in with</span>
                                        </div>
                                            
                                        <div class="mb-4 text-center text-muted">
                                            <p class="mb-0">Already have an account ?<a class='text-primary ms-2 fw-medium'
                                                href="{{ route('login') }}">Login here</a>
                                            </p>
                                        </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7">
                    <div class="p-4 account-page-bg p-md-5">
                        <div class="text-center">
                            <h3 class="mb-3 text-dark pera-title">Quick, Effective, and Productive With Admin
                                Dashboard</h3>
                            <div class="auth-image">
                                <img src="{{asset('backend')}}/assets/images/authentication.svg"
                                    class="mx-auto img-fluid" alt="images">
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