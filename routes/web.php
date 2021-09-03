<?php

use Illuminate\Support\Facades\Route;
use Spatie\WelcomeNotification\WelcomesNewUsers;
use App\Http\Controllers\Auth\WelcomeController;

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

Route::get('/', function () {
    if(!Auth::check()){
        return view('auth.login');
    }else{
        return redirect()->route('home');
    }
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test-queue', 'StaffController@test');

Route::middleware(['role:Administrator','auth'])->group(function () {
    Route::get('/dropdowns', 'DropdownController@index');
    Route::get('/institutions', 'InstitutionController@institutions');
    Route::get('/agencies', 'InstitutionController@agencies');
    Route::get('/consortiums', 'InstitutionController@consortiums');
    Route::get('/staffs', 'StaffController@index');
    Route::get('/researchers', 'ResearcherController@index');
});

Route::middleware(['role:Researcher,Secretariat','auth'])->group(function () {
    Route::get('/researches', 'ResearchController@index');
    Route::get('/research/view/{id}', 'ResearchController@view');
});

Route::middleware(['role:Researcher','auth'])->group(function () {
    Route::get('/research/add', 'ResearchController@add');
});

Route::middleware(['role:Researcher','auth'])->group(function () {
    Route::get('/research/add', 'ResearchController@add');
});

Route::post('/upload', 'ResearchController@upload');

Route::prefix('request')->group(function () {
    Route::get('/getid', 'HomeController@getId');
    Route::get('/comments/{id}', 'ReactionController@index');
    Route::post('/comment/store', 'ReactionController@store');
    Route::post('/like/add', 'ReactionController@like');

    Route::prefix('admin')->group(function () {
        Route::get('/dropdowns/{classification}/{type}', 'DropdownController@lists');
        Route::get('/dropdown/{classification}/{type}/{keyword}', 'DropdownController@list');
        Route::post('/dropdown/store', 'DropdownController@store');

        Route::get('/organizations/{type}/{keyword}', 'InstitutionController@list');
        Route::get('/organization/list/{type}', 'InstitutionController@lists');
        Route::post('/organization/store', 'InstitutionController@store');

        Route::get('/staffs/{keyword}', 'StaffController@lists');
        Route::post('/staff/store', 'StaffController@store');

        Route::get('/researchers/{keyword}', 'ResearcherController@lists');
        Route::post('/researcher/store', 'ResearcherController@store');
    });
    Route::prefix('researcher')->group(function () {
        Route::get('/researches/{keyword}', 'ResearchController@lists');
        Route::get('/research/{id}', 'ResearchController@research');
        Route::post('/research/store', 'ResearchController@store');
    });
});

Route::group(['middleware' => ['web', WelcomesNewUsers::class,]], function () {
    Route::get('welcome/{user}', [WelcomeController::class, 'showWelcomeForm'])->name('welcome');
    Route::post('welcome/{user}', [WelcomeController::class, 'savePassword']);
});
