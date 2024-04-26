<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    use HasFactory;

    protected $table = "rooms_img";

    protected $primaryKey = 'img_id';

    protected $fillable = [
        'room_id',
        'room_pic',
    ];

    public function Images()
    {
        return $this->belongsTo(Rooms::class, 'room_id', 'room_id');
    }
}
