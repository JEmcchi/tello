@include('partials.__header')

<style>
    .shadow_bg{
    background: #1b631b79;
    box-shadow: inset 2px 5px 10px rgb(0, 0, 0);
    border-radius: 0.5rem;
    }
    .shadow_bg_title{
    background: #1b631b79;
    box-shadow: inset 2px 5px 10px rgb(0, 0, 0);
    border-radius: 2.5rem;
    }
    .shadow_bg_dialog{
    box-shadow: inset 2px 5px 10px rgb(0, 0, 0);
    border-radius: 0.5rem;
    }

    .container {
    overflow: auto;
    display: flex;
    scroll-snap-type: x mandatory;
    }

    .select {
    width: fit-content;
    cursor: pointer;
    position: relative;
    transition: 300ms;
    color: #128609;
    overflow: hidden;
    }

    .selected {
    background-color:  rgb(39 39 42);
    padding: 5px;
    border-radius: 5px;
    position: relative;
    z-index: 100000;
    font-size: 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    }

    .arrow {
    position: relative;
    right: 0px;
    height: 10px;
    transform: rotate(-90deg);
    width: 25px;
    fill: white;
    z-index: 100000;
    transition: 300ms;
    }

    .options {
    display: flex;
    flex-direction: column;
    border-radius: 5px;
    padding: 5px;
    background-color:  rgb(39 39 42);
    position: relative;
    top: -100px;
    opacity: 0;
    transition: 300ms;
    }

    .select:hover > .options {
    opacity: 1;
    top: 0;
    }

    .select:hover > .selected .arrow {
    transform: rotate(0deg);
    }

    .option {
    border-radius: 5px;
    padding: 5px;
    transition: 300ms;
    background-color:  rgb(39 39 42);
    width: 150px;
    font-size: 15px;
    }
    .option:hover {
    background-color:  rgb(39 39 42);
    }

    .options input[type="radio"] {
    display: none;
    }

    .options label {
    display: inline-block;
    }
    .options label::before {
    content: attr(data-txt);
    }

    .options input[type="radio"]:checked + label {
    display: none;
    }

    .options input[type="radio"]#all:checked + label {
    display: none;
    }

    .select:has(.options input[type="radio"]#all:checked) .selected::before {
    content: attr(data-default);
    }
    .select:has(.options input[type="radio"]#option-1:checked) .selected::before {
    content: attr(data-one);
    }
    .select:has(.options input[type="radio"]#option-2:checked) .selected::before {
    content: attr(data-two);
    }
    .select:has(.options input[type="radio"]#option-3:checked) .selected::before {
    content: attr(data-three);
    }

     .filter-container {
        color: #090909;
        background: #e8e8e8;
        border: 1px solid #e8e8e8;
        transition: all 0.3s;
        box-shadow: 6px 6px 12px #c5c5c5, -6px -6px 12px #ffffff;
    }

    .filter-container:hover {
        border: 1px solid white;
    }

    .filter-container:active {
        box-shadow: 4px 4px 12px #c5c5c5, -4px -4px 12px #ffffff;
    }

</style>

