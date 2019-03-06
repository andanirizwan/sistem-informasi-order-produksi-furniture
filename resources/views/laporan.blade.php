@extends('template.dashboard')

@section('titles') Laporan @endsection

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Laporan Pengiriman</h4>
    </div>
<div class="widget-body">
<table id="table" class="table mb-0">
    <thead>
        <tr>
            <th>NO</th>
            <th>No SPK</th>
            <th>Nama buyer</th>
            <th>Jadwal Pengiriman</th> 
            <th>Status</th>
            @if (Auth::user()->role == 'exim')<th>action</th>@endif
        </tr>
    </thead>
    <tbody>
        @php
            $no=1
        @endphp
        @foreach ($laporan as $laporan1)
            
        <tr>
            <td>{{$no++}}</td>
            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#spk">{{ $laporan1->spk->no_spk }} <i class="la la-hand-pointer-o"></i></button></td>           
            <td>{{ $laporan1->buyer->username }}</td>
            <td>{{ $laporan1->pengiriman }}</td>
            <td><button class="btn btn-info">{{ $laporan1->status }}</button></td>
            @if (Auth::user()->role == 'exim')
            <td><a type="button" class="btn btn-primary" href="laporan/{{$laporan1->id}}/edit"><i class="la la-edit"></i></a></td>    
            @endif
            
        </tr>

        @endforeach
    </tbody>
</table>

<!-- Begin Small Modal -->
<div id="spk" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Title</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table id="table" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>No SPK</th>
                                        <th>Nama Buyer</th>
                                        <th>Barang</th> 
                                        <th>Qty</th>
                                        <th>Keterangan</th>
                                        <th>Jadwal Pengiriman</th> 
                                        <th>Status</th> 
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan as $laporan1)
                                        
                                    <tr>
                                        <td>1.</td>
                                        <td>{{ $laporan1->spk->no_spk}}</td>           
                                        <td>{{ $laporan1->buyer->username}}</td>
                                        <td>{{ $laporan1->spk->barang->nama}}</a></td>
                                        <td>{{ $laporan1->spk->qty}}</td> 
                                        <td>{{ $laporan1->spk->keterangan}}</td>
                                        <td>{{ $laporan1->spk->pengiriman}}</td> 
                                        <td><button class="btn btn-info">{{ $laporan1->spk->status}}</button></td>
                                       
                                    </tr>
                            
                                    @endforeach
                                </tbody>
                            </table>
                </div>

            </div>
        </div>
    </div>
    <!-- End Small Modal -->
</div>

@push('scripts1')
  {{-- datatble --}}

<script>
    $(document).ready( function () {
    $('#table').DataTable();
} );
</script>  
    
@endpush

@endsection