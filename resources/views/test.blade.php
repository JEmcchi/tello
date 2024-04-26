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
    {{-- BUTTONS --}}
    <div class="min-[641px]:col-span-3 flex items-end space-x-2 justify-between mt-[2.5rem] mx-[1.5rem]">
        <button class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md hover:from-yellow-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center" onclick="closeDialog('openDialog')"> Back </button>
        <button type="submit" class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md hover:from-green-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center" onclick="openDialog('openDialog')"> Proceed </button>
    </div>
    {{-- Gmail Modal --}}
    <dialog class="w-full h-full p-0 bg-transparent backdrop:bg-black backdrop:opacity-80" id="openDialog"> 
        <form id="emailForm" class="min-[1024px]:w-6/12 mt-[10rem] mx-auto p-5 rounded-xl shadow-lg bg-gradient-to-t from-[#0F1612] to-[#030B06] max-[640px]:grid" method="POST" action="{{ route('send.email') }}">
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
            <input type="hidden" name="room_type" id="room_type" value="{{$request->room_type}}">
            <input type="hidden" name="roomCount" id="roomCount" value="1">
            <input type="hidden" name="adultCount" id="adultCount" value="{{$request->adultCount}}">
            <input type="hidden" name="childCount" id="childCount" value="{{$request->childCount}}">
            <input type="hidden" name="room_number" id="roomNumber" value="{{ $request->room_number}}">
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
                <button onclick="closeDialog('openDialog')" class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md hover:from-yellow-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Back </button>
                <button type="submit" class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md hover:from-green-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Submit </button>
            </div>
        </form>
    </dialog>
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

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scroll Active Nav Link</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .nav-link {
            transition: color 0.3s ease-in-out;
        }
    
        .active-link {
            font-weight: bold;
            color: #ff0000; /* Change color as needed */
        }
    </style>
</head>


<body class="bg-gray-100">
    <nav id="navbar" class="bg-gray-800 text-white sticky top-0 z-50">
        <div class="container mx-auto py-4 flex justify-between items-center">
            <div class="text-xl font-bold">Logo</div>
            <div class="flex space-x-4">
                <a href="#home" class="nav-link">Home</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#services" class="nav-link">Services</a>
                <a href="#contact" class="nav-link">Contact</a>
            </div>
        </div>
    </nav>

    <div id="home" class="section h-screen bg-gray-100">Home Section</div>
    <div id="about" class="section h-screen bg-gray-200">About Section</div>
    <div id="services" class="section h-screen bg-gray-300">Services Section</div>
    <div id="contact" class="section h-screen bg-gray-400">Contact Section</div>


    <script>
        window.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('.section');
        const navLinks = document.querySelectorAll('.nav-link');
        const navbar = document.getElementById('navbar');

        const observerOptions = {
            rootMargin: '-50% 0px -50% 0px',
            threshold: 0.2
        };

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                const id = entry.target.id;
                if (entry.isIntersecting) {
                    navLinks.forEach(link => {
                        if (link.getAttribute('href').slice(1) === id) {
                            link.classList.add('active-link');
                        } else {
                            link.classList.remove('active-link');
                        }
                    });
                }
            });
            }, observerOptions);

            sections.forEach(section => {
                observer.observe(section);
            });

            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-gray-900');
                } else {
                    navbar.classList.remove('bg-gray-900');
                }
                
                // Update active link based on section in view
                let currentSectionId = '';
                sections.forEach(section => {
                    const rect = section.getBoundingClientRect();
                    if (rect.top <= 50 && rect.bottom >= 50) {
                        currentSectionId = section.id;
                    }
                });
                navLinks.forEach(link => {
                    if (link.getAttribute('href').slice(1) === currentSectionId) {
                        link.classList.add('active-link');
                    } else {
                        link.classList.remove('active-link');
                    }
                });
            });

            // Smooth scrolling when a navigation link is clicked
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute('href').slice(1);
                    const targetSection = document.getElementById(targetId);
                    window.scrollTo({
                        top: targetSection.offsetTop,
                        behavior: 'smooth'
                    });
                });
            });
        });


    </script>
