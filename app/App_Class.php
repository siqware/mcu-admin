<?php
/**
 * Created by PhpStorm.
 * User: roeun
 * Date: 5/11/19
 * Time: 9:38 PM
 */

namespace App;


use Carbon\Carbon;

class App_Class
{
    public static function formatDate($value)
    {
        $date = Carbon::parse($value);
        return $date->format('M d,Y');
    }
}
