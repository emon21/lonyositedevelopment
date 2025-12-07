@extends('backend/layouts/admin-master', ['title' => 'Blog Page'])
@section('admin')
   <!-- Start Content-->
   <div class="content">

      <!-- Start breadcrumb -->
      <div class="container-fluid">
         <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
               <h4 class="m-0 fs-18 fw-semibold">All Blog</h4>
            </div>
            <div class="text-end">
               <ol class="py-0 m-0 breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Blog</li>
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
               <h4 class="mb-0 card-title">Blog List</h4>
               <a href="{{ route('admin.blog.create') }}" class="btn btn-success">
                  Create Blog</a>
            </div><!--end card-header-->

            <div class="card-body">
               <table id="datatable" class="table table-bordered dt-responsive nowrap"
                  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                     <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     {{-- @foreach ($reviews as $key => $review) --}}
                     @forelse($blogs as $blog)
                        <tr>
                           <td>{{ $loop->index + 1 }}</td>
                           <td>{{ $blog->title }}</td>
                           <td>{{ $blog['category']->category_name }}</td>
                           <td>{{ Str::limit($blog->description, 20) }}</td>
                           <td><img
                                 src="{{ $blog->photo ? asset('uploads/blog/' . $blog->photo) : asset('uploads/no_image.jpg') }}"
                                 alt="Review Image" style="width: 80px; height: 50px;"></td>
                           <td>
                              <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-success">Edit</a>
                              <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" class="delete-form">
                                 @csrf
                                 @method('DELETE')
                                 <button type="button" class="btn btn-danger" onclick="DeleteConfirm(event)">
                                    Delete
                                 </button>
                              </form>
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

@endsection
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
   function DeleteConfirm(event) {
      event.preventDefault();
      let form = event.target.closest('form');
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
            form.submit(); // ✅ Form submit
            Swal.fire({
               title: "Deleted!",
               text: "Your file has been deleted.",
               icon: "success"
            });
         }
      });
   }
</script>