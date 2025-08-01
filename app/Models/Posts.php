<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'post', 'image',];

    public function comments()
    {
    return $this->hasMany(Comments::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}