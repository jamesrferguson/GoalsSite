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

Route::get( '/', 'GoalController@getGoals' )->middleware('auth');

Route::get('/login', function () {
    return view('login');
});

Route::get('/create', function () {
    return view('NewGoal');
})->middleware('auth');;

Route::get( '/goaldetail/{id}', 'GoalController@getGoalById' )->middleware('auth');;

Route::get( '/editgoal/{id}', 'GoalController@editGoal' )->middleware('auth');;

Route::post('/addgoal', 'GoalController@createNewGoal')->middleware('auth');;

Route::delete('/deletegoal/{id}', 'GoalController@deleteGoal')->middleware('auth');;

Route::put('/updategoal/{id}', 'GoalController@updateGoal')->middleware('auth');;

Route::get('/entry', function () {
    return view('AddEntry');
})->middleware('auth');

Auth::routes();
