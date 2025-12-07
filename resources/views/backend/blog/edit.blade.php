@extends('backend/layouts/admin-master', ['title' => 'Edit Blog'])
@section('admin')

    <!-- Start breadcrumb -->
    <div class="container-fluid">
        <div class="py-3 px-1 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="m-0 fs-18 fw-semibold">Edit Blog</h4>
            </div>
            <div class="text-end">
                <ol class="py-0 m-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div> <!-- End breadcrumb -->

    <!-- page content -->
    <div class="container-fluid">
        <!-- Create Blog -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="my-2 card-title">Edit Blog</h4>
                <a href="{{ route('admin.blog') }}" class="btn btn-success btn-sm float-end">Blog List</a>
            </div><!--end card-header-->
            <div class="card-body">
                <form action="{{ route('admin.blog.update',$blog) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="d-flex gap-2 justify-content-between align-items-top">
                        <!-- Name -->
                        <div class="mb-3 form-group col-sm-8">
                            <label for="name" class="form-label">Name</label>
                            <div class="col-lg-12 col-xl-12">
                                <input class="form-control" type="text" name="name" id="name" value="{{ old('name',$blog->title) }}"
                                    placeholder="Your Name....">
                            </div>
                        </div><!-- End Name -->
                        <!-- Name -->
                        <div class="mb-3 form-group col-sm-4">
                            <label for="category">Category</label>
                            <div class="col-lg-12 col-xl-12 mt-1">
                                <select class="form-select" name="category" id="category">
                                    <option selected="">Choose Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- End Name -->
                    </div>

                    <!-- Description Textarea -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="5" spellcheck="false" name="description"
                            value="{{ old('description') }}" placeholder="Description Here....">{{ $blog->description }}</textarea>
                    </div> <!-- End Description Textarea -->

                    <!-- Photo Upload -->
                    <div class="mb-3 form-group">
                        <label class="form-label">Photo</label>
                        <div class="col-lg-12 col-xl-12">
                            <input class="form-control" type="file" name="photo" id="photo">
                        </div>
                        <!-- Image Preview -->
                        <img src="{{ $blog->photo ? asset('uploads/blog/' . $blog->photo) : asset('uploads/no_image.jpg') }}"
                            class="mt-2 rounded-circle avatar-xxl img-thumbnail" alt="image profile">
                    </div> <!-- End Photo Upload -->

                    <div class="form-group">
                        <div class="col-lg-12 col-xl-12">
                            <button type="submit" class="btn btn-primary">
                                Update Blog</button>
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