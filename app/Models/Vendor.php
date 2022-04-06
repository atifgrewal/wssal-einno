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

class Vendor extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const FEATURED_SELECT = [
        '1' => 'yes',
        '0' => 'no',
    ];

    public const PROMOTED_SELECT = [
        '1' => 'yes',
        '0' => 'no',
    ];

    public const STATUS_SELECT = [
        '1' => 'enable',
        '0' => 'disable',
    ];

    public const BUSINESS_TYPE_SELECT = [
        '1' => 'published',
        '0' => 'not published',
    ];

    public $table = 'vendors';

    protected $appends = [
        'image',
        'cnic_image',
    ];

    protected $dates = [
        'cid_expiry_data',
        'opening_time',
        'closing_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'business_name',
        'status',
        'featured',
        'promoted',
        'email',
        'phone',
        'address',
        'rating',
        'payouts',
        'earning',
        'cod_balance',
        'oniline_payment',
        'cid_expiry_data',
        'cid_no',
        'account_no',
        'opening_time',
        'closing_time',
        'business_type',
        'bank_name',
        'iban_no',
        'swift_code',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        return $this->getMedia('image')->last();
    }

    public function getCidExpiryDataAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCidExpiryDataAttribute($value)
    {
        $this->attributes['cid_expiry_data'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCnicImageAttribute()
    {
        return $this->getMedia('cnic_image')->last();
    }

    public function getOpeningTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setOpeningTimeAttribute($value)
    {
        $this->attributes['opening_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getClosingTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setClosingTimeAttribute($value)
    {
        $this->attributes['closing_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
