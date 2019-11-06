<?php

namespace App\frontmodels;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['name', 'slug', 'status', 'user_id', 'description', 'image'];
    protected $attributes = [
        'hit' => 300
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
