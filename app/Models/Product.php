<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 */
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];



    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }



    /**
     * @return BelongsToMany
     */
//    public function specification(): BelongsToMany
//    {
//        return $this->belongsToMany(Measure::class, 'specification_product');
//        //        return $this->belongsToMany(Measure::class, 'specification_product')->withPivot('value');
//    }

    /**
     * @return BelongsToMany
     */
    public function specification(): BelongsToMany
    {
        return $this->belongsToMany(Measure::class, 'specification_product')->withPivot('value');
        //        return $this->belongsToMany(Measure::class, 'specification_product')->withPivot('value');
    }
}
