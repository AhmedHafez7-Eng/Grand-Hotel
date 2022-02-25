<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Room;
use App\Models\User;

class Floor extends Model
{
    use HasFactory;
    protected $primaryKey = 'number';

    public function FloorOfRoom()
    {
        return $this->hasMany(Room::class, 'floor_number', 'number');
    }

    public function floorCreator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
    // INSERT INTO `rooms`(`id`, `capacity`, `price`, `creator_id`, `floor_number`) VALUES (500,2,100,2,1)
}