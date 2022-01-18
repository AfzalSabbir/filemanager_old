      <section class="py-5 position-relative bg-light">
        <!-- .sticker -->
        <div class="sticker">
          <div class="sticker-item sticker-bottom-left w-100">
            <!-- wave1.svg -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="120" viewBox="0 0 1440 240" preserveAspectRatio="none">
              <path class="fill-black" fill-rule="evenodd" d="M1070.39 25.041c107.898 11.22 244.461 20.779 369.477 51.164L1440 240H0L.133 72.135C350.236-17.816 721.61-11.228 1070.391 25.04z"></path>
            </svg>
          </div>
        </div><!-- /.sticker -->
        <!-- .container -->
        <div class="container">
          <!-- .card -->
          <div class="card bg-success text-white position-relative overflow-hidden shadow rounded-lg p-4 mb-0 aos-init aos-animate" data-aos="fade-up">
            <!-- .sticker -->
            <div class="sticker">
              <div class="sticker-item sticker-middle-left">
                <img class="flip-y" src="{{ asset('public/images/decoration/bubble4.svg') }}" alt="">
              </div>
            </div><!-- /.sticker -->
            <!-- .card-body -->
            <div class="card-body d-md-flex justify-content-between align-items-center text-center position-relative">
              <h4 class="font-weight-normal mb-3 mb-md-0 mr-md-3"> {{ __('backend/default.got_a_question_about_boinaw') }}? </h4>
              <a class="btn btn-lg btn-primary shadow" data-toggle="modal" data-target="#contactUsForm">{{ __('backend/default.contact_us') }} <i class="fad fa-angle-right ml-2"></i></a>
            </div><!-- /.card-body -->
          </div><!-- /.card -->

          <div class="modal fade has-shown" id="contactUsForm" tabindex="-1" role="dialog" aria-labelledby="contactUsFormLabel" style="display: none;" aria-hidden="true">
            <!-- .modal-dialog -->
            <div class="modal-dialog" role="document">
              <!-- .modal-content -->
              <div class="modal-content">
                <form-contact-us
                name  = "{{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name:'' }}"
                email = "{{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->email:'' }}"
                > @csrf </form-contact-us>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
        </div><!-- /.container -->
      </section>