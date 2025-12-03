@extends('backend/layouts/admin-master', ['title' => 'Edit Answer'])
@section('admin')
    <!-- Start breadcrumb -->
    <div class="container-fluid">
        <div class="px-1 py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="m-0 fs-18 fw-semibold">Edit Answer</h4>
            </div>
            <div class="text-end">
                <ol class="py-0 m-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Answer</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div> <!-- End breadcrumb -->

    <!-- page content -->
    <div class="container-fluid">
        <!-- Edit Answer -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="my-2 card-title">Edit Answer</h4>
                <a href="{{ route('admin.answer') }}" class="btn btn-success btn-sm float-end">Answer List</a>
            </div><!--end card-header-->
            <div class="card-body">
                <form action="{{ route('admin.answer.update', $answer) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title -->
                    <div class="mb-3 form-group row">
                        <label for="title" class="form-label">Title</label>
                        <div class="col-lg-12 col-xl-12">
                            <input class="form-control" type="text" name="title" id="title"
                                value="{{ old('title', $answer->title) }}" placeholder="Your Title....">
                        </div>
                    </div><!-- End Title -->

                    <!-- Description Textarea -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="5" spellcheck="false" name="description"
                            value="{{ old('description', $answer->description) }}"
                            placeholder="Description Here....">{{ $answer->description }}</textarea>
                    </div> <!-- End Description Textarea -->

                    <div class="form-group">
                        <div class="col-lg-12 col-xl-12">
                            <button type="submit" class="btn btn-primary">
                                Update Answer</button>
                        </div>
                    </div>
                </form>
            </div><!--end card-body-->
        </div> <!--end Edit Answer -->
    </div>
    <!-- End page content -->
    </div>
    <!-- Ent content -->
@endsection