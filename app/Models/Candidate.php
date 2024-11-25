<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /** @use HasFactory<\Database\Factories\CanditateFactory> */
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date_naissance' => 'date',
        'allophone' => 'boolean',
        'candidature_validee' => 'boolean',
        'discipline_eloignee' => 'boolean',
    ];
}
