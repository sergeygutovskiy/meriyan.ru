<?php

namespace App\Models\Tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag; 

class Tour extends Model
{
    use HasFactory;

    public function info()
    {
        return $this->hasOne(TourInfo::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
