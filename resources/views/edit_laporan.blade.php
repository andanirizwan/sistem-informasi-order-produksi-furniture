@extends('template.dashboard')

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Edit Laporan Pengiriman</h4>
    </div>
<div class="widget-body">
    @foreach ($laporan as $laporan1)
        
<form class="form-horizontal" method="POST" action="/laporan/{{$laporan1->id}}" enctype="multipart/form-data">
    
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Nama Buyer</label>
        <div class="col-md-5">
            <select name="buyer_id" class="form-control">
                <option value="">pilih</option>

                    <option value="{{$laporan1->buyer->id}}">{{$laporan1->buyer->username}}</option>
 
            </select>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No PO</label>
        <div class="col-md-5">
            <select name="po_id" class="form-control">
                <option value="">pilih</option>
 
                    <option value="{{$laporan1->po->id}}">{{$laporan1->po->no_po}}</option>
 
            </select>
        </div>
    </div>  
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No SPK</label>
        <div class="col-md-5">
            <select name="spk_id" class="form-control">
                <option value="">pilih</option>

                    <option value="{{$laporan1->spk->id}}">{{$laporan1->spk->no_spk}}</option>

            </select>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Jadwal Pengiriman</label>
        <div class="col-md-5">
            <select name="pengiriman" class="form-control">
                <option value="">pilih</option>

                    <option value="{{$laporan1->po->pengiriman}}">{{$laporan1->po->pengiriman}}</option>

            </select>
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