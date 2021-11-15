<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		return view('dashboard');
	}

	public function formCheck(Request $request)
	{
		try {
			$formData = $request->only('first', 'second');
			$firstInput = strtoupper($formData['first']);
			$secondInput = strtoupper($formData['second']);
			$arrFirstInput = str_split($firstInput);
			$lengthOfArr = count($arrFirstInput);
			$countMatch = 0;
			if ($lengthOfArr > 0) {
				foreach ($arrFirstInput as $input) {
					$stringContain = strpos($secondInput, $input);
					if ($stringContain) {
						$charMatch = substr_count($secondInput, $input);
						$countMatch += $charMatch;
					}
				}
			}
			$percentage = ($countMatch / $lengthOfArr) * 100;
			return redirect('/dashboard')->with('status', $percentage);
		} catch (Exception $e) {

		}
	}
}