<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name']; 
    public function post()
    {
        return $this->hasMany(Post::class, 'post_id');
    }
     public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
