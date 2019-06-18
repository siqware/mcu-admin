<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $primaryKey = 'id';
    public function pob_address(){
        return $this->hasOne('App\PobAddress');
    }
    public function relax(){
        return $this->hasOne('App\Relax');
    }
    public function continue_studying(){
        return $this->hasOne('App\ContinueStudying');
    }
    public function curr_address(){
        return $this->hasOne('App\CurrAddress');
    }
    public function bachelor(){
        return $this->hasOne('App\Bachelor');
    }
    public function master(){
        return $this->hasOne('App\Master');
    }
    public function doctor(){
        return $this->hasOne('App\Doctor');
    }
    public function spouse(){
        return $this->hasOne('App\Spouse');
    }
    public function children(){
        return $this->hasMany('App\Child');
    }
    public function child(){
        return $this->hasOne('App\Child');
    }
    public function mother(){
        return $this->hasOne('App\Mother');
    }
    public function father(){
        return $this->hasOne('App\Father');
    }
    public function pob_province(){
        return $this->belongsToMany('App\Op_Province','pob_addresses','staff_id','province_id');
    }
    public function pob_district(){
        return $this->belongsToMany('App\Op_District','pob_addresses','staff_id','district_id');
    }
    public function pob_commune(){
        return $this->belongsToMany('App\Op_Commune','pob_addresses','staff_id','commune_id');
    }
    public function pob_village(){
        return $this->belongsToMany('App\Op_Village','pob_addresses','staff_id','village_id');
    }

    public function province(){
        return $this->belongsToMany('App\Op_Province','curr_addresses','staff_id','province_id');
    }
    public function district(){
        return $this->belongsToMany('App\Op_District','curr_addresses','staff_id','district_id');
    }
    public function commune(){
        return $this->belongsToMany('App\Op_Commune','curr_addresses','staff_id','commune_id');
    }
    public function village(){
        return $this->belongsToMany('App\Op_Village','curr_addresses','staff_id','village_id');
    }
//    Notification
    public function relax_notification(){
        return $this->hasOne('App\Relax');
    }
}
