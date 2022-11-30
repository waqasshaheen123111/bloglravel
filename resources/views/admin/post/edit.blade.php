@extends('layouts.master')
@section('title','Add Post')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Post
                <a href="{{url('admin/post')}}" class="btn btn-danger float-end">Back</a>
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
            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Category </label>
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option value="">--Select Category</option>
                        @foreach($category as $cat_id)
                        <option value="{{$cat_id->id}}" {{$post->category_id==$cat_id->id ? 'selected':'' }} >
                            {{$cat_id->name}}</option>
                        @endforeach
                      </select>
                  
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="post_name" class="form-control" value="{{$post->name}}">
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                   <input type="text" name='slug' class="form-control" value="{{$post->slug}}">
                    
                    
        
                </div>
                <div class="mb-3">
                    <label for="">Discription</label>
                    <textarea name="description" id="my_summer" class="form-control" rows="4">{!!$post->description!!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Youtube I Frame Link</label>
                    <textarea name="yt_iframe" class="form-control" rows="4">{!!$post->yt_iframe!!}</textarea>
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{$post->meta_title}}">
                </div>
                <div class="mb-3">
                    <label for="">Meta_Description</label>
                    <textarea name="meta_description" rows="5" class="form-control">{!!$post->meta_description!!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keyword"  rows="5" class="form-control">{!!$post->meta_keyword!!}</textarea>
                </div>
                <h6>Status</h6>
                <div class="row">
                    <div class="col-md-10 mb-3">
                        <label for=""> Status</label>
                        <input type="checkbox" name="status" {{$post->status=='1'?'checked':''}}>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-lg  btn-primary">Update post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection