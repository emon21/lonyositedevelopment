@extends('backend/layouts/admin-master', ['title' => 'Edit Feature'])
@section('admin')
    <!-- Start breadcrumb -->
    <div class="container-fluid">
        <div class="py-3 px-1 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="m-0 fs-18 fw-semibold">Edit Feature</h4>
            </div>
            <div class="text-end">
                <ol class="py-0 m-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Feature</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div> <!-- End breadcrumb -->

    <!-- page content -->
    <div class="container-fluid">
        <!-- Create Review -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="my-2 card-title">Edit Feature</h4>
                <a href="{{ route('admin.feature.index') }}" class="btn btn-success btn-sm float-end">Feature List</a>
            </div><!--end card-header-->
            <div class="card-body">
                <form action="{{ route('admin.feature.update',$feature) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title -->
                    <div class="mb-3 form-group row">
                        <label for="title" class="form-label">Title</label>
                        <div class="col-lg-12 col-xl-12">
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title',$feature->title) }}"
                                placeholder="Your Name....">
                        </div>
                    </div><!-- End Title -->

                    <!-- Icon -->
                    <div class="mb-3 form-group row">
                        <label class="form-label" for="icon">Icon</label>
                        <div class="col-lg-12 col-xl-12">
                            <input type="text" class="form-control" value="{{ old('icon',$feature->icon) }}"
                                placeholder="Your Position...." id="icon" name="icon" aria-describedby="basic-addon1">
                        </div>
                    </div><!-- End Icon -->

                    <!-- Description Textarea -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="5" spellcheck="false" name="description"
                            value="{{ old('description',$feature->description) }}" placeholder="Description Here....">{{ $feature->description }}</textarea>
                    </div> <!-- End Description Textarea -->

                    <div class="form-group">
                        <div class="col-lg-12 col-xl-12">
                            <button type="submit" class="btn btn-info">
                                Update Feature</button>
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