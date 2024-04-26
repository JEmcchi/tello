<div class="flex justify-center">    
    <div class="py-10 shadow-sm shadow-green-800 rounded-b-full bg-gradient-to-t from-[#1b631b79] to-[#d0ebd0] mb-32 max-[1024px]:hidden pl-[8rem]">
        <form class="space-x-4 grid grid-cols-6 flex-nowrap text-center" action="{{route('booking')}}" method="POST">
            @csrf
            <div class="">
                    <label for="checkInValue" class="block text-gray-700 font-bold text">Check-In</label>
                    <input type="date" name="checkIn" id="checkInValue" class="w-full p-2 font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600" placeholder="Select Check-In time" onchange="changeTextColorCenter(this)">
            </div>                      
            <div class="mb-2">
                <label for="checkOutValue" class="block text-gray-700 font-bold">Check-Out</label>
                <input type="date" name="checkOut" id="checkOutValue" class="w-full p-2 font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600" placeholder="Select Check-Out Time" onchange="changeTextColorCenter(this)">
            </div>
            <div class="mb-2 mx">
                <label for="roomTypeValue" class="block text-gray-700 font-bold">Type of Room</label>
                <select id="roomTypeValue" name="roomType" class="block p-2 w-full text-lg rounded-lg font-bold text-gray-500 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer" onchange="changeTextColorCenter(this)">
                    <option selected disabled class="text-gray-700 text-md">Select Rooms</option>
                    <option value="single" class="text-green-900 text-md font-bold text-center">Single</option>
                    <option value="double" class="text-green-900 text-md font-bold text-center">Double</option>
                    <option value="delux"  class="text-green-900 text-md font-bold text-center">Delux</option>
                    <option value="premium" class="text-green-900 text-md font-bold text-center">Premium</option>
                </select>
            </div>
            <div class="flex flex-row gap-4">
                <div class="mb-2 flex flex-col w-[100px] mx-5">
                    <label for="roomNumValue" class="block text-gray-700 font-bold whitespace-nowrap mx-auto">Room Count</label>
                    <input type="number" id="roomNumValue" class="text-center p-2 text-lg font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600 placeholder:start-5" onchange="changeTextColorCenter(this)">
                </div>
                <div class="mb-2 flex flex-col w-[100px]">
                    <label for="adultCountValue" class=" text-gray-700 font-bold">Adults</label>
                    <input type="number" name="adultCount" id="adultCountValue" class="text-center p-2 text-lg font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600placeholder:start-5" onchange="changeTextColorCenter(this)">
                </div>
                <div class="mb-2 flex flex-col w-[100px]">
                    <label for="childCountValue" class="block text-gray-700 font-bold">Childrens</label>
                    <input type="number" name="childCount" id="childCountValue" class="text-center p-2 text-xl font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600 placeholder:start-5" onchange="changeTextColorCenter(this)">
                </div>
            </div>
            <div class="flex justify-center content-end col-span-5 mt-[1rem]">
                <button type="button" class="book-button bg-gray-100 text-lg font-bold text-green-900 flex justify-center" 
                onclick="fillFullBookingForm(); handleButtonClick();">Book Now</button>
            </div>
        </form>
    </div>

    {{-- small divice --}}

    <div class="px-[1rem] py-10 shadow-sm shadow-green-800 rounded-b-2xl bg-gradient-to-t from-[#1b631b79] to-[#d0ebd0] mb-[5rem] w-11/12  min-[1025px]:hidden">
        {{-- <h1 class="text-2xl font-semibold col-span-2 flex justify-center">Book Your Stay</h1> --}}
        <form class="flex-nowrap text-center grid grid-cols-2 gap-4" action="{{route('booking')}}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="checkInValue" class="block text-gray-700 font-bold">Check-In</label>
                <input type="date" name="checkIn" id="checkInValue" class="w-full p-2 font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600" placeholder="Select Check-In time" onchange="changeTextColorCenter(this)">
            </div>            
            <div class="mb-2">
                <label for="checkOutValue" class="block text-gray-700 font-bold">Check-Out</label>
                <input type="date" name="checkOut" id="checkOutValue" class="w-full p-2 font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600" placeholder="Select Check-Out Time" onchange="changeTextColorCenter(this)">
            </div>
            <div class="mb-2">
                <label for="roomTypeValue" class="block text-gray-700 font-bold items-center">Type of Room</label>
                <select id="roomTypeValue" name="roomType" class="flex p-2 w-full text-lg rounded-lg font-bold text-gray-500 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-400" onchange="changeTextColorCenter(this)">
                    <option selected disabled class="text-gray-700 text-md">Select Rooms</option>
                    <option value="single" class="text-green-900 text-md font-bold text-center">Single</option>
                    <option value="double" class="text-green-900 text-md font-bold text-center">Double</option>
                    <option value="delux"  class="text-green-900 text-md font-bold text-center">Delux</option>
                    <option value="premium" class="text-green-900 text-md font-bold text-center">Premium</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="roomNumValue" class="block text-gray-700 font-bold whitespace-nowrap">Room Count</label>
                <input type="number" name="roomCount" id="roomNumValue" class="w-7/12 p-2 text-lg font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600 placeholder:start-5" placeholder="" onchange="changeTextColorCenter(this)">
            </div>
            <div class="mb-2 flex flex-col w-[6rem] mx-auto">
                    <label for="adultCountValue" class=" text-gray-700 font-bold">Adults</label>
                    <input type="number" name="adultCount" id="adultCountValue" class="text-center p-2 text-lg font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600  placeholder:start-5" onchange="changeTextColorCenter(this)">
                </div>

                <div class="mb-2 flex flex-col w-[6rem] mx-auto">
                    <label for="childCountValue" class="block text-gray-700 font-bold">Childrens</label>
                    <input type="number" name="childCount"  id="childCountValue" class="text-center p-2 text-lg font-bold border rounded-lg focus:outline-none hover:ring-1 hover:ring-green-300 focus:border-green-400 placeholder-gray-600  placeholder:start-5" onchange="changeTextColorCenter(this)">
                </div>

                <div class="col-span-2 flex justify-center mt-[1rem]">
                    <button type="button" class="book-button bg-gray-100 text-lg font-bold text-green-900 flex justify-center" onclick="fillFullBookingForm()" >Book Now</button>
                </div>
        </form>
    </div>    

