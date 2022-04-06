<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const FEATURED_SELECT = [
        '0' => 'Not Selected',
        '1' => 'Featured',
    ];

    public $table = 'products';

    protected $appends = [
        'fetaured_image',
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'sub_category_id',
        'featured',
        'regular_price',
        'sale_price',
        'sku',
        'qty',
        'vendor',
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCat::class, 'sub_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(ProductTag::class);
    }

    public function getFetauredImageAttribute()
    {
        return $this->getMedia('fetaured_image')->last();
    }

    public function getImageAttribute()
    {
        return $this->getMedia('image');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
