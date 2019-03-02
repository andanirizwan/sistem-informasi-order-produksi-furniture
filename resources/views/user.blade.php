@extends('template.dashboard')

@section('titles') Users @endsection
@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>User</h4>
    </div>
<div class="widget-body">
<table id="table" class="table mb-0">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th> 
            <th>Action</th> 
        </tr>
    </thead>
    <tbody>
        @php
            $no=1
        @endphp
        @foreach ($user as $user1)
            
        <tr>
            <td>{{$no++}}</td>
            <td>{{ $user1->name}}</td>           
            <td>{{ $user1->email}}</td>
            <td>{{ $user1->role}}</td>
            <td><a href="akun/{{$user1->id}}/edit" type="button" class="btn btn-info">Edit</a></td>         
            
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