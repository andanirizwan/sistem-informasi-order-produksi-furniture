@extends('template.dashboard')

@section('titles') Invoice @endsection
@section('content')
<!-- Begin Invoice -->
<div class="invoice has-shadow">
    <!-- Begin Invoice COntainer -->
    <div class="invoice-container">
        <!-- Begin Invoice Top -->
        <div class="invoice-top">
            <div class="row d-flex align-items-center">
                <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                    <h1>Invoice</h1>
                    @foreach ($invoice as $invoice1)
                        <span>{{$invoice1->no_invoice}}</span>
                    @endforeach 
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
                    <div class="actions dark">
                        <div class="dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                <i class="la la-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu">
                                    @foreach ($invoice as $invoice2)
                                <a href="{{asset('storage/invoice/'.$invoice2->file)}}" class="dropdown-item"> 
                                    <i class="la la-download"></i>Download
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Invoice Top -->
        <!-- Begin Invoice Header -->
        <div class="invoice-header">
            <div class="row d-flex align-items-center">
                <div class="col-xl-2 col-md-2 col-sm-12 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
                    <div class="invoice-logo">
                        <img src="{{asset('assets/img/logo-sunteak.png')}}" alt="logo">
                    </div>
                </div>
                <div class="col-xl-5 col-md-5 col-sm-6 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
                    <div class="details">
                        <ul>
                            <li class="company-name">Sunteak Alliance</li>
                            <li>Ngasem Batealit Jepara</li>
                            <li>info@sunteakliving.com</li>
                            <li>https://sunteakliving.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-md-5 col-sm-6 d-flex justify-content-xl-end justify-content-md-end justify-content-center mb-2">
                    <div class="client-details">
                        <ul>
                            <li class="title">To.</li>
                            @foreach ($invoice as $invoice3)
                                <li>{{$invoice3->user->name}}</li>
                                <li>{{$invoice3->user->email}}</li>
                                {{-- <li>{{$invoice3->buyer->perusahaan}}</li>
                                <li>{{$invoice3->buyer->alamat}}</li>
                                <li>{{$invoice3->buyer->telepon}}</li> --}}
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Invoice Header -->
        <div class="invoice-date d-flex justify-content-xl-end justify-content-center">
            <span>Febuary 22, 2018</span>
        </div>
        <!-- Begin Table -->
        <div class="col-xl-12 desc-tables">
            <div class="table-responsive">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-center">Nama barang</th>
                            <th class="text-center">qty</th>
                            <th class="text-center">harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice as $invoice4)
                            
                        <tr>
                            <td>1.</td>
                            <td class="text-left">
                                <div class="description">
                                    {{$invoice4->spk->barang->nama}}
                                </div>
                            </td>
                            <td class="text-center">{{$invoice4->spk->qty}}</td>
                            <td class="text-center"> $ {{$invoice4->spk->barang->harga}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Table -->
    </div>
    <!-- End Invoice Container -->
    <!-- Begin Invoice Footer -->
    <div class="invoice-footer">
        <!-- Begin Invoice Container -->
        <div class="invoice-container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-6 col-md-6 col-sm-6 d-flex justify-content-xl-start justify-content-md-start justify-content-center mb-2">
                    <div class="bank">
                        <div class="title">Jepara @php echo date('d F Y'); @endphp</div><br><br>
                        <div class="text">Mr. Muhammad Rumman</div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 d-flex justify-content-xl-end justify-content-md-end justify-content-center">
                    <div class="total">
                        <div class="title">Total</div>
                        @foreach ($invoice as $invoice5)
                            <div class="number"> $ {{$invoice5->spk->barang->harga}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="website">https://sunteakliving.com - info@sunteakliving.com</div>
            </div>
        </div>
        <!-- End Invoice Container -->
    </div>
    <!-- End Invoice Footer -->
</div>
<!-- End Invoice -->
</div>

    
@endsection