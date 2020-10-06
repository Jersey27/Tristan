<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'contact_id';
    
    public $timestamps = true;

    protected $fillable = ['name','society','mail','subject','message'];
	
}
