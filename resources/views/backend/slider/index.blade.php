@extends('backend/layouts/admin-master', ['title' => 'Slider Page'])
@section('admin')
    <!-- Start Content-->
    <div class="content">

       <!-- Start breadcrumb -->
       <div class="container-fluid">
          <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
             <div class="flex-grow-1">
                <h4 class="m-0 fs-18 fw-semibold">All Slider</h4>
             </div>
             <div class="text-end">
                <ol class="py-0 m-0 breadcrumb">
                   <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                   <li class="breadcrumb-item active">Slider</li>
                </ol>
             </div>
          </div>
       </div> <!-- End breadcrumb -->

       <!-- page content -->
       <div class="container-fluid">
          <!-- All Review Information -->
          <div class="mb-0 border card">
             <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0 card-title">Slider List</h4>
                <a href="{{ route('admin.slider.create') }}" class="btn btn-success btn-sm float-end">Add
                   Slider</a>
             </div><!--end card-header-->

             <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                   <thead>
                      <tr>
                         <th>SL</th>
                         <th>Title</th>
                         <th>Description</th>
                         <th>Link</th>
                         <th>Status</th>
                         <th>Image</th>
                         <th>Action</th>
                      </tr>
                   </thead>

                   <tbody>
                      {{-- @foreach ($reviews as $key => $review) --}}
                      @forelse($sliders as $slider)
                         <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td>{{ $slider->link }}</td>
                            <td>
                              @if($slider->status == 'active')
                                 <span class="px-1 py-2 text-lg badge bg-success">{{ $slider->status }}</span>
                              @else
                                 <span class="px-1 py-2 text-lg badge bg-danger">{{ $slider->status }}</span>
                              @endif
                           </td>
                            <td>
                               <img
                                  src="{{ $slider->photo ? asset('uploads/slider/' . $slider->photo) : asset('uploads/no_image.jpg') }}"
                                  alt="Review Image" style="width: 80px; height: 50px;">
                            </td>
                            <td>
                              {{-- <button class="viewBtn btn btn-info" data-id="{{ $slider->id }}">View</button> --}}
                               <a href="{{ route('admin.slider.edit', $slider) }}" class="btn btn-success">Edit</a>
                               <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" id="delete">Delete</button>
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
          </div> <!--end All Review Information-->
       </div>
       <!-- End page content -->
    </div>
    <!-- Ent content -->


    <!-- Modal -->
<div id="productModal" style="display:none; position:fixed; top:20%; left:35%; width:30%; background:#fff; padding:20px; border:1px solid #ccc;">
    <h3>Product Details</h3>

    <p><strong>ID:</strong> <span id="m_id"></span></p>
    <p><strong>Name:</strong> <span id="m_name"></span></p>
    {{-- <p><strong>Price:</strong> <span id="m_price"></span></p> --}}

    <button id="closeModal">Close</button>
</div>

   {{-- <!-- Axios CDN -->
   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}

   <script>

   document.addEventListener("DOMContentLoaded", function () {
         
      const Baseurl = window.location.origin;

      // console.log("Root URL :" + Baseurl);


      const modal = document.getElementById("productModal");
      const closeModal = document.getElementById("closeModal");

    // Modal Close
    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Click on View Buttons
    document.querySelectorAll(".viewBtn").forEach(function (button) {

      let url = Baseurl + '/admin/slider/' + id;

       console.log(url);



        button.addEventListener("click", function () {

            let id = this.dataset.id;
            console.log("Clicked ID:", id);

            // Axios GET Request
            axios.get(`${Baseurl}/admin/slider/${id}`)
                .then(function (response) {
                    let data = response.data;

                    // Insert Data Into Modal
                    document.getElementById("m_id").innerText = data.id;
                    document.getElementById("m_name").innerText = data.title;
                  //   document.getElementById("m_price").innerText = data.price;

                    // Show Modal
                    modal.style.display = "block";

                })
                .catch(function (error) {
                    console.error("Error loading data", error);
                });

        });

    });

});
</script>
@endsection