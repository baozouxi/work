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

 Route::group(['middleware' => 'checkLogin'], function(){
 
	// Route::controller('request','BookController');

	Route::get('/', 'IndexController@index')->name('index');


	Route::get('/nav/id/{id}/sort/{sort?}', 'NavController@sort')->name('navSort');
	Route::Resource('nav', 'NavController');

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
		Route::get('/patient/come/track', 'PatientController@timeToTrack')->name('patientNeedTrack'); //到期回访
		Route::get('/patient/come/today', 'PatientController@today')->name('patientToday'); //患者今日到诊
		Route::get('/patient/month/{start}/{end?}', 'PatientController@searchByMonth')->name('patientSearchByMonth');
		Route::get('/patient/search/{key}', 'PatientController@search')->name('patientSearch');
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

	//短信模块
	Route::group(['namespace'=>'Sms'], function(){
	
		Route::get('/sms/async-send/{admin_id}', 'SmsController@asyncSend')->name('smsAsyncSend');
		Route::Resource('sms', 'SmsController');
	});


	//设置部分

	//病种
	Route::group(['namespace'=>'Disease'], function(){
		Route::Resource('disease', 'DisController');
	});

	//医生
	Route::group(['namespace'=>'Doctor'], function(){
		Route::Resource('doctor', 'DoctorController');
	});

	//途径
	Route::group(['namespace'=>'Way'], function(){
		Route::Resource('way','WayController');
	});

	//媒介
	Route::group(['namespace'=>'Ad'], function(){
		Route::Resource('ad', 'AdController');
	});

	//RBAC
	Route::group(['namespace' => 'RBAC'], function(){
		Route::Resource('user', 'UserController');
		Route::Resource('role', 'RoleController');
		Route::Resource('node', 'NodeController');
		Route::Resource('node-group', 'NodeGroupController');
		Route::get('/node/move/{id}', 'NodeController@move');
	});



	//异步请求页面
	Route::get('/callback/check/{model}/{action}/{args}', 'CallBackController@check')->name('check');

	Route::get('/callback/checkNow', 'CallBackController@checkNow')->name('checkNow');

	Route::get('/callback/uploadhtml', 'CallBackController@uploadHtml')->name('uploadHtml');




 });



//登陆

Route::get('/login/exit', 'LoginController@logout')->name('exit');

Route::get('/login', function(){
	return view('login');
})->name('login');

Route::post('/login', 'LoginController@index');

// Route::get('/weather', 'WeatherController@index')->name('weather');
