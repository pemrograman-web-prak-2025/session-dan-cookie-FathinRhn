<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function createRegister(){

        return view('auth.register');
    }

    // Prose Register
    public function storeRegister(Request $request){

        $validatedData = $request->validate([
            'name' => "required|string|max:255",
            'email' => "required|string|email|max:255|unique:users",
            'password' => "required|string|min:8|confirmed"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }


    public function createLogin(){
        return view('auth.login');
    }


    // Proses Login
    public function storeLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()
                ->intended(route('dashboard'))
                ->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect. Please try again.',
        ])->onlyInput('email');
    }

    // Logout user
    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

}