<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Laracasts\Flash\Flash;
use App\Category;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'DESC')->paginate(5);
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request){
        $category = new Category($request->all());
        $category->save();
        Flash::success('La categoria ' . $category->name . ' ha sido creada correctamente');
        return redirect()->route('categories.index');
    }

    public function edit($id){
        $category = Category::find($id);

        return view('admin.categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->fill($request->all());
        $category->save();

        Flash::warning('La categoria ' . $category->name . ' ha sido editada con exito!');
        return redirect()->route('categories.index');
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        Flash::error('La categoria ' . $category->name . ' ha sido eliminada correctamente');
        return redirect()->route('categories.index');
    }
}
