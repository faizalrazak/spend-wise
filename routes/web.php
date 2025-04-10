<?php

use App\Livewire\Expense\Create;
use App\Livewire\Expense\Edit;
use App\Livewire\Expense\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::prefix('expense')->group(function () {
        Route::get('', Index::class)->name('expense.index');
        Route::get('create', Create::class)->name('expense.create');
        Route::get('edit/{id}', Edit::class)->name('expense.edit');
    });
});
