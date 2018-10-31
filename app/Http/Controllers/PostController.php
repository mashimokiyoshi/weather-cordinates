<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $path = public_path() . "/storage/" . $image_name;


        file_put_contents($path, $data);


        return response()->json(['success'=>'done']);
    }

    public function detail(Request $request)
    {
        $image_data = $request->image_resp;
        return view('post/detail',compact('image_data'));
    }

}
    