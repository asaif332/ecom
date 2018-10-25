<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
      return view('profile.index' , ['title' => 'Your profile' , 'me' => Auth :: user()]);
    }


    public function edit()
    {
      return view('profile.edit' , ['title' => 'Edit profile' , 'me' => Auth :: user()]);
    }

    public function update(Request $request)
    {

      $me = User :: where('id', Auth :: id())->update([
        'name' => $request->name,
      ]);
      if ($me) {
        return redirect()->route('profile')->with('success' , 'Profile Updated');
      }

      return redirect()->back()->withInput();
    }
}
