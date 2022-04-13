<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attributedetail extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'attributedetails';

    public static $searchable = [
        'value',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    // public function variations(){
    //     return $this->hasMany(Attributedetail::class,'attr_det_id','id');
    // }
}
