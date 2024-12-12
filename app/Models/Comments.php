<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Grammars\PostgresGrammar;


class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'author_id', 'comment'];

    public function post()
    {
    return $this->belongsTo(Posts::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
