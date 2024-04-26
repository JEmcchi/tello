@include('partials.__header')

<style>
    .details-container {
    color: #090909;
    background: #e8e8e8;
    border: 1px solid #e8e8e8;
    transition: all 0.3s;
    box-shadow: 6px 6px 12px #c5c5c5, -6px -6px 12px #ffffff;
    }

    .details-container:hover {
        border: 1px solid white;
    }

    .details-container:active {
        box-shadow: 4px 4px 12px #c5c5c5, -4px -4px 12px #ffffff;
    }

    hr.price {
    border-top:dotted rgb(180, 182, 168);
    }
</style>

<body class="bg-[#d0ebd0]">
    {{-- DETAILS --}}
    <div class="details-container w-11/12 h-fit mx-auto mt-[1.5rem] rounded-3xl" id="detailsSection">
        <h1 class="flex mx-[1.5rem] text-4xl font-bold -z-5 -mt-5 text-transparent bg-clip-text bg-gradient-to-t from-[#475045] to-[#128609]">DETAILS</h1>
        <div class="flex justify-end -mt-[2rem] -mr-[1rem]">
            <button class="text-zinc-700 hover:text-green-900 backdrop-blur-lg bg-gradient-to-tr from-transparent via-[rgba(121,121,121,0.16)] to-transparent rounded-md py-2 px-6 shadow hover:shadow-zinc-800 duration-700 font-bold" onclick="fillFullBookingForm()"> EDIT INFO </button>
        </div>
        <div class="text-[#1a231ad5]">
            <h3 class="ml-2 p-2 w-full">
                <input type="hidden" name="room_id" value="{{ $request->room_id }}">
                <input type="hidden" name="lodging_id" value="{{ $request->lodging_id }}">
                <input type="hidden" name="room_info" id="concerns" value="{{ $request->room_info }}">
                <p class="font-bold text-xl">{{ $request->lastName }} {{ $request->firstName }}</p>
                {{ $request->fullAddress }}, {{ $request->contact }}, {{ $request->email }} 
            </h3>

            <p class="flex justify-center">
                [{{ $request->adultCount}}]-ADULTS |
                [{{ $request->childCount}}]-CHILD
            </p> 

            <h3 class="flex justify-center" id="checkInDisplay"> [ {{ $request->checkIn }} / {{ $request->checkOut }} ]</h3>

        </div>
        <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3 mx-[2rem]">
        <div class="grid grid-cols-3 max-[1025px]:grid-cols-2 pl-3" >
            <div>
                <h3 class="p-1">Room Number: {{ $request->room_type }}</h3>
            </div>
            <div>
                <h3 class="p-1 ">Room Type: {{ $request->room_type }}</h3> 
            </div>
            <div>
                <h3 class="p-1 ">Total Bed: {{ $request->bed }}</h3> 
            </div>
            <div>
                <h3 class="p-1">Lodging: {{ $request->area }}</h3>  
            </div>
            <div>
                <h3 class="p-1">Location: {{ $request->location }}</h3>  
            </div>
        </div>
    </div>
    {{-- ROOM PRICE --}}
    <div class="details-container w-10/12 h-fit mx-auto mt-[1.5rem] rounded-3xl">
        <h1 class="flex justify-center mx-auto text-4xl font-bold -z-5 -mt-5 text-transparent bg-clip-text bg-gradient-to-t from-[#475045] to-[#128609]">Room Price</h1>
        <div class="grid grid-cols-6 mt-2">
            <h3 class="whitespace-nowrap p-2 mx-auto">{{ $request->room_type }} </h3>
            <hr class="price h-px border-0 col-span-4 mt-[1.5rem] w-full max-[1025px]:w-7/12 max-[1025px]:ml-[4rem]">
            <p class=" p-2 flex justify-self-end mx-auto max-[1025px]:mx-0">{{ $request->price }}</p>
            <h3 class="whitespace-nowrap p-2 mx-auto font-bold max-[1025px]:mr-[1rem]">TOTAL PRICE </h3>
            <hr class="price h-px border-0 col-span-4 mt-[1.5rem] w-full max-[1025px]:w-7/12 max-[1025px]:ml-[4.4rem]">
            <p class=" p-2 flex justify-self-end mx-auto font-bold max-[1025px]:mx-0">{{ $request->price }}</p>
        </div>
    </div>
    {{-- Edit booking form --}}
    <dialog id="bookingModal" class="w-11/12 mx-auto rounded-lg shadow-lg p-5 bg-gradient-to-t from-[#066906d2] to-[#3a7c3a73] backdrop:bg-black backdrop:opacity-80">
        <form id="bookingForm" class="grid grid-cols-4 gap-1 overflow-y-auto max-h-full" method="POST"  enctype="multipart/form-data" onsubmit="submitForm()">
            @csrf
            <input type="hidden" name="room_id" value="{{ $request->room_id }}">
            <input type="hidden" name="lodging_id" value="{{ $request->lodging_id }}">
            <input type="hidden" name="room_info" id="concerns" value="{{ $request->room_info }}">
            <input type="hidden" name="room_number" id="roomNumber" value="{{ $request->room_number }}">
            <input type="hidden" name="bed" id="bed" value="{{ $request->bed }}">
            <input type="hidden" name="price" id="price" value="{{ $request->price }}">
            <input type="hidden" name="area" id="lodgingArea" value="{{$request->area}}">
            <input type="hidden" name="location" id="lodgingLocation" value="{{$request->location}}">
            
            <div class="col-span-2 "> 
                <label for="lastName" id="lastName" class="block text-gray-800 font-bold">Last Name
                    <input
                    id="lastName"
                    name="lastName"
                    type="text"
                    value="{{ $request->lastName }}"
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full"
                    placeholder="Enter Last Name " onchange="changeTextColor(this)"
                    required
                    />
                </label>
            </div>
            <div class="col-span-2"> 
                <label for="firstName" id="firstName" class="block text-gray-800 font-bold">First Name
                    <input
                        id="firstName"
                        name="firstName"
                        type="text"
                        value="{{ $request->firstName }}"
                        class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full"
                        placeholder="Enter First Name" onchange="changeTextColor(this)"
                        required
                    />
                </label>
            </div>
            <div class="col-span-2"> 
                <label for="email" class="block text-gray-800 font-bold">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ $request->email }}"
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
                value="{{ $request->contact }}"
                class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
                placeholder="Enter Phone Number" 
                onchange="changeTextColor(this); validatePhoneNumber(this);"
                oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11); validatePhoneNumber(this);"
                required
                />
            </div>
            <div class="col-span-2"> 
                <label for="checkOut" class="block text-gray-800 font-bold">Check-In</label>
                <input
                    id="checkIn"
                    name="checkIn"
                    type="date"
                    value="{{ $request->checkIn }}" 
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
                    value="{{ $request->checkOut }}" 
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
                    value="{{ $request->fullAddress }}" 
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
                    value="{{ $request->room_type }}" 
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full text-green-700 text-center" 
                    onchange="changeTextColor(this)"
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
                            value="{{ $request->adultCount }}" 
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
                            value="{{ $request->childCount }}" 
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
                    class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md mt-4 hover:from-green-900 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Update </button>
            </div>
        </form>
    </dialog>
    {{-- Gmail Modal --}}
    <dialog class="w-full h-full p-0 bg-transparent backdrop:bg-black backdrop:opacity-80" id="openDialog"> 
        <form id="emailForm" class="min-[1024px]:w-6/12 mt-[10rem] mx-auto p-5 rounded-xl shadow-lg bg-gradient-to-t from-[#0F1612] to-[#030B06] max-[640px]:grid" method="GET" action="{{ route('booking.form') }}">
            @csrf
            <p class="text-base font-light text-white px-[2.5rem] font-mono uppercase">WE WILL SEND AN EMAIL TO THIS GMAIL FOR OPTIONAL ADVANCE PAYMENT. DO YOU WANT TO CHANGE YOUR EMAIL?</p>
            <input type="hidden" name="room_id" id="room_id" value="{{$request->room_id}}">
            <input type="hidden" name="lodging_id" id="lodging_id" value="{{$request->lodging_id}}">
            <input type="hidden" name="lastName" id="lastName" value="{{$request->lastName}}">
            <input type="hidden" name="firstName" id="firstName" value="{{$request->firstName}}">
            <input type="hidden" name="email" id="email" value="{{$request->email}}">
            <input type="hidden" name="contact" id="contact" value="{{$request->contact}}">
            <input type="hidden" name="checkIn" id="checkIn" value="{{$request->checkIn}}">
            <input type="hidden" name="checkOut" id="checkOut" value="{{$request->checkOut}}">
            <input type="hidden" name="fullAddress" id="fullAddress" value="{{$request->fullAddress}}">
            <input type="hidden" name="roomType" id="roomType" value="{{$request->room_type}}">
            <input type="hidden" name="roomCount" id="roomCount" value="1">
            <input type="hidden" name="adultCount" id="adultCount" value="{{$request->adultCount}}">
            <input type="hidden" name="childCount" id="childCount" value="{{$request->childCount}}">
            <input type="hidden" name="room_number" id="room_number" value="{{ $request->room_number}}">
            <input type="hidden" name="bed" id="bed" value="{{ $request->bed }}">
            <input type="hidden" name="price" id="price" value="{{ $request->price }}">
            <input type="hidden" name="area" id="lodgingArea" value="{{$request->area}}">
            <input type="hidden" name="location" id="lodgingLocation" value="{{$request->location}}"> 
            <div class="my-[1rem]">
                <label for="email" class="block text-green-700 font-bold">Your Email</label>
                <input
                    value="{{ $request->email }}"
                    id="email"
                    name="email"
                    type="email"
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full"
                    placeholder="Enter Email"
                    autocomplete="email"
                    onchange="changeTextColor(this)"
                    required
                />
            </div>
            <div class="flex justify-center -mb-[2rem] space-x-2">
                <button  class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md hover:from-yellow-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Back </button>
                <button type="submit" class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md hover:from-green-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Submit </button>
            </div>
        </form>
    </dialog>
    {{-- Automatically submit booked information --}}
    <form id="bookingForm" style="display: none;" method="POST" action="{{ route('booking.form') }}">
        @csrf
        <input type="hidden" name="room_id" id="room_id" value="{{$request->room_id}}">
        <input type="hidden" name="lodging_id" id="lodging_id" value="{{$request->lodging_id}}">
        <input type="hidden" name="lastName" id="lastName" value="{{$request->lastName}}">
        <input type="hidden" name="firstName" id="firstName" value="{{$request->firstName}}">
        <input type="hidden" name="email" id="email" value="{{$request->email}}">
        <input type="hidden" name="contact" id="contact" value="{{$request->contact}}">
        <input type="hidden" name="checkIn" id="checkIn" value="{{$request->checkIn}}">
        <input type="hidden" name="checkOut" id="checkOut" value="{{$request->checkOut}}">
        <input type="hidden" name="fullAddress" id="fullAddress" value="{{$request->fullAddress}}">
        <input type="hidden" name="roomType" id="roomType" value="{{$request->room_type}}">
        <input type="hidden" name="roomCount" id="roomCount" value="1">
        <input type="hidden" name="adultCount" id="adultCount" value="{{$request->adultCount}}">
        <input type="hidden" name="childCount" id="childCount" value="{{$request->childCount}}">
        <input type="hidden" name="room_number" id="room_number" value="{{ $request->room_number}}">
        <input type="hidden" name="bed" id="bed" value="{{ $request->bed }}">
        <input type="hidden" name="price" id="price" value="{{ $request->price }}">
        <input type="hidden" name="area" id="lodgingArea" value="{{$request->area}}">
        <input type="hidden" name="location" id="lodgingLocation" value="{{$request->location}}">    
    </form> 
    {{-- BUTTONS --}}
    <div class="min-[641px]:col-span-3 flex items-end space-x-2 justify-between mt-[2.5rem] mx-[1.5rem]">
        <button class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md hover:from-yellow-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center" onclick="closeDialog('openDialog')"> Back </button>
        <button type="button" class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md hover:from-green-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center" onclick="openDialog('openDialog')"> Proceed </button>
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

    function fillFullBookingForm() {

        // Show the modal
        bookingModal.showModal();
    }
    const modal = document.getElementById('bookingModal');
        modal.addEventListener('click', (event) => {
            if (event.target === bookingModal) {
                bookingModal.close();
            }
    });

    function changeTextColor(input) {
        if (input.value !== '') {
            input.classList.remove('text-black');
            input.classList.add('text-green-700');
        } else {
            input.classList.remove('text-green-700');
            input.classList.add('text-black');
        }
    }

    // Function to open modal
    function openModal() {
        var bookingModal = document.getElementById('bookingModal');
        bookingModal.showModal();
    }

    // Function to close modal
    function closeModal() {
        var bookingModal = document.getElementById('bookingModal');
        bookingModal.close();
    }

    // Function to update details section with form values
    function updateDetails() {
        // Retrieve form input values
        var lastName = document.getElementById('lastName').value;
        var firstName = document.getElementById('firstName').value;
        var fullAddress = document.getElementById('fullAddress').value;
        var contact = document.getElementById('contact').value;
        var email = document.getElementById('email').value;
        var adultCount = document.getElementById('adultCount').value;
        var childCount = document.getElementById('childCount').value;
        var checkIn = document.getElementById('checkIn').value;
        var checkOut = document.getElementById('checkOut').value;


        // Update details section with new values
        document.getElementById('detailsSection').innerHTML = `
            <h3 class="ml-2 p-2 w-full">
                <p class="font-bold text-xl">${lastName} ${firstName}</p>
                ${fullAddress}, ${contact}, ${email}
            </h3>
            <p class="flex justify-center">[${adultCount}]-ADULTS | [${childCount}]-CHILD</p>
            <h3 class="flex justify-center">[ ${checkIn} / ${checkOut} ]</h3>
        `;
    }

    // Edit form dialog Submit
    function submitForm() {
        updateDetails();
        closeModal(); // Close the modal after form submission
    }

</script>

@include('partials.__footer')