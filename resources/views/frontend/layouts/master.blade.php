<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title>@yield('fav_title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <meta name="copyrighted-site-verification" content="55332bfaa5af1c44" />
    <meta name="msvalidate.01" content="17D6C246623B33D9C18FBDD89C498638" />

    <meta property="og:locale" content="bd" />
    <link rel="canonical" href="{{ url()->full() }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:site_name" content="{{ env('APP_SITE_NAME') }}" />
    @section('meta')
    @show

    <script type="application/ld+json">
      {
        "name": "@yield('fav_title')",
        "description": "@yield('description')",
        "author":
        {
          "@type": "Person",
          "name": ""
        },
        "@type": "WebSite",
        "url": "{{ url()->full() }}",
        "headline": "",
        "@context": "{{ '' }}"
      }
    </script><!-- End SEO tag -->
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('') }}" />
    <link rel="shortcut icon" href="{{ asset('') }}" />
    <link rel="stylesheet" href="vendor/jstree/themes/default/style.min.css">
    <meta name="theme-color" content="{{ Route::is('book.wish_list') ? '#14141f':'#3063A0' }}" /><!-- End FAVICONS -->

    @include('frontend.partials.head')

    @include('frontend.partials.styles')

    @section('styles')
    @show
  </head>
  <body>
    <!-- #app -->
    <div id="app" class="app has-fullwidth">
      <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->

      {{-- @include('frontend.partials.sidebar') --}}

      <!-- .app-main -->
      <main class="app-main">
       {{--  <div v-cloak>
          <div class="v-cloak--inline pb-3">
            <i class="fad fa-atom fa-pulse fa-3x text-primary loader"></i>
          </div>
          <div class="v-cloak--hidden">  --}}
            <!-- .wrapper -->
            <div class="wrapper">
              <!-- .page -->
              <div class="page has-sidebar">
                <div class="alert-container" style="display: none;">
                  <div class="container">
                    @if(date('Y-m-d') < '2020-07-20')
                      @if(check_lang('en'))
                      <div class="alert alert-danger mt-3 px-2 alert-dismissible fade show border-0">
                        <button type="button" data-dismiss="alert" class="close " id="site_alert">×</button>
                        <h5>Hi!</h5>
                        <h6>Thank you for your early visit!</h6>
                        <div class="text-white rounded bg-dark px-1 py-3">Any action from you (except your signup details) may not be available in final release.</div>
                      </div>
                      @else
                      <div class="alert alert-danger mt-3 px-2 alert-dismissible fade show border-0">
                        <button type="button" data-dismiss="alert" class="close " id="site_alert">×</button>
                        <h5>ওহে!</h5>
                        <h6>সাইট প্রকাশ হবার আগে ভিজিট করার জন্য ধন্যবাদ!</h6>
                        <div class="text-white rounded bg-dark px-1 py-3">আপনার যেকোন এ্যাকশন (সাইনআপ তথ্য ব্যাতিত) ফাইনাল রিলিজে নাও থাকতে পারে।</div>
                      </div>
                      @endif
                    @endif
                  </div>
                </div>
                @section('content')
                @show
              </div><!-- /.page -->
            </div><!-- /.wrapper -->
            {{-- @include('frontend.partials.footer.footer') --}}
          {{-- </div>
        </div> --}}

      </main><!-- /.app-main -->
    </div><!-- /#app -->
    @include('frontend.partials.scripts')
    @section('scripts')
    @show
    <script src="/javascript/pages/jstree-demo.js"></script>
    <script>
      if(parseInt(localStorage.site_alert) != 0) {
        $('.alert-container').show()
      }
      $(document).ready(function() {
        $('#site_alert').click(function(){
          localStorage.site_alert = 0
        });
      });
    </script>
  </body>
</html>