{{-- full booking form --}}

    {{-- <h2 class="text-5xl font-bold text-gray-900 text-center mb-20">BOOKING</h2> --}}
    <dialog id="bookingModal" class="w-11/12 mx-auto rounded-lg shadow-lg p-5 bg-gradient-to-t from-[#066906d2] to-[#3a7c3a73] backdrop:bg-black backdrop:opacity-80">
        <form class="grid grid-cols-4 gap-1 overflow-y-auto max-h-full " action="{{route('booking')}}" method="POST" method="dialog" enctype="multipart/form-data">
            @csrf
            <div class="col-span-2 "> 
                <label for="lastName" class="block text-gray-800 font-bold">Last Name</label>
                <input
                id="lastName"
                name="lastName"
                type="text"
                class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
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
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
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
                    class="bg-[#d0ebd0] placeholder-gray-600 font-semibold border-0 rounded-md p-2 mb-4 focus:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-green-500 transition ease-in-out duration-150 w-full "
                    placeholder="Enter Email" onchange="changeTextColor(this)"
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
                <label for="fulladdress" class="block text-gray-800 font-bold">Full Address</label>
                <input
                    id="fulladdress"
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
                    <select id="roomType" name="roomType" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" required onchange="changeTextColorCenter(this)">
                        {{-- <option selected disabled class="text-gray-900 text-md font-semibold">Select Rooms</option> --}}
                        <option value="single" class="text-green-900 text-md font-bold text-center">Single</option>
                        <option value="double" class="text-green-900 text-md font-bold  text-center">Double</option>
                        <option value="delux"  class="text-green-900 text-md font-bold text-center">Delux</option>
                        <option value="premium" class="text-green-900 text-md font-bold  text-center">Premium</option>
                    </select>
                </div>
                <div class="col-span-4 grid grid-cols-3 gap-2 ml-3">
                    <div class="">
                        <label for="roomCount" class="block text-gray-900 font-bold whitespace-nowrap -ml-3">Rooms Count</label>        
                        <input
                        id="roomCount"
                        name="roomCount"
                        type="number"
                        class="bg-[#d0ebd0] block p-2 w-9/12 text-base rounded-lg text-gray-500 border-0 border-b-2 border-gray-700 appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer placeholder-gray-600 font-bold"
                        placeholder="Room No."
                        onchange="changeTextColorCenter(this)"
                        required
                        />
                    </div>
                    <div class="">
                        <label for="adultCount" class="block text-gray-900 font-bold whitespace-nowrap mx-auto">Adults</label>       
                            <input
                            id="adultCount"
                            name="adultCount"
                            type="number"
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
                <button
                    id="submitButton"
                    type="submit"
                    class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md mt-4 hover:from-green-900 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Submit </button>
            </div>
        </form>
    </dialog>
</div>



<script>
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
        // Get values from mobile/desktop form
        const checkInValue = document.getElementById('checkInValue').value;
        const checkOutValue = document.getElementById('checkOutValue').value;
        const roomTypeValue = document.getElementById('roomTypeValue').value;
        const roomNumValue = document.getElementById('roomNumValue').value;
        const adultCountValue = document.getElementById('adultCountValue').value;
        const childCountValue = document.getElementById('childCountValue').value;

        // Fill full booking form with the values
        document.getElementById('checkIn').value = checkInValue;
        document.getElementById('checkOut').value = checkOutValue;
        document.getElementById('roomType').value = roomTypeValue;
        document.getElementById('roomCount').value = roomNumValue;
        document.getElementById('adultCount').value = adultCountValue;
        document.getElementById('childCount').value = childCountValue;

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



</script>
