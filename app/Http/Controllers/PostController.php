<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Library\ApiClass;
use App\Post;
use Illuminate\Support\Facades\Auth;


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


    //ajaxで画像をアップロード
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

    //投稿詳細ページ
    public function detail(Request $request)
    {
        // 画像データ
        $image_data = $request->image_resp;

        return view('post/detail',compact('image_data'));
    }

    //都市ごとに天気を取得する
    public function ajax_get_weather(Request $request)
    {
        $city_num = $request->city_num;

        //TODO: validation check

        $current_weather = new ApiClass();
        $result = (array)$current_weather->getWeather((int)$city_num);

        return $result;
    }

    //画像の投稿
    public function image_upload(Request $request)
    {
        //天気情報の取得
        $city_num = $request->pref;
        $api_weather = new ApiClass();
        $current_weather = $api_weather->getWeather((int)$city_num);


        // 投稿時に画像をclouddinaryにアップロード
        $image_path = $request->image_path;
        $path = public_path() . $image_path;
        Cloudder::upload($path ,null);
        $image_data = Cloudder::getResult();

        // DBにINSERT
        $post = new Post;
        $post->user_id = Auth::id();
        $post->comment = $request->comment ?? ''; //TODO: commentはnull制約外す
        $post->weather = $current_weather->weather->id; //TODO:天気は情報的にidと天気iconは付与する
        $post->temprature = $current_weather->temperature->day ?? 0; //温度はnullもありうる
        $post->image_id = $image_data['public_id'];
        $post->image_path = $image_data['secure_url'];

        $post->save();

        return view('home');
    }

}