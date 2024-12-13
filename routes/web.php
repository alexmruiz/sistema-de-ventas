<?php

use App\Livewire\Category\CategoryComponent;
use App\Livewire\Category\CategoryShow;
use App\Livewire\Product\ProductComponent;
use App\Livewire\Product\ProductShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Incio;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/inicio', Incio::class)->name('inicio');

Route::get('/categorias', CategoryComponent::class)->name('categorias');

Route::get('/categorias/{category}', CategoryShow::class)->name('categorias.show');

Route::get('/productos', ProductComponent::class)->name('product');

Route::get('/productos/{product}', ProductShow::class)->name('product.show');