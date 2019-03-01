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

Route::get('/', function () {
    return view('welcome');
});
Route::group(array('before'=>'csrf'),function()
{   
    Route::post('/auth/ajaxLogin',"Web\SignController@ajaxLogin");
    Route::get('/auth/ajaxLogout',"Web\SignController@ajaxLogout");
});

Route::post('/bet/findItem',"Web\BettingController@findItem");
Route::get('/auth/keepSession', 'Web\SignController@keepSession');
Route::get('/auth/ajaxExistIdentify',"Web\SignController@ajaxExistIdentify");
Route::prefix('admin')->group(function() {
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Admin\LoginController@login')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.login');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/register', 'Admin\LoginController@register')->name('admin.register');

    //관리자 회원테이블관련 라우팅
    Route::get('/member', 'Admin\MemberController@memberManage');
    Route::post('/member/deleteAllMember', 'Admin\MemberController@deleteAllMember');
    Route::post('/member/deleteMember', 'Admin\MemberController@deleteMember');
    Route::get('/member/addMember', 'Admin\MemberController@addMember');
    Route::post('/member/addMember', 'Admin\MemberController@addMember');
    Route::get('/member/editMember', 'Admin\MemberController@editMember');
    Route::post('/member/editMember', 'Admin\MemberController@editMember');
    Route::get('/member/changePassword', 'Admin\MemberController@changePassword');
    Route::post('/member/changePassword', 'Admin\MemberController@changePassword');

    Route::get('/item', 'Admin\ItemController@itemManage');
    Route::post('/item/deleteAllItem', 'Admin\ItemController@deleteAllItem');
    Route::post('/item/deleteItem', 'Admin\ItemController@deleteItem');
    Route::get('/item/addItem', 'Admin\ItemController@addItem');
    Route::post('/item/addItem', 'Admin\ItemController@addItem');
    Route::post('/item/addList', 'Admin\ItemController@addList');
    Route::get('/item/editItem', 'Admin\ItemController@editItem');
    Route::post('/item/editItem', 'Admin\ItemController@editItem');

    Route::get('/setting/changePassword', 'Admin\SettingController@changePassword');
    Route::post('/setting/changePassword', 'Admin\SettingController@changePassword');
    
});