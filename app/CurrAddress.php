<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrAddress extends Model
{
    protected $table = 'curr_addresses';
    protected $primaryKey = 'id';
    protected $fillable = ['province_id','district_id','commune_id','village_id','staff_id'];
}
