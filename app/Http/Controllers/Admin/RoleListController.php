<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RoleListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示角色列表
        $role = DB::table('role')->get();

        return view('Admin.Rolelist.index',['role'=>$role]);
    }

    /* 
        权限分配
    */
    public function auth($id){
        // echo $id;
        //获取角色信息
        $role = DB::table('role')->where('id','=',$id)->first();
        //获取所有权限信息
        $node = DB::table('node')->get();
        //获取当前角色所具有的的权限信息
        $data = DB::table('role_node')->where('rid','=',$id)->get();
        if (count($data)) {
            //遍历
            foreach($data as $v){
                $nids[] = $v->nid;
            }
            //加载模板
            return  view('Admin.Rolelist.auth',['role'=>$role,'node'=>$node,'nids'=>$nids]);
        } else {
            return  view('Admin.Rolelist.auth',['role'=>$role,'node'=>$node,'nids'=>array()]);
        }
        
    }

    /* 
        保存权限
    */
    public function saveauth(Request $request){
        //获取分配的权限id
        $nids=$_POST['nids'];
        //获取对应得角色id
        $rid=$request->input('rid');
        // echo "<pre>";
        // var_dump($nids);
        //把原有权限删除
        DB::table("role_node")->where("rid",'=',$rid)->delete();
        //遍历
        foreach($nids as $v){
            //封装添加的数据
            $data['rid']=$rid;
            $data['nid']=$v;
            DB::table("role_node")->insert($data);
        }

        return redirect("/adminrole")->with("success","权限分配成功");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
