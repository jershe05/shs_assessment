<?php

namespace App\Domains\Tracks\Models;

use App\Domains\Question\Models\Question;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    protected $fillable = [
        'name',
        'track',
        'created_at',
        'updated_at'
    ];

    public function question()
    {
        return $this->hasMany(Question::class, 'track_id', 'id');
    }
}
