<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getTranslatedNameAttribute()
    {
        // If category name is a translation key (starts with 'category.'), translate it
        if (str_starts_with($this->name, 'category.')) {
            return __('shop.' . $this->name);
        }

        // Otherwise, use old mapping for backward compatibility
        $mapping = [
            'Laptops & Computers' => 'category_laptops',
            'Smartphones & Tablets' => 'category_smartphones',
            'Audio & Headphones' => 'category_audio',
            'Gaming' => 'category_gaming',
            'Smart Home' => 'category_smart_home',
            'Cameras & Photography' => 'category_cameras',
            'Wearables' => 'category_wearables',
            'Accessories' => 'category_accessories',
        ];

        $key = $mapping[$this->name] ?? null;

        return $key ? __('shop.' . $key) : $this->name;
    }
}
