<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "type",
        "address",
        "country",
        "vat_number",
    ];

    public function businessContacts()
    {
        return $this->hasMany(BusinessContact::class);
    }

    public function salesContact()
    {
        return $this->hasOne(BusinessContact::class)
            ->where("is_primary", true)
            ->where("type", "sales");
    }


    public function logisticsContact()
    {
        return $this->hasOne(BusinessContact::class)
            ->where("is_primary", true)
            ->where("type", "logistics");
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
