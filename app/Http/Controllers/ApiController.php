<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts; 
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello World!',
        ]);
    }

    public function getArticles(Request $request)
    {

            //Get pagination data
            $page = $request->input('page', 1);
            $limit = 5;
            $offset = ($page - 1) * $limit;

            //Get articles
            $articles = Posts::select("url","title","content", "created_at")->offset($offset)->limit($limit)->orderBy("created_at","desc")->get();

            $articlesArray = [];
            foreach($articles as $article){
                // remove html tags
                $article->content = strip_tags($article->content);
                $short_content = Str::words($article->content, 60, '...');

                $articlesArray[] = [
                    "url" => $article->url,
                    "title" => $article->title,
                    "short_content" => $article->short_content,
                    "created_at" => date("d/M/y", strtotime($article->created_at)),
                ];
            }
            //Return articles
            return response()->json([
                'articles' => $articlesArray,
                'page' => $page,
                'totalPages' => ceil(Posts::count() / $limit)
            ]);
    }

    public function getArticle($url)
    {
        //Get article
        $article = Posts::where("url", $url)->first();
        //Check if article exists
        if(!$article){
            return response()->json([
                'message' => 'Article not found'
            ], 404);
        }

        $article->published_at = date("d/M/y", strtotime($article->created_at));
        //Return article
        return response()->json([
            'article' => $article
        ]);
    }

}
