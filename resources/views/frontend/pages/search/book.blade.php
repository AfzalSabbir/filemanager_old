@extends('frontend.layouts.master')

@section('fav_title', __('backend/default.search'))

@section('styles')
  @include('frontend.partials.owl-carousel.style')
  <style>
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
      color: #fff;
      background-color: transparent;
      font-weight: bold;
      border-color: #346cb0;
    }
  </style>
@endsection

@section('content')
<!-- .page-inner -->
<div class="page-inner pt-2 pb-0">
  <div class="container px-0 px-lg-2">
    <div class="row">
      <div class="col-lg-6 order-2 order-lg-1">
        <search-card
        filter="{{ request()->f ? request()->f : ''  }}"
        type="{{ request()->t ? request()->t : ''  }}"
        page="{{ request()->page ? request()->page : 1  }}"
        query="{{ request()->q }}"
        action="{{ route('search.book') }}"
        result="{{ !is_null($search) ? json_encode($search):'{}' }}"
        url_report = "{{ route('profile.book.report') }}"
        ></search-card>
      </div>
      <div class="col-lg-3 order-1 order-lg-2 mb-2 mb-md-0 d-none d-lg-block">
        {{-- <search-option></search-option> --}}
      </div>
      <div class="col-lg-3 order-3 d-none d-lg-block">
        @include('frontend.partials.grade', ['right_side' => $carousel])
      </div>
    </div>
  </div><!-- /.page-inner -->
</div><!-- /.page-inner -->
@endsection

@section('scripts')
  @include('frontend.partials.owl-carousel.script')
@endsection