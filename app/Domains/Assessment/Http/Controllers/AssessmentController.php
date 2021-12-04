<?php

namespace App\Domains\Assessment\Http\Controllers;

use App\Domains\Applicant\Models\Applicant;
use App\Http\Requests\Frontend\User\StoreApplicantRequest;
use Illuminate\Http\Request;
use PDF;

class AssessmentController
{
    public function store(StoreApplicantRequest $request)
    {
        $input = $request->validated();
        $applicant = Applicant::create($input);
        //return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('The role was successfully updated.'));
    }

    public function show(Applicant $applicant)
    {
        return view('frontend.pages.assessment')
            ->with('applicant', $applicant);
    }
    
    public function result(Applicant $applicant)
    {
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('frontend.pages.result', ['applicant' => $applicant->id]);
        return $pdf->download('assessment-result.pdf');
    }
}
