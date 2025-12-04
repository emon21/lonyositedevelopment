@extends('frontend/layouts/frontend-master', ['title' => 'Service'])

@section('frontend')

      <x-breadcrumb title="Service" current="Service" />

      <!-- End breadcrumb -->

     @include('frontend/components/clarifie')

    <!-- end content -->

   @include('frontend/components/feature')

    <!-- end content -->

   @include('frontend/components/financial')
    <!-- end tab -->

    @include('frontend/components/answer')
    <!-- end faq -->

    @include('frontend/components/apps')
    <!-- end cta -->

@endsection