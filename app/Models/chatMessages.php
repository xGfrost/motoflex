<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'sender_id',
        'message',
        'sent_at',
    ];

    public function chat()
    {
        return $this->belongsTo(chats::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class);
    }
}
