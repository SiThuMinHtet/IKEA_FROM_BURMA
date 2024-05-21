<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class Category extends Model
{
    //use HasFactory;
    protected $table = 'category';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
