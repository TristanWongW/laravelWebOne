<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //退出
    public function index(Request $request)
    {
        //销毁session
        $request->session()->pull('name');
        return \redirect('/adminlogin/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载登录模板
        return view('Admin.AdminLogin.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取参数
        // dd($request->all());
        //检测用户名
        if ($user = DB::table('admin_users')
                    ->where('name','=',$request->input("name"))
                    ->first()) 
        {
                //检测密码
            if (Hash::check($request->input('password'), $user->password)) {
                // echo '密码正确';
                //跳转到后台首页
                //把登陆用户名写入到seesion
                \session(['name' => $user->name]);
                // 1. 获取当前登录用户所有的权限信息  node表信息 控制器名字 方法名字
                $list = DB::select("select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid = rn.rid and rn.nid = n.id and uid={$user->id}");
                // dump($list);die;
                // 2. 权限初始化  让所有管理员都能有访问后台的权限
                $nodelist['AdminsController'][] = "index";
                //遍历追加
                foreach ($list as $value) {
                    //把list 权限列表写入到$nodelist中
                    $nodelist[$value->mname][] = $value->aname;
                    //如果权限列表里面有create 方法 追加 store
                    if ($value->aname == "create") {
                        $nodelist[$value->mname][] = 'store';
                    }
                    //如果权限列表有 edit方法 追加 update
                    if ($value->aname == 'edit') {
                        $nodelist[$value->mname][] = 'update';
                    }
                }
                // \var_dump($nodelist);die();
                // 3. 把初始化的权限信息 放置在session中
                session(['nodelist'=>$nodelist]);
                // 4. 和session权限信息做对比

                //跳转到后台首页
                return \redirect('/admins');
            } else {
                // echo '密码错误';
                return redirect("/adminlogin/create")->with("error",'密码错误');
            }
        }else{
            return redirect("/adminlogin/create")->with("error",'用户名错误');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
