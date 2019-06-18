<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
Auth::routes();
Route::group(['middleware'=>['web','auth']],function (){
    Route::get('/media', function () {return view('media');})->name('media.index');
    Route::get('/', function () {return view('staff.index');});
    /*Staff*/
    Route::resource('staff','StaffController');
    Route::post('staff-json','StaffController@staff_json_view')->name('staff.json');
    Route::post('staff-children/{id}','StaffController@children_json')->name('staff.children');
    Route::post('staff-children-add/{id}','StaffController@add_child')->name('staff-add.children');
    Route::get('staff-export','StaffController@export_staff')->name('staff.export');
    Route::post('staff-export-json','StaffController@export_staff_json')->name('staff.export.json');
    Route::get('/home', 'HomeController@index')->name('home');
    /*Place of birth*/
    Route::get('provinces','PlaceOfBirthController@provinces')->name('provinces.json');
    Route::get('districts/{id}','PlaceOfBirthController@districts')->name('districts.json');
    Route::get('communes/{id}','PlaceOfBirthController@communes')->name('communes.json');
    Route::get('villages/{id}','PlaceOfBirthController@villages')->name('villages.json');
    /*Children*/
    Route::post('children-delete/{id}','StaffController@child_delete')->name('child.delete');
    /*Children*/
    Route::get('staff-notification-count','NotificationController@total_notification_count')->name('staff.notification.count');
    Route::get('notification-staff','NotificationController@index')->name('notification.staff');
    Route::put('notification-staff-update-relax/{id}','NotificationController@update_relax')->name('notification.relax.update');
    Route::put('notification-staff-update-conti_studying/{id}','NotificationController@update_conti_studying')->name('notification.conti.update');
});
