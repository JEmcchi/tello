<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lodgings;
use App\Models\Rooms;
use Carbon\Carbon;
use App\Models\Books;
use Illuminate\Database\Eloquent\ModelNotFoundException;




class LodgingController extends Controller
{
    public function lodgingRoom($id, Request $request) {
        $lodging = Lodgings::with('Rooms')->findOrFail($id);
        // $rooms = $lodging->Rooms;
    
        // $jsonData = compact('lodging', 'rooms');
    
        if (!empty($lodging)) {
            
            if(request()->expectsJson()) {
                return response()->json($lodging); //paste the filtering
            }
    
            // Return the view with JSON data
            // dd($lodging);
        } else {
            // Return error message
            return response()->json(['error' => 'Data not found'], 404);
        }
        return view('lodgings.lodgingRooms', compact('lodging'));
    }
    

}
