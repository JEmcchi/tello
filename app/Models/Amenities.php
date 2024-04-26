<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use HasFactory;

    protected  $table = 'amenities';

    protected $primaryKey = 'amenity_id';


    protected $fillable = [
        'items',
        'value',
    ];

    public function Room_Amenities()
    {
        return $this->belongsToMany(Rooms::class, 'room_amenities', 'amenity_id', 'room_id');
    }

}
