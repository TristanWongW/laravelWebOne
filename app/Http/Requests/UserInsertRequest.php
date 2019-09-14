<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInsertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //表单授权
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //设置会员校验规则
    public function rules()
    {
        return [
            //设置会员名 密码等规则
            //用户名
            'name' => 'required|regex:/\w{4,8}/|unique:users',
            //密码
            'password' => 'required|regex:/\w{6,16}/',
            //确认密码
            'repassword' => 'required|regex:/\w{6,16}/|same:password'
        ];
    }

    //自定义错误信息
    public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.regex' => '用户名必须是4-8位的任意字母下划线',
            'name.unique' => '用户名已经存在',
            'password.required'  => '密码不能为空',
            'password.regex'  => '密码长度必须大于等于6位',
            'repassword.required'  => '密码不能为空',
            'repassword.regex'  => '密码长度必须大于等于6位',
            'repassword.same'  => '两次输入的密码不一致',
        ];
    }
}
