@extends('template.dashboard')

@section('titles') Invoice @endsection
@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Invoice</h4>
    </div>
<div class="widget-body">
<table id="table" class="table mb-0">
    <thead>
        <tr>
            <th>NO</th>
            <th>Buyer</th>
            <th>File</th>
            <th>Jadwal Pengiriman</th> 
        </tr>
    </thead>
    <tbody>
        @php
            $no=1
        @endphp
        @foreach ($invoice as $invoice1)
            
        <tr>
            <td>{{$no++}}</td>
            <td>{{ $invoice1->user->name }}</td>           
            <td><a type="button" class="btn btn-info" href="invoice/{{ $invoice1->id }}">{{ $invoice1->file }} <i class="la la-hand-pointer-o"></i> </a> </td>
            <td>{{ $invoice1->po->pengiriman }}</td>
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