@extends('layouts.main')

@section('title')
    Package Selection
@endsection

@section('underhead')
<style>
    .card-feature:before {
        margin-right: 0.6rem;
        content: "\f00c";
        font-family: 'FontAwesome';
        color: #4CAF50;
    }

    li {
        list-style: none;
    }
</style>

<link rel="stylesheet" href="{{ asset('plugins/filterjs/vendor/animate/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/filterjs/css/theme-elements.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/filterjs/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/filterjs/css/skins/default.css') }}">
@endsection


@section('main')

    <div class="container-fluid pt-2 px-10">
        <div class="col">
            @php
                $counter = 0;
            @endphp
            <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">

                <ul class="nav nav-pills sort-source sort-source-style-3" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'masonry', 'filter': '*'}">
                    <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
                    @foreach($allCategories as $category)
                        <li class="nav-item" data-option-value=".category{{ $category->id }}"><a class="nav-link text-1 text-uppercase" href="javascript:void(0);">{{ $category->title }}</a></li>
                    @endforeach
                </ul>

                <div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
                    <div class="row portfolio-list sort-destination" data-sort-id="portfolio">

                        @foreach($memberships as $membership)
                            @php
                                $features = $membership->features ? json_decode($membership->features) : null;
                            @endphp
                            <div class="col-sm-6 col-lg-3 isotope-item category{{$membership->category_id}}">
                                <div class="portfolio-item">
                                    <span class="thumb-info thumb-info-centered-info border-radius-2 shadow"  @if($counter % 2 == 1) style="background-color: #0b97c4" @else style="background-color: lightslategrey" @endif>
                                        <span class="thumb-info-wrapper border-radius-0" style="min-height: 500px">
                                            <span class="thumb-info-title">
                                                <h2 class="text-white text-bold">
                                                    @if($membership->month == 1)
                                                        Monthly :
                                                    @else
                                                        {{$membership->month}} Months :
                                                    @endif
                                                    ${{ $membership->amount }}
                                                </h2>
                                                <span class="thumb-info-inner">
                                                    @if($features)
                                                        <ul>
                                                            @for($i=0;$i<count($features);$i++)
                                                                <li class="text-capitalize card-feature text-left">
                                                                    {{ $features[$i] }}
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    @endif

                                                    @if($membership->service_type == 2)
                                                        <center>
                                                            <a href="{{ $membership->appstore_url }}" target="_blank">
                                                                <img src="{{ asset('images/apple%20button.svg') }}"
                                                                     class="ml-5 mr-2" style="width: 120px;height: 40px;z-index: 1111;">
                                                            </a>
                                                            <a href="{{ $membership->googleplay_url }}" target="_blank">
                                                                <img src="{{ asset('images/google%20button.svg') }}"
                                                                     class="mr-5 " style="width: 120px;height: 40px;z-index: 1111;">
                                                            </a>
                                                        </center>
                                                    @else
                                                        <form action="{{ route('subscribe.price') }}" method="GET"
                                                              class="d-inline">
                                                            @foreach ($user as $key=> $item)
                                                                <input type="hidden" name="{{ $key }}" value="{{ $item }}">
                                                            @endforeach
                                                            <input type="hidden" name="price" value="{{$membership->amount}}">
                                                            <button type="submit"
                                                                    class="btn btn-primary btn-lg subscribe-card-btn @if(($counter)%2==1)btn-primary shadow @endif text-capitalize">
                                                                sign up
                                                            </button>
                                                        </form>
                                                    @endif
                                                </span>
                                            </span>
                                        </span>
                                    </span>

                                </div>
                            </div>
                            @php $counter++ @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection

@section('customjs')

    <script src="{{ asset('plugins/filterjs/vendor/isotope/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('plugins/filterjs/js/theme.js') }}"></script>
    <script src="{{ asset('plugins/filterjs/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('plugins/filterjs/js/theme.init.js') }}"></script>

@endsection