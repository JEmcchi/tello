<style>
    .shadow_bg{
    background: none;
    border: none;
    outline: none;
    padding: 10px 20px; /* try to remove to full W and H*/
    font-size: 16px;
    box-shadow: inset 2px 5px 10px rgb(0, 0, 0);
    color: #fff;
    border-radius: 0.5rem;
    }
    .room_container{
    background: #1b631b79;
    box-shadow: inset 2px 5px 10px rgb(0, 0, 0);
    }

    .container {
    overflow: auto;
    display: flex;
    scroll-snap-type: x mandatory;
    }

    .backdrop {
        background-color: rgba(0, 0, 0, 0.637); /* Semi-transparent black background */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 50;
        overflow-y: auto; /* Enable scrolling within the backdrop */
    }

    .content {
        max-width: 80%; /* Adjust to your content's width */
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        z-index: 51;
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

<div id="rooms" class="section">
    {{-- room filter --}}
    <form class=" filter-container w-11/12 h-fit mx-auto mt-[1.5rem] rounded-3xl" >
        <h1 class="flex justify-center mx-auto text-4xl font-bold -z-5 -mt-5 text-transparent bg-clip-text bg-gradient-to-t from-[#475045] to-[#128609]">ROOM FILTER</h1>
        <div class="grid grid-cols-3">
                {{-- ROOMS FILTER --}}
            <div class="my-2 mx-2">
                <label for="roomType" class="block text-neutral-800 font-bold whitespace-nowrap text-center">Room Type</label>
                {{-- <select id="roomType" name="roomType" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500 " required onchange="changeTextColorCenter(this)" onchange="filterRoomsByType()"> --}}
                <select id="roomType" name="roomType" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500 " onchange="changeTextColorCenter(this)">
                    <option value="allRooms" class="text-green-900  text-md font-bold text-center">All Rooms</option>
                    @if(!empty($roomData));
                    @foreach ($roomData as $roomDatas);
                        <option value="{{$roomDatas->room_type}}" class="text-green-900 text-md font-bold text-center">{{$roomDatas->room_type}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
                {{-- SEARCH --}}
            <div class="my-2 mx-2">
                <label for="roomSearch" class="block text-neutral-800 font-bold text-center">SEARCH</label>
                <input type="text" id="roomSearch" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-none focus:border-green-400 peer items-center text text-green-700 placeholder:text-center" placeholder="Search About Rooms">
            </div>
                {{-- AMENITIES FILTER --}}
            {{-- <div class="my-2 mx-2">
                <label for="amenities" class="block text-neutral-800 font-bold text-center">Amenities</label>
                <button id="amenities" data-dropdown-toggle="dropdownSearch" class="w-full h-fit justify-center my-auto inline-flex items-center bg-[#d0ebd0] p-2 rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" type="button">Ameneties</button>
                <!-- Dropdown menu -->
                <div id="dropdownSearch" class="z-10 hidden rounded-lg shadow w-fit bg-white">
                    <div class="p-3">
                    <label for="search" class="text- sr-only"> Search </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3">
                                <svg class="w-4 h-4 text-green-900 dark:text-green-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="search" class="border border-green-900 text-sm font-mediium rounded-lg block w-full ps-10 p-2.5 bg-white dark:placeholder-gray-400 dark:text-green-900" placeholder="Search Ameneties">
                        </div>
                    </div>
                    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm dark:text-green-900" >
                        <li>
                            @foreach ($roomData as $roomDatas)
                            @foreach($roomDatas->Amenities as $amenity)
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-[#d0ebd0]">
                                    <input id="" type="checkbox" value="" class="amenity-checkbox w-4 h-4 bg-neutral-800 rounded  dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-1 dark:border-gray-500">
                                    <label for="" class="w-full ms-2 text-md font-semibold text-green-900 rounded dark:text-green-900">{{ $amenity->items }}</label>
                                </div>
                            @endforeach
                            @endforeach
                        </li>
                    </ul>
                    <a href="#" class="flex items-center p-3 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg dark:border-gray-600 bg-white dark:hover:bg-[#d0ebd0] dark:text-red-600  hover:underline">
                    Delete Selection
                    </a>
                </div>
            </div> --}}
                {{-- LODGINGS FILTER --}}
            <div class="my-2 mx-2">
                <label for="lodging" class="block text-neutral-800 font-bold text-center">Lodgings</label>
                <select id="lodging" name="lodging" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" onchange="changeTextColorCenter(this)">
                    <option value="all" class="text-green-900 text-md font-bold text-center">All Lodgings</option>
                    @foreach ($roomData as $roomDatas)
                        <option value="{{ $roomDatas->lodgings->area }}" class="text-green-900 text-md font-bold text-center">{{$roomDatas->lodgings->area}}</option>
                    @endforeach
                </select>
            </div>
                {{-- CHECK-IN/OUT FILTER --}}
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

    {{-- ROOM INFO DIALOG --}}
    @if(!empty($roomData))
    @foreach ($roomData as $roomDatas)
        <dialog class="backdrop w-11/12 min-[900px]:w-10/12 min-[1261px]:w-9/12 bg-red-800 backdrop:bg-black backdrop:opacity-80" id="myDialog{{$roomDatas->room_id}}">
            <div class="w-11/12 mt-[6rem] mx-auto p-5 rounded-xl shadow-lg bg-gradient-to-t from-[#0F1612] to-[#030B06] max-[640px]:grid max-[640px]:grid-rows-6 max-[640px]:grid-flow-col max-[640px]:gap-4 min-[641px]:grid min-[641px]:grid-cols-3 min-[641px]:grid-flow-row min-[641px]:gap-4" method="dialog">
                <div class="shadow_bg max-[640px]:row-span-1">
                    <img src="" alt="">
                </div>
                <div class="shadow_bg max-[640px]:row-span-4 min-[641px]:col-span-2">
                    {{-- <p>{{ $roomDatas['room_id'] }}</p> --}}
                    <h2 class="text-center -mt-7 text-xl">{{ $roomDatas['room_number'] }}</h2>
                    <div class="grid grid-cols-3">
                        <h3 class="whitespace-nowrap">Room Type</h3>
                        <p class="col-span-2 ml-2">{{ $roomDatas['room_type'] }}</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="">Price</h3>
                        <p class="col-span-2 ml-2">{{ $roomDatas['price'] }}</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="">Location</h3>
                        <p class="col-span-2 ml-2">{{ $roomDatas->Lodgings->area }}</p>                            
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="">Ameneties</h3>
                        <p class="col-span-2 ml-2">        
                            @foreach($roomDatas->amenities as $amenity)
                                {{ $amenity->items }} |  
                            @endforeach</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="whitespace-nowrap">Room Info</h3>
                        <p class="col-span-2 p-2 text-sm font-normal">{{ $roomDatas['room_info'] }}</p>
                    </div>
                
                </div>
                <div class="min-[641px]:col-span-6 flex items-end -mb-[2rem] mx-auto space-x-2">
                    <button onclick="closeDialog('myDialog{{$roomDatas->room_id}}')"
                        class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md hover:from-yellow-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Back </button>
                    <button
                        type="submit"
                        class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md hover:from-green-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center" onclick="fillFullBookingForm()"> Book This Room </button>
                </div>
            </div>
        </dialog>
    @endforeach
    @endif

    {{-- rooms --}}
    <h1 class="text-center text-6xl font-bold my-5 -mb-[0.6rem] text-transparent bg-clip-text bg-gradient-to-t from-[#0f0f0f] to-[#128609]" >AVAILABLE ROOMS</h1>
        <div id="roomContainer" class="room_container mx-auto w-11/12 bg-[#1b631b79] rounded-2xl container" >
            {{-- @if(!empty($roomData))
            @foreach ($roomData as $roomDatas)
                <div class="room-item flex flex-row mx-[1.5rem] mt-[2.5rem] mb-4 justify-center">
                    <div class="w-72 h-80 bg-neutral-800 rounded-3xl text-neutral-300 p-4 flex flex-col items-start justify-center gap-3 hover:bg-[#00000049] hover:shadow-2xl hover:shadow-[#000000] transition-shadow">
                        <div class="w-60 h-40 bg-[#197219d0] rounded-2xl"> {{$roomDatas->room_pic}} </div>
                        <div class="">
                            <p class="font-extrabold">{{$roomDatas->room_number}}</p>
                            <p class="">{{$roomDatas->room_info}}</p>
                        </div>
                        <button onclick="openDialog('myDialog{{$roomDatas->room_id}}', {{$roomDatas->room_id}}, {{$roomDatas->Lodgings->lodging_id}}, '{{$roomDatas->room_type}}', {{json_encode($roomDatas->room_info)}}, '{{$roomDatas->room_number}}', '{{$roomDatas->bed}}', '{{$roomDatas->price}}', '{{$roomDatas->Lodgings->area}}', '{{$roomDatas->Lodgings->location}}')" class="bg-[#197219d0] font-extrabold p-2 px-6 rounded-xl hover:bg-neutral-800 transition-colors"  id="showModal">See more</button>
                    </div>
                </div>
            @endforeach
            @endif --}}
        </div> 
    
    {{-- full booking form --}}
    <dialog id="bookingModal" class="w-11/12 mx-auto rounded-lg shadow-lg p-5 bg-gradient-to-t from-[#066906d2] to-[#3a7c3a73] backdrop:bg-black backdrop:opacity-80">
        <form class="grid grid-cols-4 gap-1 overflow-y-auto max-h-full " method="POST"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="room_id" value="{{ $roomDatas->room_id }}">
            <input type="hidden" name="lodging_id" value="{{ $roomDatas->Lodgings->lodging_id }}">
            <input type="hidden" name="room_info" id="concerns" value="{{ $roomDatas->room_info }}"> {{-- CHANGE LATER --}}
            <input type="hidden" name="room_number" id="roomNumber" value="{{ $roomDatas->room_number }}">
            <input type="hidden" name="bed" id="bed" value="{{ $roomDatas->bed }}">
            <input type="hidden" name="price" id="price" value="{{ $roomDatas->price }}">
            <input type="hidden" name="area" id="lodgingArea" value="{{$roomDatas->Lodgings->area}}">
            <input type="hidden" name="location" id="lodgingLocation" value="{{$roomDatas->Lodgings->location}}">

            <div class="col-span-2 "> 
                <label for="lastName" class="block text-gray-800 font-bold">Last Name</label>
                <input
                id="lastName"
                name="lastName"
                type="text"
                class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full"
                placeholder="Enter Last Name " onchange="changeTextColor(this)"
                required
                />
            </div>
            <div class="col-span-2"> 
                <label for="firstName" class="block text-gray-800 font-bold">First Name</label>
                <input
                    id="firstName"
                    name="firstName"
                    type="text"
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full"
                    placeholder="Enter First Name" onchange="changeTextColor(this)"
                    required
                />
            </div>
            <div class="col-span-2"> 
                <label for="email" class="block text-gray-800 font-bold">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full"
                    placeholder="Enter Email" autocomplete="email" onchange="changeTextColor(this)"
                    required
                />
            </div>
            <div class="col-span-2"> 
                <label for="contact" class="block text-gray-800 font-bold">Contact Number</label>
                <input
                id="contact"
                name="contact"
                type="text"
                class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
                placeholder="Enter Phone Number" 
                onchange="changeTextColor(this); validatePhoneNumber(this);"
                oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11); validatePhoneNumber(this);"
                required
                />
            </div>
            <div class="col-span-2"> 
                <label for="checkIn" class="block text-gray-800 font-bold">Check-In</label>
                <input
                    id="checkIn"
                    name="checkIn"
                    type="date"
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
                    placeholder="Date of Check-In"
                    onchange="changeTextColorCenter(this)"
                    required
                />
            </div>
            <div class="col-span-2"> 
                <label for="checkOut" class="block text-gray-800 font-bold">Check-Out</label>
                <input
                    id="checkOut"
                    name="checkOut"
                    type="date"
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
                    placeholder="Date of Check-Out"
                    onchange="changeTextColorCenter(this)"
                    required
                />
            </div>
            <div class="col-span-4"> 
                <label for="fullAddress" class="block text-gray-800 font-bold">Full Address</label>
                <input
                    id="fullAddress"
                    name="fullAddress"
                    type="text"
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full"
                    placeholder="Full Address"
                    onchange="changeTextColor(this)"
                    required
                />
            </div>
            <div class="col-span-4 grid grid-cols-2 gap-2 items-center">
                <div class="">
                    <label for="roomType" class="block text-gray-900 font-bold">Type of Room</label>
                    <input
                    id="roomType"
                    name="room_type"
                    type="text"
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full text-green-700 text-center" 
                    onchange="changeTextColor(this)"
                    value="{{ $roomDatas->room_type }}"
                    readonly
                />
                {{-- <select id="roomType" name="roomType" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" required onchange="changeTextColorCenter(this)" disabled value="{{ $roomDatas->room_type }}">
                    <option selected disabled class="text-gray-900 text-md font-semibold">Select Rooms</option>
                    <option value="single" class="text-green-900 text-md font-bold text-center">Single</option>
                    <option value="double" class="text-green-900 text-md font-bold  text-center">Double</option>
                    <option value="delux"  class="text-green-900 text-md font-bold text-center">Delux</option>
                    <option value="premium" class="text-green-900 text-md font-bold  text-center">Premium</option>
                </select> --}}
                </div>
                <div class="col-span-4 grid grid-cols-3 gap-2 ml-3">
                    <div class="">
                        <label for="roomCount" class="block text-gray-900 font-bold whitespace-nowrap -ml-3">Rooms Count</label>        
                        <input
                        id="roomCount"
                        name="roomCount"
                        type="number"
                        class="bg-[#d0ebd0] block p-2 w-9/12 text-base rounded-lg border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer placeholder-gray-600 font-bold text-center text-green-700"
                        placeholder="Room No."
                        onchange="changeTextColorCenter(this)"
                        readonly
                        value="1"
                        />
                    </div>
                    <div class="">
                        <label for="adultCount" class="block text-gray-900 font-bold whitespace-nowrap mx-auto">Adults</label>       
                            <input
                            id="adultCount"
                            name="adultCount"
                            type="number"
                            value="0"
                            class="bg-[#d0ebd0] block p-2 w-9/12 text-base rounded-lg text-gray-500 border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer placeholder-gray-600 font-bold"
                            placeholder="Adult No."
                            onchange="changeTextColorCenter(this)"
                            required
                        />
                    </div>
                    <div class="">
                        <label for="childCount" class="block text-gray-900 font-bold whitespace-nowrap">Childrens</label>     
                            <input
                            id="childCount"
                            name="childCount"
                            type="number"
                            value="0"
                            class="bg-[#d0ebd0] block p-2 w-9/12 text-base rounded-lg text-gray-500 border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer placeholder-gray-600 font-bold"
                            placeholder="Child No."
                            onchange="changeTextColorCenter(this)"
                            required
                        />
                    </div>
                </div>
            </div>
            {{-- <div class="col-span-4 mt-2">
                <textarea
                    name="concerns"
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full"
                    placeholder="Other Concerns"
                ></textarea>
            </div> --}}
            <div class="col-span-2 flex justify-end ">
                <button onclick="bookingModal.close(modal)" type="button"
                    class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md mt-4 hover:from-yellow-800 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center" formmethod="dialog"> Back </button>
            </div>
            <div class="col-span-2">
                <button id="submitButton" type="submit"
                    class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md mt-4 hover:from-green-900 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Submit </button>
            </div>
        </form>
    </dialog>

</div>

<script>
    // JavaScript function to open the dialog
    function openDialog(dialogId, roomId, lodgingId, roomType, concerns, roomNumber, bed, price, lodgingArea , lodgingLocation) {
        var dialog = document.getElementById(dialogId);
        var bookingModal = document.getElementById('bookingModal');
        
        // Log the value of roomType for debugging
        // console.log('Room Type:', roomType);

        // Set the values of the hidden inputs
        bookingModal.querySelector('input[name="room_id"]').value = roomId;
        bookingModal.querySelector('input[name="lodging_id"]').value = lodgingId;
        bookingModal.querySelector('input[name="room_type"]').value = roomType;
        bookingModal.querySelector('input[name="room_info"]').value = concerns;
        bookingModal.querySelector('input[name="room_number"]').value = roomNumber;
        bookingModal.querySelector('input[name="bed"]').value = bed;
        bookingModal.querySelector('input[name="price"]').value = price;
        bookingModal.querySelector('input[name="area"]').value = lodgingArea;
        bookingModal.querySelector('input[name="location"]').value = lodgingLocation;


        // bookingModal.querySelector('#roomType').value = roomType;

        // Show the dialog
        dialog.showModal();
    }

    // JavaScript function to close the dialog
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

    const modal = document.getElementById('bookingModal');
        modal.addEventListener('click', (event) => {
            if (event.target === bookingModal) {
                bookingModal.close();
            }
    });

    function changeTextColorCenter(input) {
        if (input.value !== '') {
            input.classList.remove('text-black');
            input.classList.add('text-green-700', 'text-center', 'font-bold');
        } else {
            input.classList.remove('text-green-700', 'text-center', 'font-bold');
            input.classList.add('text-black');
        }
    }
    function changeTextColor(input) {
        if (input.value !== '') {
            input.classList.remove('text-black');
            input.classList.add('text-green-700');
        } else {
            input.classList.remove('text-green-700');
            input.classList.add('text-black');
        }
    }
    // Function to copy values from mobile/desktop forms to full booking form
    function fillFullBookingForm() {

        // Show the full booking form modal
        bookingModal.showModal();
    }

    function validatePhoneNumber(input) {
        // Regular expression for a valid phone number (adjust as needed)
        var phoneNumberPattern = /^\d{6,11}$/;

        // Check if the entered value matches the pattern
        if (input.value.length <= 6 || !phoneNumberPattern.test(input.value)) {            
            // If not valid, display an error message
            input.setCustomValidity("Please enter a valid phone number.");
        } else {
            // If valid, clear the error message
            input.setCustomValidity("");
        }
    }

        // ROOM FILTERING
    $(document).ready(function() {

        $("#roomType, #lodging, #checkInValue, #checkOutValue").change(filterRooms);

        // Add event listener for search input
        $("#roomSearch").on("input", function() {
            filterRooms();
        });

        filterRooms();
    });

    function filterRooms() {
        var selectedRoomType = $("#roomType").val();
        var selectedLodging = $("#lodging").val();
        // console.log('Selected lodging:', selectedLodging); 
        var searchQuery = $("#roomSearch").val(); // Get the search query
        var checkInDate = $("#checkInValue").val(); // Get the check-in date
        var checkOutDate = $("#checkOutValue").val(); // Get the check-out date
        var roomContainer = $("#roomContainer");

        // Make AJAX request with room type, lodging, search query, check-in, and check-out dates
        $.ajax({
            url: '/index',
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

                // Populate room items with filtered data
                response.forEach(function(roomData) {
                    var lodgingInfo = roomData.lodgings || {};
                    var area = lodgingInfo.area || 'Area Not Available';
                    var location = lodgingInfo.location || 'Location Not Available';

                    // Create room item dynamically
                    var roomItem = $("<div class='room-item flex flex-row mx-[1.5rem] mt-[2.5rem] mb-4 justify-center' data-room-type='" + roomData.room_type + "'>" +
                    "<div class='w-72 h-80 bg-neutral-800 rounded-3xl text-neutral-300 p-4 flex flex-col items-start justify-center gap-3 hover:bg-[#00000049] hover:shadow-2xl hover:shadow-[#000000] transition-shadow'>" +
                    "<div class='w-60 h-40 bg-[#197219d0] rounded-2xl'>" + roomData.room_pic + "</div>" +
                    "<div>" +
                    "<p class='font-extrabold'>" + roomData.room_number + "</p>" +
                    "<p>" + roomData.room_info + "</p>" +
                    "</div>" +
                    "<button class='bg-[#197219d0] font-extrabold p-2 px-6 rounded-xl hover:bg-neutral-800 transition-colors' onclick='openDialog(\"myDialog" + roomData.room_id + "\", " + roomData.room_id + ", " + roomData.lodging_id + ", \"" + roomData.room_type + "\", \"" + roomData.room_type + "\", \"" + roomData.room_number + "\", \"" + roomData.bed + "\", \"" + roomData.price + "\", \"" + area + "\", \"" + location + "\")' id='showModal'>See more</button>" +
                    "</div>" +
                    "</div>");

                    roomContainer.append(roomItem);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>

{{-- 
    <dialog class="w-11/12 h-screen bg-transparent min-[900px]:w-10/12 min-[1261px]:w-9/12 mt-[7rem] backdrop:bg-black backdrop:opacity-80" id="showModal" >
        <div class="w-full mx-auto p-5 rounded-xl shadow-lg bg-gradient-to-t from-[#0F1612] to-[#030B06] max-[640px]:grid max-[640px]:grid-rows-6 max-[640px]:grid-flow-col max-[640px]:gap-4 min-[641px]:grid min-[641px]:grid-cols-3 min-[641px]:grid-flow-row min-[641px]:gap-4" method="dialog">
            @if(!empty($roomDetails))
            <div class="shadow_bg max-[640px]:row-span-1">
                <img src="" alt="">
            </div>
            <div class="shadow_bg max-[640px]:row-span-4 min-[641px]:col-span-2">
                
                <p>{{ $roomDetails['room_id'] }}</p>
                <h2 class="text-center -mt-5">{{ $roomDetails['room_number'] }}</h2>
                    <div class="grid grid-cols-3">
                        <h3 class="whitespace-nowrap">Room Type</h3>
                        <p class="col-span-2 ml-2">{{ $roomDetails['room_type'] }}</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="">Price</h3>
                        <p class="col-span-2 ml-2">{{ $roomDetails['price'] }}</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="">Location</h3>
                        <p class="col-span-2 ml-2">{{ $roomDetails['location'] }}</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="">Ameneties</h3>
                        <p class="col-span-2 ml-2">{{ $roomDetails['amenities'] }}</p>
                        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                        <h3 class="whitespace-nowrap">Room Info</h3>
                        <p class="col-span-2 ml-2">{{ $roomDetails['room_info'] }}</p>
                    </div>
               
            </div>
            <div class="min-[641px]:col-span-6 flex items-end -mb-[2rem] mx-auto space-x-2">
                <button onclick="room_modal.close(modal)"
                    class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md hover:from-yellow-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Back </button>
                <button
                    type="submit"
                    class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md hover:from-green-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Book This Room </button>
            </div>
            @endif
        </div>
    </dialog>

            <div class="w-72 h-80 bg-neutral-800 rounded-3xl text-neutral-300 p-4 flex flex-col items-start justify-center gap-3 hover:bg-[#00000049] hover:shadow-2xl hover:shadow-[#000000] transition-shadow">
                <div class="w-60 h-40 bg-[#197219d0] rounded-2xl"></div>
                <div class="">
                    <p class="font-extrabold">Room Name</p>
                    <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse suscipit</p>
            </div>
                <button class="bg-[#197219d0] font-extrabold p-2 px-6 rounded-xl hover:bg-neutral-800 transition-colors">See more</button>
            </div>
--}}

