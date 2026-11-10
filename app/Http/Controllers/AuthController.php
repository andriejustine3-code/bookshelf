<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:12']
        ]);

        //verifies the credentials
        if(!Auth::attempt($credentials))
        {
            throw ValidationException::withMessage([
                'email' => 'The email or password is incorrect.'
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('books.index'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->('books.index')->with('success', 'You have just logged out.');
    }
}
