<?php

namespace App\Domains\Question\Models;

use App\Domains\Tracks\Models\Strand;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'question_id',
        'answer',
        'result',
        'applicant_id',
        'created_at',
        'updated_at'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
