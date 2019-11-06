<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = ['body', 'name', 'email', 'status'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
