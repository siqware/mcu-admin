<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ContinueStudying extends Model
{
    protected $fillable = ['attachment','attachment_date','from_date','to_date','times','is_done','staff_id'];
    public $timestamps = false;
    public function formatDate($value)
    {
        $date = Carbon::parse($value);
        return $date->format('M d,Y');
    }
    public function staff(){
        return $this->belongsTo('App\Staff')->select(['id','khmer_name','profile_picture','phone_num','email']);
    }
}
