<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'workshop_id',
        'name',
        'description',
        'price',
        'duration',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshops::class);
    }
}
