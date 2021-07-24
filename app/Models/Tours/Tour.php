<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag; 
use Database\Factories\TourFactory;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'price', 
        'discount_price', 
        'image_path',
        'card_image_path',
    ];
    
    public function getLocalStoragePathAttribute()
    {
        return '/tours/' . $this->id . '/';
    }

    public function getImageSrcAttribute()
    {
        return  '/images/storage/' . $this->local_storage_path . $this->image_path;
    }

    public function getCardImageSrcAttribute()
    {
        return  '/images/storage/' . $this->local_storage_path . $this->card_image_path;
    }

    public function getPriceFormattedAttribute()
    {
        return number_format($this->price_real, 0, '', ' ') . ' ₽';
    }

    public function getPriceBeforeSaleFormattedAttribute()
    {
        return number_format($this->price, 0, '', ' ') . ' ₽';
    }

    public function getPriceRealAttribute()
    {
        return $this->discount_price == null ? $this->price : $this->discount_price;
    }

    public function info()
    {
        return $this->hasOne(TourInfo::class, 'tour_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tours_tags');
    }

    protected static function newFactory()
    {
        return TourFactory::new();
    }
}
