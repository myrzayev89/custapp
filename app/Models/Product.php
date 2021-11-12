<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Product
 * @package App\Models
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'qty', 'pur_price', 'price', 'more'];
}
