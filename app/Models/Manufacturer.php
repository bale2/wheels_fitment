<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Manufacturer extends Model
{
    use HasUuids;
    protected $connection = 'mysql';
    use HasFactory;
    protected $fillable = [
        'manufacturer_name',
        'only_wheel_maker',
        'accepted'
    ];

    public function wheels()
    {
        return $this->hasMany(Wheel::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
