@extends('backend/layouts/admin-master', ['title' => 'Create Team'])
@section('admin')
      <!-- Start breadcrumb -->
      <div class="container-fluid">
         <div class="py-3 px-1 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
               <h4 class="m-0 fs-18 fw-semibold">Create Team</h4>
            </div>
            <div class="text-end">
               <ol class="py-0 m-0 breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Team</a></li>
                  <li class="breadcrumb-item active">Create</li>
               </ol>
            </div>
         </div>
      </div> <!-- End breadcrumb -->

      <!-- page content -->
      <div class="container-fluid">
         <!-- Create Team -->
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="my-2 card-title">Create Team</h4>
               <a href="{{ route('admin.team') }}" class="btn btn-success btn-sm float-end">Team List</a>
            </div><!--end card-header-->
            <div class="card-body">
               <form id="myForm" action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <!-- Name -->
                  <div class="mb-3 form-group row">
                     <label for="name" class="form-label">Name</label>
                     <div class="form-group col-lg-12 col-xl-12">
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                           placeholder="Your Name....">
                     </div>
                  </div><!-- End Name -->

                  <!-- Position -->
                  <div class="mb-3 form-group row">
                     <label class="form-label" for="position">Position</label>
                     <div class="form-group col-lg-12 col-xl-12">
                        <input type="text" class="form-control" value="{{ old('position') }}" placeholder="Your Position...."
                           id="position" name="position" aria-describedby="basic-addon1">
                     </div>
                  </div><!-- End Position -->

                  <!-- Photo Upload -->
                  <div class="mb-3 form-group">
                     <label class="form-label">Photo</label>
                     <div class="form-group col-lg-12 col-xl-12">
                        <input class="form-control" type="file" name="FileUpload" id="photo">
                     </div>
                  </div> <!-- End Photo Upload -->

                  <!-- Message Textarea -->
                  <div class="mb-3">
                     <label for="address" class="form-label">Message</label>
                     <textarea class="form-group form-control" id="address" rows="5" spellcheck="false" name="message"
                        value="{{ old('message') }}" placeholder="Message Here...."></textarea>
                  </div> <!-- End Message Textarea -->

   {{-- 
                  <h4>Social Links</h4>

                  <h4 class="mb-2">Names</h4>

                  <!-- Wrapper -->
                  <div id="nameWrapper" class="d-none">
                     <!-- First input will be inserted by JS -->
                  </div>

                  <button type="button" id="addNameBtn" class="btn btn-success btn-sm mb-3">+ Add More Name</button>


                  <h4 class="mb-2">Social Links</h4>

                  <div id="nameWrapper">

                     <div class="name-item row mb-3">
                        <label class="form-label">Links</label>
                        <div class="col-lg-10 col-xl-10">
                           <input class="form-control" type="text" name="names[]" placeholder="Your Name....">
                        </div>
                        <div class="col-lg-2 col-xl-2">
                           <button type="button" class="btn btn-danger removeNameBtn w-100">X</button>
                        </div>
                     </div>

                  </div>
                  <button type="button" id="addNameBtn" class="btn btn-success btn-sm mb-3">+ Add More Name</button> --}}


                  <div class="form-group">
                     <div class="col-lg-12 col-xl-12">
                        <button type="submit" class="btn btn-primary">
                           Create Team</button>
                     </div>
                  </div>
               </form>
            </div><!--end card-body-->
         </div> <!--end Create Team -->
      </div>
      <!-- End page content -->
      </div>
      <!-- Ent content -->

      @push('scripts')

               {{-- <script>
                  const nameWrapper = document.getElementById('nameWrapper');
                  const addNameBtn = document.getElementById('addNameBtn');

                  addNameBtn.addEventListener('click', function () {

                     // Show wrapper if hidden
                     if (nameWrapper.classList.contains('d-none')) {
                        nameWrapper.classList.remove('d-none');
                     }

                     // Create input row
                     const div = document.createElement('div');
                     div.classList.add('name-item', 'row', 'mb-3');

                     div.innerHTML = `
                           <label class="form-label">Name</label>
                           <div class="col-lg-10 col-xl-10">
                               <input class="form-control" type="text" name="names[]" placeholder="Your Name....">
                           </div>
                           <div class="col-lg-2 col-xl-2">
                               <button type="button" class="btn btn-danger removeNameBtn w-100">X</button>
                           </div>
                       `;

                     nameWrapper.appendChild(div);
                  });

                  // Remove an input row
                  document.addEventListener('click', function (e) {
                     if (e.target.classList.contains('removeNameBtn')) {
                        e.target.closest('.name-item').remove();

                        // If empty, hide wrapper again
                        if (nameWrapper.children.length === 0) {
                           nameWrapper.classList.add('d-none');
                        }
                     }
                  });
               </script>


                  <script>
                     const nameWrapper = document.getElementById('nameWrapper');
                     const addNameBtn = document.getElementById('addNameBtn');

                     // Add New Name Field
                     addNameBtn.addEventListener('click', function () {
                        const div = document.createElement('div');
                        div.classList.add('name-item', 'row', 'mb-3');

                        div.innerHTML = `
                              <label class="form-label">Name</label>
                              <div class="col-lg-10 col-xl-10">
                                  <input class="form-control" type="text" name="names[]" placeholder="Your Name....">
                              </div>
                              <div class="col-lg-2 col-xl-2">
                                  <button type="button" class="btn btn-danger removeNameBtn w-100">X</button>
                              </div>
                          `;

                        nameWrapper.appendChild(div);
                     });

                     // Remove Name Field
                     document.addEventListener('click', function (e) {
                        if (e.target.classList.contains('removeNameBtn')) {
                           e.target.closest('.name-item').remove();
                        }
                     });
                  </script> --}}


         <script type="text/javascript">
             $(document).ready(function (){
                 $('#myForm').validate({
                     rules: {
                         name: {
                             required : true,
                         },
                          position: {
                             required : true,
                         },
                          FileUpload: {
                             required : true,
                         },
                          message: {
                             required : true,
                         }, 

                     },
                     messages :{
                         name: {
                             required : 'Please Enter Name',
                         },
                          position: {
                             required : 'Please Enter Position',
                         }, 
                         FileUpload: {
                             required : 'Please Choose Image',
                         },
                          message: {
                             required : 'Please Enter Message',
                         }, 


                     },
                     errorElement : 'span', 
                     errorPlacement: function (error,element) {
                         error.addClass('invalid-feedback');
                         element.closest('.form-group').append(error);
                     },
                     highlight : function(element, errorClass, validClass){
                         $(element).addClass('is-invalid');
                     },
                     unhighlight : function(element, errorClass, validClass){
                         $(element).removeClass('is-invalid');
                     },
                 });
             });

         </script>

      @endpush

@endsection