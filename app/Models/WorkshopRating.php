<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkshopRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'workshop_id',
        'rating',
        'review',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function workshop()
    {
        return $this->belongsTo(Workshops::class);
    }
}
