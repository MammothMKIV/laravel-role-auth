<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class RestController extends Controller
{
	function testRoute(Request $request)
	{
		return response()->json([
			'field1' => 'value1',
			'field2' => 'value2'
		]);
	}
}
