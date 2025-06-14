<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Devdojo\Auth\Models\User as AuthUser;

class User extends AuthUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'role',
        'coin',
    ];

    protected $attributes = [
        'role' => 'user',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function workshops()
    {
        return $this->hasMany(Workshops::class);
    }

    public function workshopRatings()
    {
        return $this->hasMany(WorkshopRating::class);
    }

    public function serviceReminders()
    {
        return $this->hasMany(serviceReminder::class);
    }

    public function chats()
    {
        return $this->hasMany(chats::class);
    }

    public function transactions()
    {
        return $this->hasMany(transaction::class);
    }

    public function documentReminders()
    {
        return $this->hasMany(documentreminders::class);
    }

    public function workshop()
    {
        return $this->hasOne(Workshops::class);
    }
}
