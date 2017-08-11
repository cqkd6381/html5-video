<?php

use Illuminate\Foundation\Inspiring;
use App\User;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('email:sende {user}', function ($user) {
	$this->info("You typed in: {$user}");
	$u = User::find($user);
	echo $u->name;
})->describe('just a test');