<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{
    public function index(){
        $post=Post::all();

         return view('admin.post.index',compact('post'));
    }
    public function create(){
        $category=Category::where('status','0')->get();

        return view('admin.post.add',compact('category'));
    }
    // public function check(){

    // }
    public function store(PostFormRequest $request){
       
            $data=$request->validated();
            $post=new Post;
            $post->category_id=$request->category_id;
            $post->name=$data['post_name'];
            $post->slug=Str::slug($data['slug']);
            $post->description=$data['description'];
            $post->yt_iframe=$data['yt_iframe'];
            $post->meta_title=$data['meta_title'];
            $post->meta_description=$data['meta_description'];
            $post->meta_keyword=$data['meta_keyword'];
            $post->status=$request->status==true ? '1':'0';
            $post->created_by=Auth::user()->id;
            $post->save();
            return redirect('admin/post')->with('message','Post Added Successfully');
            
        
    }
    public function edit($post_id){
        $category=Category::where('status','0')->get();
        $post= Post::find($post_id);
        return view('admin.post.edit',compact('post','category'));
    }
    public function update(Request $request1,PostFormRequest $request,$post_id){
       
        $data=$request->validated();
        
        
        $post=Post::find($post_id);
        $post->name=$data['post_name'];
        $post->slug=Str::slug($data['slug']);
        $post->description=$data['description'];
        $post->yt_iframe=$data['yt_iframe'];
        $post->meta_title=$data['meta_title'];
        $post->meta_description=$data['meta_description'];
        $post->meta_keyword=$data['meta_keyword'];
        $post->status=$request->status==true ? '1':'0';
        $post->created_by=Auth::user()->id;
        $post->update();
        return redirect('admin/post')->with('message','Post Update Sucessfully');

    

       
            

        } 
        public function destroy($post_id){
            $post=POST::find($post_id);
            
            if ($post) {
               
                $post->delete();
                return redirect('admin/post')->with('message','Post Deleted Successfully');
            }
            else{
                return redirect('admin/post')->with('message','Post Id not Found');
            }
        }

}
