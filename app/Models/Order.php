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
        '0' => 'Cash',
        '1' => 'Card',
    ];
    public const ORDER_STATUS_SELECT = [
        '0' => 'Cancel',
        '1' => 'Pending',
        '2' => 'Confirmed',
        '3' => 'In process',
        '4' => 'Ready delivery',
        '5' => 'Item on a way',
        '6' => 'Delivered',
    ];
    public const ORDER_TYPE_SELECT = [
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
        'st_date',
        'order_status',
        'order_type',
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
