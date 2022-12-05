@extends('layouts.master')
@section('title','Website Settings')

@section('content')
<div class="container-fluid px-4">


    <div class="card  mt-4">
        <div class="card-header">
            <h4 > Settings </h6>

        </div>

        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
          @endif
                
            
            <form action="{{url('admin/add-settings')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">Website Name</label>
                    <input type="text" @if ($setting)
                        value="{{$setting->website_name}}"
                    @endif
                     name="website_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Website FavIcon</label>
                    <input type="file" name="favicon" class="form-control">
                    @if ($setting)
                        <img src="{{asset('uploads/setting/'.$setting->favicon)}}" width="100px" height="150px" alt="img">
                        @endif
                </div>
                <div class="mb-3">
                    <label for=""> Website Logo</label>
                    <input type="file" name="logo" class="form-control">
                    @if ($setting)
                    <img src="{{asset('uploads/setting/'.$setting->logo)}}" width="100px" height="150px" alt="img">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <input type="text"@if ($setting)
                    value="{{$setting->description}}"
                @endif name="description" class="form-control">
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text"@if ($setting)
                    value="{{$setting->meta_title}}"
                @endif name="meta_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">Meta_Description</label>
                    <textarea name="meta_description" class="form-control" rows="5">
                        @if ($setting)
                        {{$setting->meta_description}}
                        @endif
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keyword" class="form-control" rows="5">
                        @if ($setting)
                        {{$setting->meta_keyword}}
                        @endif
                    </textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                 </div>
                
            </form>
        </div>
    </div>

    

</div>



@endsection