<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DomainController;

Route::get('/', function () {
    return view('home');
});
//Route::view('about', 'about');
Route::view('home', 'home');
Route::view('adminlog', 'template.login.login');
Route::view('memeber-dashboard', 'template.member.dashbord');

///home/manish/ecom/blog/resources/views/template/member./dashbord.blade.php

Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//t

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('template.member.dashbord');
//     })->name('dashboard');

// });

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');



Route::group(['middleware' => 'Member'], function () {

    Route::get('/dashboard', function () {return view('template.member.dashbord'); })->name('dashboard');
    // just for domain
    Route::get('/domains', [DomainController::class, 'index'])->name('domains.index'); // List domains
    Route::get('/domains/create', [DomainController::class, 'create'])->name('domains.create'); // Show create form
    Route::post('/domains', [DomainController::class, 'store'])->name('domains.store'); // Store new domain
    Route::get('/domains/{id}/edit', [DomainController::class, 'edit'])->name('domains.edit'); // Show edit form
    Route::put('/domains/{id}', [DomainController::class, 'update'])->name('domains.update'); // Update domain
    Route::delete('/domains/{id}', [DomainController::class, 'destroy'])->name('domains.destroy'); // Delete domain
    Route::post('/domains/import', [DomainController::class, 'import'])->name('domains.import');
    Route::get('/domains/export', [DomainController::class, 'export'])->name('domains.export');

});

Route::group(['middleware' => 'Admin'], function () {

    Route::get('/admin-dashboard', function () {return view('about'); })->name('admin-dashboard');
});
