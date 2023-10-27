<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */

     public function index() : View 
     {
        $posts = Posts::orderBy("created_at","desc")->paginate(10);
        return view('home',array(
             "posts" => $posts
        ));
     }

     public function viewPost($url) : View
     {
        $post = Posts::where("url", $url)->first();
        return view('post',array(
            "post" => $post
        ));
        
     }

}
