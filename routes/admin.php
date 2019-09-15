<?php
/* 
    resource 资源型路由 要伪造请求方法{{method_field("DELETE")}}
*/
//后台登录页面
Route::resource('/adminlogin','Admin\AdminLoginController');
Route::group(['middleware' => 'adminlogin'], function(){
    //搭建后台首页(模板继承)
    Route::resource('/admins','Admin\AdminsController');
    //后台用户模块
    Route::resource('/adminuser','Admin\UserController');
    //后台管理员模块
    Route::resource('/adminsuser','Admin\AdminuserController');
    //普通路由 管理员Ajax删除
    Route::get('/admindelete','Admin\AdminuserController@delete');
    //权限分配 角色分配
    Route::get('/adminrolelist/{id}','Admin\AdminuserController@rolelist');
    //权限分配 角色保存
    Route::post('/adminsaverole','Admin\AdminuserController@rolesave');

    //角色管理
    Route::resource('/adminrole','Admin\RoleListController');
    //分配权限
    Route::get('/adminauth/{id}','Admin\RoleListController@auth');
    //权限保存
    Route::post('/adminsaveauth','Admin\RoleListController@saveauth');

    //节点管理
    Route::resource('/adminnodelist','Admin\NodelistController');
    //后台无限分类模块
    Route::resource('/admincategory','Admin\CategoryController');
});







?>