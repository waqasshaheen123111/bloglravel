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
                        <div class="card-body">
                        {!!$post->description!!}
                        </div>
                    </div>



                </div>


                <div class="col-md-4">
                    <div class="border p-2 my-2" >
                        <h3>Advertising Area</h3>
                    </div>
                    <div class="border p-2 my-2" >
                        <h3>Advertising Area</h3>
                    </div>
                    <div class="border p-2 my-2" >
                        <h3>Advertising Area</h3>
                    </div>
                    <div class="card mt-4">
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