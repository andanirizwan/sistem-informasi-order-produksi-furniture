@extends('template.dashboard')

@section('titles') Barang @endsection

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Edit Barang</h4>
    </div>
<div class="widget-body">
    @foreach ($barang as $barang1)
        
<form class="form-horizontal" method="POST" action="/barang/{{$barang1->id}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="put">
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Nama</label>
        <div class="col-md-5">
            <input type="text" name="nama" class="form-control" value="{{$barang1->nama}}" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Foto</label>
        <div class="col-md-5">
            <input type="file" name="file_foto" class="form-control" required>
            <img src="{{asset('storage/barang/'.$barang1->foto)}}" alt="" width="100px">
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">ukuran</label>
        <div class="col-md-5">
            <input type="text" name="ukuran" class="form-control" value="{{$barang1->ukuran}}"  required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Material</label>
        <div class="col-md-5">
            <input type="text" name="material" class="form-control" value="{{$barang1->material}}"  required>
        </div>
    </div>
@endforeach

    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 

</form>
</div>
@endsection