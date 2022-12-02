<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $table='comments';
    protected $fillable = [
        'post_id',
        'user_id',
        'comment_body',

    ];
    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}

