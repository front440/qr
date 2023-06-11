<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserInputLogController;
use App\Http\Controllers\UserOutLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QrController;
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

Route::get('/entrada', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/salida', [App\Http\Controllers\UserController::class, 'index']);

//Routes admin
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/home', [AdminController::class, 'index']);
    Route::get('/alumnos/entradas', [UserInputLogController::class, 'index']);
    Route::get('/alumnos/salidas', [UserOutLogController::class, 'index']);

    Route::get('/qr/entrada', [QrController::class, 'entrada']);
    Route::get('/qr/salida', [QrController::class, 'salida']);

    
    Route::get('/alumnos/datos', [UserController::class, 'index']);
    Route::get('/datatables/users', [UserController::class, 'get'])->name('user.get');

    Route::post('/alumnos/entradas/add', [UserInputLogController::class, 'store'])->name('entrada.store');
    
    Route::get('/datatables/user-inputs', [UserInputLogController::class, 'get'])->name('entrada.get');
    Route::post('/datatables/user-inputs-edit', [UserInputLogController::class, 'edit'])->name('entrada.edit'); // Edit input
    Route::post('/datatables/user-inputs-update', [UserInputLogController::class, 'update'])->name('entrada.update'); // Update input
    Route::post('/datatables/user-inputs-delete', [UserInputLogController::class, 'destroy'])->name('entrada.delete'); // Delete input
    Route::get('/datatables/user-outs', [UserOutLogController::class, 'get'])->name('salida.get');
    
});

//Routes user
Route::group([
    'middleware' => 'user',
    'prefix' => 'user',
    'namespace' => 'user'
], function () {
    Route::get('/home', [UsersController::class, 'index']);
    Route::get('/settings', [UsersController::class, 'profile']);
    Route::get('/change_password', [UsersController::class, 'pass']);
    Route::post('/update/{id}', [UsersController::class, 'update'])->name('user.update');

    Route::get('/qr/entrada', [QrController::class, 'entrada']);
    Route::get('/qr/salida', [QrController::class, 'salida']);

});
