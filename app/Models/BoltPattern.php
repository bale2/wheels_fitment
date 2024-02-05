<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoltPattern extends Model
{
    use HasFactory;
    protected $fillable = [
        'pattern',
    ];

    public function wheels(){
        return $this->hasMany(Wheel::class);
    }

}
