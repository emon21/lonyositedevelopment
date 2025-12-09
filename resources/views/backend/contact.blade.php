@extends('backend/layouts/admin-master', ['title' => 'Contact Page'])
@section('admin')
   <!-- Start breadcrumb -->
   <div class="container-fluid">
      <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
         <div class="flex-grow-1">
            <h4 class="m-0 fs-18 fw-semibold">Contact</h4>
         </div>
         <div class="text-end">
            <ol class="py-0 m-0 breadcrumb">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Contact</a></li>
               <li class="breadcrumb-item active">All Contact</li>
            </ol>
         </div>
      </div>
   </div> <!-- End breadcrumb -->

   <!-- page content -->
   <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h4 class="my-2 card-title">All Contact</h4>
      </div><!--end card-header-->
      <div class="card-body">
         <table id="datatable" class="table table-bordered dt-responsive nowrap"
            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <span class="badge bg-danger">{{ $unreadCount }}</span>
            <thead class="bg-dark text-white">
               <tr>
                  <th>SL</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Status</th>
                   <th>Action</th>
               </tr>
            </thead>
            <tbody>
               {{-- @foreach ($reviews as $key => $review) --}}
               @forelse($data as $contact)
                  <tr>
                      {{-- <td>{{ $loop->iteration }}</td> --}}
                     <td>{{ $loop->index + 1 }}</td>
                     <td>{{ $contact->name }}</td>
                     <td>{{ $contact->email }}</td>
                     <td>{{ Str::limit($contact->message, 40) }}</td>
                     <td>
                        <span class="badge {{ $contact->is_read ? 'bg-success' : 'bg-danger' }}" id="status{{ $contact->id }}">
                           {{ $contact->is_read ? 'Read' : 'Unread' }}
                        </span>
                     </td>

                     <td>
                        <button onclick="toggleRead({{ $contact->id }})" class="btn btn-sm btn-primary">
                           Toggle
                        </button>
                     </td>
                  </tr>
               @empty
                  <tr>
                     <td colspan="5" class="py-3 text-lg text-center text-danger">No Data Found</td>
                  </tr>
               @endforelse
            </tbody>
         </table>
      </div><!--end card-body-->
   </div>
   <!-- End page content -->
   </div>
   <!-- Ent content -->
@endsection

   @push('scripts')
         <script>
            
         //    document.querySelectorAll(".editable").forEach(function (element) {
         //       element.addEventListener("blur", function () {
         //          let id = this.dataset.id;
         //          let field = this.dataset.field;
         //          let value = this.innerText;

         //          axios.post("/admin/financial/update-field", {
         //             id: id,
         //             field: field,
         //             value: value,
         //          }).then(res => {
         //             toastr.success(res.data.message);
         //          });
         //       });
         // });


         function toggleRead(id) {

               axios.post('/message/read/' + id)
                  .then(function (response) {

                     let statusSpan = document.getElementById('status' + id);

                     if (statusSpan.innerText === 'Unread') {
                        statusSpan.innerText = 'Read';
                        statusSpan.classList.remove('bg-danger');
                        statusSpan.classList.add('bg-success');
                     } else {
                        statusSpan.innerText = 'Unread';
                        statusSpan.classList.remove('bg-success');
                        statusSpan.classList.add('bg-danger');
                     }

                     Swal.fire({
                        icon: 'success',
                        title: response.data.message,
                        timer: 1500,
                        showConfirmButton: false
                     });
                      location.reload(); // 🔥 Auto Reload
                  })
                  .catch(function () {
                     Swal.fire({
                        icon: 'error',
                        title: 'Something went wrong!'
                     });
                  });

            }

      </script>

   @endpush

   