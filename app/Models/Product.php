<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Product extends Model
{
    protected static function booted()
    {
        // Automatically translate when product is created
        static::created(function ($product) {
            $product->autoTranslate();
        });

        // Automatically translate when product name or description is updated
        static::updated(function ($product) {
            if ($product->isDirty('name') || $product->isDirty('description')) {
                $product->autoTranslate();
            }
        });
    }
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock_quantity',
        'image_url',
        'is_active',
        'name_et',
        'name_en',
        'name_ru',
        'description_et',
        'description_en',
        'description_ru',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Get translated name based on current locale
     */
    public function getTranslatedNameAttribute()
    {
        $locale = app()->getLocale();
        $translatedName = $this->{"name_{$locale}"};

        // Fallback to default name if translation doesn't exist
        return $translatedName ?: $this->name;
    }

    /**
     * Get translated description based on current locale
     */
    public function getTranslatedDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $translatedDescription = $this->{"description_{$locale}"};

        // Fallback to default description if translation doesn't exist
        return $translatedDescription ?: $this->description;
    }

    /**
     * Automatically translate product name and description
     */
    public function autoTranslate()
    {
        // Determine source language (assume English if name is in English)
        $source = 'en';
        $targets = ['et', 'ru'];

        // If name is already in another language, adjust accordingly
        // For now, we'll assume the base 'name' field is in English

        try {
            $translator = new GoogleTranslate();
            $translator->setSource($source);

            foreach ($targets as $target) {
                // Translate name
                if (!empty($this->name)) {
                    $translator->setTarget($target);
                    $this->{"name_{$target}"} = $translator->translate($this->name);
                }

                // Translate description if exists
                if (!empty($this->description)) {
                    $this->{"description_{$target}"} = $translator->translate($this->description);
                }

                // Small delay to avoid rate limiting
                usleep(100000); // 0.1 seconds
            }

            // Save without triggering the updated event again
            $this->saveQuietly();

        } catch (\Exception $e) {
            // Log error but don't fail the product creation
            \Log::error("Product translation failed for product {$this->id}: " . $e->getMessage());
        }
    }
}
