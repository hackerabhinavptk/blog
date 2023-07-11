<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detail;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = ['title', 'description'];

    public function detail(){
        return $this->hasOne(Detail::class,'post_id','id');
    }
   
}
