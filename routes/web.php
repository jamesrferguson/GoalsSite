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

Route::get('/create', 'GoalController@create')->middleware('auth');

Route::get( '/goaldetail/{id}', 'GoalController@getGoalById' )->middleware('auth');

Route::get( '/entrydetail/{id}', 'EntryController@getEntryById' )->middleware('auth');

Route::get( '/editgoal/{id}', 'GoalController@editGoal' )->middleware('auth');

Route::get( '/editentry/{id}', 'EntryController@editEntry' )->middleware('auth');

Route::post('/addgoal', 'GoalController@createNewGoal')->middleware('auth');

Route::delete('/deletegoal/{id}', 'GoalController@deleteGoal')->middleware('auth');

Route::delete('/deleteentry/{id}', 'EntryController@deleteEntry')->middleware('auth');

Route::put('/updategoal/{id}', 'GoalController@updateGoal')->middleware('auth');

Route::put('/updateentry/{id}', 'EntryController@updateEntry')->middleware('auth');

Route::get('/createentry/{goalId}', 'EntryController@createNewEntryForGoal' )->middleware('auth');
Route::post('/newentry/{goalId}', 'EntryController@store' )->middleware('auth');

Auth::routes();
