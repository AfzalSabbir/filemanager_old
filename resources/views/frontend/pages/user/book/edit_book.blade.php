@extends('frontend.layouts.master')

@section('fav_title', __('backend/default.profile').' - '.__('backend/default.edit_book'))

@section('styles')
  @include('frontend.partials.owl-carousel.style')
  <style>
    input, select, textarea,
    custom-file-label {
      border-radius: 0px !important;
    }
  </style>
@endsection

@section('content')
{{-- @include('frontend.partials.profile.profile_banner') --}}
@include('frontend.partials.profile.profile_nav')
<!-- .page-inner -->
<div class="page-inner pt-2 pb-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        @include('frontend.partials.profile.book_sidebar')
      </div>
      <div class="col-lg-9">
        <edit-book
        admin       = "{{ Auth::guard('admin')->check() ? json_encode(Auth::guard('admin')->user()):"{}" }}"
        book        = "{{ json_encode($book->toArray()) }}"
        grades      = "{{ json_encode($grades->toArray()) }}"
        districts   = "{{ json_encode($districts->toArray()) }}"
        upazilas    = "{{ json_encode($upazilas->toArray()) }}"
        upazila_url = "{{ route('axios.upazila') }}"
        old_inputs  = "{{ count(session()->getOldInput()) > 0 ? 1:0 }}"
        form_errors = "{{ json_encode($errors->any() ? $errors->all():0) }}"
        >
        @csrf
      </edit-book>
    </div>
    </div>
  </div>
</div><!-- /.page-inner -->
@endsection

@section('scripts')
  @include('frontend.partials.owl-carousel.script')
@endsection