<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::view('/gracias', 'pages.gracias')->name('gracias');
Route::view('/tasaciones', 'pages.tasaciones')->name('tasaciones');
Route::view('/nosotros', 'pages.quienes-somos')->name('nosotros');
Route::view('/oficinas', 'pages.oficinas')->name('oficinas');
Route::view('/contacto', 'pages.contacto')->name('contacto');

Route::view('/404', 'errors.404')->name('404');
Route::view('/500', 'errors.500')->name('500');
Route::view('/505', 'errors.505')->name('505');

Route::controller(PropertyController::class)->group(function () {
    Route::get('/propiedades', 'slugify')->name('property.slugify');
    Route::get('/propiedad/{id}', 'getPropertyDetail')->name('property.detail');
    Route::get('/buscar/{slug}', 'search')->name('property.search');
    Route::get('/get/properties-data', 'getPropertyData')->name('getPropertiesData');
    Route::get('/get/tags', 'getPropertyTags')->name('getTags');
    Route::get('/get/properties', 'getProperties')->name('getProps');
});
