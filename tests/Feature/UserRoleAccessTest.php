<?php

namespace Tests\Feature;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRoleAccessTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAdminAccess()
    {
    	$admin = factory(\App\User::class)->create();

	    $admin->roles()->attach(Role::where('name', 'administrator')->first());
	    $admin->roles()->attach(Role::where('name', 'moderator')->first());
	    $admin->roles()->attach(Role::where('name', 'member')->first());

    	$adminControllerResponse = $this->actingAs($admin)->get('/administrator');
	    $adminControllerResponse->assertStatus(200);

	    $moderatorControllerResponse = $this->actingAs($admin)->get('/moderator');
	    $moderatorControllerResponse->assertStatus(200);

	    $userControllerResponse = $this->actingAs($admin)->get('/member');
	    $userControllerResponse->assertStatus(200);
    }

	public function testModeratorAccess()
	{
		$moderator = factory(\App\User::class)->create();

		$moderator->roles()->attach(Role::where('name', 'moderator')->first());
		$moderator->roles()->attach(Role::where('name', 'member')->first());

		$adminControllerResponse = $this->actingAs($moderator)->get('/administrator');
		$adminControllerResponse->assertStatus(403);

		$moderatorControllerResponse = $this->actingAs($moderator)->get('/moderator');
		$moderatorControllerResponse->assertStatus(200);

		$userControllerResponse = $this->actingAs($moderator)->get('/member');
		$userControllerResponse->assertStatus(200);
	}

	public function testMemberAccess()
	{
		$member = factory(\App\User::class)->create();

		$member->roles()->attach(Role::where('name', 'member')->first());

		$adminControllerResponse = $this->actingAs($member)->get('/administrator');
		$adminControllerResponse->assertStatus(403);

		$moderatorControllerResponse = $this->actingAs($member)->get('/moderator');
		$moderatorControllerResponse->assertStatus(403);

		$userControllerResponse = $this->actingAs($member)->get('/member');
		$userControllerResponse->assertStatus(200);
	}
}
