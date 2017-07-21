<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
//    public function testBasicExample()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->visit('/')
//                    ->assertSee('Laravel');
//        });
//    }

	public function testNavigateToLogin()
	{
		$this->browse(function (Browser $browser) {
			$browser
				->visit('/')
				->clickLink('Login')
				->type('email', 'administrator@example.com')
				->type('password', 'test1234')
				->check('remember')
				->press('Login')
				->assertPathIs('/home');
		});
	}
}
