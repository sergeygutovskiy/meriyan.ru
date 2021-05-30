<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag; 
use Database\Factories\TourFactory;

class Tour extends Model
{
    use HasFactory;

    
    
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
