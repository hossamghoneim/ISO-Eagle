<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['full_cover_path'];
    protected $casts = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function getFullCoverPathAttribute()
    {
        return asset(getImagePathFromDirectory($this->cover, 'Videos', "default.svg"));
    }
}
