<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/inicio', 'home');
/*
// Ejercicio A8.1.2 -> array asociativo
Route::get('/fecha', function () {
    $dia = date('d');
    $mes = date('m');
    $anio = date('Y');
    
    return view('fecha', ['dia' => $dia, 'mes' => $mes, 'anio' => $anio]);
});



// Ejercicio A8.1.3 -> función compact()
Route::get('/fecha', function () {
    $dia = date('d');
    $mes = date('m');
    $anio = date('Y');

    return view('fecha', compact('dia', 'mes', 'anio'));
});

*/

Route::get('/fecha', function () {
    $dia = date('d');
    $mes = date('m');
    $anio = date('Y');

    return view('fecha')->with(['dia' => $dia, 'mes' => $mes, 'anio' => $anio]);
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
