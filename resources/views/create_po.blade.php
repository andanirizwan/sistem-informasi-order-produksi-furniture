@extends('template.dashboard')

@section('titles') PO @endsection

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Create PO</h4>
    </div>
<div class="widget-body">
<form class="form-horizontal" method="POST" action="/po" enctype="multipart/form-data">
    
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">No PO</label>
        <div class="col-md-5">
            <input type="text" name="no_po" class="form-control" required>
        </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Delivery Report</label>
        <div class="col-md-5">
            <input type="date" name="pengiriman" class="form-control" required>
        </div>
    </div> 
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">File</label>
        <div class="col-md-5">
            <input type="file" name="file_po" class="form-control" required>
        </div>
    </div> 
    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 
</form>
</div>
@endsection