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

// 完成后记得对每个路由进行注释

// Route::group(['middleware' => 'checkLogin'], function(){
// 
	// Route::controller('request','BookController');

	Route::get('/', 'IndexController@index')->name('index');

	//预约模块
	Route::group(['namespace' => 'Book'], function(){
		Route::get('/book/statistics/{way?}/{date?}', 'StatisticsController@index')->name('bookStatistics');
		Route::get('/book/chatlog/{id}', 'BookController@getChatlog')->name('chatlog');
		Route::get('/book/sheet/{date?}/{admin?}', 'BookController@sheet')->name('bookSheet');
		
		Route::Resource('book', 'BookController');
		Route::Resource('booktrack', 'TrackController');


	});

	//患者模块
	Route::group(['namespace'=>'Patient'], function(){
		Route::get('/patient/book/{id}', 'PatientController@patientBookUpdate');
		Route::get('/patient/track/withinfo/{patientId}', 'TrackController@indexWithInfo')->name('trackWithInfo');
		Route::get('/patient/track/statistics/{way?}/{date?}', 'TrackController@statistics')->name('trackStatistics');
		Route::get('/Patient/report/{date?}/{doctor?}', 'PatientController@patientReport')->name('patientReport');
		Route::get('/Patient/statistics/{way?}/{date?}', 'PatientController@statistics')->name('patientStatistics');
		Route::Resource('patienttrack', 'TrackController');
		Route::Resource('patient', 'PatientController');
	});

	//消费记录
	Route::group(['namespace'=>'Take'], function(){
		Route::Resource('take', 'TakeController');
		Route::get('/take/info/{patientId}', 'TakeController@infoWithPatient')->name('takeWithInfo');
	});

	//咨询模块
	Route::group(['namespace'=>'Consult'], function(){
		Route::Resource('consult', 'ConsultController');
		Route::get('/consult/status/{consultId}', 'ConsultController@updateStatus')->name('consultUpdateStatus');
	});

	//电话记录模块
	Route::group(['namespace'=>'TelConsult'], function(){
		Route::Resource('tel-consult', 'TelConsultController');
		Route::get('tel-consult/status/{id}', 'TelConsultController@updateStatus')->name('telConsultUpdateStatuss');
	});

	Route::group(['namespace'=>'Call'],function(){
		Route::Resource('call', 'CallController');
	});

	//对话模块 
	Route::group(['namespace'=>'Dialog'], function(){

		Route::get('/dialog/sheet/{date?}/{admin?}', 'DialogController@sheet')->name('dialogSheet');

		Route::Resource('dialog', 'DialogController');

	});


	//回拨模块 医院网站提交， 提交到本系统的recall.store  index负责显示
	Route::group(['namespace'=>'ReCall'], function(){
		Route::Resource('recall', 'ReCallController');
	});

	


	//异步请求页面
	Route::get('/callback/check/{model}/{action}/{args}', 'CallBackController@check')->name('check');

	Route::get('/callback/checkNow', 'CallBackController@checkNow')->name('checkNow');

	Route::get('/callback/uploadhtml', 'CallBackController@uploadHtml')->name('uploadHtml');

// });



//登陆
Route::get('/login', function(){
	return view('login');
})->name('login');

Route::post('/login', 'LoginController@index');

// Route::get('/weather', 'WeatherController@index')->name('weather');
