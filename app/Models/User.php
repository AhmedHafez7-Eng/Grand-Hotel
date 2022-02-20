<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function receptionistCreator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function managerOfRecep()
    {
        return $this->hasMany('App\User', 'creator_id');
    }

    public function managerOfFloors()
    {
        return $this->hasMany('App\Floor', 'creator_id');
    }

    public function managerOfRooms()
    {
        return $this->hasMany('App\Room', 'creator_id');
    }

    public function clientOfReservation()
    {
        return $this->hasMany('App\Reservation', 'client_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'national_ID',
        'avatar_Img',
        'role',
        'country',
        'gender',
        'status',
        'creator_id',
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
    ];
}