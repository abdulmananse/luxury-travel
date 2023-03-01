<?php

use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', [HomeController::class, 'index'])->middleware('permission:Search Properties');
    Route::get('search-properties', [HomeController::class, 'searchProperties'])->middleware('permission:Search Properties');

    Route::get('agents/invite', [AgentController::class, 'invite'])->name('agents.invite')->middleware('permission:Manage Agents');
    Route::post('agents/invite', [AgentController::class, 'sendInvitation'])->name('agents.sendInvitation')->middleware('permission:Manage Agents');

    Route::post('create-task', [HomeController::class, 'createTask']);
    Route::get('detail/{id}', [HomeController::class, 'show']);
    Route::get('import-sheets', [HomeController::class, 'importSheets']);
    Route::get('import-properties/{sheetId?}', [HomeController::class, 'importProperties']);
    Route::get('import-calander/{propertyId?}', [HomeController::class, 'importCalander']);
    Route::get('/error_logs', [HomeController::class, 'errorLogs']);
});

require __DIR__.'/auth.php';
