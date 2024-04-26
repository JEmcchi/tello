<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $primaryKey = 'books_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_id',
        'lodging_id',
        'last_name',
        'first_name',
        'email',
        'phone_num',
        'check_in',
        'check_out',
        'address',
        'room_type',
        'room_count',
        'adult_count',
        'child_count',
        'concerns',
    ];

    public function Lodging()
    {
        return $this->belongsTo(Lodgings::class, 'lodging_id', 'lodging_id');
    }

    public function Rooms()
    {
        return $this->belongsTo(Rooms::class, 'room_id', 'room_id');
    }
    
    public $timestamps = false;
}

