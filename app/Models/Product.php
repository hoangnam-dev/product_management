<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'product_code', 'product_name', 'product_unit', 'product_price', 'created_at', 'updated_at', 'category_id',
    ];
    protected $table = 'tbl_product';

    // Relationship with Category
    public function hasCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
