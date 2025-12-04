@extends('backend/layouts/admin-master', ['title' => 'Edit About'])

@section('admin')
   <!-- Start breadcrumb -->
   <div class="container-fluid">
      <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
         <div class="flex-grow-1">
            <h4 class="m-0 fs-18 fw-semibold">Edit About</h4>
         </div>
         <div class="text-end">
            <ol class="py-0 m-0 breadcrumb">
               <li class="breadcrumb-item"><a href="javascript: void(0);">About</a></li>
               <li class="breadcrumb-item active">Edit</li>
            </ol>
         </div>
      </div>
   </div> <!-- End breadcrumb -->

   <!-- page content -->
   <div class="container-fluid">
      <!-- Edit About -->
      <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="my-2 card-title">Edit About</h4>
         </div><!--end card-header-->
         <div class="card-body">
            <form action="{{ route('admin.about.update', $about) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('put')
               <!-- Title -->
               <div class="mb-3 form-group row">
                  <label for="title" class="form-label">Title</label>
                  <div class="col-lg-12 col-xl-12">
                     <input class="form-control" type="text" name="title" id="title"
                        value="{{ old('title', $about->title) }}" placeholder="Your Name....">
                  </div>
               </div><!-- End Title -->

               <!-- Description Textarea -->
               <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  {{-- <textarea class="form-control" id="description" rows="5" spellcheck="false" name="description"
                     value="{{ old('description', $about->description) }}"
                     placeholder="Description Here....">{{ $about->description }}</textarea> --}}

                  {{-- <div id="quill-editor" style="height: 400px;" name="description">
                     {{ $about->description }}
                     {{-- </div> --}}
                  {{-- <textarea id="description" name="description" style="display:none"></textarea> --}}
                  <!-- Hidden Input (This will store HTML text) -->
                  {{-- <input type="hidden" name="description" id="description">
                  <div id="quill-editor" style="height: 200px;">
                     {!! $about->description !!}
                  </div> --}}

                  <textarea id="summernote" name="description"
                     value="{{ old('description', $about->description) }}">{!! $about->description !!}</textarea>
               </div>

               <!-- End Description Textarea -->

               <!-- Photo Upload -->
               <div class="mb-3 form-group">
                  <label class="form-label">Photo</label>
                  <div class="col-lg-12 col-xl-12">
                     <input class="form-control" type="file" name="photo" id="photo">
                  </div>
                  <!-- Image Preview -->
                  <img src="{{ $about->photo ? asset('uploads/about/' . $about->photo) : asset('uploads/no_image.jpg') }}"
                     class="mt-2 rounded-circle avatar-xxl img-thumbnail" alt="image profile">
               </div> <!-- End Photo Upload -->

               <div class="form-group">
                  <div class="col-lg-12 col-xl-12">
                     <button type="submit" class="btn btn-primary">
                        Update About</button>
                  </div>
               </div>
            </form>
         </div><!--end card-body-->
      </div> <!--end Edit About -->
   </div>
   <!-- End page content -->
   </div>
   <!-- Ent content -->


   {{-- // document.querySelector('form').onsubmit = function(){
   // var description = document.querySelector('#description');
   // description.value = quill.root.innerHTML;
   // };


   // document.querySelector('form').onsubmit = function(){
   // var description = document.querySelector('#description');
   // description.value = quill.root.innerHTML;
   // } --}}



@endsection

<!-- include summernote css/js -->


@push('scripts')
   <script>
      // const form = document.querySelector('form');
      // const descriptionField = document.querySelector('#description');

      // form.addEventListener('submit', function () {
      //    descriptionField.value = quill.root.innerHTML;
      // });

      // $(document).ready(function () {
      //    $('#summernote').summernote({
      //       placeholder: 'Hello stand alone ui',
      //       tabsize: 2,
      //       height: 180,
      //    });
      // });

      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 180,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

   </script>
@endpush