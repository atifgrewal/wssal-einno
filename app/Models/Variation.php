<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variation extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'variations';

    public static $searchable = [
        'quantity',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function variationProducts()
    {
        return $this->hasMany(Product::class, 'variation_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
