

@extends('layouts.master')
@section('title','Admin Dashboard')

@section('content')

<div class="container-fluid px-4">
  <div class="card mt-4 card-primary">
        <div class="card-header ">
          <h4 class="mt-4"> View Category
            <a href="{{url('admin/add-category')}}" class="btn btn-primary  float-end">Add Category</a>
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
                <th scope="col">Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col" >Edit</th>
                <th scope="col" >Delete</th>
              </tr>
            </thead>
                  <tbody>
                    
                        @foreach ($category as $items)
                          <tr>
                            <td>{{$items->id}}</td>
                            <td>{{$items->name}}</td>
                            <td>
                              <img src="{{asset('uploads/category/'.$items->image)}}" width="89px" height="100px" alt="image">
                            </td>
                            <td>{{$items->status||$items->navbar_status=='1'?'Hidden':'Shown'}}</td>
                            <td>
                              <a href="{{url('admin/edit-category/'.$items->id)}}"><button type="button" class="btn btn-outline-success">Edit</button></a>
                            </td>
                            <td>
                              <form action="{{url('admin/delete-category/'.$items->id)}}" method="GET">
                                  <input type="hidden" name="p_id" id="p_id" value="{{$items->id}}">
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