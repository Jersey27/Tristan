<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class formation extends Model
{

    use HasFactory;

    protected $primary_key = 'id';

    protected $fillable = ['titre','date','description','visible'];
}
