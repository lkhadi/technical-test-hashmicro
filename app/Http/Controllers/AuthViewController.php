<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthViewController extends Controller
{
	public function signInPage()
	{
		return view('signin');
	}
}