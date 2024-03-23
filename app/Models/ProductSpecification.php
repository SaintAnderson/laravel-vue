<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $table = 'specification_product';
    protected $fillable = [
        'product_id',
        'specification_id'
    ];
}
