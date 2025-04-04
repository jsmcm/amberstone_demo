<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class PurchaseOrder extends Model
{
    protected $appends = [
        "uid"
    ];


    public function uid(): Attribute
    {
        return Attribute::make(
            get: fn() => strtoupper($this->type) . "-" . $this->id
        );
    }

    public function scopeWhereUid($query, string $uid)
    {
        [$type, $id] = explode("-", $uid);
        return $query->where("type", strtolower($type))->where("id", $id);
    }

    public function purchaseOrderItems()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
