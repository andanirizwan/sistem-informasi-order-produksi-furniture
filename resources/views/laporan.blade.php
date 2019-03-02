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
            <td><button type="button" class="btn btn-shadow" data-toggle="modal" data-target="#spk">{{ $laporan1->spk->no_spk }}</button></td>           
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
                    <p>
                        Donec non lectus nec est porta eleifend. Morbi ut dictum augue, feugiat condimentum est. Pellentesque tincidunt justo nec aliquet tincidunt. Integer dapibus tellus non neque pulvinar mollis. Maecenas dictum laoreet diam, non convallis lorem sagittis nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc venenatis lacus arcu, nec ultricies dui vehicula vitae.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
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