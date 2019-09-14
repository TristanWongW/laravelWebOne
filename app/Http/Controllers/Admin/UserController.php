<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入校验请求类'
use App\Http\Requests\UserInsertRequest;
//导入hash类加密
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索条件
        $k = $request->input('keywords');
        //获取用户数据
        $users = DB::table("user")
                ->where('name','like',"%".$k."%")
                ->where('status','0')
                ->paginate(5);
       
        //加载用户列表
        return view("Admin.User.index",['user'=>$users,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //会员添加页面
        return \view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInsertRequest $request)
    {
        //获取所有参数
        // dd($request->all());
        $data = $request->only(['name','password']);
        //密码hash加密
        $data['password'] = Hash::make($data['password']);
        //封装 status 和token
        $data['status'] = 1;
        $data['token'] = \str_random(50);
        // dd($data);
        //执行添加
        if(DB::table('users')->insert($data)){
            //跳转到会员列表
            return \redirect("/adminuser")->with('success','会员添加成功');
        } else {
            return redirect("/adminuser/create")->with('error','添加失败');
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
        // echo "edit";
        //获取需要修改的数据
        $info = DB::table('users')->where('id','=',$id)->first();
        //加载模板分配数据
        return view('Admin.User.edit',['info'=>$info]);
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
        // echo '修改数据的id为：'.$id;
        //获取修改数据
        $data = $request->only(['name','password']);
        //密码hash加密
        $data['password'] = Hash::make($data['password']);
        //执行
        if (DB::table('users')->where('id','=',$id)->update($data)) {
            return \redirect('/adminuser')->with('success','修改成功');
        } else {
            return \redirect('/adminuser')->with('error','修改成功');
        }
        
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
        // echo $id;
        if (DB::table('users')->where('id',"=",$id)->delete()) {
           return \redirect('/adminuser')->with('success','删除成功');
        } else {
           return \redirect('/adminuser')->with('error','删除失败');
        }
        
    }
}
