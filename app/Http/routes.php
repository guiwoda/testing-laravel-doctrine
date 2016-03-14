<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Model\User;
use Doctrine\ORM\EntityManager;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    Route::get('/', function (\Illuminate\Contracts\Foundation\Application $app) {
        /** @var EntityManager $em */
        $em = $app['em'];

//         Auth::login($em->find(User::class, 2));

//         dump(Auth::user(), 'asd');

//         $user = new User('Patrick');
//         $em->persist($user);
//         $em->flush();

        $user = $em->find(User::class, 1);
        $user->setName("Guido");

        $em->flush();
        dump($user);

        return view('welcome');
    });
});
