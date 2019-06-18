<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    protected $fillable = ['staff_id','name','dob','job','company'];
}
