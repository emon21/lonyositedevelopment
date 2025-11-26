@extends('frontend/layouts/frontend-master',['title'])

@section('frontend')
  
@include('frontend/components/slider')
<!-- end hero -->

@include('frontend/components/feature')

<!-- end content -->

@include('frontend/components/clarifie')
  
  <!-- end content -->

@include('frontend/components/financial')

<!-- end content -->

@include('frontend/components/usability')

<!-- end video -->

@include('frontend/components/review')

<!-- end testimonial -->

@include('frontend/components/answer')

<!-- end faq -->

@include('frontend/components/apps')
  
  <!-- end cta -->
@endsection