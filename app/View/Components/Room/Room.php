<?php

namespace App\View\Components\Room;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use App\Models\Rooms;


class Room extends Component
{
    public $roomData;
    public $roomDetails;
    public $amenities;

    /**
     * Create a new component instance.
     */
    public function __construct($roomData, $amenities)
    {
        $this->roomData = $roomData;
        $this->amenities = $amenities;

        // $this->roomDetails = $roomDetails;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.room.room');
    }
}
