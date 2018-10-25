<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index' , ['title' => 'users' , 'users' => User :: all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create' , ['title' => 'Create user' , 'roles' => Role :: orderBy('id' , 'desc')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
          'email' => 'required|unique:users,email',
          'password' => 'required|min:6',
        ]);

        $user = User :: create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash :: make($request->password),
          'role_id' => $request->role_id,
        ]);

        if ($user) {
          return redirect()->route('users.index')->with('success' , 'User added successfully');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // check if user is same as logged in
      if (Auth :: id() == $id) {
        return redirect('users')->with('error' , 'You cannot delete yourself');
      }
        if (User :: destroy($id)) {
          return redirect()->route('users.index')->with('success' , 'User deleted');
        }
        return redirect()->back();
    }
}
