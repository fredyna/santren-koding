<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function index(){
        $data['users'] = \App\User::join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_id','=',2)->get();
        return view('admin.users.index')->with($data);
    }
    public function create(){
        return view('admin.users.create');
    }
    public function edit($id){
        $user = \App\User::find($id);
        return view('admin.users.edit')->with('user',$user);
    }

    public function store(Request $request){
      $nama = $request->name;
      $email = $request->email;
      $password = bcrypt($request->password);

      $user = new \App\User;
      $user->name = $nama;
      $user->email = $email;
      $user->password = $password;
      $save = $user->save();
      if($save){
        return redirect('/admin/users');
      } else{
        echo 'Gagal!';
      }
    }

    public function update(Request $request, $id){
      $nama = $request->name;
      $email = $request->email;
      $password = bcrypt($request->password);

      $user = \App\User::find($id);

      $user->name = $nama;
      $user->email = $email;
      $user->password = $password;
      $user->save();

      return redirect('/admin/users');
    }

    public function destroy($id){
      $user = \App\User::find($id);
      $user->delete();

      return redirect('/admin/users');
    }

    public function logout(){
      Auth::logout();
      return redirect('/');
    }
}
