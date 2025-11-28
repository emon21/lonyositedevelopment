@extends('backend/layouts/admin-master', ['title' => 'Review Page'])
@section('admin')
   <!-- Start Content-->
   <div class="content">

      <!-- Start breadcrumb -->
      <div class="container-fluid">
         <div class="py-3 px-1 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
               <h4 class="m-0 fs-18 fw-semibold">All Review</h4>
            </div>
            <div class="text-end">
               <ol class="py-0 m-0 breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                  <li class="breadcrumb-item active">Review</li>
               </ol>
            </div>
         </div>
      </div> <!-- End breadcrumb -->

      <!-- page content -->
      <div class="container-fluid">
         <!-- All Review Information -->
         <div class="mb-0 border card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h4 class="mb-0 card-title">Review List</h4>
               <a href="{{ route('admin.review.create') }}" class="btn btn-success btn-sm float-end">Add
                  Review</a>
            </div><!--end card-header-->

            <div class="card-body">
               <table id="datatable" class="table table-bordered dt-responsive nowrap"
                  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                     <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     {{-- @foreach ($reviews as $key => $review) --}}
                     @forelse($reviews as $review)
                        <tr>
                           <td>{{ $loop->index + 1 }}</td>
                           <td>{{ $review->name }}</td>
                           <td>{{ $review->position }}</td>
                           <td>
                              
                              {{-- {{ asset('uploads/review/' . $review->photo) }}
                              {{ $profile->photo ? asset('uploads/review/' . $profile->photo) : asset('uploads/no_image.jpg')
                              }} --}}

                              <img
                                 src="{{ $review->photo ? asset('uploads/review/' . $review->photo) : asset('uploads/no_image.jpg') }}"
                                 alt="Review Image" style="width: 80px; height: 50px;">
                           </td>
                           <td>
                              <a href="{{ route('admin.review.edit', $review) }}" class="btn btn-success">Edit</a>
                              <form action="{{ route('admin.review.destroy', $review->id) }}" method="POST" class="d-inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger" id="delete">Delete</button>
                              </form>
                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="5" class="text-danger text-center text-lg py-3">No Data Found</td>
                        </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div> <!--end All Review Information-->
      </div>
      <!-- End page content -->

   </div>
   <!-- Ent content -->
@endsection