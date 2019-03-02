@extends('template.dashboard')

@section('titles') Spk @endsection
@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>SPK</h4>
    </div>
<div class="widget-body">
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
            @if (Auth::user()->role == 'data')
            <th>Action</th> 
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($spk as $spk1)
            
        <tr>
            <td>1.</td>
            <td>{{ $spk1->no_spk}}</td>           
            <td>{{ $spk1->buyer->username}}</td>
            <td>{{ $spk1->barang->nama}}</td>
            <td>{{ $spk1->qty}}</td> 
            <td>{{ $spk1->keterangan}}</td>
            <td>{{ $spk1->pengiriman}}</td> 
            <td><button class="btn btn-info">{{ $spk1->status}}</button></td>
            @if (Auth::user()->role == 'data')
            <td><a href="spk/{{ $spk1->id}}/edit" type="button" class="btn"> <i class="la la-edit"></i> </a></td>
            @endif  
        </tr>

        @endforeach
    </tbody>
</table>
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