<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Project extends Model
{
    use HasFactory;

    protected $primaryKey = 'project_id';

    protected $fillable = ['titre','short_description','image','description','visible'];
}

