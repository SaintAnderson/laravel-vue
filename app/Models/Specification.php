<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $measure
 * @method static inRandomOrder()
 */
class Specification extends Model
{
    use HasFactory;

    protected $fillable = [
        'measure_id',
        'value',
    ];



}


