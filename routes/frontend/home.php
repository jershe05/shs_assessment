<?php

use App\Domains\Applicant\Http\Controllers\ApplicantController;
use App\Domains\Assessment\Http\Controllers\AssessmentController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });

Route::post('/applicant-store', [ApplicantController::class, 'store'])
    ->name('application.store');

Route::get('/applicant-registration', [ApplicantController::class, 'register'])
    ->name('application.registration');

Route::get('assessment-show/{applicant}', [AssessmentController::class, 'show'])
    ->name('assessment.show');
