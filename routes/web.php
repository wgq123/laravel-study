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

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/study', 'StudyController@index');
//Route::get('/member/info', 'MemberController@info');
Route::get('/member/info/{id}', ['uses'=>'MemberController@info']);

//参考链接：https://www.imooc.com/video/12495
/******** 基础路由 *********/
//测试get请求
Route::get('/basic1', function () {
    return 'hellow world';
});

//测试psot请求 [不能通过url请求]
Route::post('/basic2', function () {
    return 'basic2';
});

/******** 多请求路由 *********/
//match
//Route::match(['get', 'post'], '/multy1', function () {
//    return 'multy1';
//});
//
Route::any('/multy2', function () {
    return 'multy2';
});

/******** 路由参数 *********/
//必传参数
//Route::get('user/{id}', function ($id){
//    return 'User-id-' .$id;
//});

//默认参数
//Route::get('user/{name?}', function ($name='wgq'){
//    return 'User-name-' .$name;
//});

//通过where加验证规则
//Route::get('user/{name?}', function ($name = 'wgq') {
//    return 'User-name-' . $name;
//})->where('name', '[A-Za-z]+');

//多个参数,加验证规则
//Route::get('user/{id}/{name?}', function ($id, $name = 'wgq') {
//    return 'User-id-' . $id . '-name-' . $name;
//})->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);


/******** 路由别名 *********/
//别名可以 使用route函数生成别名配置中对应的url  todo:场景不是很理解
//Route::get('user/center', ['as' => 'center', function () {
//    return  route('center') ;
//}]);

/******** 路由群组 *********/
//可以简单的理解为路由群组就是给路由加前缀的
Route::group(['prefix'=> 'member'], function (){
    Route::get('user/center', ['as' => 'center', function () {
        return  route('center') ;
    }]);

    Route::any('/multy2', function () {
        return 'member-multy2';
    });
});

/******** 在路由中输出视图 *********/
Route::get('/vtest', function (){
    return view('vtest',['name'=>'wgq']);
});