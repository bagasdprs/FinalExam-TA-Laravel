<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionScores extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'category',
        'score',
    ];
}
