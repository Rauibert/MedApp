<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Med extends Model
{
    protected $fillable = ['title','description','slug', 'urlImage', 'status'];
}
