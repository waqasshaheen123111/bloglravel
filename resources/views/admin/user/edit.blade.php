@extends('layouts.master')
@section('title','Edit User')

@section('content')
<div class="container-fluid px-4 ">


    <div class="card  mt-4 mb-4">
        <div class="card-header">
            <h4 > Update User
                <a class="btn btn-danger float-end" href="{{url('admin/user')}}">Back</a>
            </h4>

        </div>

        <div class="card-body">
            @if ($errors->any())  
            <div class="alert alert-danger">
                
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>
                
            @endif
            <form action="{{url('admin/update-user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">User Name</label>
                    <input type="text" value="{{$user->name}}" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for=""> User Image</label>
                    <input type="file" name="dp" class="form-control">
                    <img src="{{asset('uploads/category/'.$user->dp)}}" width="150px" height="200px" alt="image">
                </div>
                <div class="mb-3">
                    <label for=""> User Role</label>
                  <select name="role" id="" class="form-control">
                    <option value="0" {{$user->role=='0'?'selected':''}}>User</option>
                    <option value="1" {{$user->role=='1'?'selected':''}}>Admin</option>
                    <option value="2" {{$user->role=='2'?'selected':''}}>Blogger</option>
                  </select>
                </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    

</div>

@endsection