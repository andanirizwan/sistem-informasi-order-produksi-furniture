@extends('template.dashboard')

@section('titles') Spk @endsection

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Edit SPK</h4>
    </div>
<div class="widget-body">

    @foreach ($spk as $spk1)
        
<form class="form-horizontal" method="POST" action="/spk/{{$spk1->id}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="put">
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No Spk</label>
        <div class="col-md-5">
            <input type="text" name="no_spk" class="form-control" value="{{$spk1->no_spk}}" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Nama Buyer</label>
        <div class="col-md-5">
            <select name="buyer_id" class="form-control">
                <option value="">pilih</option>
                
                    <option value="{{$spk1->buyer->id}}">{{$spk1->buyer->username}}</option>
                
            </select>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Barang</label>
        <div class="col-md-5">
            <select name="barang_id" class="form-control">
                <option value="">pilih</option>
                
                    <option value="{{$spk1->barang->id}}">{{$spk1->barang->nama}}</option>
                
            </select>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Qty</label>
        <div class="col-md-5">
            <input type="text" name="qty" class="form-control" value="{{$spk1->qty}}" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Keterangan</label>
        <div class="col-md-5">
            <input type="text" name="keterangan" class="form-control" value="{{$spk1->keterangan}}" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Stock</label>
        <div class="col-md-5">
            <input type="text" name="stock" class="form-control" value="{{$spk1->stock}}" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Pengiriman</label>
        <div class="col-md-5">
            <input type="date" name="pengiriman" class="form-control" value="{{$spk1->pengiriman}}" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-md-3 form-control-label">Pengiriman</label>
            <div class="col-md-5">
                <input type="date" name="pengiriman" class="form-control" value="{{$spk1->pengiriman}}" required>
            </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-md-3 form-control-label">Status</label>
            <div class="col-md-5">
                <select name="status" class="form-control">
                    <option value="">pilih</option>
                    
                        <option value="proses">proses</option>
                        <option value="terkirim">terkirim</option>
                    
                </select>
            </div>
    </div>
@endforeach

    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 
</form>
</div>
@endsection