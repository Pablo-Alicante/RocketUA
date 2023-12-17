<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class user_admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users_admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Interact with the user's city
     */
    protected function sex(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => match ($value) {
                1 => 'Hombre', 2 => 'Mujer'
            },
            set: fn ($value) => match ($value) {
                'Hombre' => 1, 'Mujer' => 2
            }
        );
    }
}
