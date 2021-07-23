<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tours\Tour; 

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'page_name',
    ];

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tours_tags');
    }
}
