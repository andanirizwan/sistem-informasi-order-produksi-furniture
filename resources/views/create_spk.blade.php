@extends('template.dashboard')

@section('titles') Spk @endsection

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Tambah SPK</h4>
    </div>
<div class="widget-body">
<form class="form-horizontal" method="POST" action="/spk" enctype="multipart/form-data">
    
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No Spk</label>
        <div class="col-md-5">
            <input type="text" name="no_spk" class="form-control" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Nama Buyer</label>
        <div class="col-md-5">
            <select name="buyer_id" class="form-control">
                <option value="">pilih</option>
                @foreach ($buyer as $buyer1)
                    <option value="{{$buyer1->id}}">{{$buyer1->username}}</option>
                @endforeach
            </select>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Barang</label>
        <div class="col-md-5">
            <select name="barang_id" class="form-control">
                <option value="">pilih</option>
                @foreach ($barang as $barang1)
                    <option value="{{$barang1->id}}">{{$barang1->nama}}</option>
                @endforeach
            </select>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Qty</label>
        <div class="col-md-5">
            <input type="text" name="qty" class="form-control" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Keterangan</label>
        <div class="col-md-5">
            <input type="text" name="keterangan" class="form-control" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Stock</label>
        <div class="col-md-5">
            <input type="text" name="stock" class="form-control" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-md-3 form-control-label">Produksi</label>
            <div class="col-md-5">
                <input type="date" name="produksi" class="form-control" required>
            </div>
        </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Pengiriman</label>
        <div class="col-md-5">
            <input type="date" name="pengiriman" class="form-control" required>
        </div>
    </div>
    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 
</form>
</div>
@endsection