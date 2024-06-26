<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Wheel extends Model
{
    use HasUuids;
    protected $connection = 'mysql';
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
        'photo',
        'note',
        'accepted'
    ];
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'wheels_fitment.wheels_users', 'wheel_id', 'user_id')->distinct();
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    public function wheelType()
    {
        return $this->belongsTo(WheelType::class);
    }
    public function boltPattern()
    {
        return $this->belongsTo(BoltPattern::class);
    }
    public function nutBolt()
    {
        return $this->belongsTo(NutBolt::class);
    }
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'wheels_cars', 'wheel_id', 'car_id')->withPivot('accepted')->distinct();
    }
    public function photos()
    {
        return explode(';', $this->photo);
    }
}
