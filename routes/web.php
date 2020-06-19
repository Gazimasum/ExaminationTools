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

Route::get('/', function () {
    return view('frontend.pages.index');
})->name('index');

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
  });

});

//Writter Route
  Route::group(['prefix' => 'writer'],function(){
  Route::get('/', 'Frontend\writer\PagesController@index')->name('writer.index');
  Route::get('/dashboard', 'Frontend\writer\PagesController@dashboard')->name('writer.dashboard');
  Route::get('/login', 'Auth\writer\LoginController@showLoginForm')->name('writer.login');
  Route::get('/register', 'Auth\writer\RegisterController@showRegistrationForm')->name('writer.register');
  Route::post('/login/submit', 'Auth\writer\LoginController@login')->name('writer.login.submit');
  Route::post('/register/submit', 'Auth\writer\RegisterController@register')->name('writer.register.submit');
  Route::post('/logout/submit', 'Auth\writer\LoginController@logout')->name('writer.logout');
  Route::get('/token/{token}', 'Frontend\writer\VerficationController@verify')->name('writer.verification');




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

      Route::get('/request','Backend\WriterController@request')->name('admin.writer.request');
      Route::get('/message','Backend\WriterController@message')->name('admin.writer.message');
      Route::get('/message/{id}','Backend\WriterController@messageview')->name('admin.writer.messageview');


});



      // Chat Routes
Route::group(['prefix' => 'chat'],function(){
  Route::get('/','Backend\PagesController@chat')->name('chat');
  Route::get('/message/{id}','Backend\ChatController@messageview')->name('admin.message.view');
  Route::get('/updateInbox','Backend\ChatController@updateInbox')->name('admin.message.updateInbox');
});
  //Student Route

  //Assingment Route

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
