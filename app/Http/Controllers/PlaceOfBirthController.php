<?php

namespace App\Http\Controllers;

use App\Op_Commune;
use App\Op_District;
use App\Op_Province;
use App\Op_Village;
use Illuminate\Http\Request;

class PlaceOfBirthController extends Controller
{
    public function provinces(){
        $provinces = Op_Province::all();
        $province_data = [];
        foreach ($provinces as $province){
            $province_data[] = [
                'name'=>$province->name,
                'value'=>$province->id,
                'text'=>$province->name,
                'selected'=>true,
            ];
        }
        $province_format = [
            'success'=>true,
            'results'=>$province_data,
        ];
        return $province_format;
    }
    public function districts($id){
        $districts = Op_District::where('provinces_id','=',$id)->get();
        $district_data = [];
        foreach ($districts as $district){
            $district_data[] = [
                'name'=>$district->name,
                'value'=>$district->id,
                'text'=>$district->name,
            ];
        }
        $district_format = [
            'success'=>true,
            'results'=>$district_data,
        ];
        return $district_format;
    }
    public function communes($id){
        $communes = Op_Commune::where('district_id','=',$id)->get();
        $commune_data = [];
        foreach ($communes as $commune){
            $commune_data[] = [
                'name'=>$commune->name,
                'value'=>$commune->id,
                'text'=>$commune->name,
            ];
        }
        $commune_format = [
            'success'=>true,
            'results'=>$commune_data,
        ];
        return $commune_format;
    }
    public function villages($id){
        $villages = Op_Village::where('commune_id','=',$id)->get();
        $village_data = [];
        foreach ($villages as $village){
            $village_data[] = [
                'name'=>$village->name,
                'value'=>$village->id,
                'text'=>$village->name,
            ];
        }
        $village_format = [
            'success'=>true,
            'results'=>$village_data,
        ];
        return $village_format;
    }
}
