<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        if (strpos(url()->previous(), 'auth/facebook') == false) {
            session(['redirectBack' => url()->previous()]);   
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
                Auth::login($isUser, true);

                return redirect(session('redirectBack'));
            } else {
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => bcrypt('password')
                ]);
                $user->assignRole('user');
                Auth::login($user, true);

                return redirect(session('redirectBack'));
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {
        if ($request->remember == 'true') {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $user = Auth::user();
            if ($user->hasRole('admin')) {
                return response()->json([
                    'redirect' => route('admin.home')
                ], 200);
            }

            return response()->json([
                'redirect' => session('redirectBack')
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
        if ($request->remember == 'true') {
            $remember = true;
        } else {
            $remember = false;
        }

        $newUser = User::create([
            'name' => 'UET-News\'s new user',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(10)
        ]);

        if ($newUser) {
            $newUser->assignRole('user');
            Auth::login($newUser, $remember);

            return response()->json([
                'redirect' => route('home.index')
            ], 200);
        } else {
            return response()->json([
                'errors' => [
                    'email' => ['Can\'t register new account now.']
                ],
                'message' => 'Register failed.'
            ], 422);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }
}
