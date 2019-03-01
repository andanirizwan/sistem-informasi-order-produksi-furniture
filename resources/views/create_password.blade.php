@extends('template.dashboard')

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Change Password</h4>
    </div>
<div class="widget-body">
<form class="form-horizontal" method="POST" action="/profile/{{Auth::user()->id}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="put">
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-md-3 form-control-label">Change Password</label>
        <div class="col-md-5">
            <input type="password" name="password" class="form-control">
        </div>
    </div> 

    @csrf
    <button type="submit" class="btn btn-primary mr-1 mb-2">Submit</button> 
</form>
</div>
@endsection