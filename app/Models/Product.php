<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function selected_size()
    {
        return $this->hasOne(Selected_size::class);
    }

    public function selected__colour()
    {
        return $this->hasOne(Selected_Colour::class);
    }

    public function selected_quantity()
    {
        return $this->hasOne(Selected_quantity::class);
    }


    public function getPriceAfterDiscountAttribute()
    {
        return $this->price - $this->discount_amount;
    }
}
