<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Lodgings;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoomsController extends Controller
{
    public function componentsRoomLodging(){

        $roomData = Rooms::all();
        $lodgingDatas = Lodgings::all();
        
        // dd($roomData);
        // return view('index', compact('roomData'));
        return view('index', compact('roomData', 'lodgingDatas'));
        // return view('index', ['roomData' => $roomData]);
    }

    
}
