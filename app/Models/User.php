<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'interests', 'linkedin_username', 
        'phone_number', 'age', 'wallet', 'coin_wallet', 'registfee'
    ];

    protected $casts = [
        'interests' => 'array', // Automatically cast the 'interests' field to an array
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

    public function sentRequests()
    {
        return $this->belongsToMany(User::class, 'wishlists', 'user_id_1', 'user_id_2')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    public function receivedRequests()
    {
        return $this->belongsToMany(User::class, 'wishlists', 'user_id_2', 'user_id_1')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    public function chatroomsAsUser1()
    {
        return $this->hasMany(Chatroom::class, 'user_id_1');
    }

    public function chatroomsAsUser2()
    {
        return $this->hasMany(Chatroom::class, 'user_id_2');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
