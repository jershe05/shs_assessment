<?php

namespace App\Domains\Result\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantResultPerStrand extends Model
{
    protected $table = 'applicant_result_per_strand';
    protected $fillable = [
        'applicant_id',
        'strand_id',
        'result'
    ];
}
