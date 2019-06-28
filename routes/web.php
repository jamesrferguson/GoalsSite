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

Route::get( '/', 'GoalController@getGoals' );

Route::get('/login', function () {
    return view('login');
});

Route::get('/create', function () {
    return view('NewGoal');
});

Route::get( '/goaldetail/{id}', 'GoalController@getGoalById' );

Route::get( '/editgoal/{id}', 'GoalController@editGoal' );

Route::post('/addgoal', 'GoalController@createNewGoal');

Route::delete('/deletegoal/{id}', 'GoalController@deleteGoal');

Route::put('/updategoal/{id}', 'GoalController@updateGoal');

Route::get('/entry', function () {
    return view('AddEntry');
});