<body class="bg-[#d0ebd0d0]"> 
    <h1 class="shadow_bg_title mx-auto text-center text-5xl font-bold text-[#153f11de] py-1 mt-[0.5rem] mb-[2rem] w-fit whitespace-nowrap uppercase object-fit p-[1rem]">{{$lodging->area}}</h1>
    {{-- filter --}} 
    <form class=" filter-container w-11/12 h-fit mx-auto mt-[1.5rem] rounded-3xl">
    <h1 class="flex justify-center mx-auto text-4xl font-bold -z-5 -mt-5 text-transparent bg-clip-text bg-gradient-to-t from-[#475045] to-[#128609]">ROOM FILTER</h1>
    <div class="grid grid-cols-3">
        <div class="my-2 mx-2">
            <label for="roomType" class="block text-neutral-800 font-bold whitespace-nowrap text-center">Room Type</label>
            <select id="roomType" name="roomType" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500 " onchange="changeTextColorCenter(this)">
                <option value="allRooms" class="text-green-900  text-md font-bold text-center">All Rooms</option>
                @if(!empty($lodging));
                @foreach ($lodging->Rooms as $lodgings);
                    <option value="{{$lodgings->room_type}}" class="text-green-900 text-md font-bold text-center">{{$lodging->room_type}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="my-2 mx-2">
            <label for="roomSearch" class="block text-neutral-800 font-bold text-center">SEARCH</label>
            <input type="text" id="roomSearch" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-none focus:border-green-400 peer items-center text text-green-700 placeholder:text-center" placeholder="Search About Rooms">
        </div>

        <div class="my-2 mx-2">
            <label for="lodging" class="block text-neutral-800 font-bold text-center">Lodgings</label>
            <select id="lodging" name="lodging" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" onchange="changeTextColorCenter(this)">
                <option value="all" class="text-green-900 text-md font-bold text-center">{{$lodging->area}}</option>
            </select>
        </div>
        <div class="mb-2 grid grid-cols-2 gap-2 col-span-3">
            <div class="mx-auto">
                <label for="checkInValue" class="block text-neutral-800 font-bold text-center">Check-In</label>
                <input type="date" name="checkIn" id="checkInValue" class="bg-[#d0ebd0] p-2 w-fit rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" placeholder="Select Check-In time" onchange="changeTextColorCenter(this)">
            </div> 

            <div class="mx-auto">
                <label for="checkOutValue" class="block text-neutral-800 font-bold text-center">Check-out</label>
                <input type="date" name="checkOut" id="checkOutValue" class="bg-[#d0ebd0] p-2 w-fit rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" placeholder="Select Check-In time" onchange="changeTextColorCenter(this)">
            </div> 
        </div>
    </div>
    </form>

    <div class="">
    <h1 class="text-center text-5xl font-bold my-5 -mb-[5.5rem] text-transparent bg-clip-text bg-gradient-to-t from-[#0f0f0f] to-[#128609] ">AVAILABLE ROOMS</h1>
    <div  class="shadow_bg mx-auto w-full bg-[#1b631b79] rounded-xl py-[1rem] justify-center items-center mt-[5rem]">
        <div class="container space-x-5 w-full" id="roomContainer">
            {{-- room cards --}}
            {{-- @if(!empty($lodging))
            @foreach ($lodging as $lodging)
                <div class="flex ml-5">
                    <div class="relative group cursor-pointer overflow-hidden duration-500 w-[13rem] h-[11rem] bg-zinc-800 text-gray-50 p-5 rounded-lg">
                        <div class="group-hover:scale-110 w-full h-[10rem] bg-green-800 duration-500 rounded-md">
                            <img src="" alt="">
                        </div>
                        <div class="absolute w-full left-0 p-2 -bottom-[4rem] duration-500 group-hover:-translate-y-[2.5rem]">
                            <div class="absolute -z-10 left-0 w-full h-full opacity-0 duration-500 group-hover:opacity-50 group-hover:bg-green-900 bg-green-900"></div>
                            <div class="grid grid-rows-2 ml-2">
                                    <div>
                                        <span class="text-2xl font-bold -ml[2rem] bg-zinc-800 group-hover:bg-transparent duration-300 pr-5 rounded-md">{{$lodging->room_number??null}}</span>
                                        <p class="group-hover:opacity-100 duration-500 opacity-0 overflow-visible">{{$lodging->room_type??null}}</p>
                                        <p class="group-hover:opacity-100 duration-500 opacity-0 overflow-visible font-semibold">{{$lodging->room_price??null}}</p>
                                    </div>
                                <div>
                                    <button class="ml-[5rem] bg-[#131313ea] group-hover:opacity-100 rounded-md p-2 whitespace-nowrap font-semibold" onclick="openDialog('openDialog')">More Info</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif --}}
            
        </div>
    </div>

    {{-- dialog --}}
    @if(!empty($lodging))
    @foreach ($lodging->Rooms as $lodging)
        <dialog class="w-full h-full p-0 bg-transparent backdrop:bg-black backdrop:opacity-80" id="myDialog{{$lodging->room_id}}">
            <div class="w-full h-full mx-auto p-5 rounded-xl shadow-lg bg-gradient-to-t from-[#0F1612] to-[#030B06] max-[640px]:grid max-[640px]:grid-rows-6 max-[640px]:grid-flow-col max-[640px]:gap-4 min-[641px]:grid min-[641px]:grid-cols-3 min-[641px]:grid-flow-row min-[641px]:gap-4" method="dialog">
                <div class="shadow_bg_dialog max-[640px]:row-span-1 min-[641px]:col-span-1 min-[641px]:mt-[5rem] min-[641px]:-mb-[5rem] min-[641px]:w-11/12 min-[641px]:ml-[0.7rem] w-full">
                    <img src="" alt="">
                </div>
                <div class="shadow_bg_dialog min-[641px]:w-full h-full mt-5 items-center max-[640px]:row-span-4 min-[641px]:col-span-2 min-[641px]:mt-[5rem] min-[641px]:-mb-[5rem] text-md text-[#fff] font-semibold">
                    <h2 class="text-center -mt-[1.5rem] text-3xl">{{ $lodging['room_number'] }}</h2>
                    <div class="grid grid-cols-3 mt-2">
                        <h3 class="whitespace-nowrap p-2">Room Type</h3>
                        <p class="col-span-2 ml-2 p-2">{{$lodging['room_type']}}</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="p-2">Price</h3>
                        <p class="col-span-2 ml-2 p-2">{{$lodging['price']}}</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="p-2">Location</h3>
                        <p class="col-span-2 ml-2 p-2">{{$lodging->Lodgings->area}}</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="p-2">Ameneties</h3>
                        <p class="col-span-2 ml-2 p-2">
                            @foreach($lodging->amenities as $amenity)
                                {{ $amenity->items }} |  
                            @endforeach</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="whitespace-nowrap p-2">Room Info</h3>
                        <p class="col-span-2 ml-2 p-2 text-sm font-normal">{{ $lodging['room_info'] }}</p>
                    </div>
                </div>
                <div class="min-[641px]:col-span-3 flex items-end mx-auto space-x-2">
                    <button
                    onclick="closeDialog('myDialog{{$lodging->room_id}}')"
                     class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md hover:from-yellow-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center" onclick="closeDialog('openDialog')"> Back </button>
                    <button type="submit" class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md hover:from-green-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Book This Room </button>
                </div>
            </div>
        </dialog>
    @endforeach
    @endif
    </div>
</body>

<script>
    function openDialog(dialogId) {
        var dialog = document.getElementById(dialogId);
            dialog.showModal();
    }
    function closeDialog(dialogId) {
        var dialog = document.getElementById(dialogId);
        dialog.close();
    }

    function changeTextColorCenter(input) {
        if (input.value !== '') {
            input.classList.remove('text-black');
            input.classList.add('text-green-700', 'text-center', 'font-bold');
        } else {
            input.classList.remove('text-green-700', 'text-center', 'font-bold');
            input.classList.add('text-black');
        }
    }


    // ROOM FILTERING
    $(document).ready(function() {
        // Define id from the URL
        var id = window.location.pathname.split('/').pop();

        // Call filterRooms function and pass id as an argument
        filterRooms(id);

        // Add event listeners for input changes
        $("#roomType, #lodging, #checkInValue, #checkOutValue").change(function() {
            filterRooms(id);
        });

        // Add event listener for search input
        $("#roomSearch").on("input", function() {
            filterRooms(id);
        });
    });

    function filterRooms(id) {
        var selectedRoomType = $("#roomType").val();
        var selectedLodging = $("#lodging").val();
        // console.log('Selected lodging:', selectedLodging); 
        var searchQuery = $("#roomSearch").val(); // Get the search query
        var checkInDate = $("#checkInValue").val(); // Get the check-in date
        var checkOutDate = $("#checkOutValue").val(); // Get the check-out date
        var roomContainer = $("#roomContainer");

        // Make AJAX request with room type, lodging, search query, check-in, and check-out dates
        $.ajax({
            url: '/lodgingRooms/' + id,
            type: 'GET',
            data: {
                type: selectedRoomType,
                lodging: selectedLodging,
                search: searchQuery,
                checkIn: checkInDate,
                checkOut: checkOutDate
            },
            success: function(response) {
                // Clear existing room items
                roomContainer.empty();

                // Check if rooms are available
                if (response && response.rooms && response.rooms.length > 0) {
                    console.log(lodging.Lodgings);
                    var lodgingInfo = lodging.Lodgings || {};
                    var area = lodgingInfo.area || 'Area Not Available';
                    var location = lodgingInfo.location || 'Location Not Available';
                    // Iterate over each room
                    response.rooms.forEach(function(room) {
                        // Create room item dynamically
                        var roomItem = $("<div class='flex ml-5'>" +
                            "<div class='relative group cursor-pointer overflow-hidden duration-500 w-[13rem] h-[11rem] bg-zinc-800 text-gray-50 p-5 rounded-lg'>" +
                            "<div class='group-hover:scale-110 w-full h-[10rem] bg-green-800 duration-500 rounded-md'>" +
                            "<img src='" + room.room_pic + "' alt='Room Picture'>" +
                            "</div>" +
                            "<div class='absolute w-full left-0 p-2 -bottom-[4rem] duration-500 group-hover:-translate-y-[2.5rem]'>" +
                            "<div class='absolute -z-10 left-0 w-full h-full opacity-0 duration-500 group-hover:opacity-50 group-hover:bg-green-900 bg-green-900'></div>" +
                            "<div class='grid grid-rows-2 ml-2'>" +
                            "<div>" +
                            "<span class='text-2xl font-bold -ml[2rem] bg-zinc-800 group-hover:bg-transparent duration-300 pr-5 rounded-md'>" + room.room_number + "</span>" +
                            "<p class='group-hover:opacity-100 duration-500 opacity-0 overflow-visible'>" + room.room_type + "</p>" +
                            "<p class='group-hover:opacity-100 duration-500 opacity-0 overflow-visible font-semibold'>" + room.price + "</p>" +
                            "</div>" +
                            "<div>" +
                            "<button class='ml-[5rem] bg-[#131313ea] group-hover:opacity-100 rounded-md p-2 whitespace-nowrap font-semibold' onclick='openDialog(\"myDialog" + room.room_id + "\", " + room.room_id + ", " + room.lodging_id + ", \"" + room.room_type + "\", \"" + room.room_type + "\", \"" + room.room_number + "\", \"" + room.bed + "\", \"" + room.price + "\", \"" + area + "\", \"" + location + "\")'>More Info</button>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>" +
                            "</div>");

                        // Append room item to container
                        roomContainer.append(roomItem);
                    });
                } else {
                    // No rooms available, show message
                    roomContainer.html("<p>No rooms available for this lodging.</p>");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                // Show error message
                roomContainer.html("<p>Error loading rooms. Please try again later.</p>");
            }
        });
    }

</script>


@include('partials.__footer')
