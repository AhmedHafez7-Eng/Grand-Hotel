<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    public function FloorOfRoom()
    {
        return $this->hasMany('App\Room', 'floor_number');
    }

    public function floorCreator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }
}