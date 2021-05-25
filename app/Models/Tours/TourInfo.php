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
        return $this->belongsTo(Complexity::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function locations()
    {
        return $this->hasMany(TourLocation::class, 'tour_info_id');
    }

    public function services_in_price()
    {
        return $this->hasMany(TourPriceInfo::class, 'tour_info_id')->where('is_in_price', true);
    }

    public function services_not_in_price()
    {
        return $this->hasMany(TourPriceInfo::class, 'tour_info_id')->where('is_in_price', false);
    }
}
