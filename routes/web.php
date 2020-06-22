<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/about', 'Frontend\PagesController@about')->name('about');
Route::get('/service', 'Frontend\PagesController@service')->name('service');
Route::get('/contact', 'Frontend\PagesController@contact')->name('contact');
Route::post('/track/order', 'Frontend\PagesController@trackOrder')->name('track.order');


Auth::routes();


//student
Route::group(['prefix' => 'student'],function ()
{
  // Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/', 'Frontend\Student\PagesController@index')->name('student.index');
  Route::get('/dashboard', 'Frontend\Student\PagesController@dashboard')->name('student.dashboard');
  Route::get('/registration', 'Auth\RegisterController@index')->name('student.registrationForm');
  Route::post('/register/submit','Auth\RegisterController@register')->name('student.register');
  Route::get('/token/{token}', 'Frontend\Student\VerficationController@verify')->name('student.verification');

  Route::group(['prefix' => 'assingment'],function ()
  {

    Route::get('/request', 'Frontend\Student\PagesController@assingmentView')->name('student.assingment.request.view');
    Route::post('/request', 'Frontend\Student\AssingmentController@store')->name('student.assingment.request.post');
    Route::get('/{id}','Frontend\Student\AssingmentController@show')->name('student.assingment.view');
  });
  Route::group(['prefix' => 'message'],function ()
  {
    Route::get('/','Frontend\Student\ChatController@messageview')->name('student.message.view');
    Route::post('/message','Frontend\Student\ChatController@messagesend')->name('student.message.send');
    });

});

//Writter Route
  Route::group(['prefix' => 'writer'],function(){
  Route::get('/', 'Frontend\Writer\PagesController@index')->name('writer.index');
  Route::get('/dashboard', 'Frontend\Writer\PagesController@dashboard')->name('writer.dashboard');
  Route::get('/login', 'Auth\Writer\LoginController@showLoginForm')->name('writer.login');
  Route::get('/register', 'Auth\Writer\RegisterController@showRegistrationForm')->name('writer.register');
  Route::post('/login/submit', 'Auth\Writer\LoginController@login')->name('writer.login.submit');
  Route::post('/register/submit', 'Auth\Writer\RegisterController@register')->name('writer.register.submit');
  Route::post('/logout/submit', 'Auth\Writer\LoginController@logout')->name('writer.logout');
  Route::get('/token/{token}', 'Frontend\Writer\VerficationController@verify')->name('writer.verification');


  Route::group(['prefix' => 'assingment'],function ()
  {
    // Route::get('/request', 'Frontend\Student\PagesController@assingmentView')->name('student.assingment.request.view');
    // Route::post('/request', 'Frontend\Student\AssingmentController@store')->name('student.assingment.request.post');
  });

  Route::group(['prefix' => 'message'],function ()
  {
    Route::get('/','Frontend\Writer\ChatController@messageview')->name('writer.message.view');
    Route::post('/message','Frontend\Writer\ChatController@messagesend')->name('writer.message.send');
    });
});

