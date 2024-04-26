<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $table = "rooms";

    protected $primaryKey = 'room_id';


       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lodging_id',
        'room_number',
        'room_type',
        'bed',
        'price',
        'occupants',
        'status',
        'room_size',
        'room_info',
    ];

    public function Lodgings()
    {
        return $this->belongsTo(Lodgings::class, 'lodging_id', 'lodging_id');
    }
        public function Images()
    {
        return $this->hasMany(RoomImage::class, 'room_id', 'room_id');
    }

    public function Amenities()
    {
        return $this->belongsToMany(Amenities::class, 'room_amenities', 'room_id', 'amenity_id');
    }

    public function Books()
    {
        return $this->hasOne(Books::class, 'room_id', 'room_id');
    }
    
    public $timestamps = false;
}
