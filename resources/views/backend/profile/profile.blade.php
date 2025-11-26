@extends('backend/layouts/admin-master', ['title' => 'Profile | Admin Profile Page'])
@section('admin')


   <!-- Start Content-->
   <div class="content">
      <div class="container-xxl">
         <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
               <h4 class="m-0 fs-18 fw-semibold">Profile</h4>
            </div>

            <div class="text-end">
               <ol class="py-0 m-0 breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Components</a></li>
                  <li class="breadcrumb-item active">Profile</li>
               </ol>
            </div>
         </div>
      </div> <!-- container-fluid -->

      <div class="mt-3 container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="my-2 card-title">Admin Profile</h4>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-body">
                                 <div class="align-items-center">
                                    <div class="d-flex align-items-center">
                                       {{-- <img src="{{asset('backend')}}/assets/images/users/user-11.jpg"
                                          class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
                                       --}}
                                       <img
                                          src="{{ asset($profile->photo ? 'uploads/admin/' . $profile->photo : 'uploads/no_image.jpg') }}"
                                          class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                                       <div class="overflow-hidden ms-4">
                                          <h4 class="m-0 text-dark fs-20">{{ $profile->name }}</h4>
                                          <p class="my-1 text-muted fs-16">{{ $profile->email }}</p>
                                       </div>
                                    </div>
                                 </div>

                                 <ul class="pt-2 nav nav-underline border-bottom" id="pills-tab" role="tablist">

                                    <li class="nav-item" role="presentation">
                                       <a class="p-2 nav-link active" id="setting_tab" data-bs-toggle="tab" role="tab"
                                          aria-selected="true">
                                          <span class="d-block d-sm-none"><i class="mdi mdi-school"></i></span>
                                          <span class="d-none d-sm-block">Profile Setting</span>
                                       </a>
                                    </li>
                                 </ul>

                                 <div class="bg-white tab-content text-muted">

                                    <div class="pt-4 tab-pane active show" id="profile_setting" role="tabpanel"
                                       aria-labelledby="setting_tab">
                                       <div class="row">

                                          <div class="row">
                                             <!-- Personal Information -->
                                             <div class="col-lg-6 col-xl-6">
                                                <div class="mb-0 border card">
                                                   <div class="card-header">
                                                      <div class="row align-items-center">
                                                         <div class="col">
                                                            <h4 class="mb-0 card-title">Personal Information</h4>
                                                         </div><!--end col-->
                                                      </div>
                                                   </div>

                                                   <div class="card-body">
                                                      <form action="{{ route('admin.profile.update', $profile) }}"
                                                         method="POST" enctype="multipart/form-data">
                                                         @csrf
                                                         <div class="mb-3 form-group row">
                                                            <label for="name" class="form-label">Full Name</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                               <input class="form-control" type="text" name="name"
                                                                  id="name" value="{{ $profile->name }}"
                                                                  placeholder="Your Name....">
                                                            </div>
                                                         </div>

                                                         <div class="mb-3 form-group row">
                                                            <label class="form-label" for="email">Email Address</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                               <div class="input-group">
                                                                  <span class="input-group-text"><i
                                                                        class="mdi mdi-email"></i></span>
                                                                  <input type="text" class="form-control"
                                                                     value="{{ $profile->email }}" placeholder="Email"
                                                                     id="email" name="email"
                                                                     aria-describedby="basic-addon1">
                                                               </div>
                                                            </div>
                                                         </div>

                                                         <div class="mb-3 form-group row">
                                                            <label class="form-label" for="phone">Contact Phone</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                               <div class="input-group">
                                                                  <span class="input-group-text"><i
                                                                        class="mdi mdi-phone-outline"></i></span>
                                                                  <input class="form-control" type="text"
                                                                     placeholder="Phone" aria-describedby="basic-addon1"
                                                                     id="phone" name="phone" value="{{ $profile->phone }}">
                                                               </div>
                                                            </div>
                                                         </div>

                                                         <fieldset class="mb-3 row">
                                                            <legend class="pt-0 col-form-label col-sm-2">Role</legend>
                                                            <div class="gap-2 col-sm-10 d-flex">
                                                               <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="role"
                                                                     id="gridRadios1" value="admin"
                                                                     @if($profile->role == 'admin') checked @endif>
                                                                  <label class="form-check-label" for="gridRadios1">
                                                                     Admin
                                                                  </label>
                                                               </div>
                                                               <div class="form-check">
                                                                  <input class="form-check-input" type="radio" name="role"
                                                                     id="gridRadios2" value="user" {{ ($profile->role == 'user') ? 'checked' : '' }}>
                                                                  <label class="form-check-label" for="gridRadios2">
                                                                     User
                                                                  </label>
                                                               </div>
                                                            </div>
                                                         </fieldset>

                                                         <div class="mb-3">
                                                            <label for="address" class="form-label">Address</label>
                                                            <textarea class="form-control" id="address" rows="5"
                                                               spellcheck="false" name="address"
                                                               value="{{ $profile->address }}">{{ $profile->address }}</textarea>
                                                         </div>

                                                         <div class="mb-3 form-group">
                                                            <label class="form-label">Photo</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                               <input class="form-control" type="file" name="photo"
                                                                  id="photo">
                                                            </div>

                                                            <!-- Image Preview -->
                                                            <img
                                                               src="{{ $profile->photo ? asset('uploads/admin/' . $profile->photo) : asset('uploads/no_image.jpg') }}"
                                                               class="mt-2 rounded-circle avatar-xxl img-thumbnail"
                                                               alt="image profile">
                                                         </div>

                                                         <!-- Image Upload -->
                                                         {{-- <div class="mb-3">
                                                            @if($profile->photo)
                                                            <img src="{{ asset('uploads/admin/' . $profile->photo) }}"
                                                               width="160" height="160" class="mt-2 rounded-circle">
                                                            @endif
                                                         </div> --}}

                                                         <div class="form-group">
                                                            <div class="col-lg-12 col-xl-12">
                                                               <button type="submit" class="btn btn-primary">
                                                                  Update Profile</button>
                                                            </div>
                                                         </div>
                                                      </form>
                                                   </div><!--end card-body-->

                                                </div>
                                             </div><!-- End Personal Information -->

                                             <!-- Change Password -->
                                             <div class="col-lg-6 col-xl-6">
                                                <div class="mb-0 border card">

                                                   <div class="card-header">
                                                      <div class="row align-items-center">
                                                         <div class="col">
                                                            <h4 class="mb-0 card-title">Change Password</h4>
                                                         </div><!--end col-->
                                                      </div>
                                                   </div>

                                                   <div class="mb-0 card-body">
                                                      <form action="{{ route('admin.update.password') }}" method="POST">
                                                         @csrf
                                                         <div class="mb-3 form-group row">
                                                            <label class="form-label">Old Password</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                               <input class="form-control" type="password"
                                                                  placeholder="Old Password" name="old_password" id="old_password">
                                                            </div>
                                                         </div>
                                                         <div class="mb-3 form-group row">
                                                            <label class="form-label">New Password</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                               <input class="form-control" type="password"
                                                                  placeholder="New Password" name="new_password" id="new_password">
                                                            </div>
                                                         </div>
                                                         <div class="mb-3 form-group row">
                                                            <label class="form-label">Confirm Password</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                               <input class="form-control" type="password"
                                                                  placeholder="Confirm Password"  name="new_password_confirmation">
                                                            </div>
                                                         </div>

                                                         <div class="form-group row">
                                                            <div class="col-lg-12 col-xl-12">
                                                               <button type="submit" class="btn btn-primary">
                                                                  Change Password</button>
                                                            </div>
                                                         </div>
                                                      </form>
                                                   </div><!--end card-body-->
                                                </div>
                                             </div> <!-- End Change Password -->
                                          </div>

                                       </div>
                                    </div> <!-- end education -->

                                 </div> <!-- Tab panes -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Ent content -->
@endsection