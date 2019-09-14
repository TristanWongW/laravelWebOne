<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取keywords
        $k = $request->input('keywords');
        //获取分类数据
        // $category = DB::table('category')->get();
        // $category = DB::select('SELECT *,concat(path,",",id) as paths FROM category order by paths');
        //连贯方法 调整类别顺序
        $category = DB::table('category')
                            ->select(DB::raw('*, concat(path,",",id)as paths'))
                            ->orderBy('paths')
                            ->where('name','like',"%".$k."%")
                            ->paginate(5);
        //分隔符添加
        foreach ($category as $key => $value) {
            //获取path
            $path = $value->path;
            // echo $path;
            //分割成数组
            $arr = \explode(',',$path);
            // dump($arr);
            //获取逗号个数
            $len = \count($arr)-1;
            //加分隔符 str_repeat 重复字符串函数
            $category[$key]->name = \str_repeat('|---❤',$len).$value->name;
        }
        //加载分类模板
        return view('Admin.Category.index',['category' => $category,'request'=>$request->all()]);
    }

    // 调整类别顺序  加分隔符 静态方法 加快程序速度
    public static function getCates(){
        $category = DB::table('category')
                            ->select(DB::raw('*, concat(path,",",id)as paths'))
                            ->orderBy('paths')
                            ->get();
        //分隔符添加
        foreach ($category as $key => $value) {
            //获取path
            $path = $value->path;
            // echo $path;
            //分割成数组
            $arr = \explode(',',$path);
            // dump($arr);
            //获取逗号个数
            $len = \count($arr)-1;
            //加分隔符 str_repeat 重复字符串函数
            $category[$key]->name = \str_repeat('|---❤',$len).$value->name;
        }
        return $category;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $category = self::getCates();
        //加载添加模板
        return view('Admin.Category.add',['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //分类添加
        $data = $request->only(['name','pid']);
        // dd($request->all());
        //获取pid
        $pid = $request->input('pid');
        if ($pid == 0) {
            //添加的是顶级分类
            // dd($data);
            //拼接path
            $data['path'] = '0';
            // dd($data);

        } else {
            //添加的是子类
            //获取父类信息
            $info = DB::table('category')->where('id','=',"$pid")->first();
            // dd($info);
            //拼接path 父类的path和父类的id组成
            $data['path'] = $info->path.",".$info->id;
            // dd($data);

        }

        //执行添加
        if (DB::table('category')->insert($data)) {
            return redirect('/admincategory')->with('success','成功');
        } else{
            return redirect('/admincategory')->with('error','失败');
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
        //获取id 
        //获取当前删除类别的子类个数
        $num = DB::table('category')->where('pid','=',$id)->count();
        // echo $num;
        if ($num > 0) {
            return back()->with('error','请先删除子类');
        }
        
        //直接删除当前类别
        if (DB::table('category')->where('id','=',$id)->delete()) {
            return redirect('/admincategory')->with('success','删除成功');
        }

    }
}
