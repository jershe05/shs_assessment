<?php

namespace App\Domains\Applicant\Http\Controllers;

use App\Domains\Applicant\Models\Applicant;
use App\Http\Requests\Frontend\User\StoreApplicantRequest;
use Illuminate\Http\Request;

class ApplicantController
{
    public function store(StoreApplicantRequest $request)
    {
        $input = $request->validated();
        $applicant = Applicant::create($input);
        return redirect()->route('frontend.assessment.show', ['applicant' => $applicant])->withFlashSuccess(__('Successfully Registered!'));
    }

    public function register()
    {
        return view('frontend.pages.register-student');
    }
    public function index()
    {
        return view('student.index');
    }
}
