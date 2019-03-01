@extends('template.dashboard')

@section('titles') Dashboard @endsection

@section('content')

<div class="widget-body">
    @if (Auth::user()->role == 'buyer')

    {{-- alert --}}
    <div class="alert alert-secondary alert-dissmissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <strong>Please!</strong> complete the profile first <a type="Link" href="/profile">Click</a>
    </div>

    <div class="row flex-row">
        
        <div class="col-xl-4 col-md-6 col-sm-6">
            <div class="widget widget-12 has-shadow">
                <div class="widget-body">
                    <div class="media">
                        <div class="align-self-center ml-5 mr-5">
                            <i class="la la-file-pdf-o text-facebook"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="title text-facebook">PO</div>
                                <div class="number">{{count($po)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 col-sm-6">
            <div class="widget widget-12 has-shadow">
                <div class="widget-body">
                    <div class="media">
                        <div class="align-self-center ml-5 mr-5">
                            <i class="la la-file text-twitter"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="title text-twitter">Invoice</div>
                            <div class="number">{{count($invoice)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <div class="row">
    @foreach ($po as $po1)
    <div class="col-md-3">
        <div class="widget widget-23 bg-gradient-02 d-flex justify-content-center align-items-center">
            <div class="widget-body text-center">
                <i class="la la-calendar"></i>
                <div class="title">{{$po1->buyer->username}}</div>  
                <div class="title">Delivery Report</div>
                <div class="number">{{$po1->pengiriman}}</div>

            </div>
        </div>
    </div>
    @endforeach
    </div>

    {{-- <div id="calendar"></div> --}}

    @elseif(Auth::user()->role == 'data')
  
    <div class="row flex-row">
        <!-- Begin Facebook -->
        <div class="col-xl-4 col-md-6 col-sm-6">
            <div class="widget widget-12 has-shadow">
                <div class="widget-body">
                    <div class="media">
                        <div class="align-self-center ml-5 mr-5">
                            <i class="la la-folder text-facebook"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="title text-facebook">SPK</div>
                            <div class="number">{{count($spk)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Facebook -->
        <!-- Begin Twitter -->
        <div class="col-xl-4 col-md-6 col-sm-6">
            <div class="widget widget-12 has-shadow">
                <div class="widget-body">
                    <div class="media">
                        <div class="align-self-center ml-5 mr-5">
                            <i class="la la-database text-twitter"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="title text-twitter">Barang</div>
                            <div class="number">{{count($barang)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Twitter -->
    </div>
    <!-- End Row -->

    <div class="row">
            @foreach ($po1 as $po3)
            <div class="col-md-3">
                <div class="widget widget-23 bg-gradient-02 d-flex justify-content-center align-items-center">
                    <div class="widget-body text-center">
                        <i class="la la-calendar"></i>
                        <div class="title">{{$po3->buyer->username}}</div>  
                        <div class="title">Delivery Report</div>
                        <div class="number">{{$po3->pengiriman}}</div>
        
                    </div>
                </div>
            </div>
            @endforeach
    </div>
   
    
    @elseif(Auth::user()->role == 'exim')

    <div class="row flex-row">
        <!-- Begin Facebook -->
        <div class="col-xl-4 col-md-6 col-sm-6">
            <div class="widget widget-12 has-shadow">
                <div class="widget-body">
                    <div class="media">
                        <div class="align-self-center ml-5 mr-5">
                            <i class="la la-calendar text-facebook"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <div class="title text-facebook">Laporan</div>
                            <div class="number">{{count($laporan)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Facebook -->
        <div class="col-xl-4 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="la la-file text-twitter"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title text-twitter">Invoice</div>
                                <div class="number">{{count($invoice1)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- End Row -->

    <div class="row">
            @foreach ($po1 as $po3)
            <div class="col-md-3">
                <div class="widget widget-23 bg-gradient-02 d-flex justify-content-center align-items-center">
                    <div class="widget-body text-center">
                        <i class="la la-calendar"></i>
                        <div class="title">{{$po3->buyer->username}}</div>  
                        <div class="title">Delivery Report</div>
                        <div class="number">{{$po3->pengiriman}}</div>
        
                    </div>
                </div>
            </div>
            @endforeach
    </div>

        @elseif(Auth::user()->role == 'admin')
        <div class="row flex-row">
        <div class="col-xl-4 col-md-6 col-sm-6">
                <div class="widget widget-12 has-shadow">
                    <div class="widget-body">
                        <div class="media">
                            <div class="align-self-center ml-5 mr-5">
                                <i class="la la-file-pdf-o text-facebook"></i>
                            </div>
                            <div class="media-body align-self-center">
                                <div class="title text-facebook">PO</div>
                                    <div class="number">{{count($po1)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-6">
                    <div class="widget widget-12 has-shadow">
                        <div class="widget-body">
                            <div class="media">
                                <div class="align-self-center ml-5 mr-5">
                                    <i class="la la-folder text-facebook"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="title text-facebook">SPK</div>
                                    <div class="number">{{count($spk)}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-6">
                        <div class="widget widget-12 has-shadow">
                            <div class="widget-body">
                                <div class="media">
                                    <div class="align-self-center ml-5 mr-5">
                                        <i class="la la-calendar text-facebook"></i>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="title text-facebook">Laporan</div>
                                        <div class="number">{{count($laporan)}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Facebook -->
                    <div class="col-xl-4 col-md-6 col-sm-6">
                            <div class="widget widget-12 has-shadow">
                                <div class="widget-body">
                                    <div class="media">
                                        <div class="align-self-center ml-5 mr-5">
                                            <i class="la la-file text-twitter"></i>
                                        </div>
                                        <div class="media-body align-self-center">
                                            <div class="title text-twitter">Invoice</div>
                                            <div class="number">{{count($invoice1)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>

        <div class="row">
                @foreach ($po1 as $po3)
                <div class="col-md-3">
                    <div class="widget widget-23 bg-gradient-02 d-flex justify-content-center align-items-center">
                        <div class="widget-body text-center">
                            <i class="la la-calendar"></i>
                            <div class="title">{{$po3->buyer->username}}</div>  
                            <div class="title">Delivery Report</div>
                            <div class="number">{{$po3->pengiriman}}</div>
            
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
        
    @endif


    
</div>

@endsection

