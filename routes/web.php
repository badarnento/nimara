<?php

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


use Illuminate\Http\Request;

$pages = [
    'home',
    'about',
    'product',
];

Route::get('/{any?}', function (Request $request, $any = null) {
    $page = $any ?: 'home'; // Default ke 'home' jika $any kosong

    if ($request->ajax()) {
        return view("pages.$page"); // Pastikan hanya "pages.home" atau "pages.about"
    }

    return view('spa', ['page' => $page]); // Jangan pakai "pages." di sini
})->where('any', implode("|",$pages));

