<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Verification Page</title>
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
                           @if(session('status'))
                              <div class="mb-4 alert alert-success">
                                 <p>Please check your email for a verification code.</p>
                                 {{-- <p>se
                                    A new verification link has been sent to the email address you provided during
                                 registration. --}}
                                 </p>
                                 {{ session('status') }}
                              </div>
                              @endif

                              @if(session('message'))
                              <div class="mb-4 alert alert-success">
                                 {{ session('message') }}
                              </div>
                           @endif

                           {{-- <h4 class="mt-0 mb-3 text-dark fw-bold">Verify Your Email Address</h4>
                           <p class="text-muted mb-4">Please enter the verification code sent to your email
                              address.</p> --}}

                              @if($errors->any())
                              <div class="alert alert-danger">
                                 <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                 </ul> 
                              </div>
                              @endif

                           <form class="my-4" method="POST" action="{{ route('custom.verification.verify') }}">
                              @csrf

                              @if(session('error'))
                                 <div class="alert alert-danger"><{{ session('error') }}</div>
                              @endif

                              <div class="mb-3 form-group">
                                 <label for="code" class="form-label">Email address</label>
                                 <input class="form-control" type="text" id="code" name="code" :value="old('code')"
                                    autofocus autocomplete="username" placeholder="Enter your code">
                                 {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}

                                 @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                 @enderror
                              </div>

                              <div class="mb-0 form-group row">
                                 <div class="col-12">
                                    <div class="d-grid">
                                       <button class="btn btn-info" type="submit"> Verify </button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-xl-7">
               <div class="p-4 account-page-bg p-md-5">
                  <div class="text-center">
                     <h3 class="mb-3 text-dark pera-title">Quick, Effective, and Productive With Tapeli Admin
                        Dashboard</h3>
                     <div class="auth-image">
                        <img src="{{asset('backend')}}/assets/images/authentication.svg" class="mx-auto img-fluid"
                           alt="images">
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