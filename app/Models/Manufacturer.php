<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $fillable = [
        'manufacturer_name',
        'only_wheel_maker'
    ];

    public function wheels(){
        return $this->hasMany(Wheel::class);
    }

    public function cars(){
        return $this->hasMany(Cars::class);
    }
}