</body>
</html> --}}





{{-- ROOM LODGING --}}
{{-- <style>
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

<h1 class="shadow_bg_title mx-auto text-center text-5xl font-bold text-[#153f11de] py-1 mt-[0.5rem] mb-[2rem] w-[20rem]">LODGING 1</h1>

<div class="filter-container w-11/12 h-fit mx-auto mt-[1.5rem] rounded-3xl">
    <h1 class="flex justify-center mx-auto text-4xl font-bold -z-5 -mt-5 text-transparent bg-clip-text bg-gradient-to-t from-[#475045] to-[#128609]">ROOM FILTER</h1>
    <div class="grid grid-cols-3">
        <div class="my-2 mx-2">
            <label for="roomType" class="block text-gray-900 font-bold whitespace-nowrap text-center">Room Type</label>
            <select id="roomType" name="roomType" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500 " required onchange="changeTextColorCenter(this)">
                <option value="single" class="text-green-900  text-md font-bold text-center">All Rooms</option>
                <option value="single" class="text-green-900 text-md font-bold text-center">Single</option>
                <option value="double" class="text-green-900 text-md font-bold  text-center">Double</option>
                <option value="delux"  class="text-green-900 text-md font-bold text-center">Delux</option>
                <option value="premium" class="text-green-900 text-md font-bold  text-center">Premium</option>
            </select>
        </div>

        <div class="my-2 mx-2">
            <label for="amenities" class="block text-gray-900 font-bold text-center">Ameneties</label>
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
                        <input type="text" id="search" class="border border-green-900 text-sm font-semibold rounded-lg block w-full ps-10 p-2.5 bg-white dark:placeholder-gray-400 dark:text-green-900" placeholder="Search Ameneties">
                    </div>
                </div>
                <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm dark:text-green-900" >
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-[#d0ebd0]">
                            <input id="checkbox-item-11" type="checkbox" value="" class="w-4 h-4 bg-neutral-800 rounded  dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-1 dark:border-gray-500">
                            <label for="checkbox-item-11" class="w-full ms-2 text-md font-medium text-gray-900 rounded dark:text-green-900">T.V.</label>
                        </div>
                    </li>
                </ul>
                <a href="#" class="flex items-center p-3 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg dark:border-gray-600 bg-white dark:hover:bg-[#d0ebd0] dark:text-red-600  hover:underline">
                Delete Selection
                </a>
            </div>
        </div>

        <div class="my-2 mx-2">
            <label for="lodging" class="block text-gray-900 font-bold text-center">Lodgings</label>
            <select id="lodging" name="lodging" class="bg-[#d0ebd0] p-2 w-full rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" required onchange="changeTextColorCenter(this)">
                <option value="all" class="text-green-900 text-md font-bold text-center">All Lodgings</option>
                <option value="ret" class="text-green-900 text-md font-bold text-center">RET Hostel</option>
                <option value="guest" class="text-green-900 text-md font-bold text-center">Guest House</option>
                <option value="premium" class="text-green-900 text-md font-bold text-center">Premium</option>
            </select>
        </div>

        <div class="mb-2 grid grid-cols-2 gap-2 col-span-3">
            <div class="mx-auto">
                <label for="checkInValue" class="block text-gray-700 font-bold text-center">Check-In</label>
                <input type="date" name="checkIn" id="checkInValue" class="bg-[#d0ebd0] p-2 w-fit rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" placeholder="Select Check-In time" onchange="changeTextColorCenter(this)">
            </div> 

            <div class="mx-auto">
                <label for="checkOutValue" class="block text-gray-700 font-bold text-center">Check-out</label>
                <input type="date" name="checkOut" id="checkOutValue" class="bg-[#d0ebd0] p-2 w-fit rounded-md font-bold border-0 border-b-2 focus:bg-gray-50 border-[#0f3517] appearance-none focus:outline-none focus:ring-0 focus:border-green-400 peer text-gray-500" placeholder="Select Check-In time" onchange="changeTextColorCenter(this)">
            </div> 
        </div>
        
    </div>
</div>

<div class="">
    <h1 class="text-center text-5xl font-bold my-5 -mb-[5.4rem] text-transparent bg-clip-text bg-gradient-to-t from-[#0f0f0f] to-[#128609] ">AVAILABLE ROOMS</h1>
    <div class="shadow_bg mx-auto w-full bg-[#1b631b79] rounded-xl py-[1rem] justify-center items-center mt-[5rem]">
        <div class="container space-x-5 w-full"> 

            <div class="flex ml-5">
                <div class="relative group cursor-pointer overflow-hidden duration-500 w-[13rem] h-[11rem] bg-zinc-800 text-gray-50 p-5 rounded-lg">
                    <div class="group-hover:scale-110 w-full h-[10rem] bg-green-800 duration-500 rounded-md">
                        <img src="" alt="">
                    </div>
                    <div class="absolute w-full left-0 p-2 -bottom-[7rem] duration-500 group-hover:-translate-y-[4rem]">
                        <div class="absolute -z-10 left-0 w-full h-full opacity-0 duration-500 group-hover:opacity-50 group-hover:bg-green-900 bg-green-900"></div>
                        <div class="grid grid-rows-2 ml-2">
                                <div>
                                    <span class="text-2xl font-bold -ml[2rem] bg-zinc-800 group-hover:bg-transparent duration-300 pr-5 rounded-md">202</span>
                                    <p class="group-hover:opacity-100 duration-500 opacity-0 overflow-visible">Bed Type</p>
                                    <p class="group-hover:opacity-100 duration-500 opacity-0 overflow-visible font-semibold">price</p>
                                </div>
                            <div>
                                <button class="ml-[5rem] bg-[#131313ea] group-hover:opacity-100 rounded-md p-2 whitespace-nowrap font-semibold" onclick="openDialog('openDialog')">More Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex">
                <div class="relative group cursor-pointer overflow-hidden duration-500 w-[13rem] h-[11rem] bg-zinc-800 text-gray-50 p-5 rounded-lg">
                    <div class="group-hover:scale-110 w-full h-[10rem] bg-green-800 duration-500 rounded-md">
                        <img src="" alt="">
                    </div>
                    <div class="absolute w-full left-0 p-2 -bottom-[7rem] duration-500 group-hover:-translate-y-[4rem]">
                        <div class="absolute -z-10 left-0 w-full h-full opacity-0 duration-500 group-hover:opacity-50 group-hover:bg-green-900 bg-green-900"></div>
                        <div class="grid grid-rows-2 ml-2">
                                <div>
                                    <span class="text-2xl font-bold -ml[2rem] bg-zinc-800 group-hover:bg-transparent duration-300 pr-5 rounded-md">202</span>
                                    <p class="group-hover:opacity-100 duration-500 opacity-0 overflow-visible">Bed Type</p>
                                    <p class="group-hover:opacity-100 duration-500 opacity-0 overflow-visible font-semibold">price</p>
                                </div>
                            <div>
                                <button class="ml-[5rem] bg-[#131313ea] group-hover:opacity-100 rounded-md p-2 whitespace-nowrap font-semibold" onclick="openDialog('openDialog')">More Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex">
                <div class="relative group cursor-pointer overflow-hidden duration-500 w-[13rem] h-[11rem] bg-zinc-800 text-gray-50 p-5 rounded-lg">
                    <div class="group-hover:scale-110 w-full h-[10rem] bg-green-800 duration-500 rounded-md">
                        <img src="" alt="">
                    </div>
                    <div class="absolute w-full left-0 p-2 -bottom-[7rem] duration-500 group-hover:-translate-y-[4rem]">
                        <div class="absolute -z-10 left-0 w-full h-full opacity-0 duration-500 group-hover:opacity-50 group-hover:bg-green-900 bg-green-900"></div>
                        <div class="grid grid-rows-2 ml-2">
                                <div>
                                    <span class="text-2xl font-bold -ml[2rem] bg-zinc-800 group-hover:bg-transparent duration-300 pr-5 rounded-md">202</span>
                                    <p class="group-hover:opacity-100 duration-500 opacity-0 overflow-visible">Bed Type</p>
                                    <p class="group-hover:opacity-100 duration-500 opacity-0 overflow-visible font-semibold">price</p>
                                </div>
                            <div>
                                <button class="ml-[5rem] bg-[#131313ea] group-hover:opacity-100 rounded-md p-2 whitespace-nowrap font-semibold" onclick="openDialog('openDialog')">More Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <dialog class="w-full h-full p-0 bg-transparent backdrop:bg-black backdrop:opacity-80" id="openDialog">
        <div class="w-full h-full mx-auto p-5 rounded-xl shadow-lg bg-gradient-to-t from-[#0F1612] to-[#030B06] max-[640px]:grid max-[640px]:grid-rows-6 max-[640px]:grid-flow-col max-[640px]:gap-4 min-[641px]:grid min-[641px]:grid-cols-3 min-[641px]:grid-flow-row min-[641px]:gap-4" method="dialog">
            <div class="shadow_bg_dialog max-[640px]:row-span-1 min-[641px]:col-span-1 min-[641px]:mt-[5rem] min-[641px]:-mb-[5rem] min-[641px]:w-11/12 min-[641px]:ml-[0.7rem] w-full">
                <img src="" alt="">
            </div>
            <div class="shadow_bg_dialog min-[641px]:w-full h-full mt-5 items-center max-[640px]:row-span-4 min-[641px]:col-span-2 min-[641px]:mt-[5rem] min-[641px]:-mb-[5rem] text-md text-[#fff] font-semibold">
                <h2 class="text-center -mt-[1.5rem] text-3xl">201</h2>
                <div class="grid grid-cols-3 mt-2">
                    <h3 class="whitespace-nowrap p-2">Room Type</h3>
                    <p class="col-span-2 ml-2 p-2">Single</p>
                    <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                    <h3 class="p-2">Price</h3>
                    <p class="col-span-2 ml-2 p-2">2,000</p>
                    <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                    <h3 class="p-2">Location</h3>
                    <p class="col-span-2 ml-2 p-2">Ret Hostel</p>
                    <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                    <h3 class="p-2">Ameneties</h3>
                    <p class="col-span-2 ml-2 p-2">T.V, Aircon, etc.</p>
                    <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
                    <h3 class="whitespace-nowrap p-2">Room Info</h3>
                    <p class="col-span-2 ml-2 p-2">Lorem ipsum dolor sit amet consectetur,</p>
                </div>
            </div>
            <div class="min-[641px]:col-span-3 flex items-end mx-auto space-x-2">
                <button class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md hover:from-yellow-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center" onclick="closeDialog('openDialog')"> Back </button>
                <button type="submit" class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md hover:from-green-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Book This Room </button>
            </div>
        </div>
    </dialog>
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
</script> --}}
{{-- ROOM LODGING --}}



{{-- <div>
    <button
      class="rounded bg-[#3b71ca] px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-[#386bc0] hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-[#386bc0] focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-[#3566b6] active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
      Animation on Click
    </button>
    <svg
      id="animate-click"
      data-te-animation-init
      data-te-animation-start="onClick"
      data-te-animation-reset="true"
      data-te-animation="[slide-right_1s_ease-in-out]"
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 24 24"
      fill="currentColor"
      class="ml-2 h-11 w-11">
      <path
        d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
    </svg>
</div> --}}
{{-- <body class="bg-gray-200 p-4">

    <div class="bg-white p-4 rounded shadow-md">
      <button class="collapsible bg-blue-500 text-white p-2 rounded"      
      data-te-animation-init
      data-te-animation-target="#animate-click"
      data-te-ripple-init>Toggle Details</button>
      <div class="content mt-4 hidden transition-opacity duration-800 ease-in-out"  
      id="animate-click"
      data-te-animation-init
      data-te-animation-start="onClick"
      data-te-animation-reset="true"
      data-te-animation="[slide-right_1s_ease-in-out]">
        <p class="bg-blue-500 text-white p-2 rounded">This is the detailed content that will be collapsed or expanded.</p>
      </div>
    </div>
    
    <script>
      function toggleContent() {
        var content = document.querySelector('.content');
        content.classList.toggle('hidden');
      }
    </script> --}}


{{-- <body>

  <div class="mt-10 mx-auto text-center">
    <div id="dropdownTrigger" class="cursor-pointer text-blue-500">Click me</div>
    <div id="dropdownContent" class="dropdown-content mt-2 bg-white shadow-md rounded-md p-4">
      <!-- Dropdown items go here -->
      <p>Dropdown Item 1</p>
      <p>Dropdown Item 2</p>
      <p>Dropdown Item 3</p>
    </div>
  </div>

  <script>

    document.addEventListener('DOMContentLoaded', function () {
    const dropdownTrigger = document.getElementById('dropdownTrigger');
    const dropdownContent = document.getElementById('dropdownContent');

    dropdownTrigger.addEventListener('click', function () {
        dropdownContent.classList.toggle('dropdown-open');
    });

    // Close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
        if (!dropdownTrigger.contains(event.target) && !dropdownContent.contains(event.target)) {
        dropdownContent.classList.remove('dropdown-open');
        }
    });
    });

  </script>
</body> --}}

