<?php

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

Route::get('/', function () {
    return view('welcome');
});


//la route vers le dashboard
Route::get('/dashboard', function () {
    return view('absence.dashboard');
});
//la route pour gerer les seances
Route::resource('seance', 'seanceController');
//la route pour faire l'appel des etudiants
Route::resource('appel', 'EtudiantController');

//la route pour lister les absents
Route::resource('liste', 'AbsenceController');



//la route pour chercher un etudiant par cne
Route::get('/find','AbsenceController@searchByCne')->name('absence.search');
//la route pour chercher les absences par d'un jour
Route::get('/recherche','AbsenceController@searchByDate')->name('absence.find');

//la route pour lister les etudiants
Route::get('/search','EtudiantController@search')->name('seances.search');
Route::resource('absence', 'AbsenceController');


