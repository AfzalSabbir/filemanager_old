@extends('frontend.layouts.master')

@section('fav_title', __('backend/default.about_us'))

@section('styles')
@endsection

@section('content')
<!-- .page-inner -->
<div class="page-inner pt-2 pb-0">
  <div class="container px-0 px-lg-2">
    <div class="row">
      <div class="col-lg-6">
      </div>
      <div class="offset-3 col-lg-3 d-none d-lg-block">
        @include('frontend.partials.grade', ['right_side' => $carousel])
        @include('frontend.partials.important_links')
        @include('frontend.partials.visitors')
      </div>
    </div>
  </div>
</div><!-- /.page-inner -->
@endsection

@section('scripts')
@endsection