{{-- <div class="select ml-[1rem] mt-[1rem] w-[1rem]">
            <div
              class="selected"
              data-default="All"
              data-one="option-1"
              data-two="option-2"
              data-three="option-3"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                height="1em"
                viewBox="0 0 512 512"
                class="arrow"
              >
                <path
                  d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"
                ></path>
              </svg>
            </div>
            <div class="options">
              <div title="all">
                <input id="all" name="option" type="radio" checked="" />
                <label class="option" for="all" data-txt="All"></label>
              </div>
              <div title="option-1">
                <input id="option-1" name="option" type="radio" />
                <label class="option" for="option-1" data-txt="option-1"></label>
              </div>
              <div title="option-2">
                <input id="option-2" name="option" type="radio" />
                <label class="option" for="option-2" data-txt="option-2"></label>
              </div>
              <div title="option-3">
                <input id="option-3" name="option" type="radio" />
                <label class="option" for="option-3" data-txt="option-3"></label>
              </div>
            </div>
          </div> --}}



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @keyframes cardAnimation {
            0% {
                transform: translateX(-60%) scale(1);
                filter: blur(0.2rem);
            }
            50%{
              transform: scale(1.2);
              filter: blur(0)
            }
            100% {
                transform: translateX(100%) scale(1);
                filter: blur(0.2rem);
            }
        }

        .card-container {
            display: flex;
            overflow: hidden;
            padding: 1rem;
            animation: cardAnimation 18s linear infinite;
        }

        .card {
            flex: 0 0 300px;
            margin-right: 1rem;
            transition: filter 0.1s;
        }

        .card:hover {
            filter: blur(0);
        }

        .card.active {
            filter: blur(0);
        }

        .card .card-content {
            display: none;
            padding: 1rem;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transform-origin: top center;
        }

        .card.active .card-content {
            display: block;
        }
    </style>
