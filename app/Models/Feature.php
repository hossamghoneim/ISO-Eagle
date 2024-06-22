<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['headline', 'details', 'full_icon_path'];

    protected $casts = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function getHeadlineAttribute()
    {
        return $this->attributes[ 'headline_' . app()->getLocale() ];
    }

    public function getDetailsAttribute()
    {
        return $this->attributes[ 'details_' . app()->getLocale() ];
    }

    public function getFullIconPathAttribute()
    {
        return asset(getImagePathFromDirectory($this->icon, 'Features', "default.svg"));
    }
}
