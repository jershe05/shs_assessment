<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Applicant\Models\Applicant;
use App\Domains\Result\Models\SuggestedStrand;
use App\Http\Livewire\StudentListPerStrand;
use Illuminate\Support\Facades\DB;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $applicantsCount = Applicant::all()->count();
        $studentPerStrand = SuggestedStrand::select(
            'strand_id', DB::raw("count(applicant_id) as total")
        )->groupBy('strand_id')->get();

        return view('backend.dashboard')
            ->with('applicant', $applicantsCount)
            ->with('studentPerStrand', $studentPerStrand);
    }
}
