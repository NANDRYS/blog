<?php



use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/', [App\Http\Controllers\HomeController::class, 'store'])->name('post.store');
Route::delete('/', [App\Http\Controllers\HomeController::class, 'delete'])->name('post.delete');


Route::middleware('guest')->group(function () {
   Route::get('register', [UserController::class, 'register'])->name('user.register');
   Route::post('register', [UserController::class, 'store'])->name('user.store');
   Route::get('login', [UserController::class, 'login'])->name('user.login');
   Route::post('login', [UserController::class, 'loginCheck'])->name('user.loginCheck');
});
Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
