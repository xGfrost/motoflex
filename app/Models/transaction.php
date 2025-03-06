<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'workshop_id',
        'transaction_type',
        'total_price',
        'payment_status',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshops::class);
    }

    public function items()
    {
        return $this->hasMany(transactionItem::class);
    }

    
}
