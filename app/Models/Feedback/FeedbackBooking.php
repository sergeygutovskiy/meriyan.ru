<?php

namespace App\Models\Feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tours\Tour; 

class FeedbackBooking extends Model
{
    use HasFactory;

    protected $table = 'feedback_booking';

    protected $fillable = [
        'name', 'phone', 'email', 'tour_id'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }
}
