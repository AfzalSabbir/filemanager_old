@extends('frontend.layouts.master')

@section('fav_title', __('backend/default.about_us'))

@section('styles')
  @include('frontend.partials.owl-carousel.style')
@endsection

@section('content')
<!-- .page-inner -->
<div class="page-inner pt-2 pb-0">
  <div class="container px-0 px-lg-2">
    <div class="row">
      <div class="col-lg-6">
        {{-- <span style="font-family: 'Niconne';font-size: 3.5rem;font-weight: 600;line-height: 55px;">A<sup>rsss</sup>N</span> --}}
        <h1>About Us</h1>
        <p class="text-justify">Welcome to ArsssN, your number one source for all things of old or new books. We're dedicated to giving you the very best of communication between donor and receiver, with a focus on zero tolerance in chitting.</p>


        <p class="text-justify">Founded in 2020 by <strong>Afzalur Rahman Sabbir</strong>, ArsssN has come a long way from its beginnings in Kendua, Netrokona. When Afzalur Rahman Sabbir first started out, his passion for <strong>"BoiNaw BoiDaw"</strong> drove him to quit days job so that ArsssN can offer you "easiest way in Bangladesh to exchange books". We now serve customers all over Bangladesh, and are thrilled that we're able to turn our passion into our own website.</p>


        <p class="text-justify">We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>


        <p class="text-justify">
          Sincerely,<br/>
          <strong>Afzalur Rahman Sabbir</strong>
        </p>


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
  @include('frontend.partials.owl-carousel.script')
@endsection