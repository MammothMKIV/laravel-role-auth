<?php

namespace Tests\Unit;

use App\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase {
	use DatabaseTransactions;

	private $user;

	private function getUser() {
		if (!$this->user) {
			$this->user = factory(\App\User::class)->create();
			$this->user->roles()->attach(Role::where('name', 'moderator')->first());
			$this->user->roles()->attach(Role::where('name', 'member')->first());
		}

		return $this->user;
	}

	function testUserHasRole() {
		$user = $this->getUser();

		$this->assertTrue($user->hasRole('moderator'));
		$this->assertTrue($user->hasRole('member'));
		$this->assertFalse($user->hasRole('administrator'));
	}

	function testUserHasAnyRole() {
		$user = $this->getUser();

		$this->assertTrue($user->hasAnyRole(['moderator', 'administrator', 'member', 'testRole']));
		$this->assertFalse($user->hasAnyRole(['administrator', 'testRole']));
	}
}
