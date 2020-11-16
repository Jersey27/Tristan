<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['information_key','information_data'];
}
