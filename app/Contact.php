<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    
    use HasFactory;

    protected $primaryKey = 'contact_id';
    
    public $timestamps = true;

    protected $fillable = ['name','society','mail','subject','message','unread'];
	
}
