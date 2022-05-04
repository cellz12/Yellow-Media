<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static select(mixed $args)
 * @method static where(int[] $array)
 */
class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'phone',
        'creator_id'
    ];
}
