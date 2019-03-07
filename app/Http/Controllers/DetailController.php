<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class DetailController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $image_id = $request->image_id;
        $image_data = Post::where('image_id', $image_id)->first();

        return view('detail/index',compact('image_data'));
    }

}
