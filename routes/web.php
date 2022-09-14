<?php

use App\Http\Controllers\GroupStudent;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student;
use App\Http\Middleware\show_group;
use App\Http\Middleware\complete_info_user;
use App\Http\Middleware\checkUser;
use App\Http\Livewire\GroupProfile;


Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['controller'=>Student::class,'prefix'=>'student',],function(){
        Route::post('/complete-info', 'complete_info');
        Route::get('/welcome', 'welcome');
        Route::get('/profile','profile');
        Route::post('/add-skills', 'add_skills');
        Route::post('/update-profile','update_file');
        Route::post('/edite/photo','edite_photo');
        Route::get('/All-Students', 'show_all_student');
        Route::get('/show_profile/{id_user}', 'show_profile');
});


Route::group(['controller'=>GroupStudent::class,'prefix'=>'group','middleware'=>complete_info_user::class,],function(){
      
        Route::get('/create','create_group')->middleware(checkUser::class);
        Route::post('/add-group', 'addgroup');
        Route::get('/add-roule/{id}/{job}','add_roule')->middleware(checkUser::class);
        //livewire
        Route::get('/Group-Profile',GroupProfile::class)->middleware(show_group::class);
});
    //AdminIT
Route::group(['prefix'=>'admin'],function(){

        Route::get('/login',[AdminLoginController::class, 'AdminPortal'])->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/sendemail', [AdminController::class, 'SendEmail']);
        Route::get('/show_profile/{id_user}', [AdminController::class, 'show_profile']);
        Route::post('/AddStd', [AdminController::class, 'AddStd']);
        Route::get('/Delete/{id}', [AdminController::class, 'DeleteStd']);
        Route::get('/groups', [AdminController::class, 'group']);
        Route::get('/DeleteAll', [AdminController::class, 'DeleteAll']);
        Route::get('/Delete-ID/{id}', [AdminController::class, 'DeleteID']);
        Route::get('/Delete-ID-All', [AdminController::class, 'DeleteAllID']);
        Route::post('/Password', [AdminController::class, 'Password']);
        Route::get('/Delete-Project/{id}', [AdminController::class, 'Delete_Project']);
        Route::get('/Accept-Project/{id}', [AdminController::class, 'Accept_Project']);

        
}) ;
    
Route::get('/', [HomeController::class, 'home']);
Route::post('/conntact', [HomeController::class, 'Conntact']);
Route::get('/group/show-all', [HomeController::class,'group']);
Route::get('/about', function () {return view('about');});
Route::get('/Contact', function () {return view('connect');});

//php artisan serve
// php artisan queue:work

Route::get('/resends-email', [Student::class, 'resends_email']);
Route::get('/delete-new-email',[Student::class,'delete_new_email']);
Route::post('checkEmail', [App\Http\Controllers\Auth\RegisterController::class, 'validator']);
