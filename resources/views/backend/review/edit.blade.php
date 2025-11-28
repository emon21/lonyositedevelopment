@extends('backend/layouts/admin-master', ['title' => 'Edit Review'])
@section('admin')
    <!-- Start breadcrumb -->
    <div class="container-fluid">
        <div class="py-3 px-1 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="m-0 fs-18 fw-semibold">Edit Review</h4>
            </div>
            <div class="text-end">
                <ol class="py-0 m-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Review</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div> <!-- End breadcrumb -->

    <!-- page content -->
    <div class="container-fluid">
        <!-- Create Review -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="my-2 card-title">Edit Review</h4>
                <a href="{{ route('admin.review.index') }}" class="btn btn-success btn-sm float-end">Review List</a>
            </div><!--end card-header-->
            <div class="card-body">
                <form action="{{ route('admin.review.update', $review) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Name -->
                    <div class="mb-3 form-group row">
                        <label for="name" class="form-label">Name</label>
                        <div class="col-lg-12 col-xl-12">
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ old('name', $review->name) }}" placeholder="Your Name....">
                        </div>
                    </div><!-- End Name -->

                    <!-- Position -->
                    <div class="mb-3 form-group row">
                        <label class="form-label" for="position">Position</label>
                        <div class="col-lg-12 col-xl-12">
                            <input type="text" class="form-control" value="{{ old('position', $review->position) }}"
                                placeholder="Your Position...." id="position" name="position"
                                aria-describedby="basic-addon1">
                        </div>
                    </div><!-- End Position -->

                    <!-- Photo Upload -->
                    <div class="mb-3 form-group">
                        <label class="form-label">Photo</label>
                        <div class="col-lg-12 col-xl-12">
                            <input class="form-control" type="file" name="FileUpload" id="photo">
                        </div>
                        <!-- Image Preview -->
                        <img src="{{ $review->photo ? asset('uploads/review/' . $review->photo) : asset('uploads/no_image.jpg') }}"
                            class="mt-2 rounded-circle avatar-xxl img-thumbnail" alt="image profile">

                    </div> <!-- End Photo Upload -->

                    <!-- Message Textarea -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Message</label>
                        <textarea class="form-control" id="address" rows="5" spellcheck="false" name="message"
                            value="{{ old('message', $review->message) }}" placeholder="Message Here....">{{ $review->message }}</textarea>
                    </div> <!-- End Message Textarea -->

                    <div class="form-group">
                        <div class="col-lg-12 col-xl-12">
                            <button type="submit" class="btn btn-primary">
                                Update Review</button>
                        </div>
                    </div>
                </form>
            </div><!--end card-body-->
        </div> <!--end Create Review -->
    </div>
    <!-- End page content -->
    </div>
    <!-- Ent content -->
@endsection