<?php

namespace App\Domains\Assessment\Http\Controllers;

use App\Domains\Applicant\Models\Applicant;
use App\Http\Requests\Frontend\User\StoreApplicantRequest;
use Illuminate\Http\Request;

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
}
