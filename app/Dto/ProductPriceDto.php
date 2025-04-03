<?php

declare(strict_types=1);

namespace App\Dto;

class ProductPriceDto
{

    public function __construct(public float $cost_per_kg, public int $year) {}
}
