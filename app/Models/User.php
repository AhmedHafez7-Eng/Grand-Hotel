<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Floor;
use App\Models\Room;
use App\Models\Reservation;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public function Creator()
    {
        return self::where('id', $this->creator_id)->first();
    }

    public function receptionistCreator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function managerOfRecep()
    {
        return $this->hasMany(User::class, 'creator_id', 'id');
    }

    public function managerOfFloors()
    {
        return $this->hasMany(Floor::class, 'creator_id', 'id');
    }

    public function managerOfRooms()
    {
        return $this->hasMany(Room::class, 'creator_id', 'id');
    }

    public function clientOfReservation()
    {
        return $this->hasMany(Reservation::class, 'client_id', 'id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'national_ID',
        'country',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}