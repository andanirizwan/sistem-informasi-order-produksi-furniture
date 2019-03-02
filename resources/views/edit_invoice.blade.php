@extends('template.dashboard')

@section('titles') Invoice @endsection
@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Tambah Invoice</h4>
    </div>
<div class="widget-body">
    @foreach ($invoice as $invoice1)
        
<form class="form-horizontal" method="POST" action="/invoice" enctype="multipart/form-data">
    
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No Invoice</label>
        <div class="col-md-5">
            <input type="text" name="no_invoice" class="form-control" value="{{$invoice1->no_invoice}}" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">File</label>
        <div class="col-md-5">
            <input type="file" name="file_invoice" class="form-control" value="{{$invoice1->file_invoice}}" required>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Buyer</label>
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
@endforeach
    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 
</form>
</div>
@endsection