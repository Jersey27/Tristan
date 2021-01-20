<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class experience extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['titre','date','company','description','visible'];    
}
