
@extends('layouts.master')
@section('title','Users')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Users
               
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
          @endif
          <div class="table-responsive">
          <table id="mydataTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Profile Pic</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                
              </tr>
            </thead>
                  <tbody>
                    
                        @foreach ($user as $users)
                          <tr>
                            <td><img src="{{asset('uploads/category/'.$users->dp)}}" height="100" width="100" alt="img"></td>
                            <td>{{$users->id}}</td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>
                            @if ($users->role=='1')
                                Admin
                            @elseif($users->role=='0')
                              User
                              @else
                              Blogger  
                            @endif
                        </td>
                        <td><a href="{{url('admin/edit-user/'.$users->id)}}"><i class="fa-solid fa-pen-to-square btn btn-success">Edit</i></a></td>
                           <td>
                            <form action="{{url('admin/delete-user/'.$users->id)}}" method="GET">
                                <input type="hidden" name="p_id" id="p_id" value="{{$users->id}}">
                                <button class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()">
                                    <i class="fa fa-archive"></i>
                                        Delete
                                </button>
                        </form>
                           </td>
                          </tr>
                        
    
                        
                        @endforeach
    
                  
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script>
  function archiveFunction() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "But you will still be able to retrieve this file.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, Delete it!",
  cancelButtonText: "No, cancel please!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}
</script>
@endsection