<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        if(!auth()->attempt($request->only('email','password'),$request->remember))
            return back()->with('status','ungültige Anmeldedaten');

        return redirect()->route('dashboard');
    }
}
