<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;

    protected $table = "ratings";

    protected $primaryKey = 'rate_id';

    protected $fillable = [
        'room_id',
        'stars',
        'name',
        'comments',
    ];

    public function Rooms()
    {
        return $this->belongsTo(Rooms::class, 'room_id', 'room_id');
    }

}
