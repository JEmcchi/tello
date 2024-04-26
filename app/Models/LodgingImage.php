<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LodgingImage extends Model
{
    use HasFactory;

    protected $table = "lodging_img";


    protected $primaryKey = 'img_id';

    protected $fillable = [
        'lodging_id	',
        'Lodging_pic',
    ];

    public function Lodging()
    {
        return $this->belongsTo(Lodgings::class, 'lodge_id', 'lodge_id');
    }
}
