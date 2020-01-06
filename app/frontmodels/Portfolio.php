<?php

namespace App\frontmodels;;

use Illuminate\Database\Eloquent\Model;


class Portfolio extends Model
{
    protected $fillable = ['name', 'tag', 'link', 'description', 'image'];
}
