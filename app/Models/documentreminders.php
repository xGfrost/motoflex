<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentReminders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'expiration_date',
        'reminder_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}


