<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class competence extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['titre','progres','description'];    
}
