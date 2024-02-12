<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest'])->only(['create', 'store']);
        $this->middleware(['can:admin'])->only(['destroy']);
    }


    public function index()
    {
        return view('user.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( UserValidateRequest $request)
    {
        $user = $request->validated();

        if (request('avatar') !== null)
            $user['avatar'] = request()->file('avatar')->store('avatars');

//        $user = request()->validate(['name' => 'required|min:3|max:255', 'email' => 'required|email|min:5|max:255|unique:users,email', 'password' => 'required|min:3|max:255',]);


        if(!User::create($user))
            return redirect()->back()->with('failed','Something went Wrong');
        return redirect('users')->with('success','User created Successfully');
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return view('user.show', ['posts' => $user->post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user.profile', ['CurrentUser' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);

        $user->update(['name' => request('name'), 'email' => request('email'), 'avatar' => request()->file('avatar') === null ? $user->avatar : request()->file('avatar')->store('avatars')]);


        return redirect('User')->with('success','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('users')->with('success','User Deleted Successfully');
    }
}
