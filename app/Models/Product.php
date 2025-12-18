<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'created_by',
        'name',
        'slug',
        'price',
        'discounted_price',
        'thumbnail',
        'description',
        'gallery',
        'serial_no',
        'status',
        'qty',
        'attributes',
        'created_at',
        'updated_at'
    ];
    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');

    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
}
public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
}
