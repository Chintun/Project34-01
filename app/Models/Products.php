<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [


        'name',
        'price',
        'descrpiption',
        'category_id',
        'image',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

}
