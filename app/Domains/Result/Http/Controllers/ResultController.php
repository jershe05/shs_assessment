<?php

namespace App\Domains\Result\Http\Controllers;

use App\Domains\Applicant\Models\Applicant;
use App\Domains\Result\Models\ApplicantResultPerStrand;
use App\Domains\Tracks\Models\Strand;

class ResultController
{

    public function getTotalApplicantPerStrand()
    {
        $strands = Strand::all();
        $applicantCount = Applicant::all()->count();
        $applicants = Applicant::all();
        $results = collect();
        foreach($applicants as $applicant)
        {
            $suggestedStrand = $applicant->applicantResult->where('result', $applicant->applicantResult->max('result'));
            if(count($suggestedStrand))
            {
                $results->push([
                    'applicant_id' => $applicant->id,
                    'strand_id' => $suggestedStrand->first()->strand_id]);
            }

        }

        $resultPercentage = collect();

        foreach($strands as $strand)
        {
            $resultPercentage->push([
                'percentage' => number_format($results->where('strand_id', $strand->id)->count() / $applicantCount * 100, 2),
                'strand' => $strand->name
            ]);
        }

        return $resultPercentage;
    }
}
