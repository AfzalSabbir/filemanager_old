      @php($site_setting = session()->get('site_setting'))
      <section class="bg-black text-white position-relative">
        <!-- .container -->
        <div class="container">
          <!-- .row -->
          <div class="row">
            <!-- .col -->
            <div class="col-12 col-md-12 col-lg-3">
              <!-- Brand -->
              <img style="width: 150px" src="{{ asset('public/images/company/arsssn-white-primary.webp') }}" alt="ArsssN Company, Owner of BoiNaw">
              <p class="text-muted mb-2 pl-4"> - {{ __('backend/default.a_product_by') }}</p>
              <address class="text-muted mb-1 mt-3">
                <i class="fad fa-mobile text-left" style="width: 20px;"></i><abbr title="BD phone code">+880</abbr> {{ $site_setting->mobile }}
              </address>
              <address class="text-muted mb-1">
                <i class="fad fa-envelope text-left" style="width: 20px;"></i><a class="text-muted" href="mailto:afzalbd1@gmail.com">{{ $site_setting->email }}</a>
              </address>
              <address class="text-muted mb-3">
                <i class="fad fa-location text-left" style="width: 20px;"></i> {{ $site_setting->address }}
              </address>
              <ul class="list-inline mb-4 mb-md-0">
                <li class="list-inline-item mr-3 aos-init aos-animate" data-aos="fade-in" data-aos-delay="0">
                  <a href="{{ $site_setting->facebook }}" class="text-muted text-decoration-none" title="Facebook"><i class="fab fa-2x fa-facebook-f"></i></a>
                </li>
                <li class="list-inline-item mr-3 aos-init aos-animate" data-aos="fade-in" data-aos-delay="0">
                  <a href="{{ $site_setting->twitter }}" class="text-muted text-decoration-none" title="Twitter"><i class="fab fa-2x fa-twitter"></i></a>
                </li>
                <li class="list-inline-item mr-3 aos-init aos-animate" data-aos="fade-in" data-aos-delay="100">
                  <a href="{{ 'https://www.instagram.com/afzalsabbir/' }}" class="text-muted text-decoration-none" title="Instagram"><i class="fab fa-2x fa-instagram"></i></a>
                </li>
                <li class="list-inline-item mr-3 aos-init aos-animate" data-aos="fade-in" data-aos-delay="100">
                  <a href="{{ $site_setting->linkedin }}" class="text-muted text-decoration-none" title="Linkedin"><i class="fab fa-2x fa-linkedin-in"></i></a>
                </li>
              </ul>

              {{-- <p class="mt-2 mt-md-3 text-left">
                <a rel="license" title="This work is licensed under a Creative Commons Attribution-NonCommercial 4.0 International License" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons License" src="{{ asset('public/images/other/license_by-nc_88x31.png') }}" style="border-width:0; height: 26px;" /></a>

                <a href="//www.dmca.com/Protection/Status.aspx?ID=452fac93-7d1a-4a3f-9493-5f1971dfbd51" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w150-5x1-08.png?ID=452fac93-7d1a-4a3f-9493-5f1971dfbd51"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                <a rel="noopener" class="copyrighted-badge" title="Copyrighted.com Registered &amp; Protected" target="_blank" href="https://www.copyrighted.com/website/IQ7kTZ6PBYUn6GjO"><img alt="Copyrighted.com Registered &amp; Protected" border="0" width="125" height="25" srcset="https://static.copyrighted.com/badges/125x25/01_2_2x.png 2x" src="https://static.copyrighted.com/badges/125x25/01_2.png" /></a><script src="https://static.copyrighted.com/badges/helper.js"></script>
              </p> --}}
              {{-- <style> .dmca-badge img { border-radius: 12px; overflow: hidden; margin: 2px 0; } .copyrighted-badge img { border-radius: 2px; overflow: hidden; margin: 2px 0; } </style> --}}
            </div><!-- /.col -->
            <!-- .col -->
            <div class="col-4 col-md-4 col-lg-2 mb-3 mb-md-0">
              <!-- Heading -->
              <strong class="mb-3 h6 d-block"> {{ __('backend/default.company') }} </strong><!-- links -->
              <ul class="list-unstyled mb-4">
                <li class="mb-2">
                  <a href="{{ route('about') }}" class="text-muted">{{ __('backend/default.about_us') }}</a>
                </li>
              </ul>
              <!-- Heading -->
              <strong class="mb-3 h6 d-block"> {{ __('backend/default.product') }} </strong><!-- links -->
              <ul class="list-unstyled">
                <li class="mb-2">
                  <a href="#" class="text-muted">{{ __('backend/default.boinaw') }} </a>
                </li>
              </ul>
            </div><!-- /.col -->
            <!-- .col -->
            <div class="col-4 col-md-4 col-lg-2 mb-3 mb-md-0">
              {{-- <strong class="mb-3 h6 d-block"> {{ __('backend/default.help') }} </strong>
              <ul class="list-unstyled">
                <li class="mb-2">
                  <a href="#" class="text-muted">{{ __('backend/default.help_center') }}</a>
                </li>
                <li class="mb-2">
                  <a href="#" class="text-muted">{{ __('backend/default.documentation') }}</a>
                </li>
                <li class="mb-2">
                  <a href="#" class="text-muted">{{ __('backend/default.technical_support') }}</a>
                </li>
                <li class="mb-2">
                  <a href="#" class="text-muted">{{ __('backend/default.FAQ') }}</a>
                </li>
              </ul> --}}

              <strong class="mb-3 h6 d-block"> {{ __('backend/default.language') }} </strong>
              <ul class="list-unstyled">
                <li class="mb-2">
                  @if (session()->get('locale')=='bn')
                    <a class="text-muted" href="{{ route('language', 'en') }}" title="Change Language">{{ __('backend/default.locale') }}</a>
                  @else
                    <a class="text-muted" href="{{ route('language', 'bn') }}" title="ভাষা পরিবর্তন করুন">{{ __('backend/default.locale') }}</a>
                  @endif
                </li>
              </ul>

              <strong class="mb-3 h6 d-block"> {{ __('backend/default.other') }} </strong>
              <ul class="list-unstyled">
                <li class="mb-2">
                  <a href="{{ url('/public/apk/_BoiNaw_12284768.apk') }}" class="text-muted" title="{{ __('backend/default.download_android_app') }}">
                    {{ __('backend/default.download_android_app') }}
                  </a>
                </li>
                <li class="mb-2">
                  <a href="{{ route('sitemap.root') }}" class="text-muted">{{ __('backend/default.sitemap') }}</a>
                </li>
              </ul>
            </div><!-- /.col -->
            <!-- .col -->
            <div class="col-4 col-md-4 col-lg-2 mb-3 mb-md-0">
              <strong class="mb-3 h6 d-block"> {{ __('backend/default.legal') }} </strong>
              <ul class="list-unstyled">
                <li class="mb-2">
                  <a href="{{ route('privacy') }}" class="text-muted">{{ __('backend/default.privacy_policy') }}</a>
                </li>
                <li class="mb-2">
                  <a href="{{ route('terms') }}" class="text-muted">{{ __('backend/default.terms_and_conditions') }}</a>
                </li>
                <li class="mb-2">
                  <a href="{{ route('cookies') }}" class="text-muted">{{ __('backend/default.cookies_policy') }}</a>
                </li>
              </ul>
            </div><!-- /.col -->
            <!-- .col -->
            <div class="col-12 col-md-12 col-lg-3 mb-3 mb-md-0">
              <strong class="mb-3 h6 d-block"> {{ __('backend/default.description') }} </strong><!-- links -->
              <p class="text-muted text-justify">
                {!! $site_setting->description !!}
              </p>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <!-- .row -->
        </div><!-- /.container -->
        <div class="row mt-3" style="background: #346cb063;">
          {{-- <div class="col-12 text-center">
            <small class="font-weight-normal">v0.{{ $site_setting->v_js }}</small>
          </div> --}}
          <div class="col-12 col-md-6 text-center order-2 order-md-1">
            <p class="text-center w-100 my-3">
              <span>&copy; {{ n2l(date('Y')) }} <a class="text-white font-weight-bold" href="{{ route('home') }}" title="{{ __('backend/default.boinaw') }}"> {{ __('backend/default.boinaw') }}</a> - {{ __('backend/default.all_rights_reserved') }}</span>
            </p>
          </div>
          <div class="col-12 col-md-6 text-center mt-3 my-md-auto order-1 order-md-2">
              <span id="footer_visitors_container"></span>
          </div>
        </div><!-- /.row -->
      </section>