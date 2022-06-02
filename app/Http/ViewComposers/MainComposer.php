<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\User;
use App\Article;
use App\Category;
use App\Tag;
use App\Image;

class MainComposer {
		# code...
	public function compose(View $view){
		$users = User::orderBy('name', 'ASC')->get();
		$articles = Article::orderBy('title', 'ASC')->get();
		$categories = Category::orderBy('name', 'ASC')->get();
		$tags = Tag::orderBy('name', 'ASC')->get();
		$images = Image::orderBy('name', 'ASC')->get();
		$view->with('users', $users)
		->with('articles', $articles)
		->with('categories', $categories)
		->with('tags', $tags)
		->with('images', $images);
	}
}
