<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(){
        $user=User::all();
        return view('admin.user.index',compact('user'));
    }
    public function edit($user_id){
        $user=User::find($user_id);
        return view('admin.user.edit',compact('user'));

    }

    public function update(Request $request,$user_id){
        $user=User::find($user_id);

        
        if ($user) {
           
            if ($request->hasfile('dp')) {
                $destination='uploads/category'.$user->dp;
                if (File::exists($destination)) {
                File::delete($destination);
            }
            $file=$request->file('dp');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category',$filename);
            $user->dp=$filename;
            }
            $user->name=$request->name;
            $user->email=$request->email;
            $user->role=$request->role;
            $user->update();
            return redirect('admin/user')->with('message','User Updated Successfully');
            
           
        }
        else{
            return redirect('admin/user')->with('message','User id not found');
        }

    }

    public function destroy($user_id){
        $user=User::find($user_id);
        if ($user) {
            $destination='uploads/category'.$user->dp;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $user->delete();
            return redirect('admin/user')->with('message','User Deleted Successfully');
        }
        else{
            return redirect('admin/user')->with('message','User Id not Found');
        }
    }
  
}
