<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    use Sluggable;
    protected $fillable = ['name', 'status', 'user_id', 'description', 'image', 'slug'];
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ''
            ]
        ];
    }
}
