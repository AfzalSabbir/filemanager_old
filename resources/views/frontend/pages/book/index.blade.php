@extends('frontend.layouts.master')

@section('fav_title', __('backend/default.book').' '.__('backend/default.browse'))

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
  @include('frontend.partials.owl-carousel.style')
@endsection

@section('content')
<!-- .page-inner -->
<div class="page-inner pt-2 pb-0">
  <div class="container px-0 px-lg-2">
    <div class="row">
      <div class="col-lg-9">
        <form action="" method="get">
          <div class="list-group-bordered list-group-reflow border-primary bg-white box-shadow mb-3">
            <span id="book-browse-toggle" class="col-12 list-group-item justify-content-between align-items-center border-0 bg-primary text-white rounded-0 font-weight-bold" title="">
              {{ __('backend/default.order') }}
              <button type="submit" class="btn btn-primary btn-sm py-0" style="height: 21px;" title="{{ __('backend/default.click_to_order') }}"><i class="fad fa-sort-amount-down{{ request()->order == 'asc' ? '-alt':'' }} filter-icon"></i></button>
            </span>
            <span class="book-browse-container">
              <form action="" method="get" accept-charset="utf-8">
                <div class="container-fluid py-2">
                  <div class="form-row">
                    {{-- <div class="col-3">
                      <select name="language" class="form-control rounded-0">
                        <option value="">--Sort Language--</option>
                        <option value="bn">বাংলা</option>
                        <option value="en" selected>English</option>
                      </select>
                    </div> --}}
                    {{-- <div class="col-3">
                      <select name="grade" class="form-control rounded-0">
                        <option value="">--Sort Grade--</option>
                        <option value="-1" selected>{{ __('backend/default.all') }} {{ __('backend/default.grade') }}</option>
                        @foreach(\App\Models\Grade::where('status', 1)->get() as $grade)
                        <option value="{{ $grade->id }}">{{ check_lang('bn') ? $grade->title_bn:$grade->title }}</option>
                        @endforeach
                      </select>
                    </div> --}}
                    <div class="col-6 col-lg-3">
                      <select name="by" class="form-control rounded-0">
                        <option value="">--Sort By--</option>
                        <option value="title" {{ request()->by == 'title' ? 'selected':'' }}>{{ __('backend/default.name') }}</option>
                        {{-- <option value="visits" {{ request()->by == 'visits' ? 'selected':'' }}>{{ __('backend/default.visit') }}</option> --}}
                        <option value="created_at" {{ request()->filled('by') ? '':'selected' }} {{ request()->by == 'created_at' ? 'selected':'' }}>{{ __('backend/default.time') }}</option>
                        <option value="edition" {{ request()->by == 'edition' ? 'selected':'' }}>{{ __('backend/default.edition') }}</option>
                        <option value="grade_id" {{ request()->by == 'grade_id' ? 'selected':'' }}>{{ __('backend/default.grade') }}</option>
                        <option value="book_condition" {{ request()->by == 'book_condition' ? 'selected':'' }}>{{ __('backend/default.condition') }}</option>
                      </select>
                    </div>
                    <div class="col-6 col-lg-3">
                      <select id="order" name="order" class="form-control rounded-0">
                        <option value="">--Sort Order--</option>
                        <option value="asc" {{ request()->order == 'asc' ? 'selected':'' }}>{{ __('backend/default.ascending') }}</option>
                        <option value="desc" {{ request()->order == 'desc' ? 'selected':'' }} {{ request()->filled('order') ? '':'selected' }}>{{ __('backend/default.descending') }}</option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </span>
          </div>
        </form>

        @includeWhen($books->isEmpty() || $total == 0 || $items == 0, 'frontend.partials.alerts.no_book')

        <div class="form-row">
          @foreach ($books as $element)
          <div class="col-6 col-xl-3 col-lg-4 col-sm-6">
            <!-- .card -->
            <div class="card card-figure mb-2">
              <!-- .card-figure -->
              <figure class="figure">
                <!-- .figure-img -->
                <div class="figure-img text-center">
                  @if(in_array($element->admin->username, config('custom.demo.user')))<img class="position-absolute demo" src="{{ asset(config('custom.demo.img')) }}">@endif
                  <img class="img-fluid lazyload" width="200" src="{{ asset('public/images/BoiNaw_lazyload.jpg') }}" data-src="{{ asset($element->photo) }}">
                  <div class="figure-description text-left pt-2 px-0">
                    <strong class="mb-2 d-block"><i class="oi oi-book _oi mr-1"></i>{{ $element->title }}</strong>
                    <p class="mb-0">
                      <span class="text-danger d-flex" title="{{ __('backend/default.location') }}"><i class="oi oi-map-marker _oi text-danger mr-1"></i> {{ $element->location }}</span>
                      <span class="text-info d-flex" title="{{ __('backend/default.edition') }}"><i class="oi oi-pencil _oi text-info mr-1"></i> {{ $element->edition }}</span>
                    </p>
                  </div>
                  {{-- <div class="figure-tools">
                    <a href="{{ route('book.view.slug', $element->slug) }}" class="tile tile-circle tile-sm mr-auto"><span class="oi oi-eye"></span></a> <span class="badge badge-warning">Gadget</span>
                  </div> --}}
                  <div class="figure-action">
                    
                    <view-action
                    url_delete = ""
                    url_report = ""
                    url_bell = "{{ route('profile.book.bell') }}"
                    base64_id = "{{ encode_base64($element->id) }}"
                    slug = "{{ $element->slug }}"
                    redirect = ""
                    admin_id = "{{ $element->admin_id }}"
                    view = 0
                    ></view-action>
                  </div>
                </div><!-- /.figure-img -->
                <!-- .figure-caption -->
                <figcaption class="figure-caption">
                  <strong class="figure-title d-block">
                    <a href="{{ route('book.view.slug', $element->slug) }}" title="{{ $element->title }}">{{ $element->title }}</a>
                  </strong>
                  {{-- <p class="text-muted mb-0"> Give some text description </p> --}}
                </figcaption><!-- /.figure-caption -->
                <figcaption class="figure-caption mt-0">
                  <ul class="list-inline d-flex {{-- text-muted --}} mb-0">
                    <li class="list-inline-item mr-auto">
                      <span class="oi oi-clock"></span> {{ num2locale($element->created_at->diffForHumans()) }}</li>
                    <li class="list-inline-item ellipsis">
                      <span>৳ {{ num2locale((int)$element->cost) }}</span>
                    </li>
                  </ul>
                </figcaption>
              </figure><!-- /.card-figure -->
            </div><!-- /.card -->
          </div>
          @endforeach
        </div>
        @if ($total > $items)
        <div class="form-row">
          <!-- Paginaiton -->
          @include('frontend.partials.paginations.book.pagination', ['table' => $books])
        </div>
        @endif
      </div>
      <div class="col-lg-3 d-none d-lg-block">
        @include('frontend.partials.grade', ['right_side' => $carousel])
        @include('frontend.partials.important_links')
        @include('frontend.partials.visitors')
      </div>
    </div>
  </div><!-- /.page-inner -->
</div><!-- /.page-inner -->
@endsection

@section('scripts')
  @include('frontend.partials.owl-carousel.script')
  <script>
    $(document).ready(function() {
      $('#order').change(function(){
        if($(this).val() == 'asc') {
          if($('.filter-icon').hasClass('fa-sort-amount-down')) {
            $('.filter-icon').removeClass('fa-sort-amount-down').addClass('fa-sort-amount-down-alt');
          }
        } else {
          if($('.filter-icon').hasClass('fa-sort-amount-down-alt')) {
            $('.filter-icon').removeClass('fa-sort-amount-down-alt').addClass('fa-sort-amount-down');
          }          
        }
      })
      // $('#book-browse-toggle').click(function(){
      //   $('.book-browse-container').slideToggle();
      // })
    });
  </script>
@endsection