<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Reservation extends Model
{
    use HasFactory;

    public function clientReservation()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
}