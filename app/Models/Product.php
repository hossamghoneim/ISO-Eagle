<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['images'];
    protected $appends = ['name', 'full_structure_image_path', 'full_panel_image_path', 'description'];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            // Delete all related product images
            $product->productImages()->delete();
        });
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getLocale()];
    }

    public function getDescriptionAttribute()
    {
        return $this->attributes['description_' . app()->getLocale()];
    }

    public function getFullStructureImagePathAttribute()
    {
        return asset(getImagePathFromDirectory($this->structure_image, 'Products', "default.svg"));
    }

    public function getFullPanelImagePathAttribute()
    {
        return asset(getImagePathFromDirectory($this->panel_image, 'Products', "default.svg"));
    }
}
