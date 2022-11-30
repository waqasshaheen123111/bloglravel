@extends('layouts.master')
@section('title','Add Post')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Post
                <a href="{{url('admin/post')}}" class="btn btn-primary float-end">View Post</a>
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
            <form action="{{url('admin/add-post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Category </label>
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        @foreach($category as $cat_id)
                        <option value="{{$cat_id->id}}" >{{$cat_id->name}}</option>
                        @endforeach
                      </select>
                  
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="post_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                   <input type="text" name='slug' class="form-control">
                    
                    

                </div>
                <div class="mb-3">
                    <label for="">Discription</label>
                    <textarea name="description" id="my_summer"  class="form-control" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Youtube I Frame Link</label>
                    <textarea name="yt_iframe" class="form-control" rows="4"></textarea>
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta_Description</label>
                    <textarea name="meta_description" rows="5" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keyword"  rows="5" class="form-control"></textarea>
                </div>
                <h6>Status</h6>
                <div class="row">
                    <div class="col-md-10 mb-3">
                        <label for=""> Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-lg  btn-primary">Save post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection