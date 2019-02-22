<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * ユーザープロフィールの表示
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $request->user()は認証済みユーザーのインスタンスを返す
        $user_data = $request->user();
        return view('setting/index',compact('user_data'));
    }

    /**
     * ユーザープロフィールの更新
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        // $request->user()は認証済みユーザーのインスタンスを返す
    }
}
