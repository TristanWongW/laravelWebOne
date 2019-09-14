<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入校验请求类'
use App\Http\Requests\AdminuserInsertRequest;
//导入hash类加密
use Hash;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取列表信息
        $list = DB::table('admin_users')->paginate(5);
        // dd($list);
        return view('Admin.Adminuser.index',['list'=>$list,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板
        return view('Admin.Adminuser.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminuserInsertRequest $request)
    {
        //
        //获取所有参数
        // dd($request->all());
        $data = $request->only(['name','password']);
        //密码hash加密
        $data['password'] = Hash::make($data['password']);
         if(DB::table('admin_users')->insert($data)){
            //跳转到列表
            return \redirect("/adminsuser")->with('success','管理员添加成功');
        } else {
            return redirect("/adminsuser/create")->with('error','添加失败');
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

    //Ajax管理员删除
    public function delete(Request $request){
        //获取id
        $id = $request->input('id');
        //执行删除
        if (DB::table('admin_users')->where('id','=',"$id")->delete()) {
            echo 1;
        }
    }

    //角色分配
    public function rolelist($id){
        // echo $id;
        //获取当前管理员信息
        $info = DB::table('admin_users')->where('id','=',$id)->first();
        //获取所有的角色信息
        $role = DB::table('role')->get();
        //获取当前用户所具有的角色信息
        $data = DB::table('user_role')->where('uid','=',$id)->get();
        if (count($data)) {
            // 把对象转换成数组
            foreach ($data as $value) {
                $rids[] = $value->rid;
            }
            // 加载分配角色模板
            return view('Admin.Adminuser.rolelist',['info'=>$info,'role'=>$role,'data'=>$rids]);
        } else {
            return view('Admin.Adminuser.rolelist',['info'=>$info,'role'=>$role,'data'=>array()]);
        }
        
    }

    // 保存角色
    public function rolesave(Request $request){
        // \dump($_POST['rid']);
        // 获取角色id
        $role = $_POST['rid'];
        // 获取管理员id
        $uid = $request->input('uid');
        // dd($uid);
        // 删除管理员已有的角色信息
        DB::table('user_role')->where('uid','=',$uid)->delete();

        $data['uid'] = $uid;
        $data['rid'] = $role;
        DB::table('user_role')->insert($data);
        return \redirect('/adminsuser')->with("success",'角色分配成功');
    }

}
