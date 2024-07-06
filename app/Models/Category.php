<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['name', 'full_icon_path'];

    protected $casts = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];

    public function getNameAttribute()
    {
        return $this->attributes[ 'name_' . app()->getLocale() ];
    }

    public function getFullIconPathAttribute()
    {
        return asset(getImagePathFromDirectory($this->icon, 'Categories', "default.svg"));
    }
}
