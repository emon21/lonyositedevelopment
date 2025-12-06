@extends('backend/layouts/admin-master', ['title' => 'Category Page'])
@section('admin')
   <!-- Start Content-->
   <div class="content">

      <!-- Start breadcrumb -->
      <div class="container-fluid">
         <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
               <h4 class="m-0 fs-18 fw-semibold">All Category</h4>
            </div>
            <div class="text-end">
               <ol class="py-0 m-0 breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Category</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- End breadcrumb -->

      <!-- page content -->
      <div class="container-fluid">
         <!-- All feature Information -->


         <div class="mb-0 border card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="mb-0 card-title">Category List</h4>

               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createCategory">Create
                  Category</button>
            </div><!--end card-header-->

            <div class="card-body">
               <table id="datatable" class="table table-bordered dt-responsive nowrap"
                  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                     <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     {{-- @foreach ($reviews as $key => $review) --}}
                     @forelse($categories as $category)
                        <tr>
                           <td>{{ $loop->index + 1 }}</td>
                           <td>{{ $category->category_name }}</td>
                           <td>{{ $category->category_slug }}</td>
                           <td>
                              {{-- <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-success">Edit</a>
                              --}}

                              {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                 data-bs-target="#EditCategory" id="{{ $category->id }}"
                                 onclick="EditCategory(this.id)">Edit</button> --}}
                              <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                 data-bs-target="#ShowCategory" id="{{ $category->id }}"
                                 onclick="ShowCategory({{ $category->id }})">
                                 View
                              </button>
                              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#EditCategory"
                                 id="{{ $category->id }}" onclick="EditCategory({{ $category->id }})">Edit</button>

                              {{-- <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                 class="d-inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-delete"
                                    onclick="deleteCategory($category->id)">Delete</button>
                              </form> --}}
                              

                              <a href="javascript:void(0)" onclick="deleteCategory({{ $category->id }})"
                                 class="btn btn-danger">
                                 Delete
                              </a>

                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="5" class="py-3 text-lg text-center text-danger">No Data Found</td>
                        </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div> <!--end All feature Information-->
      </div>
      <!-- End page content -->
   </div>
   <!-- Ent content -->

   <!-- createCategory Modals -->
   <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true"
      style="display: none;">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Category Info</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
               </button>
            </div>
            <div class="modal-body">
               {{-- <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf --}}
                  <!-- Title -->
                  <div class="mb-3 form-group row">
                     <label for="category_name" class="form-label">Category Name</label>
                     <div class="col-lg-12 col-xl-12">
                        <input class="form-control" type="text" name="category_name" id="category_name"
                           value="{{ old('category_name') }}" placeholder="Category Name....">
                     </div>
                  </div><!-- End Title -->
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success" onclick="storeCategory()">Save changes</button>
            </div>
            {{-- </form> --}}
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
   </div>
   <!-- End createCategory Modals -->

   <!-- ShowCategory Modals -->
   <div class="modal fade" id="ShowCategory" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Category Details</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               <p><strong>ID:</strong> <span id="show_id"></span></p>
               <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Category Name :</th>
                        <th><span id="show_name"></span></th>
                     </tr>
                     <tr>
                        <th>Slug :</th>
                        <th><span id="show_slug"></span></th>
                     </tr>
                  </thead>
                  {{-- <tbody>
                     <tr>
                        <td><span id="show_name"></span></td>
                        <td><span id="show_slug"></span></td>
                     </tr>
                  </tbody> --}}
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- End ShowCategory Modals -->

   <!-- EditCategory Modal -->
   <div class="modal fade" id="EditCategory" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Edit Category</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               <input type="hidden" id="edit_id">
               <div class="mb-3">
                  <label>Category Name</label>
                  <input type="text" id="edit_name" class="form-control">
               </div>
            </div>
            <div class="modal-footer">
               <button onclick="updateCategory()" class="btn btn-success">Update</button>
            </div>
         </div>
      </div>
   </div>

   <!-- End EditCategory Modals -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

   // Store
   function storeCategory() {

      let name = document.getElementById('category_name').value;

      // validation
      // if (!name) {
      //     alert("Category name required!");
      //     return;
      // }
      axios.post('/admin/category/store', {
         category_name: name
      })
         .then(() => {
            document.getElementById('category_name').value = '';
            //  getCategories();
            toastr.success("Category added successfully!");
            $("#createCategory").modal("hide");
            location.reload();
         });
   }

   // Show Data
   // function ShowCategory(id) {

   //    axios.get('/admin/category/show/' + id)
   //       .then(function (res) {

   //          // DATA SET TO MODAL
   //          document.getElementById('edit_id').value = res.data.id;
   //          document.getElementById('edit_name').value = res.data.category_name;

   //          // SHOW MODAL
   //          let modal = new bootstrap.Modal(document.getElementById('ShowCategory'));
   //          modal.show();

   //       })
   //       .catch(function (err) {
   //          console.log(err);
   //       });
   // }


   function ShowCategory(id) {

      axios.get('/admin/category/show/' + id)
         .then(function (res) {

            // Set data inside modal
            document.getElementById('show_id').innerText = res.data.id;
            document.getElementById('show_name').innerText = res.data.category_name;
            document.getElementById('show_slug').innerText = res.data.category_slug;

            // document.getElementById('show_id').value = res.data.id;
            // document.getElementById('show_name').value = res.data.category_name;

         })
         .catch(function (err) {
            console.log(err);
         });
   }


   // Edit

   function EditCategory(id) {

      axios.get(`/admin/category/edit/${id}`)
         .then(res => {
            const data = res.data;
            document.getElementById("edit_id").value = data.id;
            document.getElementById("edit_name").value = data.category_name;

            $("#EditCategory").modal("show");
         });

   }

   function updateCategory() {

      let id = document.getElementById('edit_id').value;
      let name = document.getElementById('edit_name').value;

      axios.put('/admin/category/update/' + id, {
         category_name: name

      })
         .then(function (res) {

            // DOM Update instantly
            //  document.getElementById('name-' + id).innerText = name;

            // Hide modal
            $('#EditCategory').modal('hide');

            location.reload();
            // Toast message
            toastr.success(res.data.message);


         })
         .catch(function (err) {
            console.log(err);
            toastr.error("Update failed");
         });
   }


   //  function EditCategory(id){

   //      // Alert দেখানোর বদলে আপডেট রিকোয়েস্ট পাঠাই
   // //  let name = document.getElementById("cat_name_" + id).value;

   // //  axios.post('/admin/category/update/' + id, {
   // //      name: name,
   // //  })
   // //  .then(function (res) {
   // //      if(res.data.status === "success"){
   // //          alert("Category Updated Successfully!");
   // //      }
   // //  })
   // //  .catch(function (error) {
   // //      console.log(error);
   // //      alert("Something went wrong!");
   // //  });


   //  axios.get('/admin/category/edit/' + id)
   //  .then(function(res) {
   //      let data = res.data;

   //      document.getElementById('edit_id').value = data.id;
   //      document.getElementById('edit_name').value = data.category_name;

   //      // Modal Show
   //      let modal = new bootstrap.Modal(document.getElementById('EditCategory'));
   //      modal.show();
   //  })
   //  .catch(function(err) {
   //      console.log(err);
   //      alert("Failed to load data");
   //  });

   //  }

   // # updateCategory
   // function updateCategory() {

   //    let id = document.getElementById('edit_id').value;
   //    let name = document.getElementById('edit_name').value;

   //    axios.post('/admin/category/update/' + id, {
   //       category_name: name
   //    })
   //       .then(function (res) {
   //          // alert("Updated Successfully!");
   //          toastr.success(res.data.message);
   //          location.reload();
   //       })
   //       .catch(function (err) {
   //          console.log(err);
   //          alert("Update failed");
   //       });
   // }

   // deleteCategory
   function deleteCategory(id) {

      Swal.fire({
         title: "Are you sure?",
         text: "You won't be able to revert this!",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Yes, delete it!"
      }).then((result) => {

         if (result.isConfirmed) {

            axios.delete('/admin/category/delete/' + id)
               .then(res => {

                  Swal.fire({
                     title: "Deleted!",
                     text: res.data.message,
                     icon: "success"
                  });

                  // Reload (optional)
                  setTimeout(() => {
                     location.reload();
                  }, 1200);
                  toastr.success(res.data.message);
               })
               .catch(err => {
                  console.log(err);
                  Swal.fire("Error!", "Something went wrong!", "error");
               });
         }

      });

   }

</script>