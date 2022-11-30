@extends('layouts.master')
@section('title','Admin Dashboard')

@section('content')
<div class="container-fluid px-4">


    <div class="card  mt-4">
        <div class="card-header">
            <h4 > Add Category</h6>

        </div>

        <div class="card-body">
            @if ($errors->any())  
            <div class="alert alert-danger">
                
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            </div>
                
            @endif
            <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Category Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <div class="mb-3">
                    <textarea name="description"  rows="5"></textarea>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta_Description</label>
                    <textarea name="meta_description" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keyword"  rows="5"></textarea>
                </div>
                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" name="navbar_status">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for=""> Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6">
                        <input type="submit" name="submit" class="btn btn-primary" required />
                    </div>
                </div>
            </form>
        </div>
    </div>

    

</div>



@endsection