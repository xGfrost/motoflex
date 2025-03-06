<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'item_type',
        'item_id',
        'quantity',
        'price',
        'is_additional',
    ];

    public function transaction()
    {
        return $this->belongsTo(transaction::class);
    }

    public function item()
    {
        return $this->morphTo();
    }
}
