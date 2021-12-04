<?php

namespace App\Domains\Result\Models;

use App\Domains\Applicant\Models\Applicant;
use Illuminate\Database\Eloquent\Model;

class SuggestedStrand extends Model
{
    protected $table = 'suggested_strand';
    protected $fillable = [
        'applicant_id',
        'strand_id',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
