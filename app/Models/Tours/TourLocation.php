<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\TourLocationFactory;

class TourLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_path',
        'is_big'
    ];

    public function getLocalStoragePathAttribute()
    {
        return $this->tour_info->tour->local_storage_path . 'locations/';
    }
    
    public function getImageSrcAttribute()
    {
        return  '/images/storage/' . $this->local_storage_path . $this->image_path;
    }

    public function tour_info() 
    {
        return $this->belongsTo(TourInfo::class);
    }

    protected static function newFactory()
    {
        return TourLocationFactory::new();
    }
}
