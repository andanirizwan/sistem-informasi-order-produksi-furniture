@extends('template.dashboard')

@section('titles') Barang @endsection
@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Barang</h4>
    </div>
<div class="widget-body">
<table id="table" class="table mb-0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Foto</th>
            <th>Ukuran</th>
            <th>Material</th> 
        </tr>
    </thead>
    <tbody>
        @php
            $no=1
        @endphp
        @foreach ($barang as $barang1)
            
        <tr>
            <td>{{$no++}}</td>
            <td>{{ $barang1->nama}}</td>           
            <td><img src="{{asset('storage/barang/'.$barang1->foto)}}" alt="" width="50px"></td>
            <td>{{ $barang1->ukuran}}</td>
            <td>{{ $barang1->material}}</td>
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