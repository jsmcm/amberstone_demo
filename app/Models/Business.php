<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    public function businessContacts()
    {
        return $this->hasMany(BusinessContact::class);
    }

    public function primaryContact()
    {
        return $this->hasOne(BusinessContact::class)->where("is_primary", true);
    }
}
