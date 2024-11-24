<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'name', 'post'];

    public function comments()
    {
    return $this->hasMany(Comments::class);
    }

    public function author_id()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(User::class);
    }

}