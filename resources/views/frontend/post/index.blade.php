@extends('layouts.app')
@section('title',"$category->meta_tittle")
@section('meta_description',"$category->meta_description")
@section('meta_keyword',"$category->meta_keyword")
@section('content')
<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="category-heading">
                    <h4>{{$category->name}}</h4>
                </div>
                @forelse ($post as $post_item)
                
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <a href="{{url('tutorial/'.$category->slug.'/'.$post_item->slug)}}" class="text-decoration-none">

                            <h2 class="post-heading">{{$post_item->name}}</h2>
                        </a>
                        <h6>Posted ON:{{$post_item->created_at->format('d-m-Y')}}
                        
                            <span class="ms-3">Posted By:  {{$post_item->user->name}}</span>
                        </h6>
                    </div>
                </div>


                @empty
                
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        

                            <h1 class="post-heading">No Post  Available</h1>
                        </a>
                    </div>
                </div>
                    
                @endforelse
                <div class="your-paginate mt-4">
                    {{$post->links()}}
                </div>
            </div>
            <div class="col-md-3">
                <div id="box" class="border p-2">
                    <h3>Advertising Area</h3>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
