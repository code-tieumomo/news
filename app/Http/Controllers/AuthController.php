<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        return view('auth.login');
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook(Request $request)
    {
        if ($request->error) {
            return redirect()->route('auth.show')->withErrors($request->error);
        }

        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();
     
            if ($isUser) {
                Auth::login($isUser);

                return redirect()->route('home.index');
            } else {
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => bcrypt('password')
                ]);
                $user->assignRole('user');
                Auth::login($user);

                return redirect()->route('home.index');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return response()->json([
                    'redirect' => route('admin.home')
                ], 200);
            }

            return response()->json([
                'redirect' => route('home.index')
            ], 200);
        }

        return response()->json([
            'errors' => [
                'email' => ['The provided credentials do not match our records.']
            ],
            'message' => 'Credentials do not match.'
        ], 422);
    }

    public function register(RegisterRequest $request)
    {

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home.index');
    }
}
