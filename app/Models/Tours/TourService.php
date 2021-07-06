<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TourServiceFactory;

class TourService extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'is_included_in_price'
    ];

    protected static function newFactory()
    {
        return TourServiceFactory::new();
    }
}