</head>
<body>

<div class="card-container">
    <div class="card">
        <div class="card-content">
            <h3>Card 1 Details</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec turpis eget lacus cursus commodo.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <h3>Card 2 Details</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec turpis eget lacus cursus commodo.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <h3>Card 3 Details</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nec turpis eget lacus cursus commodo.</p>
        </div>
    </div>
    <!-- Add more cards as needed -->
</div>

<script>
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('click', () => {
            card.classList.toggle('active');
        });
    });
</script>

</body>
</html> --}}



{{-- 
<style>
    .shadow_bg{
    background: none;
    border: none;
    outline: none;
    box-shadow: inset 2px 5px 10px rgb(0, 0, 0);
    color: #ffffff;
    border-radius: 0.5rem;
    }

    .container {
    overflow: auto;
    display: flex;
    scroll-snap-type: x mandatory;
    margin: 0 auto;
    padding: 0 15px;
    }
</style> --}}
{{-- 
<div class="">
  <h1 class="text-center text-5xl font-bold text-[#SS143814] my-5 -mb-[1rem]">ROOM LIST</h1>
  <div class="shadow_bg mx-auto my-auto h-full w-full p-10 rounded-md ">

              <div class="container flex flex-row space-x-10 mt-5 mx-10 mb-6 justify-center">
                  <div class="w-72 h-80 bg-neutral-800 rounded-3xl text-neutral-300 p-4 flex flex-col items-start justify-center gap-3 hover:bg-[#00000049] hover:shadow-2xl hover:shadow-[#000000] transition-shadow">
                      <div class="w-60 h-40 bg-[#197219d0] rounded-2xl"> ROOM PICTURE</div>
                      <div class="">
                          <p class="font-extrabold">ROOM NUMBER</p>
                          <p class="">ROOM INFO</p>
                      </div>

                      <button class="bg-[#197219d0] font-extrabold p-2 px-6 rounded-xl hover:bg-neutral-800 transition-colors" id="showModal">See more</button>

                  </div>
              </div>

</div>  --}}




