<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUpload extends Controller
{
	public function doUpload(Request $request)
	{
		$filename = $request->file('uploadedFile')->store('uploads');

		return response()->json([
			'uploadedFileName' => $filename
		]);
	}
}
