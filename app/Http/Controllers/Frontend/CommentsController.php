<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    //

    public function store(Request $request){
        if (Auth::check()) {
            $validator=Validator::make($request->all(),[
                'comment_body'=>'required|string'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('message','Comment are is mandetory');
            }
            $post=Post::where('slug',$request->post_slug)->where('status','0')->first();
            if ($post) {
                Comment::create([
                    'post_id'=>$post->id,
                    'user_id'=>Auth::user()->id,
                    'comment_body'=>$request->comment_body,

                ]);
                return redirect()->back()->with('message','Comment Added Successfully');
              
            }
            else{
                return redirect()->back()->with('message','No such Post  Found');
            }
        }
        else{
            return redirect('login')->with('message','Please login first to comment');
        }

    }
}
