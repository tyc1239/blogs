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


/**
 * 前台路由
 */
Route::prefix('index')->group(function(){
    //主页面
    Route::any('index','index\IndexController@index');
    //关于
    Route::get('about','index\IndexController@about');
    //案例
    Route::get('casea','index\IndexController@casea');
    //动态
    Route::get('news','index\IndexController@news');
    //动态详情
    Route::get('details','index\IndexController@details');
    //产品
    Route::get('product','index\IndexController@product');


});



 

/*
*后台管理
*/

//注册
Route::any('/admin/reg','admin\AdminController@reg');//后台管理员注册展示
Route::any('admin/regdo','admin\AdminController@regdo');//注册执行
//后台登录
Route::any('/admin/login','admin\AdminController@login');//后台管理员登录展示
Route::any('/admin/logindo','admin\AdminController@logindo');//执行登录
//退出
Route::any('admin/outlogin','admin\AdminController@outlogin');//退出
//忘记密码
Route::any('admin/forget','admin\AdminController@forget');//修改密码展示页面
Route::any('admin/forgetdo','admin\AdminController@forgetdo');//修改密码执行
Route::any('admin/send','admin\AdminController@send');//发送验证码


//页面管理
//Route::prefix('admin')->group(function(){
Route::prefix('admin')->middleware(['web','CheckLogins'])->group(function(){
    Route::any('index','admin\AdminController@index');//后台主页面展示

//    Route::any('checkemail','admin\AdminController@checkemail'); //验证邮箱唯一
//    Route::any('checkcode','admin\AdminController@checkcode');//注册并验证验证码

    //导航栏
    Route::any('nativeadd','admin\NativeController@nativeadd');//导航栏
    Route::any('nativeadddo','admin\NativeController@nativeadddo');//导航栏添加执行
    Route::any('nativelist','admin\NativeController@nativelist');//导航栏列表展示
    Route::get('nativeupd/{id}','admin\NativeController@nativeupd')->name('edittest');//导航栏修改展示
    Route::any('nativeupddo/{id}','admin\NativeController@nativeupddo');//导航栏修改执行
    Route::any('nativedel','admin\NativeController@nativedel');//导航栏内容删除

    //栏目
    Route::any('columnadd','admin\ColumnController@columnadd');//栏目添加
    Route::any('columnadddo','admin\ColumnController@columnadddo');//栏目添加执行
    Route::any('columnlist','admin\ColumnController@columnlist'); //栏目的图文展示 
    Route::any('columndel','admin\ColumnController@columndel');//栏目的图文删除
    Route::any('columnupddo/{id}','admin\ColumnController@columnupddo');//栏目的修改执行
    Route::get('columnupd/{id}','admin\ColumnController@columnupd')->name('edittestc');//栏目的修改展示
    Route::any('cname','admin\ColumnController@cname');//栏目的搜索 
    Route::any('/by','admin\ColumnController@by');//栏目正序
    Route::any('/desc','admin\ColumnController@desc');//栏目倒序

 
    //栏目详情
    Route::any('detailsadd','admin\DetailsController@detailsadd');//栏目详情添加
    Route::any('detailsadddo','admin\DetailsController@detailsadddo');//栏目详情添加执行
    Route::any('detailslist','admin\DetailsController@detailslist');//栏目详情添加执行
    Route::any('detailsdel','admin\DetailsController@detailsdel');//栏目详情软删除
    Route::get('detailsupd/{id}','admin\DetailsController@detailsupd')->name('edittestd');//栏目详情的修改展示
    Route::any('detailsupddo/{id}','admin\DetailsController@detailsupddo');//栏目的修改执行


    //轮播图
    Route::any('slideadd','admin\SlideController@slideadd');//轮播图添加
    Route::any('slideadddo','admin\SlideController@slideadddo');//轮播图添加执行
    Route::any('slidelist','admin\SlideController@slidelist');//轮播图展示
    Route::any('slidedel','admin\SlideController@slidedel');//轮播图删除



 

    //底部链接
    Route::any('footadd','admin\FootController@footadd');//底部链接添加
    Route::any('footadddo','admin\FootController@footadddo');//底部链接添加执行
    Route::any('footlist','admin\FootController@footlist');//底部链接列表展示
    Route::any('footdel','admin\FootController@footdel');//底部链接删除
    Route::get('footupd/{id}','admin\FootController@footupd')->name('edittestf');//底部链接修改展示
    Route::any('footupddo/{id}','admin\FootController@footupddo');//底部链接修改执行


});

