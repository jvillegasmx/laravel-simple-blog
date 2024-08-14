<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/{path?}', function($path = null){         return View::make('welcome');     })->where('path', '.*');
Route::get('/', function($path = null){         return View::make('welcome');     });
Route::get('/about', function($path = null){         return View::make('welcome');     });
Route::get('/blog/{url}', function($path = null){         return View::make('welcome');     });



//GROUP ROUTES WITH api/v1
Route::prefix('api/v1')->group(function () {
    Route::get('/', [ApiController::class, 'index']);
    Route::get('/articles', [ApiController::class, 'getArticles']);
    Route::get('/article/{url}', [ApiController::class, 'getArticle']);
});




/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', [HomeController::class, 'index']);
//Route::get('//blog{url}/', [HomeController::class, 'viewPost']);
