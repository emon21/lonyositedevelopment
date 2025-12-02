@extends('backend/layouts/admin-master', ['title' => 'Edit Usability'])
@section('admin')
   <!-- Start breadcrumb -->
   <div class="container-fluid">
      <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
         <div class="flex-grow-1">
            <h4 class="m-0 fs-18 fw-semibold">Edit Usability</h4>
         </div>
         <div class="text-end">
            <ol class="py-0 m-0 breadcrumb">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Usability</a></li>
               <li class="breadcrumb-item active">Edit</li>
            </ol>
         </div>
      </div>
   </div> <!-- End breadcrumb -->

   <!-- page content -->
   <div class="container-fluid">
      <!-- Create Slider -->
      <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="my-2 card-title">Edit Usability</h4>
            
         </div><!--end card-header-->
         <div class="card-body">
            <form action="{{ route('admin.usability.update', $usability) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('put')
               <!-- Title -->
               <div class="mb-3 form-group row">
                  <label for="title" class="form-label">Title</label>
                  <div class="col-lg-12 col-xl-12">
                     <input class="form-control" type="text" name="title" id="title"
                        value="{{ old('title', $usability->title) }}" placeholder="Title Here....">
                  </div>
               </div><!-- End Title -->

               <!-- Description Textarea -->
               <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" rows="5" spellcheck="false" name="description"
                     value="{{ old('description', $usability->description) }}"
                     placeholder="Description Here....">{{ $usability->description }}</textarea>
               </div> <!-- End Description Textarea -->

               <!-- Youtube -->
               <div class="mb-3 form-group row">
                  <label for="youtube" class="form-label">Youtube</label>
                  <div class="col-lg-12 col-xl-12">
                     <input class="form-control" type="text" name="youtube" id="youtube"
                        value="{{ old('youtube', $usability->youtube) }}" placeholder="Youtube Here....">
                  </div>
               </div><!-- End Youtube -->

               <!-- Link -->
               <div class="mb-3 form-group row">
                  <label for="link" class="form-label">Link</label>
                  <div class="col-lg-12 col-xl-12">
                     <input class="form-control" type="text" name="link" id="link"
                        value="{{ old('link', $usability->link) }}" placeholder="Link Here....">
                  </div>
               </div><!-- End Link -->

               <!-- Photo Upload -->
               <div class="mb-3 form-group">
                  <label class="form-label">Photo</label>
                  <div class="col-lg-12 col-xl-12">
                     <input class="form-control" type="file" name="FileUpload" id="photo">
                  </div>
                  <!-- Image Preview -->
                  <img
                     src="{{ $usability->image ? asset('uploads/usability/' . $usability->image) : asset('uploads/no_image.jpg') }}"
                     class="mt-2 rounded-circle avatar-xxl img-thumbnail" alt="image profile">
               </div> <!-- End Photo Upload -->

               <div class="form-group">
                  <div class="col-lg-12 col-xl-12">
                     <button type="submit" class="btn btn-primary">
                        Update Usability</button>
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