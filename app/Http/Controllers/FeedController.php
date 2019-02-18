<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Favorite;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $object_posts = new Post;
        $posts = $object_posts->orderBy('created_at', 'DESC')
               ->take(20)
               ->get();
        foreach($posts as $post){
            foreach($post->favorite->all() as $favorite){
                $post->my_favorite = $favorite->user_id === Auth::id() ? 'favorite' : '';
            }
        }

        return view('feed/index',compact('posts'));
    }

    public function ajax_register_favorite(Request $request)
    {
        $result = [
            'change' => true,
        ];
        $post_id = $request->post_id;
        $favoriteRows = Favorite::where('post_id', $post_id)->where('user_id', Auth::id());

        if (!empty($favoriteRows->get()[0]))
        {
            $favoriteRows->delete();
            return $result;
        }
        $object_favorites = new Favorite;
        $object_favorites->user_id = Auth::id();
        $object_favorites->post_id = $post_id;

        $object_favorites->save();

        return $result;
    }
}
