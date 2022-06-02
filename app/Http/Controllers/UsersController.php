<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use App\User;

class UsersController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'ASC')->paginate(5);
        return view('admin.users.index')->with('users', $users);
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(UserRequest $request){
  

	       $user = new User($request->all());
	       $user->password = bcrypt($request->password);
	       $user->save();

	       Flash::success("Se ha registrado el usuario: " . $user->name . " de forma exitosa!");
	       return redirect()->route('users.index');
	       
    }

    public function edit($id){
        $user = User::find($id);

        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        Flash::warning('El usuario ' . $user->name . ' ha sido editado con exito!');
        return redirect()->route('users.index');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        Flash::error('El usuario ' . $user->name . ' ha sido borrado de forma exitosa!');
        return redirect()->route('users.index');
    }

    public function profile()
    {
        $user = \Auth::user();
        return view('admin.users.profile',compact('user',$user));
    }

    public function update_avatar(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = \Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','Has subido exitosamente la imagen.');

    }
}