//Admin Route
  Route::group(['prefix' => 'admin'],function(){
  Route::get('/', 'Backend\PagesController@index')->name('admin.index');
  Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
  Route::post('/logout/submit', 'Auth\Admin\LoginController@logout')->name('admin.logout');
  Route::get('/token/{token}', 'Backend\VerficationController@verify')->name('admin.verification');

  //Writer Route
  Route::group(['prefix' => 'writer'],function(){
    Route::get('/','Backend\WriterController@index')->name('admin.writer.index');
    Route::post('/status/{id}','Backend\WriterController@status')->name('admin.writer.status');
    Route::get('/edit/{id}','Backend\WriterController@edit')->name('admin.writer.edit');
    Route::post('/edit/{id}','Backend\WriterController@update')->name('admin.writer.update');
    Route::post('/delete/{id}','Backend\WriterController@delete')->name('admin.writer.delete');
// message
    Route::get('/request','Backend\WriterController@request')->name('admin.writer.request');
    Route::get('/message','Backend\WriterController@message')->name('admin.writer.message');
    Route::get('/message/{id}','Backend\WriterController@messageview')->name('admin.writer.messageview');
    Route::post('/message/{id}','Backend\WriterController@messagesend')->name('admin.writer.message.send');
    Route::get('/updateInbox','Backend\WriterController@updateInbox')->name('admin.message.updateInbox');

    // Deal

    Route::get('/deal/{id}','Backend\DealController@index')->name('admin.writer.deal');
    Route::post('/deal/done','Backend\DealController@store')->name('admin.writer.deal.done');
});




  //Student Route
  Route::group(['prefix' => 'student'],function(){
    Route::get('/','Backend\StudentController@index')->name('admin.student.index');
    Route::post('/status/{id}','Backend\StudentController@status')->name('admin.student.status');
    Route::get('/edit/{id}','Backend\StudentController@edit')->name('admin.student.edit');
    Route::post('/edit/{id}','Backend\StudentController@update')->name('admin.student.update');
    Route::post('/delete/{id}','Backend\StudentController@delete')->name('admin.student.delete');

    Route::get('/message','Backend\StudentController@message')->name('admin.student.message');
    Route::get('/message/{id}','Backend\StudentController@messageview')->name('admin.student.messageview');
    Route::post('/message/{id}','Backend\StudentController@messagesend')->name('admin.student.message.send');
    Route::get('/updateInbox','Backend\StudentController@updateInbox')->name('admin.message.updateInbox');

});
  //Assingment Route
  Route::group(['prefix' => 'assingment'],function(){
    Route::get('/','Backend\AssingmentController@index')->name('admin.assingment.index');
    Route::get('/view/{id}','Backend\AssingmentController@view')->name('admin.assingment.view');

    Route::get('/edit/{id}','Backend\AssingmentController@edit')->name('admin.assingment.edit');
    Route::post('/edit/{id}','Backend\AssingmentController@update')->name('admin.assingment.update');
    Route::post('/delete/{id}','Backend\AssingmentController@delete')->name('admin.assingment.delete');
  });
  //Order Route
  Route::group(['prefix' => 'order'],function(){
    Route::get('/','Backend\OrderController@index')->name('admin.order.index');
    Route::get('/view/{id}','Backend\OrderController@view')->name('admin.order.view');

    Route::get('/edit/{id}','Backend\OrderController@edit')->name('admin.order.edit');
    Route::post('/edit/{id}','Backend\OrderController@update')->name('admin.order.update');
    Route::post('/delete/{id}','Backend\OrderController@delete')->name('admin.order.delete');
  });
//Country Routes
Route::group(['prefix' => 'country'],function(){
  Route::get('/','Backend\CountryController@index')->name('admin.country.index');
  Route::get('/create','Backend\CountryController@create')->name('admin.country.create');
  Route::post('/store','Backend\CountryController@store')->name('admin.country.store');
  Route::get('/edit/{id}','Backend\CountryController@edit')->name('admin.country.edit');
  Route::post('/edit/{id}','Backend\CountryController@update')->name('admin.country.update');
  Route::post('/delete/{id}','Backend\CountryController@delete')->name('admin.country.delete');
});
//EducationLevel Routes
Route::group(['prefix' => 'educationlevel'],function(){
  Route::get('/','Backend\EducationLevelController@index')->name('admin.educationlevel.index');
  Route::get('/create','Backend\EducationLevelController@create')->name('admin.educationlevel.create');
  Route::post('/store','Backend\EducationLevelController@store')->name('admin.educationlevel.store');
  Route::get('/edit/{id}','Backend\EducationLevelController@edit')->name('admin.educationlevel.edit');
  Route::post('/edit/{id}','Backend\EducationLevelController@update')->name('admin.educationlevel.update');
  Route::post('/delete/{id}','Backend\EducationLevelController@delete')->name('admin.educationlevel.delete');
});
//Subject Routes
Route::group(['prefix' => 'subject'],function(){
  Route::get('/','Backend\SubjectController@index')->name('admin.subject.index');
  Route::get('/create','Backend\SubjectController@create')->name('admin.subject.create');
  Route::post('/store','Backend\SubjectController@store')->name('admin.subject.store');
  Route::get('/edit/{id}','Backend\SubjectController@edit')->name('admin.subject.edit');
  Route::post('/edit/{id}','Backend\SubjectController@update')->name('admin.subject.update');
  Route::post('/delete/{id}','Backend\SubjectController@delete')->name('admin.subject.delete');
});
//AssingmentType Routes
Route::group(['prefix' => 'assingmenttype'],function(){
  Route::get('/','Backend\AssingmentTypeController@index')->name('admin.assingmenttype.index');
  Route::get('/create','Backend\AssingmentTypeController@create')->name('admin.assingmenttype.create');
  Route::post('/store','Backend\AssingmentTypeController@store')->name('admin.assingmenttype.store');
  Route::get('/edit/{id}','Backend\AssingmentTypeController@edit')->name('admin.assingmenttype.edit');
  Route::post('/edit/{id}','Backend\AssingmentTypeController@update')->name('admin.assingmenttype.update');
  Route::post('/delete/{id}','Backend\AssingmentTypeController@delete')->name('admin.assingmenttype.delete');
});



// API routes
Route::get('/get-order/{id}', function($id){
  return json_encode(App\Models\Order::where('assingment_id', $id)->first());
});
});



    //
    // Route::view('/', 'welcome');
    // Auth::routes();
    //
    // Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    // Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
    // Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
    // Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');
    //
    // Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    // Route::post('/login/writer', 'Auth\LoginController@writerLogin');
    // Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    // Route::post('/register/writer', 'Auth\RegisterController@createWriter');
    //
    // Route::view('/home', 'home')->middleware('auth');
    // Route::view('/admin', 'admin');
    // Route::view('/writer', 'writer');
