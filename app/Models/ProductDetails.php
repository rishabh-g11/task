<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    protected $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'qty',
        'price',
        'status'
    ];


    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
    public function sizes()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
}
