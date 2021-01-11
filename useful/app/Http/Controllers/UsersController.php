<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function edit()
    {
        $username = \Auth::user()->name;

        return view('user.edit', ['username' => $username,]);
    }

    public function update(Request $request)
    {
        $user = \Auth::user();

        $user->name = $request->name;
        $user->save();

        $microposts = \App\Micropost::all();

        return view('microposts.index', [
            'microposts' => $microposts
        ]);
    }
}
