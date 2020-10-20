<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'project_id';

    protected $fillable = ['titre','short_description','image','description'];

    public function paragraphs() {
        return $this->hasMany('paragraph');
    }
}

