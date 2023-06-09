<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserInputLogController;
use App\Http\Controllers\UserOutLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\EscanerController;
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
Route::get('/entrada', [App\Http\Controllers\UserInputLogController::class, 'index']);
Route::get('/salida', [App\Http\Controllers\UserOutLogController::class, 'index']);


//Routes admin
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/home', [AdminController::class, 'index']);
    Route::get('/alumnos/entradas', [UserInputLogController::class, 'index']);
    Route::get('/alumnos/salidas', [UserOutLogController::class, 'index']);

    Route::get('/alumnos/datos', [UserController::class, 'index']);
    Route::get('/datatables/users', [UserController::class, 'get'])->name('user.get');
    Route::post('/change_password', [UsersController::class, 'changePassAdmin'])->name('user.changepass');


    Route::post('/alumnos/entradas/add', [UserInputLogController::class, 'store'])->name('entrada.store');
    Route::post('/alumnos/salidas/add', [UserOutLogController::class, 'store'])->name('salida.store');
    // Entradas
    Route::get('/datatables/user-inputs', [UserInputLogController::class, 'get'])->name('entrada.get');
    Route::post('/datatables/user-inputs-edit', [UserInputLogController::class, 'edit'])->name('entrada.edit'); // Edit input
    Route::post('/datatables/user-inputs-update', [UserInputLogController::class, 'update'])->name('entrada.update');
    Route::post('/datatables/user-inputs-delete', [UserInputLogController::class, 'destroy'])->name('entrada.delete'); // Delete input // Update input

    Route::get('/datatables/user-output', [UserOutLogController::class, 'get'])->name('salida.get');
    Route::post('/datatables/user-output-edit', [UserOutLogController::class, 'edit'])->name('salida.edit'); // Edit input
    Route::post('/datatables/user-output-update', [UserOutLogController::class, 'update'])->name('salida.update');
    Route::post('/datatables/user-output-delete', [UserOutLogController::class, 'destroy'])->name('salida.delete');
    // Usuarios
    Route::get('/usuario/user-inputs', [UserController::class, 'get'])->name('usuario.get');
    Route::post('/usuario/user-inputs-edit', [UserController::class, 'edit'])->name('usuario.edit'); // Edit input
    Route::post('/usuario/user-inputs-update', [UserController::class, 'update'])->name('usuario.update');
    Route::post('/usuario/user-inputs-delete', [UserController::class, 'destroy'])->name('usuario.delete'); // Delete input // Update input

    Route::get('/datatables/user-outs', [UserOutLogController::class, 'get'])->name('salida.get');

    Route::get('/escaner', [EscanerController::class, 'mostrarVista']);
    
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

    Route::get('/qr/entrada', [QrController::class, 'entrada'])->name('entrada.qr');
    Route::get('/qr/salida', [QrController::class, 'salida'])->name('entrada.qr');
});
