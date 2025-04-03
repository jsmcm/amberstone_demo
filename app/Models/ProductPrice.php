<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{

    protected $fillable = [
        "product_id",
        "year",
        "cost_per_kg"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
