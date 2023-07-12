<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';

    public function author(){
        return $this->hasOne(User::class,'id','user_id');
    }
   
  
    
}
