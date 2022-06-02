<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Carbon\Carbon;
use App\Category;
use App\Tag;

class FrontController extends Controller
{

    public function __construct(){
        Carbon::setLocale('es');
    }

    public function index(Request $request){
    	
            $from = Carbon::parse($request->from)
                 ->startOfDecade()        // 2018-09-29 00:00:00.000000
                 ->toDateTimeString(); // 2018-09-29 00:00:00

            $to = Carbon::parse($request->to)
                 ->endOfDay()          // 2018-09-29 23:59:59.000000
                 ->toDateTimeString(); // 2018-09-29 23:59:59   

            $articles  = Article::whereBetween('created_at', [$from, $to])->Search($request->title)->orderBy('created_at', 'DESC')->paginate(6);

            $articles->each(function($articles){
            $articles->category;
            $articles->user;
            $articles->images;
        });
        	
    	return view('front.index')
    		->with('articles', $articles);
    }

    public function searchCategory($name){
        $category = Category::SearchCategory($name)->first();
        $articles = $category->articles()->paginate(6);
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
            $articles->images;
        });
        return view('front.index')
            ->with('articles', $articles);
    }

    public function searchTag($name){
        $tag = Tag::SearchTag($name)->first();
        $articles = $tag->articles()->paginate(6);
        $articles->each(function($articles){
            $articles->tag;
            $articles->user;
            $articles->images;
        });
        return view('front.index')
            ->with('articles', $articles);
    }

    public function viewArticle($slug){
        $article = Article::findBySlugOrFail($slug);
        $article->category;
        $article->user;
        $article->tags;
        $article->images;
        return view('front.article')->with('article', $article);
    }
}
