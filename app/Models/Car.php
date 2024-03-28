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
        'nut_bolt_id',
        'mtsurface_fender_distance',
        'bolt_pattern_id',
        'mtsurface_fender_distance',
        'accepted'
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function boltPattern()
    {
        return $this->belongsTo(BoltPattern::class);
    }

    public function nutBolt()
    {
        return $this->belongsTo(NutBolt::class);
    }

    public function wheels()
    {
        return $this->belongsToMany(Wheel::class, 'wheels_cars');
    }
}
