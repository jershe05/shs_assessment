<?php

namespace App\Domains\Tracks\Models;

use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    protected $fillable = [
        'name',
        'track',
        'created_at',
        'updated_at'
    ];
}
