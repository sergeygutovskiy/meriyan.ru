<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TourLocationFactory;

class TourLocation extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return TourLocationFactory::new();
    }
}
