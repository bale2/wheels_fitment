<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutBolt extends Model
{
    protected $connection = 'mysql';
    use HasFactory;
    protected $fillable = [
        'type'
    ];

    public function wheels()
    {
        return $this->hasMany(Wheel::class);
        //nut bolt tartozhat több kerékhez
    }

    public function cars()
    {
        return $this->belongsTo(Car::class);
    }
}
