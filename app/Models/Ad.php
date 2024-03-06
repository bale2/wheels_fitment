<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Ad extends Model
{
    use HasUuids;
    use HasFactory;
    protected $connection = 'mysql';
    protected $fillable = [
        'wheel_id',
        'title',
        'description',
        'price',
        'user_id',
        'place',
        'uploaded_at',
        'photo',
        'accepted'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function wheel()
    {
        return $this->belongsTo(Wheel::class);
    }

    public function photos()
    {
        return explode(';', $this->photo);
    }
}
