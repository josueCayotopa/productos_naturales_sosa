<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'images',
        'description',
        'price',
        'discount_price',
        'rating',
        'rating_count',
        'is_active',
        'is_featured',
        'in_stock',
        'on_sale',
        'en_promocion',
        'porcentaje_descuento',
        'fecha_inicio_promocion',
        'fecha_fin_promocion',
        'imagen_promocion',
        'tipo',
        'lote',
        'fecha_vencimiento',
    ];


    protected $casts = [
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function setDiscountPercentageAttribute($value)
    {
        $this->attributes['porcentaje_descuento'] = $value;
        if ($value && $this->attributes['price']) {
            $this->attributes['discount_price'] = $this->attributes['price'] * (1 - $value / 100);
        }
    }
    
    public function setPriceAttribute($value)
{
    $this->attributes['price'] = $value;
    if (isset($this->attributes['porcentaje_descuento'])) {
        $this->attributes['discount_price'] = $value * (1 - $this->attributes['porcentaje_descuento'] / 100);
    }
}

public function setPorcentajeDescuentoAttribute($value)
{
    $this->attributes['porcentaje_descuento'] = $value;
    if (isset($this->attributes['price'])) {
        $this->attributes['discount_price'] = $this->attributes['price'] * (1 - $value / 100);
    }
}

public function getFinalPriceAttribute()
{
    return $this->discount_price ?: $this->price;
}

}
