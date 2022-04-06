<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Driver extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const STATUS_SELECT = [
        '0' => 'Disable',
        '1' => 'Enable',
    ];

    public const TRANSPORT_SELECT = [
        '0' => 'Car',
        '1' => 'Bike',
        '2' => 'Riksha',
    ];

    public const PROVIDER_SELECT = [
        '0' => 'user1',
        '1' => 'user 2',
        '2' => 'user 3',
    ];

    public $table = 'drivers';

    public static $searchable = [
        'email',
        'address',
        'account_name',
        'transport_no',
    ];

    protected $appends = [
        'profile',
        'transport_image',
    ];

    protected $dates = [
        'cnic_start_date',
        'cnic_expire_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'address',
        'transport',
        'status',
        'cnic_no',
        'cnic_start_date',
        'cnic_expire_date',
        'store_name',
        'account_name',
        'current_balance',
        'iban_no',
        'bank_name',
        'swift_code',
        'total_orders',
        'total_earning',
        'transport_no',
        'provider',
        'wal_amount',
        'phone_no',
        'wal_mobile_no',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getProfileAttribute()
    {
        return $this->getMedia('profile')->last();
    }

    public function getTransportImageAttribute()
    {
        return $this->getMedia('transport_image');
    }

    public function getCnicStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCnicStartDateAttribute($value)
    {
        $this->attributes['cnic_start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCnicExpireDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCnicExpireDateAttribute($value)
    {
        $this->attributes['cnic_expire_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
