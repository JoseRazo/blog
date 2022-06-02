<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Category;
use App\Tag;

class AsideLeftComposer {
		# code...
	public function compose(View $view){
		$categories = Category::orderBy('name', 'ASC')->get();
		$tags = Tag::orderBy('name', 'ASC')->get();
		$view->with('categories', $categories)
		->with('tags', $tags);
	}
}