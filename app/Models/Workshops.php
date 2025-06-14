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
        return $this->hasMany(Services::class, 'workshop_id');
    }

    public function spareParts()
    {
        return $this->hasMany(SpareParts::class, 'workshop_id');
    }

    public function ratings()
    {
        return $this->hasMany(WorkshopRating::class, 'workshop_id');
    }

    public function reports()
    {
        return $this->hasMany(WorkshopReports::class, 'workshop_id');
    }

    public function chats()
    {
        return $this->hasMany(chats::class, 'workshop_id');
    }

    public function transactions()
    {
        return $this->hasMany(transaction::class, 'workshop_id');
    }
}
