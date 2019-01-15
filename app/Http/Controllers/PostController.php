<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Library\ApiClass;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('post/new');
    }


    public function ajaxUpload(Request $request)
    {
        $data = $request->image;


        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name= time().'.png';
        $storage_path = "/storage/" . $image_name;
        $path = public_path() . $storage_path;


        file_put_contents($path, $data);


        return $storage_path;
    }

    public function detail(Request $request)
    {
        // 画像データ
        $image_data = $request->image_resp;

        // 天気情報取得（デフォルトは東京）
        $current_weather = new ApiClass();
        var_dump($current_weather->getWeather('tokyo'));

        return view('post/detail',compact('image_data'));
    }

    public function image_upload(Request $request)
    {
        $image_path = $request->image_path;
        $path = public_path() . $image_path;
        Cloudder::upload($path ,null);
        $data = Cloudder::getResult();


        return view('home');
    }

}
    