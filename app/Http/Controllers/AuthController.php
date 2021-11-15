<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
	public function signIn(Request $request)
	{
		try {
			$credentials = $request->only('username', 'password');
			$signInStatus = Auth::attempt($credentials);
			if (!$signInStatus) {
				return redirect('/sign-in')->with('status', 'Username or Password incorrect!');
			}
			return redirect('/dashboard');
		} catch (Exception $e) {
			return redirect('/sign-in')->with('status', 'Something wrong!');
		}
	}

	public function signOut()
	{
		try {
			Auth::logout();
			return redirect('/sign-in')->with('logout', 'Logged out!');
		} catch (Exception $e) {

		}
	}
}