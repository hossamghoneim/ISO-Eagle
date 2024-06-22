<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name', 'description', 'full_icon_path'];

    protected $casts = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function getNameAttribute()
    {
        return $this->attributes[ 'name_' . app()->getLocale() ];
    }

    public function getDescriptionAttribute()
    {
        return $this->attributes[ 'description_' . app()->getLocale() ];
    }

    public function getFullIconPathAttribute()
    {
        return asset(getImagePathFromDirectory($this->icon, 'Services', "default.svg"));
    }
}
