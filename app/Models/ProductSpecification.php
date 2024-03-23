<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $table = 'specification_product';
    protected $fillable = [
        'product_id',
        'measure_id',
        'value',
    ];
    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'specification_product');
    }
}
