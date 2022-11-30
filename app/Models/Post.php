<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
   protected $table='posts';
   protected $fillable=[
    'category_id',
    'name',
    'description',
    'yt_iframe',
    'meta_tittle',
    'meta_description',
    'meta_keyword',
    'navbar_status',
    'status',
    'created_by',
    
];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
        
    }
    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
        
    }



}
