@extends('layouts.app')
@section('title',"Shaheen Blogger")
@section('meta_description',"Shaheen Blogs")
@section('meta_keyword',"Shaheen Blogger")


@section('content')
<div class="bg-danger py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel category-carousel owl-theme">

                    
                    @foreach ($category as $cat_item)
                       @if(!$cat_item->posts->isEmpty()) 
                        <div class="item">
                            <a href="{{url('tutorial/'.$cat_item->slug)}}" class="text-decoration-none">
                                    <div class="card">

                                        
                                        <img id="forh" height="150px" width="100px" src="{{asset('uploads/category/'.$cat_item->image)}}" alt="Image">
                                        
                                        <div class="card-body text-center">
                                            
                                            <h5>{{$cat_item->name}}</h5>
                                            
                                        </div>
                                        
                                        
                                    </div>
                            </a>
                            
                            
                            
                        </div>
                        @endif
                    @endforeach



                </div>



            </div>
        </div>
    </div>
</div>

<div class="py-1 bg-grey">
    <div class="container">
        <div class="border text-center p-3">
            <h3>Advertise Here</h3>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5>Shaheen Blogger</h5>
                    <div class="underline"></div>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam architecto exercitationem optio laborum sit, corporis modi tempora ex ipsam, illo, vero voluptatibus? Laboriosam assumenda minus reiciendis dolore distinctio reprehenderit soluta.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus excepturi eveniet nostrum reiciendis inventore aliquam delectus, voluptas numquam sint cum ullam qui sequi amet tempora expedita fuga accusantium odit necessitatibus!

                        </p>
                    </div>
            </div>
    </div>
</div>
<div class="py-5 bg-grey">
    <div class="container">
            <div class="row">
                        <div class="col-md-12">
                                <h5>All Categories</h5>
                                        <div class="underline">
                                        </div>
                        </div>                
                            @foreach ($category as $cat_l)
                                
                            <div class="col-md-3">
                                <div class="card card-body mb-3">
                                    <a href="{{url('tutorial/'.$cat_l->slug)}} " class="text-decoration-none text-dark">
                                        <h5>{{$cat_l->name}}</h5>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            

            </div>
    </div>
</div>
<div class="py-5 bg-white">
    <div class="container">
            <div class="row">
                        <div class="col-md-12">
                                <h5>All Latest Post</h5>
                                        <div class="underline">
                                        </div>
                        </div>                
                        
                        <div class="col-md-8">
                                @foreach ($post as $post_l)
                                <div class="card card-body bg-grey mb-3">
                                    <a href="{{url('tutorial/'.$post_l->category->slug.'/'.$post_l->slug)}} " class="text-decoration-none text-dark">
                                        <h5>{{$post_l->name}}</h5>
                                        <h6>Created ON:{{$post_l->created_at->format('d-m-Y')}}</h6>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="border text-center p-3">
                                    <h3>Advertise Here</h3>
                                </div>
                            </div>
                            

            </div>
    </div>
</div>

@endsection