<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//Route::group(['middleware' => ['auth']], function() {
Route::middleware(['auth'])->group(function() {
    Route::get('/', 'Home\MainPage')
    ->name('home.mainPage');

    //ME

    Route::group([
        'prefix' => 'me',
        'namespace' => 'User',
        'as' => 'me.'
    ], function () {
        Route::get('profile', 'UserController@profile')
            ->name('profile');

        Route::get('edit', 'UserController@edit')
            ->name('edit');

        Route::post('update', 'UserController@update')
            ->name('update');

        //folder własny

        Route::get('games', 'GameController@list')
            ->name('games.list'); //z namespaceu User
            
        Route::post('games', 'GameController@add')
            ->name('games.add');

        Route::delete('games', 'GameController@remove')
            ->name('games.remove');
            
        Route::post('games/rate', 'GameController@rate')
            ->name('games.rate');
    });
    
    // USERS
    Route::get('users', 'UserController@list')
        ->name('get.users');

    Route::get('users/{userId}', 'UserController@show')
        ->name('get.user.show');

    //Route::get('users/{id}/profile', 'User\ProfilController@show')
    //    ->name('get.user.profile');

    Route::get('users/{id}/address', 'User\ShowAddress')
        ->where(['id' => '[0-9]+'])
        ->name('get.users.address');

    // GAMES
    Route::group([
        'prefix' => 'games',
        'namespace' => 'Game',
        'as' => 'games.'
    ], function () {
        Route::get('dashboard', 'GameController@dashboard')
            ->name('dashboard');

        Route::get('', 'GameController@index')
            ->name('list');

        Route::get('{game}', 'GameController@show')
            ->name('show');
    });

});

Auth::routes();
