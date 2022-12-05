<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    //
    public function index(){
        $setting=Setting::find(1);
        return view('admin.setting.index',compact('setting'));
    }
    public function store(Request $request){
        
       
        $validator=Validator::make($request->all(),[
        'website_name'=>'required|max:255',
        'logo'=>'nullable',
        'favicon'=>'nullable',
        'description'=>'nullable',
        'meta_title'=>'nullable',
        'meta_keyword'=>'nullable',
        'meta_description'=>'nullable',
        ]);
        if ($validator->fails()) {
            return redirect('admin/setting')->with('message','ALl fields are mandatory');

        }
        $setting=Setting::where('id','1')->first();
        if ($setting) {
            $setting->website_name=$request->website_name;
            if ($request->hasFile('logo')) {
                $destination='uploads/setting'.$setting->logo;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file=$request->file('logo');
                $filenames=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/setting',$filenames);
                $setting->logo=$filenames;
            }
            if ($request->hasFile('facicon')) {
                $destination='uploads/setting'.$setting->favicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file=$request->file('favicon');
                $filename=time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/setting',$filename);
                $setting->favicon=$filename;
            }
            $setting->description=$request->description;
            $setting->meta_title=$request->meta_title;
            $setting->meta_keyword=$request->meta_keyword;
            $setting->meta_description=$request->meta_description;
            $setting->save();
            return redirect('admin/setting')->with('message','Setting Updated Succesfully');
        }
        else{
           
            
            $setting=new Setting;
            $setting->website_name=$request->website_name;
            if ($request->hasFile('logo')) {
                $files=$request->file('logo');
                $filenames=time().microtime().'.'.$files->getClientOriginalExtension();
                // dd($filename);
                $files->move('uploads/setting/',$filenames);
                $setting->logo=$filenames;
                // dd($filenames);
            }
            if ($request->hasFile('favicon')) {
                $file=$request->file('favicon');
                $filename=time().microtime().'.'.$file->getClientOriginalExtension();
                
                $file->move('uploads/setting/',$filename);
               
                $setting->favicon=$filename;
                // dd($filename);
            }
            $setting->description=$request->description;
            $setting->meta_title=$request->meta_title;
            $setting->meta_keyword=$request->meta_keyword;
            $setting->meta_description=$request->meta_description;
            $setting->save();
            return redirect('admin/setting')->with('message','Setting Added Succesfully');

        }




    }
}
