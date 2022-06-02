<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Tag;
use App\Image;
use App\Article;

class ArticlesController extends Controller
{
    public function index(Request $request){
        $articles = Article::search($request->title)->orderBy('id', 'DESC')->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });
        return view('admin.articles.index')
            ->with('articles', $articles);
    } 

    public function create(){
        //Creamos las variables para mostrar en la vista los tags y categorias que tenemos registradas
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id')->all(); //El metodo lists se reemplaza por pluck
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id')->all();

        return view('admin.articles.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    public function store(ArticleRequest $request){
        //Manipulacion de imagenes
        if ($request->file('image')){
            $file = $request->file('image');
            $name = 'bloguts_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/articles/';
            /**************PRODUCCION**************
            $path = '/var/www/html/blog/images/articles';
            ****************************************/
            $file->move($path, $name);
        } 
            $article = new Article($request->all());
            $article->user_id = \Auth::user()->id;
            $article->save();

            $article->tags()->sync($request->tags);

            $image = new Image();
            $image->name = $name;
            $image->article()->associate($article);
            $image->save();

            Flash::success('El articulo ' . $article->title . ' se ha creado de manera correcta!');
            return redirect()->route('articles.index');
        }

        public function edit($id){
            $article = Article::find($id);
            $article->category;
            $categories = Category::orderBy('name', 'DESC')->pluck('name', 'id'); //El metodo lists se reemplaza por pluck
            $tags = Tag::orderBy('name', 'DESC')->pluck('name', 'id');
            $my_tags = $article->tags->pluck('id')->ToArray(); 
            return view('admin.articles.edit')
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('article', $article)
            ->with('my_tags', $my_tags);
        }

        public function update(Request $request, $id){
            $article = Article::find($id);
            $article->fill($request->all());
            $article->save();

            $article->tags()->sync($request->tags);
            Flash::warning('Se ha editado el articulo ' . $article->title . ' de forma correcta!');
            return redirect()->route('articles.index');
        }

        public function destroy($id){
            $article = Article::find($id);
            $article->delete();

            Flash::error('Se ha borrado el articulo ' . $article->title. ' de forma correcta');
            return redirect()->route('articles.index'); 
        }
        
    }