{{-- <style>
  .shadow_bg{
  background: none;
  border: none;
  outline: none;
  padding: 10px 20px;
  font-size: 16px;
  box-shadow: inset 2px 5px 10px rgb(0, 0, 0);
  color: #fff;
  border-radius: 0.5rem;
  }

  .container {
  overflow: auto;
  display: flex;
  scroll-snap-type: x mandatory;
  width: 90%;
  margin: 0 auto;
  padding: 0 15px;
  }

</style> --}}

{{-- <div class="w-10/12 mt-[1rem] mx-auto p-5 rounded-xl shadow-lg bg-gradient-to-t from-[#0F1612] to-[#030B06] max-[640px]:grid max-[640px]:grid-rows-6 max-[640px]:grid-flow-col max-[640px]:gap-4 min-[641px]:grid min-[641px]:grid-cols-3 min-[641px]:grid-flow-row min-[641px]:gap-4" method="dialog">
  <div class="shadow_bg max-[640px]:row-span-1">
      <img src="" alt="">
  </div>
  <div class="shadow_bg max-[640px]:row-span-4 min-[641px]:col-span-2">
      
      <h2 class="text-center -mt-5">202</h2>
          <div class="grid grid-cols-3">
              <h3 class="whitespace-nowrap">Room Type</h3>
              <p class="col-span-2 ml-2">Single</p>
              <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
              <h3 class="">Price</h3>
              <p class="col-span-2 ml-2">2000</p>
              <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
              <h3 class="">Location</h3>
              <p class="col-span-2 ml-2">Guest House</p>
              <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
              <h3 class="">Ameneties</h3>
              <p class="col-span-2 ml-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui fuga a sit in</p>
              <hr class="h-px my-2 bg-yellow-900 border-0 dark:bg-yellow-700 col-span-3">
              <h3 class="whitespace-nowrap">Room Info</h3>
              <p class="col-span-2 ml-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, laboriosam fugit similique dolor odit molestiae voluptates dignissimos veniam minima sint amet, voluptatem</p>
          </div>
     
  </div>
  <div class="min-[641px]:col-span-6 flex items-end -mb-[2rem] mx-auto space-x-2">
      <button 
          class="bg-gradient-to-r from-yellow-800 text-white font-bold py-2 px-4 rounded-md hover:from-yellow-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Back </button>
      <button
          type="submit"
          class="bg-gradient-to-l from-green-900  text-white font-bold py-2 px-4 rounded-md hover:from-green-700 to-gray-950 transition ease-in-out duration-150 items-center flex-nowrap justify-center"> Book This Room </button>
  </div>
</div> --}}

