<?php

namespace App\Models;

use App\Http\Controllers\ProductDetailsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'brand_name',
        'description',
        'model_name',
        'status'
    ];
    /**find product details using product id */
    public function productDetails()
    {
        return $this->hasMany(ProductDetails::class, 'product_id', 'id');
    }
}
