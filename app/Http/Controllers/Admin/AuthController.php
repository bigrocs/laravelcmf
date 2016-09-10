<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 系统配置控制器.
 */
class AuthController extends Controller
{
    /**
     * [getLogin 用户登录页面].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-22T16:02:14+0800
     *
     * @return [type] [description]
     */
    public function getLogin()
    {
        view()->share(['metaTitle' => '后台登录']);

        return view('admin.login');
    }
    /**
     * [postLogin 用户登录].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-22T16:02:08+0800
     *
     * @param Request $request [description]
     *
     * @return [type] [description]
     */
    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password]) ||
            Auth::attempt(['mobile' => $request->username, 'password' => $request->password]) ||
            Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            return redirect(route('admin.index')); //登录成功返回
        } else {
            echo '账号密码错误';
        }
    }
    /**
     * [getLogout 用户退出].
     *
     * @Author   BigRocs                  BigRocs@qq.com
     * @DateTime 2016-07-22T16:01:48+0800
     *
     * @return [type] [description]
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect(route('admin.login')); //退出成功登录页面
    }
}
