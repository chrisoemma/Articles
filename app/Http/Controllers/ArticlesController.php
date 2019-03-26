<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Requests;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::paginate(15);

         return ArticleResource::collection($articles);
    }


    public function create(Request $request)
    {
          $article=Article::create([
               'title'=>$request->title,
               'body'=>$request->body
          ]);

          return new ArticleResource($article);
    }

     public function update(Request $request,$id){


             $article=Article::findorfail($id);

              $article->title=$request->title;
              $article->body=$request->body;

               $article->save();

               return new ArticleResource($article);
              }


    
    public function show($id)
    {
         $article=Article::findorfail($id);

         return new ArticleResource($article);
    }

 
 
    public function destroy($id)
    {
        $article=Article::findorfail($id);

            if(!is_null($article)){
                 $article->delete();


    }
}
}
