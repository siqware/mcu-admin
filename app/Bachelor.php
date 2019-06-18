<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bachelor extends Model
{
    protected $fillable = ['specialty','po_educated','start_date','end_date','staff_id','attachment'];
}
