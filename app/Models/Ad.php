<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = [
        'wheel_id',
        'title',
        'description',
        'price',
        'user_id',
        'place',
        'uploaded_at'
    ];
}
