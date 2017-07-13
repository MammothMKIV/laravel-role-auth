<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrator = new Role();
        $role_administrator->name = 'administrator';
        $role_administrator->description = 'Administrator User';
        $role_administrator->save();

	    $role_moderator = new Role();
	    $role_moderator->name = 'moderator';
	    $role_moderator->description = 'Moderator User';
	    $role_moderator->save();

	    $role_member = new Role();
	    $role_member->name = 'member';
	    $role_member->description = 'Regular Member';
	    $role_member->save();
    }
}
