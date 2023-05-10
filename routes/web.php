<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserInputLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('admin.index');
// });
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/dashboard', function () {

    $users = User::all();    
    // dd($user->id);
    return view('dashboard', compact($users));

})->middleware(['auth'])->name('dashboard');
// })->middleware(['auth']);

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/entrada', [App\Http\Controllers\UserController::class, 'entrada']);
Route::get('/salida', [App\Http\Controllers\UserController::class, 'salida']);

//Routes admin
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/home', [AdminController::class, 'index']);
    Route::get('/alumnos/entradas', [UserInputLogController::class, 'index']);
    Route::get('/alumnos/datos', [UserController::class, 'index']);

    Route::post('/alumnos/entradas/add', [UserInputLogController::class, 'store'])->name('entrada.store');

    Route::get('/datatables/user-inputs', [UserInputLogController::class, 'get'])->name('entrada.get');
    

    
});
