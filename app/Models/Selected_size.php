<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selected_size extends Model
{
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
