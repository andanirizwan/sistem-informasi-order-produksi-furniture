@extends('template.dashboard')

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Tambah Laporan Pengiriman</h4>
    </div>
<div class="widget-body">
<form class="form-horizontal" method="POST" action="/laporan" enctype="multipart/form-data">
    
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Nama Buyer</label>
        <div class="col-md-5">
            <select name="user_id" class="form-control">
                <option value="">pilih</option>
                @foreach ($user as $users1)
                    <option value="{{$users1->id}}">{{$users1->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No PO</label>
        <div class="col-md-5">
            <select name="po_id" class="form-control">
                <option value="">pilih</option>
                @foreach ($po as $po1)
                    <option value="{{$po1->id}}">{{$po1->no_po}}</option>
                @endforeach
            </select>
        </div>
    </div>  
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No SPK</label>
        <div class="col-md-5">
            <select name="spk_id" class="form-control">
                <option value="">pilih</option>
                @foreach ($spk as $spk1)
                    <option value="{{$spk1->id}}">{{$spk1->no_spk}}</option>
                @endforeach
            </select>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Jadwal Pengiriman</label>
        <div class="col-md-5">
            <select name="pengiriman" class="form-control">
                <option value="">pilih</option>
                @foreach ($po as $po1)
                    <option value="{{$po1->pengiriman}}">{{$po1->pengiriman}}</option>
                @endforeach
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
    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 
</form>
</div>
@endsection