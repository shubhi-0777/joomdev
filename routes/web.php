<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;

use App\Http\Controllers\Auth\AuthController;
use App\Models\User;


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


Route::get('/sendemail', [TemplateController::class, 'sendemail']);

Route::get('/view_template', function() {

    //$users = User::all();
    $email_templates = DB::table('email_templates')->latest()->get();
    return view('view_template',compact('email_templates'));

});

Route::get('/add_template', function() {
    return view('add_template');

})->name('add.template');


Route::get('login', [AuthController::class, 'index'])->name('login');
//Route::get('admin_login', [AuthController::class, 'admin_index'])->name('admin_login');
//Route::post('post_admin_login', [AuthController::class, 'postAdminLogin'])->name('admin_login.post'); 
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
//Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('save_template', [AuthController::class, 'saveTemplate'])->name('save.template');


