@extends('template.dashboard')

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Tambah User</h4>
    </div>
<div class="widget-body">
        <form method="POST" action="/akun">
                <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-md-3 form-control-label">Username</label>
                        <div class="col-md-5">
                            <input type="text" name="name" class="form-control" autofocus required>
                        </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-md-3 form-control-label">Email</label>
                        <div class="col-md-5">
                            <input type="email" name="email"  class="form-control" required>
                        </div>
                </div>
                <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-md-3 form-control-label">Password</label>
                        <div class="col-md-5">
                            <input type="password" name="password"  class="form-control" required>
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
                @csrf
             
            <div class="sign-btn text-center">
                <button type="submit" class="btn btn-lg btn-gradient-01">
                    Submit
                </button>
            </div>
</form>
</div>
@endsection