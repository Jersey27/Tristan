<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class langage extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['titre','description','visible'];
}
