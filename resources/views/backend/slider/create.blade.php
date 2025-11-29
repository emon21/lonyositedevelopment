@extends('backend/layouts/admin-master', ['title' => 'Create Slider'])
@section('admin')
   <!-- Start breadcrumb -->
   <div class="container-fluid">
      <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
         <div class="flex-grow-1">
            <h4 class="m-0 fs-18 fw-semibold">Create Slider</h4>
         </div>
         <div class="text-end">
            <ol class="py-0 m-0 breadcrumb">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Slider</a></li>
               <li class="breadcrumb-item active">Create</li>
            </ol>
         </div>
      </div>
   </div> <!-- End breadcrumb -->

   <!-- page content -->
   <div class="container-fluid">
      <!-- Create Slider -->
      <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="my-2 card-title">Create Slider</h4>
            <a href="{{ route('admin.slider.index') }}" class="btn btn-success btn-sm float-end">Slider List</a>
         </div><!--end card-header-->
         <div class="card-body">
            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Title -->
               <div class="mb-3 form-group row">
                  <label for="title" class="form-label">Title</label>
                  <div class="col-lg-12 col-xl-12">
                     <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="Your Name....">
                  </div>
               </div><!-- End Title -->

               <!-- Link -->
               <div class="mb-3 form-group row">
                  <label class="form-label" for="link">Link</label>
                  <div class="col-lg-12 col-xl-12">
                     <input type="text" class="form-control" value="{{ old('link') }}" placeholder="Your link Here...."
                        id="link" name="link" aria-describedby="basic-addon1">
                  </div>
               </div><!-- End Link -->

                <!-- Description Textarea -->
               <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" rows="5" spellcheck="false" name="description"
                     value="{{ old('description') }}" placeholder="Description Here...."></textarea>
               </div> <!-- End Description Textarea -->

                <fieldset class="mb-3">
                                                <legend class="pt-0 col-form-label col-sm-1">Status</legend>
                                                <div class="gap-2 col-sm-11 d-flex">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="active" checked="">
                                                        <label class="form-check-label" for="gridRadios1">
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="inactive">
                                                        <label class="form-check-label" for="gridRadios2">
                                                            Inactive
                                                        </label>
                                                    </div>
                                              </div>
                                            </fieldset>


               <!-- Photo Upload -->
               <div class="mb-3 form-group">
                  <label class="form-label">Photo</label>
                  <div class="col-lg-12 col-xl-12">
                     <input class="form-control" type="file" name="FileUpload" id="photo">
                  </div>
               </div> <!-- End Photo Upload -->

              

               <div class="form-group">
                  <div class="col-lg-12 col-xl-12">
                     <button type="submit" class="btn btn-primary">
                        Create Slider</button>
                  </div>
               </div>
            </form>
         </div><!--end card-body-->
      </div> <!--end Create Slider -->
   </div>
   <!-- End page content -->
   </div>
   <!-- Ent content -->
@endsection