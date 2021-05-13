<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Complexity;
use App\Models\Season; 

class TourInfo extends Model
{
    use HasFactory;

    public function complexity()
    {
        return $this->hasOne(Complexity::class);
    }

    public function season()
    {
        return $this->hasOne(Season::class);
    }
}
