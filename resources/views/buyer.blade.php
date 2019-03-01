@extends('template.dashboard')

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Buyer</h4>
    </div>
<div class="widget-body">
<table id="table" class="table mb-0">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>email</th>
            <th>perusahaan</th>
            <th>alamat</th> 
            <th>telephone</th> 
        </tr>
    </thead>
    <tbody>
        @php
            $no=1
        @endphp
        @foreach ($buyer as $buyer1)
            
        <tr>
            <td>{{$no++}}</td>
            <td>{{ $buyer1->username}}</td>           
            <td>{{ $buyer1->email}}</td>  
            <td>{{ $buyer1->perusahaan}}</td>  
            <td>{{ $buyer1->alamat}}</td>  
            <td>{{ $buyer1->telepon}}</td>  
            
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