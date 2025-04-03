<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    //

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
}
