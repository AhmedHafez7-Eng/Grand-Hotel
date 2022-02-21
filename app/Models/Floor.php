<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    public function FloorOfRoom()
    {
        return $this->hasMany(Room::class, 'floor_number', 'number');
    }

    public function floorCreator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
}