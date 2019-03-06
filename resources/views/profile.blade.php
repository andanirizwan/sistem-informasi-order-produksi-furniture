@extends('template.dashboard')

@section('content')
<div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Profile</h4>
    </div>
<div class="widget-body">

<div class="row">
    <div class="col-md-4">
        <div class="mt-5">
                <img src="{{asset('assets/img/preloader-sidof.png')}}"  style="width: 120px;" class="avatar rounded-circle d-block mx-auto">
        </div>
            @foreach ($user as $user1)
                <h3 class="text-center mt-3 mb-1">{{$user1->name}}</h3>
                <p class="text-center">{{$user1->email}}</p>
                @foreach ($buyer as $buyer1)
                    <p class="text-center">{{$buyer1->perusahaan}}</p>
                    <p class="text-center">{{$buyer1->alamat}}</p>
                    <p class="text-center">{{$buyer1->telepon}}</p>
                @endforeach
            @endforeach
    </div>
    <div class="col-md-7">
            <div class="col-10 ml-auto">
                    <div class="section-title mt-3 mb-3">
                        <h4>Update Informations</h4>
                    </div>
                </div>
            <form class="form-horizontal" method="POST" action="/profile" enctype="multipart/form-data">
                {{-- <input type="hidden" name="_method" value="PUT"> --}}
            <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-md-3 form-control-label">Company</label>
                    <div class="col-md-5">
                        <input type="tect" name="perusahaan" class="form-control" required>
                    </div>
            </div>  
            <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-md-3 form-control-label">address</label>
                    <div class="col-md-5">
                        <input type="tect" name="alamat" class="form-control" required>
                    </div>
            </div>   
            <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-md-3 form-control-label">telp</label>
                    <div class="col-md-5">
                        <input type="text" name="telepon" class="form-control" required>
                    </div>
            </div> 
            <button type="submit" class="btn btn-primary mr-1 mb-2">Update</button>
        @csrf
        </form>
    </div>
</div>      
</div>




@endsection