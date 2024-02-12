<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['create','store']);

    }


    public function create()
    {
        return view('session.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user =request()->validate([
            'email'=> 'required|email|min:5|max:255',
            'password'=>'required|min:3|max:255'
        ]);


        if(!Auth::attempt($user))
        {
            return redirect()->back()->with('failed','Please provide Valid Credentials');
        }

        return redirect('/posts')->with('success','Welcome Back');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('sessions/create')->with('success','GoodBye');
    }
}
