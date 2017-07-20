<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FileUploadControllerTest extends TestCase
{
    public function testBasicTest()
    {
	    Storage::fake('uploads');

	    $response = $this->call('POST', '/upload', [
		    'uploadedFile' => UploadedFile::fake()->image('uploadedFile.jpg')
	    ]);

	    $response->assertStatus(200);

	    Storage::disk()->assertExists($response->decodeResponseJson()['uploadedFileName']);
    }
}
