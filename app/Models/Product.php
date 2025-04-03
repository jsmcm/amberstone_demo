<?php

namespace App\Models;

use App\Dto\ProductPriceDto;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "product_code",
        "description"
    ];

    protected $appends = [
        "price"
    ];

    public function price(): Attribute
    {
        return Attribute::make(
            get: function () {

                $year = now()->year;

                $productPrice = ProductPrice::where("product_id", $this->id)
                    ->where("year", $year)
                    ->first();

                if ($productPrice === null) {
                    return null;
                }

                return new ProductPriceDto($productPrice->cost_per_kg, $productPrice->year);
            }
        );
    }

    public function productPrices()
    {
        return $this->hasMany(ProductPrice::class);
    }
}
