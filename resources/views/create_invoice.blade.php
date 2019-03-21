@extends('template.dashboard')

@section('titles') Invoice @endsection
@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Tambah Invoice</h4>
    </div>
<div class="widget-body">
<form class="form-horizontal" method="POST" action="/invoice" enctype="multipart/form-data">
    
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No Invoice</label>
        <div class="col-md-5">
            <input type="text" name="no_invoice" class="form-control" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">File</label>
        <div class="col-md-5">
            <input type="file" name="file_invoice" class="form-control" required>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Buyer</label>
        <div class="col-md-5">
            <select name="user_id" class="form-control">
                <option value="">pilih</option>
                @foreach ($user as $user1)
                    <option value="{{$user1->id}}">{{$user1->name}}</option>
                @endforeach
            </select>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">SPk</label>
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
        <label class="col-md-3 form-control-label">PO</label>
        <div class="col-md-5">
            <select name="po_id" class="form-control">
                <option value="">pilih</option>
                @foreach ($po as $po1)
                    <option value="{{$po1->id}}">{{$po1->no_po}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 
</form>
</div>
@endsection