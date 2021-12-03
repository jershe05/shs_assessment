<?php

namespace App\Domains\Question\Models;

use App\Domains\Tracks\Models\Strand;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'track_id',
        'year',
        'created_at',
        'updated_at'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class);
    }
}
