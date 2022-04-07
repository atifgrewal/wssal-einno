<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        '0' => 'Enable',
        '1' => 'Disable',
    ];

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'driver_id',
        'customer_id',
        'quantity',
        'payment',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
