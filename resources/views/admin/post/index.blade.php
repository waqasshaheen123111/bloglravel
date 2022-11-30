@extends('layouts.master')
@section('title','Post')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Post
                <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
          @endif
          <table id="mydataTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Category</th>
                <th scope="col">Post Name</th>
                <th scope="col">Post Image</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                
              </tr>
            </thead>
                  <tbody>
                    
                        @foreach ($post as $items)
                          <tr>
                            <td>{{$items->id}}</td>
                            <td>{{$items->category->name}}</td>
                            <td>{{$items->name}}</td>
                            <td><img src="{{asset('uploads/category/'.$items->category->image)}}" height="100" width="100" alt="img"></td>
                            <td>{{$items->status=='0'?'Shown':'Hidden'}}</td>
                            <td><a href="{{url('admin/edit-post/'.$items->id)}}"><button class="btn btn-success">Edit</button></a></td>
                            <td><a href="{{url('admin/delete-post/'.$items->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                            
                           </tr>
    
                        
                        @endforeach
    
                  
                  </tbody>
              </table>
        </div>
    </div>
</div>
@endsection