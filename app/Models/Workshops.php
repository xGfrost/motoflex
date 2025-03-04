<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshops extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(Services::class);
    }

    public function spareParts()
    {
        return $this->hasMany(SpareParts::class);
    }

    public function ratings()
    {
        return $this->hasMany(WorkshopRating::class);
    }

    public function reports()
    {
        return $this->hasMany(WorkshopReports::class);
    }
}
