<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Car extends Model
{
    use HasUuids;
    protected $connection = 'mysql';
    use HasFactory;
    protected $fillable = [
        'manufacturer_id',
        'car_model',
        'engine_size',
        'car_year',
        'center_bore',
        'thread_size',
        'mtsurface_fender_distance',
        'bolt_pattern_id',
        'mtsurface_fender_distance'
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function boltPattern()
    {
        return $this->belongsTo(BoltPattern::class);
    }

    public function wheels()
    {
        return $this->belongsToMany(Wheel::class, 'wheels_cars');
    }
}
