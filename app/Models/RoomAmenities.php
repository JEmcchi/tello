<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAmenities extends Model
{
    use HasFactory;

    protected   $table = "rooms_amenities";
    public $timestamp = false;

    protected $fillable = [
        'room_id',
        'amenity_id',
    ];

    public function Rooms()
    {
        return $this->belongsTo(Rooms::class, 'room_id', 'room_id');
    }

    public function Amenities()
    {
        return $this->belongsTo(Amenities::class, 'amenity_id', 'amenity_id');
    }

}
