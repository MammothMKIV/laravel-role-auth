<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileUpload extends Controller
{
	public function doUpload(Request $request)
	{
		$filename = $request->file('uploadedFile')->store('uploads');

		return response()->json([
			'uploadedFileName' => $filename
		]);
	}

	public function uploadImage(Request $request)
	{
		return response()->view('upload-image');
	}

	public function doUploadImage(ImageUploadRequest $request)
	{
		$img = Image::make($request->file('uploadedFile'));

		$watermarkFile = Storage::disk('private')->get('watermarks/standard.png');

		$img->insert($watermarkFile, 'bottom-right');

		$path = $request->file('uploadedFile')->hashName('public');

		Storage::put($path, (string) $img->encode());

		return response()->json([
			'uploadedFileName' => Storage::url($path)
		]);
	}
}
