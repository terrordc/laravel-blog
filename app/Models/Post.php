<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
        return $this->hasMany(Tags::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
//     protected $appends = ['name', 'email'];

//     public function user(){

//         return $this->belongsTo('App\User');
    
//     }

//     public function getNameAttribute(){

//     return $this->user->username;

// }
// public function getEmailAttribute(){

//     return $this->user->email;

// }
}
