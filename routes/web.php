<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CompanyController;
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

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('agents/register/{email}', [AgentController::class, 'register'])->name('agents.register');
Route::post('agents/register/{email}', [AgentController::class, 'createAgent'])->name('agents.createAgent');
Route::get('import-images', [HomeController::class, 'importGoogleDriveImages']);
Route::post('send-request', [HomeController::class, 'sendRequest']);

Route::middleware(['auth'])->group(function () {
    Route::redirect('dashboard', '/')->name('dashboard');

    Route::get('search', [HomeController::class, 'search'])->name('search')->middleware('permission:Search Properties');
    Route::get('search-properties', [HomeController::class, 'searchProperties'])->middleware('permission:Search Properties');

    Route::get('profile', [HomeController::class, 'profile'])->name('profile');

    Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('companies/{id}', [CompanyController::class, 'show'])->name('companies.show');
    Route::post('companies/update', [CompanyController::class, 'update'])->name('companies.update');

    Route::get('agents', [AgentController::class, 'index'])->name('agents.index')->middleware('permission:Manage Agents');
    Route::get('agents/invite', [AgentController::class, 'invite'])->name('agents.invite')->middleware('permission:Manage Agents');
    Route::post('agents/invite', [AgentController::class, 'sendInvitation'])->name('agents.sendInvitation')->middleware('permission:Manage Agents');

    Route::post('agents/update', [AgentController::class, 'update'])->name('agents.update');
    Route::get('delete-agent/{id}', [AgentController::class, 'destroy'])->name('agents.destroy');

    Route::post('create-task', [HomeController::class, 'createTask']);
    Route::get('detail/{id}', [HomeController::class, 'show']);
    Route::get('import-sheets', [HomeController::class, 'importSheets']);
    Route::get('import-properties/{sheetId?}', [HomeController::class, 'importProperties']);
    Route::get('import-calander/{propertyId?}', [HomeController::class, 'importCalander']);
    Route::get('/error_logs', [HomeController::class, 'errorLogs']);
});

require __DIR__.'/auth.php';
