<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['name','path'];  
}
