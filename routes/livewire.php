<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\SurveyC;
use App\Http\Controllers;


Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/st', [SurveyC::class, 'render']);

// Surveys Sondage
    Route::get('/surveyC', 'SurveyController@index');
    Route::get('/surveyC/create', 'SurveyC@create');
    Route::post('/surveyC', 'SurveyC@store');
    Route::get('/surveyC/{id}/edit', 'SurveyC@edit');
    Route::put('/surveyC/{id}', 'SurveyC@update');
    Route::delete('/surveyC/{id}', 'SurveyC@destroy');

Route::get('/surveysss', [SurveyResponseController::class, 'show']);

});
