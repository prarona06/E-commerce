<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subcategeory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'serial_no',
        'status',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
