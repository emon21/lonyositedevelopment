@extends('backend/layouts/admin-master', ['title' => 'Connect Page'])
@section('admin')
   <!-- Start Content-->
   <div class="content">

      <!-- Start breadcrumb -->
      <div class="container-fluid">
         <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
               <h4 class="m-0 fs-18 fw-semibold">All Connect</h4>
            </div>
            <div class="text-end">
               <ol class="py-0 m-0 breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Connect</li>
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
               <h4 class="mb-0 card-title">Connect List</h4>

               <a href="{{ route('admin.usability-connect.create') }}" class="btn btn-success float-end">Add
                  Connect</a>
            </div><!--end card-header-->

            <div class="card-body">
               <table id="datatable" class="table table-bordered dt-responsive nowrap"
                  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                     <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     {{-- @foreach ($reviews as $key => $review) --}}
                     @forelse($UsabilityConnect as $connect)
                        <tr>
                           <td>{{ $loop->index + 1 }}</td>
                           <td>{{ $connect->title }}</td>
                           <td>{{ $connect->description }}</td>
                           <td>
                              <a href="{{ route('admin.usability-connect.edit', $connect) }}" class="btn btn-success">Edit</a>
                              <form action="{{ route('admin.usability-connect.destroy', $connect->id) }}" method="POST"
                                 class="d-inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-delete"
                                    onclick="deleteConfirm($connect->id)">Delete</button>
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
<script>
   document.addEventListener('DOMContentLoaded', function () {
      const buttons = document.querySelectorAll('.copy-btn');

      buttons.forEach(button => {
         button.addEventListener('click', function () {
            const productId = this.dataset.id;

            axios.post(`/admin/feature/duplicate/${productId}`)
               .then(response => {
                  //  console.log(response.data.message);
                  /// alert(response.data.message);
                  // SUCCESS MESSAGE Features  Changes saved successfully!
                  toastr.success(response.data.message);

                  // page reload
                  location.reload();
               })
               .catch(error => {
                  console.error(error);
                  alert('Error duplicating product');
               });
         });
      });
   });
</script>