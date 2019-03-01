@extends('template.dashboard')

@section('titles') Barang @endsection

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Tambah Barang</h4>
    </div>
<div class="widget-body">
<form class="form-horizontal" method="POST" action="/barang" enctype="multipart/form-data">
    
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Nama</label>
        <div class="col-md-5">
            <input type="text" name="nama" class="form-control" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Foto</label>
        <div class="col-md-5">
            <input type="file" name="file_foto" class="form-control" required>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">ukuran</label>
        <div class="col-md-5">
            <input type="text" name="ukuran" class="form-control" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Material</label>
        <div class="col-md-5">
            <input type="text" name="material" class="form-control" required>
        </div>
    </div>
    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 
</form>
</div>
@endsection