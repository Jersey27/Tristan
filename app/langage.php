<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class langage extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['titre','description','visible'];
}
