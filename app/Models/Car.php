<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $connection = 'mysql';
    use HasFactory;
    protected $fillable = [
        'manufacturer_id',
        'car_make',
        'car_model',
        'mtsurface_fender_distance'
    ];

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }

    public function wheels(){
        return $this->belongsToMany(Wheel::class,'wheels_cars');
    }
}
