@extends('backend/layouts/admin-master', ['title' => 'Get Financial'])
@section('admin')
   <!-- Start breadcrumb -->
   <div class="container-fluid">
      <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
         <div class="flex-grow-1">
            <h4 class="m-0 fs-18 fw-semibold">Financial</h4>
         </div>
         <div class="text-end">
            <ol class="py-0 m-0 breadcrumb">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Financial</a></li>
               <li class="breadcrumb-item active">Get Data</li>
            </ol>
         </div>
      </div>
   </div> <!-- End breadcrumb -->

   <!-- page content -->
   <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h4 class="my-2 card-title">Get Financial</h4>

      </div><!--end card-header-->
      <div class="card-body">

         {{-- @foreach($financial->tabs as $tab)

         <div class="d-flex me-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#{{ $tab->id }}">
               <img src="{{ asset($tab->tab_icon) }}" alt="">
               {{ $tab->tab_title }}
            </button>
         </div>
         <div class="me-3">
            <div id="{{ $tab->id }}" class="collapse">
               {{ $tab->tab_description }}
            </div>
         </div>


         @endforeach --}}

         <h2 id="financial_title" class="p-2 border rounded border-success editable"
            contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $financial->id }}" data-field="title">
            {{ $financial->title }}
         </h2>

         <p id="financial_description" class="p-2 border editable border-success"
            contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $financial->id }}"
            data-field="description">
            {{ $financial->description }}
         </p>
         <!-- File Input -->
         <input type="file" id="new_tab_icon" class="mb-2 form-control" accept="image/*">

         <div class="flex-wrap gap-2 d-flex">
            @foreach($financial->tabs as $tab)
               <button type="button" class="flex-wrap gap-2 btn btn-primary d-flex text-light" data-bs-toggle="collapse"
                  data-bs-target="#{{ $tab->id }}">
                  <img src="{{ asset($tab->tab_icon) }}" alt="">
                  {{ $tab->tab_title }}
               </button>
            @endforeach

            @foreach($financial->tabs as $tab)
               <div class="me-3">
                  <div id="{{ $tab->id }}" class="collapse">
                     {{ $tab->tab_description }}
                  </div>
               </div>
            @endforeach

         </div>

      </div><!--end card-body-->
   </div>
   <!-- End page content -->
   </div>
   <!-- Ent content -->


@endsection

@push('scripts')
   <script>
      document.querySelectorAll(".editable").forEach(function (element) {
         element.addEventListener("blur", function () {
            let id = this.dataset.id;
            let field = this.dataset.field;
            let value = this.innerText;

            axios.post("/admin/financial/update-field", {
               id: id,
               field: field,
               value: value,
            }).then(res => {
               toastr.success(res.data.message);
            });
         });
      });

   </script>
@endpush