<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'product_code','product_name', 'product_unit', 'product_price', 'created_at', 'updated_at','category_id',
    ];
    protected $table = 'tbl_product';
}
