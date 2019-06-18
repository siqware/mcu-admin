<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $fillable = ['specialty','po_educated','start_date','end_date','staff_id','attachment'];
}
