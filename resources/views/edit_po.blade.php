@extends('template.dashboard')

@section('titles') PO @endsection

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Create PO</h4>
    </div>
<div class="widget-body">

@foreach ($po as $po1)
<form class="form-horizontal" method="POST" action="/po/{{$po1->id}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="put">
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No PO</label>
        <div class="col-md-5">
            <input type="text" name="no_po" class="form-control" value="{{$po1->no_po}}" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Delivery Report</label>
        <div class="col-md-5">
            <input type="date" name="pengiriman" class="form-control" value="{{$po1->pengiriman}}" required>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">File</label>
        <div class="col-md-5">
            <input type="file" name="file_po" class="form-control" value="{{$po1->file_po}}" required>
        </div>
    </div> 
    
@endforeach
    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 
</form>
</div>
@endsection