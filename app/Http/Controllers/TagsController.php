<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests\TagRequest;
use App\Tag;

class TagsController extends Controller
{
    public function index(Request $request){
        $tags = Tag::search($request->name)->orderBy('id', 'DESC')->paginate(5);
        return view('admin.tags.index')->with('tags', $tags);
    }

    public function create(){
        return view('admin.tags.create');
    }

    public function store(TagRequest $request){
        $tag = new Tag($request->all());
        $tag->save();
        Flash::success('El Tag ' . $tag->name . ' ha sido creada correctamente!');
        return redirect()->route('tags.index');
    }

    public function edit($id){
        $tag = Tag::find($id);

        return view('admin.tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id){
        $tag = Tag::find($id);
        $tag->fill($request->all());
        $tag->save();

        Flash::warning('El tag ' . $tag->name . ' ha sido editado con exito!');
        return redirect()->route('tags.index');
    }

    public function destroy($id){
        $tag = Tag::find($id);
        $tag->delete();

        Flash::error('El tag ' . $tag->name . ' ha sido eliminado correctamente');
        return redirect()->route('tags.index');
    }
}
