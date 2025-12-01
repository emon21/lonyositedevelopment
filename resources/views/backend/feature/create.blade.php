@extends('backend/layouts/admin-master', ['title' => 'Create Feature'])
@section('admin')
   <!-- Start breadcrumb -->
   <div class="container-fluid">
      <div class="py-3 px-1 d-flex align-items-sm-center flex-sm-row flex-column">
         <div class="flex-grow-1">
            <h4 class="m-0 fs-18 fw-semibold">Create Feature</h4>
         </div>
         <div class="text-end">
            <ol class="py-0 m-0 breadcrumb">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Feature</a></li>
               <li class="breadcrumb-item active">Create</li>
            </ol>
         </div>
      </div>
   </div> <!-- End breadcrumb -->

   <!-- page content -->
   <div class="container-fluid">
      <!-- Create Review -->
      <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="my-2 card-title">Create Feature</h4>
            <a href="{{ route('admin.feature.index') }}" class="btn btn-success btn-sm float-end">Feature List</a>
         </div><!--end card-header-->
         <div class="card-body">
            <form action="{{ route('admin.feature.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <!-- Title -->
               <div class="mb-3 form-group row">
                  <label for="title" class="form-label">Title</label>
                  <div class="col-lg-12 col-xl-12">
                     <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="Your Name....">
                  </div>
               </div><!-- End Title -->

               <!-- Icon -->
               <div class="mb-3 form-group row">
                  <label class="form-label" for="icon">Icon</label>
                  <div class="col-lg-12 col-xl-12">
                     <input type="text" class="form-control" value="{{ old('icon') }}" placeholder="Your Position...."
                        id="icon" name="icon" aria-describedby="basic-addon1">
                  </div>
               </div><!-- End Icon -->

               <!-- Description Textarea -->
               <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" rows="5" spellcheck="false" name="description"
                     value="{{ old('description') }}" placeholder="Description Here...."></textarea>
               </div> <!-- End Description Textarea -->

               <div class="form-group">
                  <div class="col-lg-12 col-xl-12">
                     <button type="submit" class="btn btn-primary">
                        Create Feature</button>
                  </div>
               </div>
            </form>
         </div><!--end card-body-->
      </div> <!--end Create Review -->
   </div>
   <!-- End page content -->
   </div>
   <!-- Ent content -->
@endsection