<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImagesController extends Controller
{
    public function index(){
    	$images = Image::orderBy('id', 'ASC')->paginate(5);
    	$images->each(function($images){
    		$images->article;
    	});
    	return view('admin.images.index')
    	->with('images', $images);
    }
}
