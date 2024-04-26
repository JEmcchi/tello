<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lodgings extends Model
{
    use HasFactory;

    protected  $table = 'lodgings';

    protected $primaryKey = 'lodging_id';

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'area',
        'total_rooms',
        'status',
        'location',
    ];

    public function LodgingImage()
    {
        return $this->hasMany(LodgingImage::class, 'lodging_id', 'lodging_id');
    }

    public function Rooms()
    {
        return $this->hasMany(Rooms::class, 'lodging_id', 'lodging_id');
    }

    
    public $timestamps = false;

}
