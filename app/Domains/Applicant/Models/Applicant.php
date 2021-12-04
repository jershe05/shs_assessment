<?php
namespace App\Domains\Applicant\Models;

use App\Domains\Result\Models\ApplicantResultPerStrand;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone',
        'address',
        'school'
    ];

    public function applicantResult()
    {
        return $this->hasMany(ApplicantResultPerStrand::class);
    }
}
