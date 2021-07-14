<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackQuestion extends Model
{
    use HasFactory;

    protected $table = 'feedback_questions';

    protected $fillable = [
        'name', 'email', 'question'
    ];
}
