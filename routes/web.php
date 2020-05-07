<?php

use Illuminate\Support\Facades;

//视图路由
#登陆权限路由
Route::get('login','LoginController@index')->name('login');
Route::post('login','LoginController@login');
Route::get('register','LoginController@register');
Route::group(['middleware'=>['CheckUser']],function (){
    Route::get('/','FamilyController@index')->name('home');
    Route::get('manage','FamilyController@manage');
    Route::any('delete','FamilyController@delete');
    Route::any('totalItem','FamilyController@totalItem');
    Route::any('append','FamilyController@append');
    Route::any('about','FamilyController@about');
    Route::any('upload','FamilyController@upload');
    Route::any('queryPartData','FamilyController@queryPartData');
    Route::any('insertOne','FamilyController@insertOne');
    Route::any('upOneData','FamilyController@upOneData');
    Route::any('upOneImage','FamilyController@upOneImage');
    Route::any('getUpTimeById','FamilyController@getUpTimeById');
    Route::get('getOneImageById','FamilyController@getOneImageById');
    #测试路由
    Route::post('test','TestController@index');
});

//注册路由

#测试路由
Route::get('test','TestController@index');
Route::post('loginTest','TestController@loginTest');
Route::get('userList','TestController@userList');
Route::post('adduser','TestController@addUser');
