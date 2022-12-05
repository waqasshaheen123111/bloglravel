@extends('layouts.app')
@section('title',"$post->name")
@section('meta_description',"$post->meta_description")
@section('meta_keyword',"$post->meta_keyword")
@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">
                <div class="col-md-8">
                    <div class="category-heading">
                        <h4 class="mb-0">{{$post->name}}</h4>
                    </div>
                    <div class="mt-2">
                        <h6>{{$post->category->name.'/'.$post->name}}</h6>
                    </div>
                    
                    
                    <div class="card card-shadow mt-4">
                        <div class="card-body post-description">
                        {!!$post->description!!}
                        </div>
                    </div>
                    @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                  @endif
                    <div class="comment-area mt-4">
                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{url('comment')}}" method="POST">
                                @csrf
                                <input type="hidden" name="post_slug" value="{{$post->slug}}">
                                <textarea name="comment_body" id=""  rows="3" class="form-control" required></textarea>
                                <button  type="submit" class="btn btn-primary mt-3">
                                    Submit
                                </button>
    
                            </form>
                        </div>
                        @forelse ($post->comments as $comment)
                            
                      
                        <div class="card card-body shadow-sm-mt-3 mt-4" id="container_comment">
                            <div class="detail-area">
                                <h6 class="user-name mb-1">
                                    @if ($comment->user)
                                        
                                   
                                   {{$comment->user->name}}
                                   @endif
                                    <small class="ms-3 text-primary"> Commented On: {{$comment->created_at->format('d-m-Y')}}</small>
                                </h6>
                                <p class="user-comment mb-1">
                                   {!!$comment->comment_body!!}
    
                                </p>
                            </div>
                            @if (Auth::id()==$comment->user_id)
                                
                           
                                
                            <div>
                                <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                                <button type="button" onclick="archiveFunction()" value="{{$comment->id}}"  class="delete_comment btn btn-danger btn-sm me-2">Delete</button>
                            </div>
                            @endif
                        </div>
                        @empty
                            <h4>No comments yet</h4>
                        @endforelse
                    </div>

                </div>
               


                <div class="col-md-4">
                    <div id="old" class=" ad border p-2 my-2" >
                        <h3>Advertising Area</h3>
                    </div>
                    <div class="border p-2 my-2" >
                        <h3>Advertising Area</h3>
                    </div>
                    <div class="border p-2 my-2" >
                        <h3>Advertising Area</h3>
                    </div>
                    <div  class="card mt-4">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latest_post as $lat_post)
                                
                            <a href="{{url('tutorial/'.$lat_post->category->slug.'/'.$lat_post->slug)}}" class="text-decoration-none">
                                <h6>->{{$lat_post->name}}</h6>
                            </a>
                            @endforeach
                        </div>
                    </div>





                </div>




         </div>
                
            
</div>

@endsection
@section('scripts')
<script>
     $(document).ready(function () {
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }   
});
$(document).on('click','.delete_comment', function () {
    alert("Hello Ajax");     
    if (confirm('Are you sure to delete this')) {
        var thisClicked=$(this);
        var comment_id=thisClicked.val();
       thisClicked.closest('#container_comment').remove();
        $.ajax({
            type: "POST",
            url: "/delete-comment",
            data:{
                'comment_id': comment_id
            },
            dataType: "dataType",
            success: function (res) {
                if (res.status==200) {
                    thisClicked.closest('#container_comment').remove();
                    alert(res.message);
                }else{
                    alert(res.message);
                }
            }
        });
    }
});
    });
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




       
       
        
        
       
       
