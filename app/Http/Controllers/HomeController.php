<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Library\ApiClass;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //天気情報の取得
        //デフォルトは東京の天気に設定
        $city_num = 1850147;
        $api_weather = new ApiClass();
        $forecast = $api_weather->getWeatherForecast((int)$city_num);
        $current_weather = $api_weather->getWeather((int)$city_num);
        //おすすめの画像を取得
        $post = Post::find(1);

        return view('home',compact('forecast','current_weather','post'));
    }
}
