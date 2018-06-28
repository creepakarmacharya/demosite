<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 
class Cms extends Model
{
     protected $table = 'cms';
     protected $fillable = ['id', 'title','content', 'created_at', 'updated_at'];
}

