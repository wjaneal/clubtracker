<?php
#use Config;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
	return view('welcome');
	});
/*Route::get('home', function() {
	return "Home!!";
	});
Route::get('users/edit/{id}',['uses'=>'UsersController@edit', function($id){}]);
Route::get('users', ['uses'=>'UsersController@index', function(){}]);
Route::put('users/update/{id}',['uses'=>'UsersController@update', function($id){}]);
*/


	Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
		Route::group(['middleware'=>'auth'], function() {
			Route::get('welcome', function(){
				$template = Config::get('Globals.template');
				$data = [];
				$data[3][] = array('eventContainer'=>Form::checkbox('dates[]', '3'), 'content'=>'http://www.icecraft.ca'); 
				return view('admin',compact('data','template'));
				});
			Route::get('selectstudents',['uses'=>'EnrolmentController@selectstudents']);
			Route::put('submitenrolments',['uses'=>'EnrolmentController@submitenrolments']);
			Route::get('selectmonth', ['uses'=>'ClubMeetingsController@selectmonth']);
			Route::put('setmeetings', ['uses'=>'ClubMeetingsController@setmeetings']);
			Route::put('storemany', ['uses'=>'ClubMeetingsController@storemany']);
			Route::get('selectclub', ['uses'=>'AttendanceController@selectclub']);
			Route::put('enterattendance', ['uses'=>'AttendanceController@enterattendance']);
			Route::put('submitmultiple', ['uses'=>'AttendanceController@submitmultiple']);
			#Route::get('setmeetings', ['uses'=>'ClubMeetingsController@setmeetings'], function(){});
			Route::resource('attendance','AttendanceController');
			Route::resource('clubs','ClubsController');
			Route::resource('clubmeetings','ClubMeetingsController');
			Route::resource('enrolment','EnrolmentController');
			Route::resource('students','StudentsController');
			Route::resource('users','UsersController');
			});
		});
/***
***Authentication
**/
Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController'
	]);
?>
