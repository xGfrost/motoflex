<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpareParts extends Model
{
    use HasFactory;

    protected $fillable = [
        'workshop_id',
        'name',
        'description',
        'price',
        'stock',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshops::class);
    }
}
