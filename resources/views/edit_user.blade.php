@extends('template.dashboard')

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Edit User</h4>
    </div>
<div class="widget-body">
    @foreach ($user as $user1)

    <form method="POST" action="/akun/{{$user1->id}}">
        <input type="hidden" name="_method" value="put">
                <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-md-3 form-control-label">Username</label>
                        <div class="col-md-5">
                            <input type="text" name="name" class="form-control" value="{{$user1->name}}" autofocus required>
                        </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-md-3 form-control-label">Email</label>
                        <div class="col-md-5">
                            <input type="email" name="email"  class="form-control" value="{{$user1->email}}" required>
                        </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-md-3 form-control-label">Role</label>
                        <div class="col-md-5">
                            <select name="role" class="form-control">
                                <option value="">pilih</option>
                                <option value="admin">admin</option>
                                <option value="buyer">buyer</option>
                                <option value="data">data</option>
                                <option value="exim">exim</option>
                            </select>
                        </div>
                    </div> 
        
@endforeach
                    @csrf

             
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>

</form>
</div>
@endsection