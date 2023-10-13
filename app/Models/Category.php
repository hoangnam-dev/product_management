<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'category_code','category_name'
    ];
    protected $table = 'tbl_category';

    // Relationship with product table
    public function hasProduct(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
