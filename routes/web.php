<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\S3Controller;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\SNSController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/login', [MainController::class, 'login'])->name('login');

Route::post('/auth', [UserController::class, 'authManual'])->name('auth');
Route::get('/processLogin', [UserController::class, 'processLogin'])->name('processLogin');

Route::middleware('phaseCheck:0')->group(function () {
    Route::get('/biodata', [MainController::class, 'biodata'])->name('biodata');
    Route::post('/biodata', [UserController::class, 'storeBiodata'])->name('biodata.submit');
});

Route::middleware('phaseCheck:1')->group(function () {
    Route::get('/files', [MainController::class, 'files'])->name('files');
    Route::post('/files/{slug}', [UserController::class, 'storeFiles'])->name('files.store');
    Route::get('/files/check', [UserController::class, 'checkFiles'])->name('files.check');
});

Route::middleware('phaseCheck:2')->group(function () {
    Route::get('/schedule', [MainController::class, 'schedule'])->name('schedule');
    Route::get('/checkInterview', [UserController::class, 'checkInterview'])->name('checkInterview');
});

Route::middleware('phaseCheck:4')->group(function () {

    Route::get('/project', [MainController::class, 'project'])->name('project');
    Route::post('/project', [UserController::class, 'storeProject'])->name('project.submit');
});

Route::get('/logout', [MainController::class, 'logout'])->name('logout');

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/auth', [AdminController::class, 'authManual'])->name('admin.auth');
Route::get('admin/processLogin', [AdminController::class, 'processLogin'])->name('admin.processLogin');

Route::prefix('admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/project', [AdminController::class, 'project'])->name('project');
    Route::put('/updateLink/{division:id}', [AdminController::class, 'updateLink'])->name('updateLink');
    Route::post('/validateInterview', [AdminController::class, 'validateInterview'])->name('validateInterview');
    Route::post('/sendEmail', [SNSController::class, 'handleCallback'])->name('sendEmail');
});

Route::get('/upload', function () {
    return view('upload');
});
Route::post('/upload', [S3Controller::class, 'uploadStore']);
Route::post('/upload/{slug}', [S3Controller::class, 'uploadStore'])->name('files.store');

Route::post('/send-notification', [SNSController::class, 'handleCallback']);
Route::post('/admin/validate-interview', [AdminController::class, 'validateInterview'])->name('admin.validateInterview');
