<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackSelectionRequest extends Model
{
    use HasFactory;

    protected $table = 'feedback_selection_requests';

    protected $fillable = [
        'name', 'phone', 'email', 'wishes'
    ];
}
