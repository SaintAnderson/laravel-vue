<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

//    public function categories(): BelongsToMany
//    {
//       return $this->belongsToMany(Category::class, 'categories');
//    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }


    /**
     * @return BelongsToMany
     */
    public function specifications(): BelongsToMany
    {
        return $this->belongsToMany(Specification::class, 'specification_product')->withPivot('value');
    }
}
