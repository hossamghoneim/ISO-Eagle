<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['full_image_path'];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getFullImagePathAttribute()
    {
        return asset(getImagePathFromDirectory($this->image, 'Products', "default.svg"));
    }
}
