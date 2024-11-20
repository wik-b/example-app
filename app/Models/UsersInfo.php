<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersInfo extends Model
{
    use HasFactory;

    public function comments(){
        return $this->hasMany(Comments::class);
    }

    public function posts(){
        return $this->hasMany(Posts::class);
    }
}
