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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'QuestionsController@index')->name('home');

Route::get('email/verify/{token}', ['as' => 'email.verify', 'uses' => 'EmailController@verify']);

Route::resource('questions', 'QuestionsController')->names([
    'create' => 'questions.create',
    'show' => 'questions.show',
    'edit' => 'questions.edit',
    'index' => 'questions.index'
]);

Route::post('questions/{question}/answer', 'AnswersController@store');

Route::get('questions/{question}/follow', 'FollowQuestionController@follow');