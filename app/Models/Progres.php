<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'weight',
        'height',
        'chest',
        'waist',
        'hips',
        'performance',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
