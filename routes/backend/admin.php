<?php

use App\Domains\Result\Http\Controllers\ResultController;
use App\Domains\Tracks\Http\Controllers\TracksController;
use App\Http\Controllers\Backend\DashboardController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
Route::middleware(['auth'])->group(function () {
    Route::get('tracks', [TracksController::class, 'index'])
    ->name('tracks');
Route::get('track/update/{strand}', [TracksController::class, 'update'])
    ->name('track.update');
Route::get('strand/{strand}', [TracksController::class, 'show'])
    ->name('strand.show');

Route::get('question/edit/{question}', [TracksController::class, 'editQuestion'])
    ->name('question.edit');
Route::delete('question/delete/{question}', [TracksController::class, 'deleteQuestion'])
    ->name('question.delete');
Route::get('strand-result', [ResultController::class, 'getTotalApplicantPerStrand']);
});






