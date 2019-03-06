@extends('template.dashboard')

@section('titles') PO @endsection
@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>PO</h4>
    </div>
<div class="widget-body">
<table id="table" class="table mb-0">
    <thead>
        <tr>
            <th>NO</th>
            <th>Buyer</th>
            <th>File</th>
            <th>Jadwal Pengiriman</th> 
            <th>Edit</th> 
        </tr>
    </thead>
    <tbody>
        @php
            $no=1
        @endphp
        @foreach ($po as $po1)
            
        <tr>
            <td>{{$no++}}</td>
            <td>{{ $po1->buyer->username }}</td>           
            <td><a type="button" class="btn btn-info" href="{{asset('storage/po/'.$po1->file_po)}}"> {{ $po1->file_po }} <i class="la la-download"> </i></a> </td>
            <td>{{ $po1->pengiriman }}</td>
            <td><a type="button" class="btn btn-info" href="po/{{ $po1->id}}/edit"><i class="la la-edit"></i></a></td>
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