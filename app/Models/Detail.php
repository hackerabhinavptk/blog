<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Detail extends Model
{
    use HasFactory;
    protected $table = 'detail';
    protected $fillable = ['status', 'tag', 'type'];
    protected $guarded = ['image'];
 
    public function post(){
        return $this->belongsTo(\App\Models\Post::class,'post_id','id');
    }
   // belongsto just reverse the relation ship there is also no need to show the  ,'post_id','id' it automatically reverse the relation define3d in post
}
