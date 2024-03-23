<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Measure extends Model
{
    use HasFactory;
    protected $fillable = [
        'measure',
    ];
//    public function products(): BelongsToMany
//    {
//        return $this->belongsToMany(Product::class, 'specification_product');
//    }
}
