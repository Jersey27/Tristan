<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    protected $primary_key = 'id';

    protected $fillable = ['titre','date','image','description','visible'];
}
