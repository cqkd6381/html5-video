<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['domain' => '{language}.laravel.dev','middleware' => ['changeLanguage']], function () {
	Route::get('/', function () {
		// App::setLocale($language);
		return view('welcome');
	});

	Route::get('/bar', function () {
	    $exitCode = Artisan::call('email:sende', [
	        'user' => 1
	    ]);
	    // return $exitCode;
	})->middleware('auth');

});
Route::get('home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('user/{user}', function (App\User $user) {
	// dump(Route::current());
    // dd($user);
    Auth::login($user,true);
    return view('welcome');
});
Route::get('profile', function () {
    // 只有认证过的用户可进入...
})->middleware('auth.basic');

//remember_web_59ba36addc2b2f9401580f014c7f58ea4e30989d
Route::get('upload','HomeController@upload');
Route::post('postvideo','HomeController@postVideo');
Route::get('vvv','HomeController@vvv')->name('vvv');

Route::get('pic','HomeController@pic');
Route::get('getpic','HomeController@getPic');
Route::get('video','HomeController@getVideo');