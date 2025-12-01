@extends('backend/layouts/admin-master', ['title' => 'Feature Page'])
@section('admin')
   <!-- Start Content-->
   <div class="content">

      <!-- Start breadcrumb -->
      <div class="container-fluid">
         <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
               <h4 class="m-0 fs-18 fw-semibold">All Feature</h4>
            </div>
            <div class="text-end">
               <ol class="py-0 m-0 breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Feature</li>
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
               <h4 class="mb-0 card-title">Feature List</h4>
               <a href="{{ route('admin.feature.restore') }}" class="btn btn-warning delete-btn">
                  Restore Feature</a>
               <a href="{{ route('admin.feature.create') }}" class="btn btn-success float-end">Add
                  Feature</a>
            </div><!--end card-header-->

            <div class="card-body">
               <table id="datatable" class="table table-bordered dt-responsive nowrap"
                  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                     <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     {{-- @foreach ($reviews as $key => $review) --}}
                     @forelse($features as $feature)
                        <tr>
                           <td>{{ $loop->index + 1 }}</td>
                           <td>{{ $feature->title }}</td>
                           <td>{{ $feature->description }}</td>
                           <td>{{ $feature->icon }}</td>
                           <td>
                              <button class="btn btn-primary copy-btn" data-id="{{ $feature->id }}">Copy</button>
                              <a href="{{ route('admin.feature.edit', $feature) }}" class="btn btn-success">Edit</a>
                              <form action="{{ route('admin.feature.destroy', $feature->id) }}" method="POST"
                                 class="d-inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-delete"
                                    onclick="deleteConfirm($feature->id)">Delete</button>
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