@extends('frontend.layouts.master')

@section('fav_title', __('backend/default.home'))

@section('meta')
    @php
      $key0 = "BoiNaw, Boi Naw, Boi, Naw, বইনাও, বই নাও, বই, নাও";
      $meta = 'BoiNaw.com - ArsssN Co., Ltd.';
      $description = 'সিমিস্টার/বছর শেষে আমরা হয়তো আমাদের পূর্বের সিমিস্টারের বইগুলো ফেলে রাখি অথবা কাগজ-ওয়ালার কাছে কেজি দরে বিক্রি করে দেই। কেউ আবার জুনিয়রদের দিয়ে দেন। বইগুলো ফেলে রাখা বা একসময় কেজি দরে বিক্রি না করে বরং আমাদেরা সাইটে খুব সহজেই একটা ছবি সহ পোস্ট করে রেখেদিন। সবাই তাদের পুরাতন বই-এর বিজ্ঞাপন দিয়ে রাখুন এতেকরে যারা নতুন বই কিনার সামর্থ নেই (অথবা আপনার বলে দেয়া অল্প দামে) তারা আপনার সাথে যোগাযোগ করে বই সংগ্রহ করে নিবে। এমনকি যারা আপনার বই নিলেন তারাও তাদের সিমিস্টার/বছর শেষে বই ফেলে না রেখে আবারও অন্য কেও যাতে বইটি পেতে পারে সেজন্য বিজ্ঞাপন দিয়ে রাখবেন। আপাতত সাইট-টি পরীক্ষামূলক আছে। খুব শিঘ্রই লাইভ হতে যাচ্ছে। সাইট-টি শুধু একটা মাধ্যম হবে বই গুলো হস্তান্তর হবার জন্য।';
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

@section('sidebar', 'has-sidebar')

@section('styles')
  @include('frontend.partials.owl-carousel.style')
  <style>
    .btn{white-space: nowrap;}
  </style>
@endsection

@section('content')
<!-- .page-inner -->
<div class="page-inner pt-2 pb-0">
  <div class="container px-0 px-lg-2">
    <div class="row">
      <div class="col-lg-9">
        <img class="img-responsive w-100 img-thumbnail mb-2 rounded-0" src="{{ asset('public/images/slider/1.jpg') }}" alt="BoiNaw - slider - 1">
        <div class="form-row">
          <div class="col-4">
            <a href="#" @click.prevent data-toggle="modal" data-target="#coronaAlertModalCenter" title="{{ __('backend/default.corona_alert') }}"><img class="img-responsive w-100 mb-1 mb-md-3 rounded-0 box-shadow" src="{{ asset('public/images/slider-bottom/corona.webp') }}" alt="Corona"></a>
          </div>
          <div class="col-4">
            <a href="{{ route('donation') }}"><img class="img-responsive w-100 mb-1 mb-md-3 rounded-0 box-shadow" src="{{ asset('public/images/slider-bottom/donation.webp') }}" alt="Donation"></a>
          </div>
          <div class="col-4">
            <a href="#" @click.prevent ><img class="img-responsive w-100 mb-1 mb-md-3 rounded-0 box-shadow cursor-default" src="{{ asset('public/images/slider-bottom/demo.webp') }}" alt="Demo"></a>
          </div>
          {{-- <div class="col-4">
            <a href="#" @click.prevent ><img class="img-responsive w-100 mb-1 mb-md-3 rounded-0 box-shadow cursor-default" src="{{ asset('public/images/slider-bottom/eid.webp') }}" alt="Eid Mubarak"></a>
          </div> --}}
        </div>
        <div class="modal fade has-shown" id="coronaAlertModalCenter" tabindex="-1" role="dialog" aria-labelledby="coronaAlert" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 id="coronaAlert" class="modal-title"> Corona Alert </h5>
              </div>
              <div class="modal-body">
                <p class="text-center"><img class="lazyload w-100" src="{{ asset('public/images/BoiNaw_lazyload.jpg') }}" data-src="{{ asset('public/images/slider-bottom/tool/coronaAlert.webp') }}" alt=""></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light text-danger" data-dismiss="modal">{{ __('backend/default.close') }}</button>
              </div>
            </div>
          </div>
        </div>
        @includeWhen(empty($nearby) && $new->isEmpty() && $free->isEmpty() && $carousel->isEmpty(), 'frontend.partials.alerts.no_book')

        {{-- Latest --}}
        @includeWhen(!empty($nearby), 'frontend.partials.owl-carousel.carousel-nearby', ['books' => $nearby, 'title' => __('backend/default.nearby'), 'view_all_route' => $nearby_route, 'param' => $nearby_param, 'alert' => 'info'])

        {{-- Latest --}}
        @includeWhen(!$new->isEmpty(), 'frontend.partials.owl-carousel.carousel', ['books' => $new, 'title' => __('backend/default.new'), 'view_all_route' => 'book.browse', 'alert' => 'info'])
        {{-- Free --}}
        @includeWhen(!$free->isEmpty(), 'frontend.partials.owl-carousel.carousel', ['books' => $free, 'title' => __('backend/default.free'), 'view_all_route' => 'book.browse.free', 'alert' => 'success'])

        @if(!$carousel->isEmpty()) <hr /> @endif

        {{-- Grade --}}
        @foreach ($carousel as $key => $element)
          @includeWhen(!$element->isEmpty(), 'frontend.partials.owl-carousel.carousel-grade', ['books' => $element, 'grade' => $key])
        @endforeach

      </div>
      <div class="col-lg-3 d-none d-lg-block" id="menu-md-right">
        <div id="menu-md-right-container">
          @include('frontend.partials.grade', ['right_side' => $right_side])
          @include('frontend.partials.important_links')
          @include('frontend.partials.visitors')
          {{-- <hr class="text-muted" /> --}}
        </div>
      </div>
    </div>
  </div><!-- /.page-inner -->
</div><!-- /.page-inner -->
<!-- .page-sidebar -->
<div class="page-sidebar">
  <!-- .sidebar-header -->
  <header class="sidebar-header d-sm-none">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          <a href="#" onclick="Looper.toggleSidebar()"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
        </li>
      </ol>
    </nav>
  </header><!-- /.sidebar-header -->
  <!-- .sidebar-section -->
  <div class="sidebar-section">
    <button type="button" class="close mt-n1 d-none d-sm-block" onclick="Looper.toggleSidebar()" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h6> I'm a sidebar </h6>
  </div><!-- /.sidebar-section -->
</div><!-- /.page-sidebar -->
@endsection

@section('scripts')
  @include('frontend.partials.owl-carousel.script')
  <script>
    $(document).ready(function() {
      let width = $('#menu-md-right').width();
      $(window).resize(function(event) {
        width = $('#menu-md-right').width();
      });
      $(document).scroll(function(event) {
        let st = $(this).scrollTop();
        if(st > 8) {
          $('#menu-md-right').find('#menu-md-right-container').css({
            'width'    : width,
            'position' : 'fixed',
            'top'      : 56+8+'px'
          });
        } else {
          $('#menu-md-right').find('#menu-md-right-container').css({
            'width'    : '',
            'position' : '',
            'top'      : ''
          });
        }
      });
    });
  </script>
@endsection