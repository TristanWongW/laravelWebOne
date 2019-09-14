<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //判断session信息
        if ($request->session()->has('name')) {
            // 对应后台权限信息 对比
            // 4. 和session权限信息做对比
            // 获取访问的控制器和方法
            $method = $request->route()->getActionMethod();
            // echo $method;
            $actions=explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
            $func=explode('@', $actions[count($actions)-1]);
           
            $controller=$func[0]; //获取的控制器名字
            $actionName=$func[1]; //获取方法名字
            // echo $controller."--".$actionName;
            //获取当前登录用户的权限列表
            $nodelist = \session('nodelist');
            //开始权限对比
            if (empty($nodelist[$controller]) || !in_array($method,$nodelist[$controller])) {
                return redirect('/admins')->with('error','对不起，权限不足，不能访问该模块');
            }


            return $next($request);
        } else {
            return redirect('/adminlogin/create');
        }
        
    }
}
