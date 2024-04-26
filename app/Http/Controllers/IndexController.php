<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Lodgings;
use App\Models\Amenities;
use App\Models\Books;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function componentsRoomLodging(Request $request) {

        // Get all room data along with associated lodgings and amenities
        $roomData = Rooms::with('Lodgings', 'Amenities')->get();
        $lodgingDatas = Lodgings::all();
        $amenities = Amenities::all();
    
        // Check if the request is AJAX and contains parameters for filtering or searching
        if ($request->ajax()) {
            // If AJAX request, filter rooms based on parameters
            $query = Rooms::with('Lodgings', 'Amenities');
    
            // Filter by room type
            if ($request->has('type') && $request->input('type') !== 'allRooms') {
                $query->where('room_type', $request->input('type'));
            }
    
            // Search by room number
            if ($request->has('search')) {
                $searchQuery = $request->input('search');
            
                // Perform search across multiple fields in different tables
                $query->where(function($query) use ($searchQuery) {
                    $query->whereHas('Lodgings', function($lodgingQuery) use ($searchQuery) {
                        $lodgingQuery->where('area', 'LIKE', '%' . $searchQuery . '%')    
                                     ->orWhere('total_rooms', 'LIKE', '%' . $searchQuery . '%')
                                     ->orWhere('status', 'LIKE', '%' . $searchQuery . '%')
                                     ->orWhere('location', 'LIKE', '%' . $searchQuery . '%')
                                     ->orWhere('lodging_info', 'LIKE', '%' . $searchQuery . '%');
                    })
                    ->orWhereHas('Amenities', function($amenityQuery) use ($searchQuery) {
                        $amenityQuery->where('items', 'LIKE', '%' . $searchQuery . '%');
                    })
                    ->orWhere('room_number', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('room_type', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('bed', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('price', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('occupants', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('status', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('room_size', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('room_info', 'LIKE', '%' . $searchQuery . '%');

                });
            }
    
            // Fetch filtered room data
            $filteredRoomData = $query->get();

            if ($request->has('checkIn') && $request->has('checkOut')) {
                $checkIn = Carbon::parse($request->input('checkIn'));
                $checkOut = Carbon::parse($request->input('checkOut'));
    
                // Filter out rooms that are already booked during the specified dates
                $query->whereDoesntHave('books', function($bookQuery) use ($checkIn, $checkOut) {
                    $bookQuery->where(function($query) use ($checkIn, $checkOut) {
                        $query->whereBetween('check_in', [$checkIn, $checkOut])
                            ->orWhereBetween('check_out', [$checkIn, $checkOut])
                            ->orWhere(function($query) use ($checkIn, $checkOut) {
                                $query->where('check_in', '<=', $checkIn)
                                    ->where('check_out', '>=', $checkOut);
                            });
                    });
                });
            }
            // Fetch filtered room data
            $filteredRoomData = $query->get();

            // Filter lodgings if lodging parameter is provided
            if ($request->has('lodging') && $request->input('lodging') !== 'all') {
                $query->whereHas('Lodgings', function($lodgingQuery) use ($request) {
                    $lodgingQuery->where('area', $request->input('lodging'));
                });
            }
            $filteredRoomData = $query->get();

            return response()->json($filteredRoomData);
        }
        // dd($roomData);                                                                                                                           

    
        return view('index', compact('roomData', 'lodgingDatas', 'amenities'));
    }
    
}

    // public function old(){

    //     $roomData = Rooms::with('Lodgings')->get();

    //     $lodgingDatas = Lodgings::all();
        

    //     // dd($roomData);
    //     // return view('index', compact('roomData'));
    //     return view('index', compact('roomData', 'lodgingDatas'));
    //     // return view('index', ['roomData' => $roomData]);
    // }


        // public function componentsRoomLodging(Request $request)
    // {
    //     $roomData = Rooms::with('Lodgings', 'Amenities')->get();
    //     $lodgingDatas = Lodgings::all();
    //     $amenities = Amenities::all();
        
    //   // Check if the request is AJAX and contains a 'type' parameter
    //   if ($request->ajax() && $request->has('type')) {
    //     // If AJAX and 'type' parameter exists, filter rooms based on the room type
    //     $roomType = $request->input('type');
    //     $filteredRooms = Rooms::where('room_type', $roomType)->get();
    //     return response()->json($filteredRooms);
    // }
        
    //     return view('index', compact('roomData', 'lodgingDatas', 'amenities'));
    //     // return view('index', ['roomData' => $roomData, 'lodgingDatas' => $lodgingDatas, 'amenities' => $amenities]);
    // }