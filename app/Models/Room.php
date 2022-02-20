<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function RoomCreator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function RelatedFloor()
    {
        return $this->belongsTo('App\Floor', 'floor_number');
    }
}