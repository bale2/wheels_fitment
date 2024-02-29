<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheelType extends Model
{
    protected $connection = 'mysql';
    use HasFactory;
    protected $fillable = [
        'wheel_type'
    ];
    public function wheels()
    {
        return $this->hasMany(Wheel::class);
    }
}
