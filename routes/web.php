<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DevelopmentController;
use App\Http\Controllers\ContactController;
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

Route::controller(DevelopmentController::class)->group(function () {
    Route::get('/emprendimientos', 'slugify')->name('development.slugify');
    Route::get('/emprendimientos/{slug}', 'search')->name('development.search');

    // Route::get('/get/developments', 'getDevelopment')->name('getProps');
    // Route::get('/emprendimientos/', 'getDevelopmentByName')->name('development.get.byname');
    // Route::get('/emprendimientos/{slug}', 'getDevelopments')->name('ver.emprendimientos'); //->name('development.get');
    // Route::get('/emprendimiento/{id}', 'showDevelopmentDetail')->name('ver.ficha.emprendimiento'); //name('development.get.details');
    // Route::get('/get/developments', 'getDevelopments')->name('getDevelopment');
    // Route::get('/get/developments', 'getDevelopment')->name('getDevelopment');
});

Route::controller(ContactController::class)->group(function () {
    Route::post('/contactar', 'sendContactForm')->name('contact');
});