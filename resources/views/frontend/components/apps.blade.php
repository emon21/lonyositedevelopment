@php

  $app = App\Models\App::find(1);

@endphp

<section class="lonyo-cta-section bg-heading">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="lonyo-cta-thumb aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
          <img id="appImage" src="{{ asset('uploads/apps/' . $app->photo) }}" alt=""
            >

          {{-- Image upload functionality --}}
          @if(auth()->check())
            <input type="file" class="form-control" name="fileUpload" id="uploadImage" style="display:none;">
          @endif
        </div>
      </div>
      <div class="col-lg-6">
        <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">
          {{-- <h2 id="title" class="p-4 rounded" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
            data-id="{{ $app->id }}">{{ $app->title }}</h2>
          <p id="description" class="p-4 rounded" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
            data-id="{{ $app->id }}">{{ $app->description }}</p> --}}

            <h2 id="title" class="editable" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
              data-id="{{ $app->id }}" data-field="title">{{ $app->title }}</h2>
              <p id="description" class="pt-1 editable" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
              data-id="{{ $app->id }}" data-field="description">{{ $app->description }}</p>
       
          <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
            <ul>
              <li>
                <a href="https://www.apple.com/app-store/">
                  <img src="{{ asset('frontend') }}/assets/images/v1/app-store.svg" alt=""></a>
              </li>
              <li>
                <a href="https://playstore.com/"><img src="{{ asset('frontend') }}/assets/images/v1/play-store.svg"
                    alt=""></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@push('frontend-js')
  <script>

    /* =======================================================
           * 2️⃣ UPDATE IMAGE UPLOAD
           * ======================================================= */
    // function updateImage(file) {
    //   const titleId = "{{ $app->id }}";
    //   let formData = new FormData();
    //   formData.append("photo", file);

    //   return axios.post(`/admin/apps/update-apps-image/${titleId}`, formData, {
    //     headers: { "Content-Type": "multipart/form-data" }
    //   });
    // }

    // let appImage = document.getElementById("appImage");
    // let uploadImage = document.getElementById("uploadImage");

    // // Click image → open file input
    // appImage.addEventListener("click", function () {
    //   uploadImage.click();
    // });

    // // On image select
    // uploadImage.addEventListener("change", function () {
    //   let file = this.files[0];
    //   if (!file) return;

    //   updateImage(file)       // ⬅️ Image Update Function
    //     .then(res => {
    //       appImage.src = URL.createObjectURL(file); // instant preview
    //       toastr.success("Image updated successfully");
    //     })
    //     .catch(err => {
    //       console.error("Image update failed:", err);
    //     });
    // });

    // ✅ Option 2: টাইপ করার সাথে সাথেই Auto Save (Debounce সহ)
    // 👉 ফলাফল: ইউজার টাইপ বন্ধ করলে 0.8 সেকেন্ড পরে auto update হবে।

    //       let timer = null;

    // document.querySelectorAll(".editable").forEach(function (element) {

    //     element.addEventListener("input", function () {

    //         clearTimeout(timer);

    //         timer = setTimeout(() => {
    //             let id = this.dataset.id;
    //             let field = this.dataset.field;
    //             let value = this.innerText;

    //             axios.post("/admin/update-apps/${titleId}", {
    //                 id,
    //                 field,
    //                 value,
    //             }).then(res => {
    //                 toastr.success(res.data.message);
    //             });

    //         }, 500); // 0.5 sec pause দিলে save হবে // টাইপ বন্ধ করলে 0.5 sec পরে auto save
    //     });
    // });

    // titleId variable must exist before this code
    // Example: let titleId = 5;


    document.querySelectorAll(".editable").forEach(function (element) {

      element.addEventListener("input", function () {
        let timer = null;
        clearTimeout(timer);

        timer = setTimeout(() => {
          let id = this.dataset.id;
          let field = this.dataset.field;
          let value = this.innerText;

          axios.post("admin/apps/update-apps", {   // ✅ FIXED: Template String 
            id: id,
            field: field,
            value: value
          }).then(res => {
            toastr.success(res.data.message);
          });

        }, 500); // typing বন্ধ হলে 0.5 sec পরে auto save হবে
      });
    });


    // Image upload functionality
    const appImage = document.getElementById('appImage');
    const uploadImage = document.getElementById('uploadImage');

    // 👉 Click image to open file upload
    appImage.addEventListener('click', () => {
      uploadImage.click();
    });

    // 👉 On file select
    uploadImage.addEventListener('change', () => {
      const file = uploadImage.files[0];
      if (!file) return;

      const formData = new FormData();
      formData.append('photo', file);
      const titleId = "{{ $app->id }}"; // Get the app ID from Blade variable

      axios.post(`/admin/apps/update-apps-image/${titleId}`, formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
        .then(response => {
          toastr.success(response.data.message);

          // 👉 Update preview instantly
          appImage.src = URL.createObjectURL(file);
        })
        .catch(error => {
          toastr.error('Image upload failed.');
        });
    });


  </script>
@endpush