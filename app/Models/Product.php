<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function photos()
    {
        return $this->hasMany(Product_Photo::class);
    }

    public function code()
    {
        return $this->belongsTo(Code::class);
    }

    public function OrderProduct()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
