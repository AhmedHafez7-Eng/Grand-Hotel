<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Floor;
use App\Models\User;

class Room extends Model
{
    use HasFactory;

    public function RoomCreator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function RelatedFloor()
    {
        return $this->belongsTo(Floor::class, 'floor_number', 'number');
    }
}