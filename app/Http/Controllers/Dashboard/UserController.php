<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users=User::all();

        return view('dashboard.users.index',compact('users'));


    }//end of index


    public function create()
    {
        //
        return view('dashboard.users.create') ;
    }


    public function store(Request $request)
    {

       $request ->validate([
          'first_name'=>'required',
          'last_name'=>'required',
          'email'=>'required',
          'password'=>'required|confirmed',
       ]);
       $request_data=$request->except(['password' , 'password_confirmation' , 'permission']);
       $request_data['password']= bcrypt($request -> password );
       $user = User::create($request_data);
       $user-> attachRoles('admin');
       $user->syncPermissions($request -> permission);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.users.index');
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit');
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
