<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     public function index(){
        $category=Category::count();
        $posts=Post::count();
        $users=User::where('role','0')->count();
        $admins=User::where('role','1')->count();
        $blogger=User::where('role','2')->count();

        return view('admin.dashboard',compact('category','posts','users','admins','blogger'));
    }

}
