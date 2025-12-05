<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'name',
        'description',
        'price',
        'stock',
        'active',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function inventoryMovements()
    {
        return $this->hasMany(InventoryMovement::class);
    }
}
