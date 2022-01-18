@extends('frontend.layouts.master')

@section('fav_title', __('backend/default.donation'))

@section('meta')
    @php
      $key0 = "BoiNaw, Boi Naw, Boi, Naw, বইনাও, বই নাও, বই, নাও";
      $meta = 'BoiNaw.com - ArsssN Co., Ltd.';
      $description = 'Browse the list of books. All Books';
      $keys = $key0.', '.str_replace(' ', ', ', preg_replace('/[,:.]/', '', $description)).', '.$description;
      $description .= '. '.$meta;
    @endphp
    <meta name="description" content="{{ $description }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta name="keywords" content="{{ $keys }}">
    <meta property="og:type" content="product" />
    <meta property="og:image" content="{{ asset('public/images/BoiNaw_lazyload.jpg') }}" />
    <meta property="og:price:currency" content="BDT" />
@endsection
@section('description', $description)

@section('styles')
<style>
  p, li {
    text-align: justify;
  }
</style>
@endsection

@section('content')
<!-- .page-inner -->
<div class="page-inner pt-2 pb-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 order-2 order-md-1">
        <p class="list-group-item-action list-group-item-info pl-3 bg-light py-1 pr-1 my-2 mt-md-0">
          <strong>Make a donation.</strong><br />
          A large amount will be used for those children/students, who can't afford to buy books for their study and a small amount we will use for server maintenance.<br />
          We appreciate any amount. Donate and be part of something great...
        </p>
        <div class="card rounded-0 border-primary box-shadow">
          <div class="card-header border-0 bg-primary text-white rounded-0 py-2">
            <a class="card-title mb-0"><i class="fad fa-box-usd"></i> Donation Information </a>
          </div>
          <div class="card-body">
            <span>
              <form-donate
                name  = "{{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name:'' }}"
                email = "{{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->email:'' }}"
              >
                @csrf
              </form-donate>
              
            </span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 order-1 order-md-2">
        <a href="{{ route('donation') }}"><img class="img-responsive w-100 mb-1 mb-md-3 rounded-0 box-shadow" src="{{ asset('public/images/slider-bottom/donation-rocket.webp') }}" alt="DBBL Donation"></a>
        <a href="{{ route('donation') }}"><img class="img-responsive w-100 mb-1 mb-md-3 rounded-0 box-shadow" src="{{ asset('public/images/slider-bottom/donation-bkash.webp') }}" alt="bKashDonation"></a>
      </div>
      <div class="col-lg-3 order-3 d-none d-lg-block">
        @include('frontend.partials.grade', ['right_side' => $carousel])
        @include('frontend.partials.important_links')
        @include('frontend.partials.visitors')
      </div>
    </div>
  </div><!-- /.page-inner -->
</div><!-- /.page-inner -->
@endsection

@section('scripts')
@endsection