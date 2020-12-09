<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['titre','date','company','description','visible'];    
}
