@extends('frontend.layouts.master')

@section('fav_title', __('backend/default.about_us'))

@section('styles')
    @include('frontend.partials.owl-carousel.style')
@endsection

@section('content')
    <!-- grid column -->
    <div class="col-lg-6">
        <!-- .card -->
        <div class="card card-fluid">
            <!-- .card-body -->
            <div class="card-body">
                <h4 class="card-title"> Filemanager </h4><!-- #jstree3 -->
                <div id="jstreeFilemanager"></div><!-- /#jstree3 -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- grid column -->
@endsection

@section('scripts')
    <script>
        axios.post('/get-tree').then(({data}) => {
            console.log(data);
        })
    </script>
    @include('frontend.partials.owl-carousel.script')
@endsection
