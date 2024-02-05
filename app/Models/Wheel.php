<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wheel extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id',
        'model',
        'price',
        'wheel_type_id',
        'diameter',
        'width',
        'kba_number',
        'et_number',
        'bolt_pattern_id',
        'center_bore',
        'nut_bolt_id',
        'multipiece',
        'picture',
        'note'
    ];
    public function ads(){
        return $this->hasMany(Ad::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'wheels_users');
    }

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }
    public function wheelType(){
        return $this->belongsTo(WheelType::class);
    }
    public function boltPattern(){
        return $this->belongsTo(BoltPattern::class);
    }
    public function nutBolts(){
        return $this->belongsTo(NutBolt::class);
    }

    public function cars(){
        return $this->belongsToMany(Car::class,'wheels_cars');
    }



}
