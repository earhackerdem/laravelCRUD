<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::latest()->get();

        return view('users.index', [
            'users' => $users
        ]);

    }

    public function store(Request $request)
    {
        //Se validan los datos para evitar que se guarden cuando no cumplen con lo esperado
        $request->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users'],
            'password' => ['required','min:8']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>bcrypt($request->password)
        ]);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
